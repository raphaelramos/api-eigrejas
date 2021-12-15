<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\File;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Models\{Banner as Banner, Comment as Comment, Contact as Contact, 
	Section as Section, Setting as Setting, Topic as Topic,
    TopicCategory as TopicCategory, TopicField as TopicField, User as User, Webmail as Webmail,
    WebmasterSection as WebmasterSection, WebmasterSetting as WebmasterSetting, Tenant as Tenant};
use App\Jobs\SendEmailJob;
use App; use Redirect; use Helper; use Auth; use Cache;

class HomeAppController extends Controller
{

    public $title = "e-igrejas";

    public function __construct()
    {
        $tenant = Tenant::find('home');
        tenancy()->initialize($tenant);
    }

    public function SEO($seo_url_slug = 0)
    {
        return $this->SEOByLang("", $seo_url_slug);
    }

    public function HomePage()
    {
        $PageTitle = $this->title.' | Completo Aplicativo e Site para Igrejas';
        $PageDescription = 'Sistema para Igrejas, para organizar, comunicar melhor online e ajudar no crecimento. Teste grátis.';
        return view("frontEnd.app.home", compact("PageTitle", "PageDescription"));
    }

    public function AppPage()
    {
        $PageTitle = "Aplicativo - " . $this->title;
        $PageDescription = 'Aplicativo e site para o crecimento da sua Igreja. Teste grátis.';
        return view("frontEnd.app.app", compact("PageTitle", "PageDescription"));
    }

    public function PrivacyPage()
    {
        $PageTitle = "Privacidade - " . $this->title;
        $PageDescription = 'Politica de privacidade e-igrejas';
        return view("frontEnd.app.privacy", compact("PageTitle", "PageDescription"));
    }

    public function TermsPage()
    {
        $PageTitle = "Termos - " . $this->title;
        $PageDescription = 'Termos de Uso e-igrejas';
        return view("frontEnd.app.terms", compact("PageTitle", "PageDescription"));
    }

    public function FaqPage()
    {
        $PageTitle = "Perguntas e Respostas - " . $this->title;
        $PageDescription = 'Principais Dúvidas';
        return view("frontEnd.app.faqs", compact("PageTitle", "PageDescription"));
    }

    public function ContactPage()
    {
        $PageTitle = "Contato - " . $this->title;
        $PageDescription = 'Fale com um especialista da e-igrejas';
        return view("frontEnd.app.contact", compact("PageTitle", "PageDescription"));
    }

    public function ComingPage()
    {
        $PageTitle = "Em breve - " . $this->title;
        $PageDescription = 'Faça seu cadastro para o lançamento';
        return view("frontEnd.app.coming", compact("PageTitle", "PageDescription"));
    }

    public function topic($section = 0, $id = 0)
    {
        // check url slug
        if (!is_numeric($id)) {
            return $this->SEOByLang($section, $id);
        }

        $lang_dirs = array_filter(glob(App::langPath() . '/*'), 'is_dir');
        // check if this like "/ar/blog"
        if (in_array(App::langPath() . "/$section", $lang_dirs)) {
            return $this->topicsByLang($section, $id, 0);
        } else {
            return $this->topicByLang("", $section, $id);
        }
    }

