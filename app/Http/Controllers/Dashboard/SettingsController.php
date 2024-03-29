<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Http\Requests;
use App\Models\Setting;
use App\Models\WebmasterSection;
use App\Models\Church;
use Illuminate\Http\Request;
use Auth; use File; use Storage; use Redirect; use Helper; use Image; use Cache;
class SettingsController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');

        // Check Permissions
        if (@Auth::user()->permissions != 0 && Auth::user()->permissions != 1) {
            return Redirect::to(route('NoPermission'))->send();
        }
    }

    private function uploadPath()
    {
        $folder = "settings";
        $path = "uploads/tenants/" . tenant('id') . "/" . $folder . "/";
        $local = public_path($path);

        if (! is_dir($local)) {
            mkdir($local, 0755, true);
        }
        return $path;
    }

    private function resize($file, $path, $format = 'png', $maxWidth = 600)
    {
        $img = Image::make($file);

        // resize image
        $img->resize($maxWidth, null, function ($constraint) {
            $constraint->aspectRatio();
            $constraint->upsize();
        })->encode($format);

        // save image
        $img->save($path);
    }

    public function edit()
    {
        //

        // General for all pages
        $GeneralWebmasterSections = WebmasterSection::where('status', '=', '1')->orderby('row_no', 'asc')->get();
        // General END

        $id = 1;
        $Setting = Setting::find($id);
        if (!empty($Setting)) {
            return view("dashboard.settings.settings", compact("Setting", "GeneralWebmasterSections"));

        } else {
            return redirect()->route('adminHome');
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id = 1 for default settings
     * @return \Illuminate\Http\Response
     */
    public function updateSiteInfo(Request $request)
    {
        //
        $id = 1;
        $Setting = Setting::find($id);
        if (!empty($Setting)) {

            $this->validate($request, [
                'site_url' => 'url',
                'style_logo_en' => 'mimes:png,jpeg,jpg,gif,svg,webp',
                'style_logo_es' => 'mimes:png,jpeg,jpg,gif,svg,webp',
                'style_logo_pt' => 'mimes:png,jpeg,jpg,gif,svg,webp',
                'style_logo_dark_en' => 'mimes:png,jpeg,jpg,gif,svg,webp',
                'style_logo_dark_es' => 'mimes:png,jpeg,jpg,gif,svg,webp',
                'style_logo_dark_pt' => 'mimes:png,jpeg,jpg,gif,svg,webp',
                'style_fav' => 'mimes:png,jpeg,jpg,gif,svg,webp',
                'style_apple' => 'mimes:png,jpeg,jpg,gif,svg,webp',
                'style_bg_image' => 'mimes:png,jpeg,jpg,gif,svg,webp',
                'style_footer_bg' => 'mimes:png,jpeg,jpg,gif,svg,webp'
            ]);
            foreach (Helper::languagesList() as $ActiveLanguage) {

                // Start of Upload Files
                $path = $this->uploadPath();

                $formFileName = "style_logo_" . $ActiveLanguage->code;
                $fileFinalName = "";
                if ($request->hasFile($formFileName)) {
                    $file = $request->file($formFileName);
                    $extension = $file->extension();
                    $fileFinalName = 'logo-' . $ActiveLanguage->code . '.' . $extension;
                    $this->resize($file, $path.$fileFinalName, $extension, 260);
                }

                //save file name 
                if ($fileFinalName != "") {
                    $Setting->{"style_logo_" . $ActiveLanguage->code} = $path.$fileFinalName;
                }

                $formFileNameDark = "style_logo_dark_" . $ActiveLanguage->code;
                $fileFinalNameDark = "";
                if ($request->hasFile($formFileNameDark)) {
                    $file = $request->file($formFileNameDark);
                    $extension = $file->extension();
                    $fileFinalNameDark = 'logo-dark-' . $ActiveLanguage->code . '.' . $extension;
                    $this->resize($file, $path.$fileFinalNameDark, $extension, 260);
                }

                //save file name
                if ($fileFinalNameDark != "") {
                    $Setting->{"style_logo_dark_" . $ActiveLanguage->code} = $path.$fileFinalNameDark;
                }

                $Setting->{"site_title_" . $ActiveLanguage->code} = $request->{"site_title_" . $ActiveLanguage->code};
                $Setting->{"site_desc_" . $ActiveLanguage->code} = $request->{"site_desc_" . $ActiveLanguage->code};
                $Setting->{"site_keywords_" . $ActiveLanguage->code} = $request->{"site_keywords_" . $ActiveLanguage->code};
                $Setting->{"contact_t1_" . $ActiveLanguage->code} = $request->{"contact_t1_" . $ActiveLanguage->code};
                $Setting->{"contact_t7_" . $ActiveLanguage->code} = $request->{"contact_t7_" . $ActiveLanguage->code};
            }
            $Setting->site_webmails = $request->site_webmails;
            $Setting->site_app_banner = $request->site_app_banner;
            $Setting->notify_messages_status = $request->notify_messages_status;
            $Setting->notify_comments_status = $request->notify_comments_status;
            $Setting->notify_orders_status = $request->notify_orders_status;
            $Setting->notify_table_status = $request->notify_table_status;
            $Setting->notify_private_status = $request->notify_private_status;
            $Setting->site_url = $request->site_url;


            $formFileName2 = "style_fav";
            $fileFinalName2 = ""; //favicon
            $fileFinalName3 = ""; //favicon apple
            if ($request->hasFile($formFileName2)) {
                // Delete a style_fav photo
                if ($Setting->style_fav != "") {
                    File::delete($Setting->style_fav);
                }

                // Delete a style_apple photo
                if ($Setting->style_apple != "") {
                    File::delete($Setting->style_apple);
                }

                $file = $request->file($formFileName2);
                $extension = $file->extension();

                // Save fav
                $fileFinalName2 = 'favicon.' . $extension;
                $this->resize($file, $path.$fileFinalName2, $extension, 32);

                // Save fav Apple
                $fileFinalName3 = 'favicon_apple.' . $extension;
                $this->resize($file, $path.$fileFinalName3, $extension);
            }

            $formFileName4 = "style_bg_image";
            $fileFinalName4 = "";
            if ($request->hasFile($formFileName4)) {
                // Delete a style_bg_image photo
                if ($Setting->style_bg_image != "") {
                    File::delete($Setting->style_bg_image);
                }

                $file = $request->file($formFileName4);
                $fileFinalName4 = uniqid() . '.jpg';
                $this->resize($file, $path.$fileFinalName4, 'jpg');
            }


            $formFileName5 = "style_footer_bg";
            $fileFinalName5 = "";
            if ($request->hasFile($formFileName5)) {
                // Delete a style_footer_bg photo
                if ($Setting->style_footer_bg != "") {
                    File::delete($Setting->style_footer_bg);
                }

                $file = $request->file($formFileName5);
                $fileFinalName5 = uniqid() . '.jpg';
                $this->resize($file, $path.$fileFinalName5, 'jpg');
            }

            // End of Upload Files
            if ($fileFinalName2 != "") {
                $Setting->style_fav = $path.$fileFinalName2;
            }
            if ($fileFinalName3 != "") {
                $Setting->style_apple = $path.$fileFinalName3;
            }

            $Setting->style_color1 = $request->style_color1;
            $Setting->style_color2 = $request->style_color2;
            $Setting->style_color3 = $request->style_color3;
            $Setting->style_type = $request->style_type;
            $Setting->style_bg_type = $request->style_bg_type;
            $Setting->style_bg_pattern = $request->style_bg_pattern;
            $Setting->style_bg_color = $request->style_bg_color;
            if ($fileFinalName4 != "") {
                $Setting->style_bg_image = $path.$fileFinalName4;
            }
            $Setting->style_subscribe = $request->style_subscribe;
            $Setting->style_footer = $request->style_footer;
            $Setting->style_header = $request->style_header;
            if ($request->photo_delete == 1) {
                // Delete style_footer_bg
                if ($Setting->style_footer_bg != "") {
                    File::delete($Setting->style_footer_bg);
                }

                $Setting->style_footer_bg = "";
            }

            if ($fileFinalName5 != "") {
                $Setting->style_footer_bg = $path.$fileFinalName5;
            }
            $Setting->style_preload = $request->style_preload;
            $Setting->css = $request->css_code;

            $Setting->social_link1 = $request->social_link1;
            $Setting->social_link2 = $request->social_link2;
            $Setting->social_link4 = $request->social_link4;
            $Setting->social_link5 = $request->social_link5;
            $Setting->social_link6 = $request->social_link6;
            $Setting->social_link7 = $request->social_link7;
            $Setting->social_link8 = $request->social_link8;
            $Setting->social_link9 = $request->social_link9;
            $Setting->social_link10 = $request->social_link10;
            $Setting->social_link11 = $request->social_link11;
            $Setting->social_link12 = $request->social_link12;
            $Setting->social_link13 = $request->social_link13;

            $Setting->contact_t3 = $request->contact_t3;
            $Setting->contact_t4 = $request->contact_t4;
            $Setting->contact_t5 = $request->contact_t5;
            $Setting->contact_t6 = $request->contact_t6;

            $Setting->site_status = $request->site_status;
            $Setting->close_msg = $request->close_msg;

            $Setting->updated_by = Auth::user()->id;

            $Setting->save();

            // update search logo church
            if ($fileFinalName2 != "") {
                $Church = Church::find(1);
                $Church->photo = $path.$fileFinalName2;
                $Church->save();
            }

            // clear cache
            Cache::tags(tenant('id'))->flush();

            return redirect()->action('Dashboard\SettingsController@edit')
                ->with('doneMessage', __('backend.saveDone'))
                ->with('active_tab', $request->active_tab);
        } else {
            return redirect()->route('adminHome');
        }
    }

}
