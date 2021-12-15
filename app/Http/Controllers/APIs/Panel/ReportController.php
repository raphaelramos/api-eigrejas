<?php

namespace App\Http\Controllers\APIs\Panel;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Pagination\Paginator;
use App\Models\{Group, GroupReport, Member, MembersRelationships};
use Helper; use Cache; Use Lang; use Auth;

class ReportController extends Controller
{
    public function index(Request $request) {

        $groups = Group::select('id');
		$members = Member::select('id');
        $membersGroups = Member::select('id');
        $membersNoGroups = Member::select('id');

		// Filters
		if ($request->hasHeader('filters')) {
			$filters = json_decode($request->header('filters'));
			if (!empty($filters->place_id)) {
                $groups = $groups->where('place_id', $filters->place_id);
				$members = $members->where('place_id', $filters->place_id);
                $membersGroups = $membersGroups->where('place_id', $filters->place_id);
                $membersNoGroups = $membersNoGroups->where('place_id', $filters->place_id);
			}
		}

        $membersGroups = $membersGroups->has('groups');
        $membersNoGroups = $membersNoGroups->doesnthave('groups');

        return response()->json([
            'groups' 	        => $groups->count(),
			'members' 	        => $members->count(),
            'membersGroups'     => $membersGroups->count(),
            'membersNoGroups'   => $membersNoGroups->count()
		]);
    }

    public function group($date, Request $request) {

        $groups = Group::whereDate('opening_date', '<=', $date);
        $groupReport = GroupReport::whereDate('date', $date);

		// Filters
		// if ($request->hasHeader('filters')) {
		// 	$filters = json_decode($request->header('filters'));
		// 	if (!empty($filters->place_id)) {
        //         $groups = $groups->where('place_id', $filters->place_id);
		// 	}
		// }

        return response()->json([
            'groups' 	         => $groups->count(),
            'reports' 	         => $groupReport->count(),
            'members'            => $groupReport->sum('members'),
            'guests'             => $groupReport->sum('guests'),
            'kids'               => $groupReport->sum('kids'),
            'baptized'           => $groupReport->sum('baptized')
		]);
    }

}