    public function topicsByLang(?string $lang, $section = 0, $cat = 0)
    {
        if (!is_numeric($cat)) {
            return $this->topicsByLang($section, $cat, 0);
        }
        if ($lang) {
            // Set Language
            App::setLocale($lang);
            \Session::put('locale', $lang);
        }

        // General Webmaster Settings
        $WebmasterSettings = Cache::rememberForever('WebmasterSetting', function () {
            return WebmasterSetting::find(1);
        });


        // get Webmaster section settings by name
        $Current_Slug = "seo_url_slug_pt";
        $Default_Slug = "seo_url_slug_" . \Config::get('app.locale');
        $WebmasterSection = WebmasterSection::where($Current_Slug, $section)->orwhere($Default_Slug, $section)->first();
        if (empty($WebmasterSection)) {
            // get Webmaster section settings by ID
            $WebmasterSection = WebmasterSection::find($section);
        }
        if (!empty($WebmasterSection)) {

            // if private redirect back to home
            if ($WebmasterSection->type == 4) {
                return redirect()->route("HomePage");
            }

            // count topics by Category
            $category_and_topics_count = array();
            $AllSections = Section::where('webmaster_id', '=', $WebmasterSection->id)->where('status', 1)->orderby('row_no', 'asc')->get();
            if (count($AllSections) > 0) {
                foreach ($AllSections as $AllSection) {
                    $category_topics = array();
                    $TopicCategories = TopicCategory::where('section_id', $AllSection->id)->get();
                    foreach ($TopicCategories as $category) {
                        $category_topics[] = $category->topic_id;
                    }

                    $Topics = Topic::where([['webmaster_id', '=', $WebmasterSection->id], ['status', 1], ['expire_date', '>=', date("Y-m-d")], ['expire_date', '<>', null]])->orWhere([['webmaster_id', '=', $WebmasterSection->id], ['status', 1], ['expire_date', null]])->whereIn('id', $category_topics)->orderby('row_no', \Config::get('front.topics_order'))->get();
                    $category_and_topics_count[$AllSection->id] = count($Topics);
                }
            }

            // Get current Category Section details
            $CurrentCategory = Section::find($cat);
            // Get a list of all Category ( for side bar )
            $Categories = Section::where('webmaster_id', '=', $WebmasterSection->id)->where('father_id', '=',
                '0')->where('status', 1)->orderby('webmaster_id', 'asc')->orderby('row_no', 'asc')->get();

            if (!empty($CurrentCategory)) {
                $category_topics = array();
                $TopicCategories = TopicCategory::where('section_id', $cat)->get();
                foreach ($TopicCategories as $category) {
                    $category_topics[] = $category->topic_id;
                }
                // update visits
                $CurrentCategory->visits = $CurrentCategory->visits + 1;
                $CurrentCategory->save();
                // Topics by Cat_ID

                $Topics = Topic::where(function ($q) use ($WebmasterSection) {
                    $q->where([['webmaster_id', '=', $WebmasterSection->id], ['status', 1], ['expire_date', '>=', date("Y-m-d")], ['expire_date', '<>', null]])->orWhere([['webmaster_id', '=', $WebmasterSection->id], ['status', 1], ['expire_date', null]]);
                })->whereIn('id', $category_topics)->orderby('row_no', \Config::get('front.topics_order'))->paginate(\Config::get('front.frontend_pagination'));

                // Get Most Viewed Topics fot this Category
                $TopicsMostViewed = Topic::where([['webmaster_id', '=', $WebmasterSection->id], ['status', 1], ['expire_date', '>=', date("Y-m-d")], ['expire_date', '<>', null]])->orWhere([['webmaster_id', '=', $WebmasterSection->id], ['status', 1], ['expire_date', null]])->whereIn('id', $category_topics)->orderby('visits', 'desc')->limit(3)->get();
            } else {
                // Topics if NO Cat_ID
                $Topics = Topic::where([['webmaster_id', '=', $WebmasterSection->id], ['status',
                    1], ['expire_date', '>=', date("Y-m-d")], ['expire_date', '<>', null]])->orWhere([['webmaster_id', '=', $WebmasterSection->id], ['status', 1], ['expire_date', null]])->orderby('row_no', \Config::get('front.topics_order'))->paginate(\Config::get('front.frontend_pagination'));
                // Get Most Viewed
                $TopicsMostViewed = Topic::where([['webmaster_id', '=', $WebmasterSection->id], ['status',
                    1], ['expire_date', '>=', date("Y-m-d")], ['expire_date', '<>', null]])->orWhere([['webmaster_id', '=', $WebmasterSection->id], ['status', 1], ['expire_date', null]])->orderby('visits', 'desc')->limit(3)->get();
            }

            // General for all pages
            $WebsiteSettings = Setting::find(1);


            // Get Latest News
            $LatestNews = $this->latest_topics($WebmasterSettings->latest_news_section_id);

            // Page Title, Description, Keywords
            if (!empty($CurrentCategory)) {
                $seo_title_var = "seo_title_pt";
                $seo_description_var = "seo_description_pt";
                $tpc_title_var = "title_pt";
                $site_desc_var = "site_desc_pt";
                $site_keywords_var = "site_keywords_pt";
                if ($CurrentCategory->$seo_title_var != "") {
                    $PageTitle = $CurrentCategory->$seo_title_var;
                } else {
                    $PageTitle = $CurrentCategory->$tpc_title_var;
                }
                if ($CurrentCategory->$seo_description_var != "") {
                    $PageDescription = $CurrentCategory->$seo_description_var;
                } else {
                    $PageDescription = $WebsiteSettings->$site_desc_var;
                }
            } else {
                $site_desc_var = "site_desc_pt";
                $site_keywords_var = "site_keywords_pt";

                $title_var = "title_pt";
                $title_var2 = "title_" . \Config::get('app.locale');
                if ($WebmasterSection->$title_var != "") {
                    $PageTitle = $WebmasterSection->$title_var;
                } else {
                    $PageTitle = $WebmasterSection->$title_var2;
                }

                $PageDescription = $WebsiteSettings->$site_desc_var;

            }
            // .. end of .. Page Title, Description, Keywords

            // Send all to the view
            $view = "topics";
            if ($WebmasterSection->type == 5) {
                $view = "table";
            }
            foreach ($WebmasterSection->customFields as $customField) {
                if ($customField->in_statics && ($customField->type == 6 || $customField->type == 7)) {
                    $cf_details_var = "details_pt";
                    $cf_details_var2 = "details_en" . \Config::get('app.locale');
                    if ($customField->$cf_details_var != "") {
                        $cf_details = $customField->$cf_details_var;
                    } else {
                        $cf_details = $customField->$cf_details_var2;
                    }
                    $cf_details_lines = preg_split('/\r\n|[\r\n]/', $cf_details);
                    $line_num = 1;
                    foreach ($cf_details_lines as $cf_details_line) {
                        if ($customField->type == 6) {
                            $tids = TopicField::select("topic_id")->where("field_id", $customField->id)->where("field_value", $line_num);
                        } else {
                            $tids = TopicField::select("topic_id")->where("field_id", $customField->id)->where("field_value", 'like', '%' . $line_num . '%');
                        }
                        $Topics_count = Topic::where('webmaster_id', '=', $WebmasterSection->id)->wherein('id', $tids)->count();
                        $statics_row[$line_num] = $Topics_count;
                        $line_num++;
                    }
                }
            }

            return view("frontEnd.app." . $view,
                compact("WebsiteSettings",
                    "WebmasterSettings",
                    "LatestNews",
                    "WebmasterSection",
                    "Categories",
                    "Topics",
                    "CurrentCategory",
                    "PageTitle",
                    "PageDescription",
                    "TopicsMostViewed",
                    "category_and_topics_count"));

        } else {

            return $this->SEOByLang($lang, $section);
        }

    }

