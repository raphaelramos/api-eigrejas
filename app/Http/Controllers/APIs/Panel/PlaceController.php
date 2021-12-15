<?php

namespace App\Http\Controllers\APIs\Panel;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Pagination\Paginator;
use App\Models\{Place as Place};
use Helper; use Cache; use Lang;

class PlaceController extends Controller
{
    public function index($page = 1, $limit = 10, $search = '') {
        return Place::select('id', 'name')
			->where('name', 'like', $search.'%')
			->limit($limit)
			->offset(($page - 1) * $limit)
			->orderBy('name')
			->get();
    }

    public function show($id) {
        return Place::where('id', $id)->first();
    }

    public function store(Request $request)
	{
		$id = $request->input("id");

		// Validação
		$request->validate([
			'name' => 'required|unique:places,name,' . $id
		]);

		$place = Place::firstOrNew(['id' => $id]);

		$place->name 				= mb_convert_case($request->input("name"), MB_CASE_TITLE);
        $place->phone 				= Helper::onlyNumber($request->input("phone"));
        $place->country 			= $request->input("country");
        $place->state 				= $request->input("state");
        $place->city 				= $request->input("city");
        $place->district 			= $request->input("district");
        $place->address 			= $request->input("address");
        $place->schedules 			= $request->input("schedules");
        $place->status 			    = $request->input("status");

		$place->save();

		// clear cache
        Cache::tags(tenant('id'))->flush();

		return response()->json([
			'message' 	=> Lang::get('backend.saved')
		]);
	}

	public function destroy($id, Request $request)
	{
		$place = Place::find($id);
		$place->delete();

		// clear cache
        Cache::tags(tenant('id'))->flush();

		return response()->json([
			'message' 	=> Lang::get('backend.deleted')
		]);
	}

}