<?php

namespace App\Http\Controllers\APIs\Panel;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Pagination\Paginator;
use App\Models\{Ministry};
use Helper; use Cache; Use Lang;

class MinistryController extends Controller
{
    public function index($page = 1, $limit = 10, $search = '', Request $request) {
		$ministries = Ministry::select('id', 'name')
			->where('name', 'like', $search.'%')
			->limit($limit)
			->offset(($page - 1) * $limit)
			->orderBy('name');

		// Filters
		if ($request->hasHeader('filters')) {
			$filters = json_decode($request->header('filters'));
			if (!empty($filters->place_id)) {
				$ministries = $ministries->where('place_id', $filters->place_id);
			}
		}

		return $ministries->get();
    }

    public function show($id) {
        return Ministry::where('id', $id)->first();
    }

    public function store(Request $request)
	{
		$id = $request->input("id");

		// Validação
		$request->validate([
			'name' => 'required'
		]);

		$ministry = Ministry::firstOrNew(['id' => $id]);

		$ministry->name 				= mb_convert_case($request->input("name"), MB_CASE_TITLE);
        $ministry->note 			    = $request->input("note");

		$ministry->save();

		return response()->json([
			'message' 	=> Lang::get('backend.saved')
		]);
	}

	public function destroy($id, Request $request)
	{
		$ministry = Ministry::find($id);
		$ministry->delete();

		return response()->json([
			'message' 	=> Lang::get('backend.deleted')
		]);
	}

}