    public function SEOByLang(?string $lang, $seo_url_slug = 0)
    {
        if ($lang) {
            // Set Language
            App::setLocale($lang);
            \Session::put('locale', $lang);
        }

        // General Webmaster Settings
        $WebmasterSettings = Cache::rememberForever('WebmasterSetting', function () {
            return WebmasterSetting::find(1);
        });
        $Current_Slug = "seo_url_slug_pt";
        $Default_Slug = "seo_url_slug_" . \Config::get('app.locale');
        $Current_Title = "title_pt";
        $Default_Title = "title_" . \Config::get('app.locale');

        $WebmasterSection1 = WebmasterSection::where($Current_Slug, $seo_url_slug)->orwhere($Default_Slug, $seo_url_slug)->first();
        if (!empty($WebmasterSection1)) {
            // MAIN SITE SECTION
            $section = $WebmasterSection1->id;
            return $this->topics($section, 0);
        } else {
            $WebmasterSection2 = WebmasterSection::where($Current_Title, $seo_url_slug)->orwhere($Default_Title, $seo_url_slug)->first();
            if (empty($WebmasterSection2)) {
                $AllWebmasterSections = WebmasterSection::where('status', 1)->get();
                foreach ($AllWebmasterSections as $TWebmasterSection) {
                    if ($TWebmasterSection->$Current_Title != "") {
                        $TTitle = $TWebmasterSection->$Current_Title;
                    } else {
                        $TTitle = $TWebmasterSection->$Default_Title;
                    }
                    $TTitle_slug = Str::slug($TTitle, '-');
                    if ($TTitle_slug == $seo_url_slug) {
                        $WebmasterSection2 = $TWebmasterSection;
                        break;
                    }
                }
            }
            if (!empty($WebmasterSection2)) {
                // MAIN SITE SECTION
                $section = $WebmasterSection2->id;
                return $this->topics($section, 0);
            } else {
                $Section = Section::where('status', 1)->where($Current_Slug, $seo_url_slug)->orwhere($Default_Slug, $seo_url_slug)->first();
                if (empty($Section)) {
                    $AllSection = Section::where('status', 1)->get();
                    foreach ($AllSection as $TSection) {
                        if ($TSection->$Current_Title != "") {
                            $TTitle = $TSection->$Current_Title;
                        } else {
                            $TTitle = $TSection->$Default_Title;
                        }
                        $TTitle_slug = Str::slug($TTitle, '-');
                        if ($TTitle_slug == $seo_url_slug) {
                            $Section = $TSection;
                            break;
                        }
                    }
                }

                if (!empty($Section)) {
                    // SITE Category
                    $section = $Section->webmaster_id;
                    $cat = $Section->id;
                    return $this->topics($section, $cat);
                } else {
                    $Topic = Topic::where('status', 1)->where($Current_Slug, $seo_url_slug)->orwhere($Default_Slug, $seo_url_slug)->first();
                    if (empty($Topic)) {
                        $AllTopics = Topic::where('status', 1)->get();
                        foreach ($AllTopics as $TTopic) {
                            if ($TTopic->$Current_Title != "") {
                                $TTitle = $TTopic->$Current_Title;
                            } else {
                                $TTitle = $TTopic->$Default_Title;
                            }
                            $TTitle_slug = Str::slug($TTitle, '-');
                            if ($TTitle_slug == $seo_url_slug) {
                                $Topic = $TTopic;
                                break;
                            }
                        }
                    }
                    if (!empty($Topic)) {
                        // SITE Topic
                        $section_id = $Topic->webmaster_id;
                        $WebmasterSection = WebmasterSection::find($section_id);
                        $section = $WebmasterSection->id;
                        $id = $Topic->id;
                        return $this->topic($section, $id);
                    } else {
                        // Not found
                        return redirect()->route("HomePage");
                    }
                }
            }
        }

    }

