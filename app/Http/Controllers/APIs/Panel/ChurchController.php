<?php

namespace App\Http\Controllers\APIs\Panel;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Pagination\Paginator;
use App\Models\{CentralChurch, Church};
use Helper; use Cache; Use Lang;

class ChurchController extends Controller
{
    public function show($id) {
        return CentralChurch::where('global_id', tenant('id'))->first();
    }

    public function store(Request $request)
	{
		// Validação
		$request->validate([
			'name' => 'required'
		]);

        // save central database
		$church = CentralChurch::find(1);

		$church->name 				= mb_convert_case($request->name, MB_CASE_TITLE);
        $church->short_name 		= $request->short_name;
        $church->phone 				= Helper::onlyNumber($request->phone);
        $church->email 			    = $request->email;
        $church->country 			= $request->country;
        $church->state 				= $request->state;
        $church->city 				= $request->city;
        $church->address 			= $request->address;
        $church->cnpj 			    = Helper::onlyNumber($request->cnpj);
        $church->responsible_name 	= $request->responsible_name;
        $church->responsible_cpf 	= Helper::onlyNumber($request->responsible_cpf);
        $church->responsible_phone 	= Helper::onlyNumber($request->responsible_phone);
        $church->status 	        = $request->status;

		$church->save();

        // save tenant database
        $church = Church::find(1);

		$church->name 				= mb_convert_case($request->name, MB_CASE_TITLE);
        $church->short_name 		= $request->short_name;
        $church->phone 				= Helper::onlyNumber($request->phone);
        $church->email 			    = $request->email;
        $church->country 			= $request->country;
        $church->state 				= $request->state;
        $church->city 				= $request->city;
        $church->address 			= $request->address;
        $church->cnpj 			    = Helper::onlyNumber($request->cnpj);
        $church->responsible_name 	= $request->responsible_name;
        $church->responsible_cpf 	= Helper::onlyNumber($request->responsible_cpf);
        $church->responsible_phone 	= Helper::onlyNumber($request->responsible_phone);
        $church->status 	        = $request->status;

		$church->save();

		return response()->json([
			'message' 	=> Lang::get('backend.saved')
		]);
	}

}