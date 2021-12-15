<?php

namespace App\Http\Controllers\APIs\Panel;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Carbon;
use App\Models\{Decision, DecisionGroup, DecisionContact};
use Helper; use Cache; use Lang; use Auth;

class DecisionController extends Controller
{
    public function index($page = 1, $limit = 10, $search = '', Request $request) {
		$decisions = Decision::select('id', 'name')
			->where('name', 'like', $search.'%')
			->limit($limit)
			->offset(($page - 1) * $limit)
			->orderBy('name');

		// Filters
		if ($request->hasHeader('filters')) {
			$filters = json_decode($request->header('filters'));
			if (!empty($filters->place_id)) {
				$decisions->where('place_id', $filters->place_id);
			}
			if (!empty($filters->status_id)) {
				$decisions->where('status_id', $filters->status_id);
			}
		}

		return $decisions->get();
    }

    public function show($id) {
        return Decision::where('id', $id)->first();
    }

    public function store(Request $request)
	{
		$id = $request->input("id");

		// Validação
		$request->validate([
			'name' => 'required'
		]);

		$decision = Decision::firstOrNew(['id' => $id]);

		$decision->name 				= mb_convert_case($request->input("name"), MB_CASE_TITLE);
        $decision->phone 				= Helper::onlyNumber($request->input("phone"));
        $decision->decision_date 		= Helper::dateForDB($request->input("decision_date"));
        $decision->country 			    = $request->input("country");
        $decision->state 				= $request->input("state");
        $decision->city 				= $request->input("city");
        $decision->district 			= $request->input("district");
        $decision->address 			    = $request->input("address");
        $decision->age 			        = $request->input("age");
		$decision->sex 			        = $request->input("sex");
        $decision->marital_status 	    = $request->input("marital_status");
        $decision->place_id 	        = $request->input("place_id");
		$decision->member_id 	        = $request->input("member_id");
		$decision->group_id 	        = $request->input("group_id");
		$decision->note					= $request->input("note");
		$decision->status_id 	        = 1;

		$decision->save();

		return response()->json([
			'message' 	=> Lang::get('backend.saved')
		]);
	}

	public function destroy($id, Request $request)
	{
		$decision = Decision::find($id);
		$decision->delete();

		return response()->json([
			'message' 	=> Lang::get('backend.deleted')
		]);
	}

	public function showContact($id) {
        return DecisionContact::where('decision_id', $id)->orderBy('created_at', 'DESC')->get();
    }

	public function storeContact(Request $request)
	{
		$decision = new DecisionContact;

        $decision->decision_id 			= $request->input("decision_id");
        $decision->contact 				= $request->input("contact");
        $decision->type_contact 		= $request->input("type_contact");
		$decision->user_id 				= Auth::id();

		$decision->save();

		return response()->json([
			'message' 	=> Lang::get('backend.saved')
		]);
	}
	
	public function storeStatus(Request $request)
	{
		$id = $request->input("id");
		
		$decision = Decision::find($id);

        $decision->status_id 		= $request->input("status_id");
		$decision->status_date 		= Carbon::now();

		$decision->save();

		return response()->json([
			'message' 	=> Lang::get('backend.saved')
		]);
	}

}