    public function topicByLang(?string $lang, $section = 0, $id = 0)
    {

        if ($lang) {
            // Set Language
            App::setLocale($lang);
            \Session::put('locale', $lang);
        }

        // General Webmaster Settings
        $WebmasterSettings = Cache::rememberForever('WebmasterSetting', function () {
            return WebmasterSetting::find(1);
        });

        // get Webmaster section settings by name
        $Current_Slug = "seo_url_slug_pt";
        $Default_Slug = "seo_url_slug_" . \Config::get('app.locale');
        $WebmasterSection = WebmasterSection::where($Current_Slug, $section)->orwhere($Default_Slug, $section)->first();
        if (empty($WebmasterSection)) {
            // get Webmaster section settings by ID
            $WebmasterSection = WebmasterSection::find($section);
        }
        if (!empty($WebmasterSection)) {

            // if private redirect back to home
            if ($WebmasterSection->type == 4) {
                return redirect()->route("HomePage");
            }

            // count topics by Category
            $category_and_topics_count = array();
            $AllSections = Section::where('webmaster_id', '=', $WebmasterSection->id)->where('status', 1)->orderby('row_no', 'asc')->get();
            if (count($AllSections) > 0) {
                foreach ($AllSections as $AllSection) {
                    $category_topics = array();
                    $TopicCategories = TopicCategory::where('section_id', $AllSection->id)->get();
                    foreach ($TopicCategories as $category) {
                        $category_topics[] = $category->topic_id;
                    }

                    $Topics = Topic::where([['webmaster_id', '=', $WebmasterSection->id], ['status', 1], ['expire_date', '>=', date("Y-m-d")], ['expire_date', '<>', null]])->orWhere([['webmaster_id', '=', $WebmasterSection->id], ['status', 1], ['expire_date', null]])->whereIn('id', $category_topics)->orderby('row_no', \Config::get('front.topics_order'))->get();
                    $category_and_topics_count[$AllSection->id] = count($Topics);
                }
            }

            $Topic = Topic::where('status', 1)->find($id);


            if (!empty($Topic) && ($Topic->expire_date == '' || ($Topic->expire_date != '' && $Topic->expire_date >= date("Y-m-d")))) {
                // update visits
                $Topic->visits = $Topic->visits + 1;
                $Topic->save();

                // Get current Category Section details
                $CurrentCategory = array();
                $TopicCategory = TopicCategory::where('topic_id', $Topic->id)->first();
                if (!empty($TopicCategory)) {
                    $CurrentCategory = Section::find($TopicCategory->section_id);
                }
                // Get a list of all Category ( for side bar )
                $Categories = Section::where('webmaster_id', '=', $WebmasterSection->id)->where('status',
                    1)->where('father_id', '=', '0')->orderby('webmaster_id', 'asc')->orderby('row_no', 'asc')->get();

                // Get Most Viewed
                $TopicsMostViewed = Topic::where([['webmaster_id', '=', $WebmasterSection->id], ['status', 1], ['expire_date', '>=', date("Y-m-d")], ['expire_date', '<>', null]])->orwhere([['webmaster_id', '=', $WebmasterSection->id], ['status', 1], ['expire_date', null]])->orderby('visits', 'desc')->limit(3)->get();

                // General for all pages
                $WebsiteSettings = Setting::find(1);

                // Get Latest News
                $LatestNews = $this->latest_topics($WebmasterSettings->latest_news_section_id);

                // Page Title, Description, Keywords
                $seo_title_var = "seo_title_pt";
                $seo_description_var = "seo_description_pt";
                $tpc_title_var = "title_pt";
                $site_desc_var = "site_desc_pt";
                $site_keywords_var = "site_keywords_pt";
                if ($Topic->$seo_title_var != "") {
                    $PageTitle = $Topic->$seo_title_var;
                } else {
                    $PageTitle = $Topic->$tpc_title_var;
                }
                if ($Topic->$seo_description_var != "") {
                    $PageDescription = $Topic->$seo_description_var;
                } else {
                    $PageDescription = $WebsiteSettings->$site_desc_var;
                }
                // .. end of .. Page Title, Description, Keywords


                return view("frontEnd.app.topic",
                    compact("WebsiteSettings",
                        "WebmasterSettings",
                        "LatestNews",
                        "Topic",
                        "WebmasterSection",
                        "Categories",
                        "CurrentCategory",
                        "PageTitle",
                        "PageDescription",
                        "TopicsMostViewed",
                        "category_and_topics_count"));

            } else {
                return redirect()->action('HomeController@HomePage');
            }
        } else {
            return redirect()->action('HomeController@HomePage');
        }
    }

