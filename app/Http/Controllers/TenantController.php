<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Jobs\CreateChurch;
use App\Models\User;
use App\Models\Permissions;
use App\Models\Setting;
use App\Models\Tenant;
use Hash;
use Validator;

class TenantController extends Controller
{

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'domain' => 'required',
            'church' => 'required',
            'phone' => 'required',
            'user_name' => 'required',
            'user_email' => 'required|email|unique:churches,email',
            'password' => 'required'
        ]);

        $attributes = [
            'user_name' => $request->user_name,
            'user_last_name' => $request->user_last_name,
            'user_email' => $request->user_email,
            'user_phone_code' => $request->user_phone_code,
            'user_phone' => $request->user_phone,
            'password' => $request->password,
            'domain' => str_replace(' ', '', $request->domain),
            'church' => $request->church,
            'short_church' => $request->short_church,
            'country' => $request->country,
            'state' => $request->state,
            'city' => $request->city,
            'address' => $request->address,
            'phone_code' => $request->phone_code,
            'phone' => $request->phone,
            'email' => $request->email,
            'open' => $request->open,
            'instagram' => $request->instagram,
            'facebook' => $request->facebook,
            'youtube' => $request->youtube
        ];
        
        CreateChurch::dispatch($attributes);
        
        return response()->json(['message' => 'Cadastro em andamento']);
    }

    function install()
    {
        // create user
        $newuser = new User();
        $newuser->name = "admin";
        $newuser->email = "admin@eigrejas.com";
        $newuser->password = bcrypt(uniqid());
        $newuser->permissions_id = "1";
        $newuser->status = "1";
        $newuser->created_by = 1;
        $newuser->save();

        // create permission
        $Permissions = new Permissions();
        $Permissions->name = "Webmaster";
        $Permissions->view_status = false;
        $Permissions->add_status = true;
        $Permissions->edit_status = true;
        $Permissions->delete_status = true;
        $Permissions->active_status = true;
        $Permissions->analytics_status = true;
        $Permissions->inbox_status = true;
        $Permissions->newsletter_status = true;
        $Permissions->calendar_status = true;
        $Permissions->banners_status = true;
        $Permissions->settings_status = true;
        $Permissions->webmaster_status = true;
        $Permissions->data_sections = "1,2,3,4,5,6,7,8,9";
        $Permissions->status = true;
        $Permissions->created_by = 1;
        $Permissions->save();

        // create settings
        $settings = new Setting();
        $settings->site_title_pt = "e-igrejas";
        $settings->site_url = "https://eigrejas.com";
        $settings->site_status = "1";
        $settings->save();

        $company = 'home';

        $tenant = Tenant::create([
            'id' => $company
        ]);

        $tenant->domains()->create([
            'domain' => $company
        ]);

        // Initialize new tentant
        tenancy()->initialize($company);

        // create user
        $newuser = new User();
        $newuser->name = "admin";
        $newuser->email = "admin@eigrejas.com";
        $newuser->password = bcrypt("adminBR");
        $newuser->permissions_id = "1";
        $newuser->status = "1";
        $newuser->created_by = 1;
        $newuser->save();

        return 'completed';
    }

}