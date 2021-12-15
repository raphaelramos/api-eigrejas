<?php

namespace App\Http\Controllers\APIs\Panel;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Pagination\Paginator;
use App\Models\{Group, GroupReport};
use Helper; use Cache; Use Lang; use Auth;

class GroupReportController extends Controller
{
    public function index($page = 1, $limit = 10, $search = '', Request $request) {
		$groups = GroupReport::select('id', 'date');

		if ($search != '') {
			$search = (new Carbon($search))->day(1);

			$groups = $groups->whereDate('date', '<=', $search)
				->limit($limit)
				->offset(($page - 1) * $limit)
				->orderBy('date');
		}

		// Filters
		if ($request->hasHeader('filters')) {
			$filters = json_decode($request->header('filters'));
			if (!empty($filters->group_id)) {
				$groups = $groups->where('group_id', $filters->group_id);
			}
		}

		return $groups->get();
    }

    public function show($id) {
        return GroupReport::where('id', $id)->first();
    }

    public function store(Request $request)
	{
		$id = $request->input("id");
		$group_id = $request->input("group_id");

		// Validação
		$request->validate([
			'date' => 'required'
		]);

		$dateReport = (new Carbon($request->input("date")))->day(1);

		// Verifica se a data de início da célula é menor que do relatório
		$getGroup = Group::where('id', $group_id)->first();
		if (strtotime($getGroup->opening_date) > strtotime($dateReport)) {
			Group::where('id', $group_id)->update(['opening_date' => $dateReport]);
		}

		$group = GroupReport::firstOrNew(['id' => $id]);

        $group->date 	    =   $dateReport;
        $group->members 	=   $request->input("members");
        $group->guests 	    =   $request->input("guests");
        $group->baptized 	=   $request->input("baptized");
		$group->kids 		=   $request->input("kids");
        $group->note 	    =   $request->input("note");
		$group->theme1 	    =   $request->input("theme1");
		$group->theme2 	    =   $request->input("theme2");
		$group->theme3 	    =   $request->input("theme3");
		$group->theme4 	    =   $request->input("theme4");
		$group->theme5 	    =   $request->input("theme5");
		$group->group_id 	=   $group_id;
        $group->user_id 	=   Auth::user()->id;

		$group->save();

		return response()->json([
			'message' 	=> Lang::get('backend.saved')
		]);
	}

	public function destroy($id, Request $request)
	{
		$count = GroupReport::find($id);
		$count->delete();

		return response()->json([
			'message' 	=> Lang::get('backend.deleted')
		]);
	}

}