    public function topics($section = 0, $cat = 0)
    {
        $lang_dirs = array_filter(glob(App::langPath() . '/*'), 'is_dir');
        // check if this like "/ar/blog"
        if (in_array(App::langPath() . "/$section", $lang_dirs)) {
            return $this->topicsByLang($section, $cat, 0);
        } else {
            return $this->topicsByLang("", $section, $cat);
        }
    }

    public function searchHomeTopics(Request $request)
    {

        // General Webmaster Settings
        $WebmasterSettings = Cache::rememberForever('WebmasterSetting', function () {
            return WebmasterSetting::find(1);
        });

        $search_word = $request->get('q');

        if ($search_word != "") {

            // count topics by Category
            $category_and_topics_count = array();
            $AllSections = Section::where('status', 1)->orderby('row_no', 'asc')->get();
            if (!empty($AllSections)) {
                foreach ($AllSections as $AllSection) {
                    $category_topics = array();
                    $TopicCategories = TopicCategory::where('section_id', $AllSection->id)->get();
                    foreach ($TopicCategories as $category) {
                        $category_topics[] = $category->topic_id;
                    }

                    $Topics = Topic::where([['status', 1], ['expire_date', '>=', date("Y-m-d")], ['expire_date', '<>', null]])->orWhere([['status', 1], ['expire_date', null]])->whereIn('id', $category_topics)->orderby('row_no', \Config::get('front.topics_order'))->get();
                    $category_and_topics_count[$AllSection->id] = count($Topics);
                }
            }

            // Get current Category Section details
            $CurrentCategory = "none";
            $WebmasterSection = "none";
            // Get a list of all Category ( for side bar )
            $Categories = Section::where('father_id', '=',
                '0')->where('status', 1)->orderby('webmaster_id', 'asc')->orderby('row_no', 'asc')->get();

            // Topics if NO Cat_ID
            $Topics = Topic::where('title_' . Helper::currentLanguage()->code, 'like', '%' . $search_word . '%')
                ->orwhere('seo_title_' . Helper::currentLanguage()->code, 'like', '%' . $search_word . '%')
                ->orwhere('details_' . Helper::currentLanguage()->code, 'like', '%' . $search_word . '%')
                ->orderby('id', 'desc')->paginate(\Config::get('front.frontend_pagination'));
            // Get Most Viewed
            $TopicsMostViewed = Topic::where([['status', 1], ['expire_date', '>=', date("Y-m-d")], ['expire_date', '<>', null]])->orwhere([['status', 1], ['expire_date', null]])->orderby('visits', 'desc')->limit(3)->get();

            // General for all pages
            $WebsiteSettings = Setting::find(1);

            // Get Latest News
            $LatestNews = $this->latest_topics($WebmasterSettings->latest_news_section_id);

            // Page Title, Description, Keywords
            $site_desc_var = "site_desc_pt";
            $site_keywords_var = "site_keywords_pt";

            $PageTitle = $search_word;
            $PageDescription = $WebsiteSettings->$site_desc_var;

            // .. end of .. Page Title, Description, Keywords

            // Send all to the view
            return view("frontEnd.app.topics",
                compact("WebsiteSettings",
                    "WebmasterSettings",
                    "LatestNews",
                    "search_word",
                    "WebmasterSection",
                    "Categories",
                    "Topics",
                    "CurrentCategory",
                    "PageTitle",
                    "PageDescription",
                    "TopicsMostViewed",
                    "category_and_topics_count"));

        } else {
            // If no section name/ID go back to home
            return redirect()->action('HomeController@HomePage');
        }

    }

