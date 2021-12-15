<?php

namespace App\Http\Controllers\APIs\Panel;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Pagination\Paginator;
use App\Models\{Group, MembersRelationships};
use Helper; use Cache; Use Lang; use Auth;

class GroupController extends Controller
{
    public function index($page = 1, $limit = 10, $search = '', Request $request) {
		$groups = Group::select('id', 'name')
			->where('name', 'like', $search.'%')
			->limit($limit)
			->offset(($page - 1) * $limit)
			->orderBy('name');

		// Only user permission
		$only_assigned = Auth::user()->permissionsGroup->only_assigned;
		if ($only_assigned) {
			$memberId = Auth::user()->member_id;
			$groups->where(function($query) use ($memberId){
				$query->orwhere('pastor_id', $memberId);
				$query->orWhere('supervisor_id', $memberId);
				$query->orWhere('leader_id', $memberId);
				$query->orWhere('leader2_id', $memberId);
			});
		}

		// Filters
		if ($request->hasHeader('filters')) {
			$filters = json_decode($request->header('filters'));
			if (!empty($filters->place_id)) {
				$groups = $groups->where('place_id', $filters->place_id);
			}
			if (!empty($filters->network_id)) {
				$groups = $groups->where('network_id', $filters->network_id);
			}
		}

		$groups = $groups->get();
		return $groups;
    }

    public function show($id) {
        return Group::where('id', $id)->first();
    }

    public function store(Request $request)
	{
		$id = $request->input("id");

		// Validação
		$request->validate([
			'name' => 'required'
		]);

		$decision = Group::firstOrNew(['id' => $id]);

		$opening_date = Helper::dateForDB($request->input("opening_date"));
		if (!$opening_date) {
			$opening_date = Helper::now();
		}

		$decision->name 				= mb_convert_case($request->input("name"), MB_CASE_TITLE);
        $decision->phone 				= Helper::onlyNumber($request->input("phone"));
        $decision->opening_date 		= $opening_date;
        $decision->finish_date 		    = Helper::dateForDB($request->input("finish_date"));
		$decision->day 			   		= $request->input("day");
		$decision->schedule 			= Helper::timeForDB($request->input("schedule"));
		$decision->day2 			   	= $request->input("day2");
		$decision->schedule2 			= Helper::timeForDB($request->input("schedule2"));
        $decision->country 			    = $request->input("country");
        $decision->state 				= $request->input("state");
        $decision->city 				= $request->input("city");
        $decision->district 			= $request->input("district");
        $decision->address 			    = $request->input("address");
        $decision->place_id 	        = $request->input("place_id");
		$decision->pastor_id 	        = $request->input("pastor_id");
		$decision->leader_id 	        = $request->input("leader_id");
		$decision->supervisor_id 	    = $request->input("supervisor_id");
		$decision->network_id 	        = $request->input("network_id");

		$decision->save();

		// add leader in group
		if ($request->input("leader_id")) {
			$rel = new MembersRelationships;
			$rel->member_id	= $request->input("leader_id");
			$rel->rel_id 	= $decision->id;
			$rel->type	 	= 'group';
			$rel->save();
		}

		return response()->json([
			'message' 	=> Lang::get('backend.saved')
		]);
	}

	public function destroy($id, Request $request)
	{
		$decision = Group::find($id);
		$decision->delete();

		return response()->json([
			'message' 	=> Lang::get('backend.deleted')
		]);
	}

}