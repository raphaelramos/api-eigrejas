<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\Middleware\WithoutOverlapping;
use App\Models\{CentralChurch, Church, Member, Menu, Permissions, Place, Setting, Tenant, Topic, User};
use App\Mail\WelcomeEmail;
use Config; use Mail; use Hash; use Http; use Helper;

class CreateChurch implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    protected $attributes;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct($attributes)
    {
        $this->attributes = $attributes;
    }

    /**
     * Get the middleware the job should pass through.
     *
     * @return array
     */
    public function middleware()
    {
        return [(new WithoutOverlapping('church'))->releaseAfter(3)];
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        // User data
        $user_name = $this->attributes['user_name'];
        $user_last_name = $this->attributes['user_last_name'];
        $user_email = $this->attributes['user_email'];
        $user_phone_code = $this->attributes['user_phone_code'];
        $user_phone = Helper::onlyNumber($this->attributes['user_phone']);
        $password = $this->attributes['password'];

        // church info
        $domain = strtolower($this->attributes['domain']);
        $church = $this->attributes['church'];
        $short_church = $this->attributes['short_church'];
        $photo = null;

        // Location Data
        $country = $this->attributes['country'];
        $state = $this->attributes['state'];
        $city = $this->attributes['city'];
        $address = $this->attributes['address'];
        $open = $this->attributes['open'];
        $phone_code = $this->attributes['phone_code'];
        $phone = Helper::onlyNumber($this->attributes['phone']);
        $email = $this->attributes['email'];

        // Social Data
        $phone_church_wp = '';
        if ($phone_code AND $phone) {
            $phone_church_wp = $phone_code.$phone;
        }

        $instagram = $this->attributes['instagram'];
        $facebook = $this->attributes['facebook'];
        $youtube = $this->attributes['youtube'];
        $youtube_id = null;
        if (!empty($youtube)) {
            $youtube_id = Helper::Get_youtube_channel_ID($youtube);
        }

        // Legal church
        // $cnpj = $this->attributes['cnpj'];
        // $responsible_name = $this->attributes['responsible_name'];
        // $responsible_cpf = $this->attributes['responsible_cpf'];
        // $responsible_phone = $this->attributes['responsible_phone'];

        // Create Tenant
        $complete_domain = 'http://' . $domain . '.eigrejas.com';

        $tenant = Tenant::create([
            'id' => $domain
        ]);

        $tenant->domains()->create([
            'domain' => $domain
        ]);

        $newChurch = new CentralChurch();
        $newChurch->global_id = $domain;
        $newChurch->name = $church;
        $newChurch->short_name = $short_church;
        $newChurch->email = $email;
        $newChurch->phone_code = $phone_code;
        $newChurch->phone = $phone;
        $newChurch->country = $country;
        $newChurch->state = $state;
        $newChurch->city = $city;
        $newChurch->address = $address;
        $newChurch->status = 1;
        $newChurch->save();

        // Initialize new church tentant
        tenancy()->initialize($domain);

        // create user
        $newuser = new User();
        $newuser->name = $user_name;
        $newuser->last_name = $user_last_name;
        $newuser->email = $user_email;
        $newuser->phone = $user_phone;
        $newuser->password = bcrypt($password);
        $newuser->permissions_id = "1";
        $newuser->status = "1";
        $newuser->member_id = 1;
        $newuser->created_by = 1;
        $newuser->save();

        // create member
        $member = new Member();
        $member->name 				= mb_convert_case($user_name . ' ' . $user_last_name, MB_CASE_TITLE);
        $member->phone 				= $user_phone;
        $member->email 				= $user_email;
        $member->place_id 			= 1;
		$member->pastor_id 			= 1;
		$member->leader_id 			= 1;
        $member->save();

        // create church
        $newChurch = new Church();
        $newChurch->global_id = $domain;
        $newChurch->name = $church;
        $newChurch->short_name = $short_church;
        $newChurch->email = $email;
        $newChurch->phone_code = $phone_code;
        $newChurch->phone = $phone;
        $newChurch->country = $country;
        $newChurch->state = $state;
        $newChurch->city = $city;
        $newChurch->address = $address;
        $newChurch->status = 1;
        $newChurch->save();

        // create settings
        $settings = Setting::find(1);
        $settings->site_title_pt = $church;
        $settings->site_title_en = $church;
        $settings->site_title_es = $church;
        $settings->site_desc_pt = "Site da Igreja";
        $settings->site_desc_en = "Church Website";
        $settings->site_desc_es = "Sitio de la iglesia";
        $settings->site_url = $complete_domain;
        $settings->site_status = "1";
        $settings->site_webmails = $email;
        if (!empty($youtube)) {
            $settings->social_link5 = $youtube;
        }
        $settings->social_link10 = $phone_church_wp;
        $settings->contact_t1_pt = $city . " " . $address;
        $settings->contact_t3 = $phone;
        $settings->contact_t6 = $email;
        $settings->contact_t7_pt = $open;
        $settings->save();

        // Create social menu links
        $Menu = new Menu();
        $Menu->row_no = 1;
        $Menu->father_id = 3;
        $Menu->title_pt = "Site";
        $Menu->title_en = "Sitio";
        $Menu->title_es = "Site";
        $Menu->status = 1;
        $Menu->type = 1;
        $Menu->cat_id = 0;
        $Menu->link = $complete_domain;
        $Menu->created_by = 1;
        $Menu->save();

        if (!empty($youtube)) {
            $Menu = new Menu();
            $Menu->row_no = 2;
            $Menu->father_id = 3;
            $Menu->title_pt = "Youtube";
            $Menu->title_en = "Youtube";
            $Menu->title_es = "Youtube";
            $Menu->status = 1;
            $Menu->type = 1;
            $Menu->cat_id = 0;
            $Menu->link = $youtube;
            $Menu->created_by = 1;
            $Menu->save();

            $Topic = new Topic();
            $Topic->title_pt = "Canal";
            $Topic->title_en = "Channel";
            $Topic->title_es = "Canal";
            $Topic->seo_url_slug_pt = "canal";
            $Topic->seo_url_slug_en = "channel";
            $Topic->seo_url_slug_es = "canal";
            $Topic->webmaster_id = 4;
            $Topic->video_file = $youtube_id;
            $Topic->save();
        }

        if (!empty($phone_church_wp)) {
            $Menu = new Menu();
            $Menu->row_no = 3;
            $Menu->father_id = 3;
            $Menu->title_pt = "WhatsApp";
            $Menu->title_en = "WhatsApp";
            $Menu->title_es = "WhatsApp";
            $Menu->status = 1;
            $Menu->type = 1;
            $Menu->cat_id = 0;
            $Menu->link = 'https://wa.me/'.$phone_church_wp;
            $Menu->created_by = 1;
            $Menu->save();
        }

        // Create place
        $place = new Place();
        $place->name 				= "Sede";
        $place->phone 				= $phone;
        $place->country 			= $country;
        $place->state 				= $state;
        $place->city 				= $city;
        $place->address 			= $address;
        $place->status 			    = 1;
		$place->save();

        $userAttributes = [
            "name" => $user_name,
            "last_name" => $user_last_name,
            "email" => $user_email,
            "password" => $password,
            "phone_code" => $user_phone_code,
            "phone" => $user_phone,
            "church"    => $church,
            "domain" => $complete_domain
        ];

        // Send email welcome
        $this->welcomeMail($userAttributes);
        
        // Save contact in hubspot
        $this->addContact($userAttributes);

    }

    public function welcomeMail($attributes)
    {
        Mail::to($attributes['email'])->send(new WelcomeEmail($attributes));
    }

    /**
     * save contact in hubspot
     *
     * @return void
     */
    public function addContact($attributes)
    {
        $arr = array(
            'properties' => array(
                array(
                    'property' => 'email',
                    'value' => $attributes['email']
                ),
                array(
                    'property' => 'firstname',
                    'value' => $attributes['name']
                ),
                array(
                    'property' => 'igreja',
                    'value' => $attributes['church']
                ),
                array(
                    'property' => 'phone',
                    'value' => $attributes['phone']
                ),
                array(
                    'property' => 'cadastro',
                    'value' => 1
                ),
            )
        );

        $post_json = json_encode($arr);
        $hapikey = Config::get('app.hubspot_api');
        $endpoint = 'https://api.hubapi.com/contacts/v1/contact/createOrUpdate/email/' . $attributes['email'] . '?hapikey=' . $hapikey;

        return Http::withOptions([
            'verify' => false,
        ])->post($endpoint, $arr)->throw()->json();
    }
}