    public function ContactPageSubmit(Request $request)
    {
        // if (env('NOCAPTCHA_STATUS', false)) {
        //     $this->validate($request, [
        //         'g-recaptcha-response' => 'required|captcha'
        //     ]);
        // }

        $site_email = @Helper::GeneralSiteSettings("site_webmails");
        if (!$site_email) {
            $site_email = "dev.eigrejas@gmail.com";
        }

        $Webmail = new Webmail;
        $Webmail->cat_id = 0;
        $Webmail->group_id = null;
        $Webmail->title = $request->subject;
        $Webmail->details = $request->message. '<br>Igreja: '.$request->igreja. ' Membros: '.$request->membros;
        $Webmail->date = date("Y-m-d H:i:s");
        $Webmail->from_email = $request->email;
        $Webmail->from_name = $request->name;
        $Webmail->from_phone = $request->phone;
        $Webmail->to_email = $site_email;
        $Webmail->to_name = 'Contato';
        $Webmail->status = 0;
        $Webmail->flag = 0;
        $Webmail->save();

        // SEND Notification Email
        try {
            $recipient = explode(",", str_replace(" ", "", $site_email));
            $message_details = __('frontend.name') . ": " . $request->contact_name . "<hr>" . __('frontend.phone') . ": " . $request->contact_phone . "<hr>" . __('frontend.email') . ": " . $request->contact_email . "<hr>" . __('frontend.message') . ":<br>" 
            . nl2br($request->contact_message) . '<br>Igreja: '.$request->igreja. '<br>Membros: '.$request->membros;

            $attributes = ['to' 		=> $recipient,
                        'title' 		=> $request->contact_subject,
						'details' 		=> $message_details,
						'from_email'	=> $request->contact_email,
                        'from_name'	    => $request->contact_name];

            SendEmailJob::dispatch($attributes);
        } catch (\Exception $e) {
            return response()->json(['info' => 'error', 'msg' => "Erro, sua mensagem não foi enviada. Tente contato pelo telefone."]);
        }

        return response()->json(['info' => 'success', 'msg' => "Sua mensagem foi enviada. Obrigado!"]);
    }

    public function subscribeSubmit(Request $request)
    {

        $this->validate($request, [
            'subscribe_name' => 'required',
            'subscribe_email' => 'required|email'
        ]);

        // General Webmaster Settings
        $WebmasterSettings = Cache::rememberForever('WebmasterSetting', function () {
            return WebmasterSetting::find(1);
        });

        $Contacts = Contact::where('email', $request->subscribe_email)->get();
        if (count($Contacts) > 0) {
            return __('frontend.subscribeToOurNewsletterError');
        } else {
            $subscribe_names = explode(' ', $request->subscribe_name, 2);

            $Contact = new Contact;
            $Contact->group_id = $WebmasterSettings->newsletter_contacts_group;
            $Contact->first_name = @$subscribe_names[0];
            $Contact->last_name = @$subscribe_names[1];
            $Contact->email = $request->subscribe_email;
            $Contact->status = 1;
            $Contact->save();

            return "OK";
        }
    }

    public function latest_topics($section_id, $limit = 3)
    {
        return Topic::where([['status', 1], ['webmaster_id', $section_id], ['expire_date', '>=', date("Y-m-d")], ['expire_date', '<>', null]])->orwhere([['status', 1], ['webmaster_id', $section_id], ['expire_date', null]])->orderby('row_no', 'desc')->limit($limit)->get();
    }

}
