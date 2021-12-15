<?php

namespace App\Http\Controllers\APIs\Panel;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Pagination\Paginator;
use App\Models\{Member, MembersRelationships};
use Helper; use Cache; use Lang;

class MemberController extends Controller
{
    public function index($page = 1, $limit = 10, $search = '', Request $request) {
        $members = Member::select('id', 'name')
			->where('name', 'like', $search.'%')
			->limit($limit)
			->offset(($page - 1) * $limit)
			->orderBy('name');

		// Filters
		if ($request->hasHeader('filters')) {
			$filters = json_decode($request->header('filters'));
			if (!empty($filters->place_id)) {
				$members = $members->where('place_id', $filters->place_id);
			}
			if (!empty($filters->group_id)) {
				$group_id = $filters->group_id;
				$members = $members->whereExists(function ($query) use ($group_id) {
					$query->select(\DB::raw(1))
						->from('members_relationships')
						->where('members_relationships.type', 'group')
						->where('members_relationships.rel_id', $group_id)
						->whereColumn('members_relationships.member_id', 'members.id');
				});
			}
		}

		return $members->get();
    }

    public function show($id) {
        return Member::where('id', $id)->first();
    }

    public function store(Request $request)
	{
		$id = $request->input("id");

		// Validação
		$request->validate([
			'name' => 'required'
		]);

		$member = Member::firstOrNew(['id' => $id]);

		$member->name 				= mb_convert_case($request->input("name"), MB_CASE_TITLE);
		$member->sex 				= $request->input("sex");
		$member->marital_status 	= $request->input("marital_status");
        $member->birth_date 		= Helper::dateForDB($request->input("birth_date"));
        $member->baptism_date 		= Helper::dateForDB($request->input("baptism_date"));
        $member->phone 				= Helper::onlyNumber($request->input("phone"));
		$member->phone_code 		= $request->input("phone_code");
        $member->email 				= $request->input("email");
        $member->country 			= $request->input("country");
        $member->state 				= $request->input("state");
        $member->city 				= $request->input("city");
        $member->district 			= $request->input("district");
        $member->address 			= $request->input("address");
		$member->role_id 			= $request->input("role_id");
        $member->place_id 			= $request->input("place_id");
		$member->pastor_id 			= $request->input("pastor_id");
		$member->leader_id 			= $request->input("leader_id");

		$member->save();

		if ($request->filled('group_id')) {
			$this->addRelationships($member->id, $request->input("group_id"), 'group');
		}

		return response()->json([
			'message' 	=> Lang::get('backend.saved')
		]);
	}

	public function addRelationships($member_id, $rel_id, $type) {
		$exists = MembersRelationships::where('type', $type)
		->where('member_id', $member_id)
		->where('rel_id', $rel_id)
		->exists();
		if(!$exists) {
			$rel = new MembersRelationships;
			$rel->member_id	= $member_id;
			$rel->rel_id 	= $rel_id;
			$rel->type	 	= $type;
			$rel->save();
		}
	}

	public function relationships($member_id) {
		$groups = MembersRelationships::select('groups.id', 'groups.name', 'members_relationships.id as id_rel')
		->where('type', 'group')
		->where('member_id', $member_id)
		->leftJoin('groups', 'groups.id', '=', 'members_relationships.rel_id')
		->get();

		$ministries = MembersRelationships::select('ministries.id', 'ministries.name', 'members_relationships.id as id_rel')
		->where('type', 'ministry')
		->where('member_id', $member_id)
		->leftJoin('ministries', 'ministries.id', '=', 'members_relationships.rel_id')
		->get();

		return response()->json([
			'groups' 		=> $groups,
			'ministries'	=> $ministries
		]);
	}

	public function destroy($id)
	{
		$member = Member::find($id);
		$member->delete();

		return response()->json([
			'message' 	=> Lang::get('backend.deleted')
		]);
	}

	public function destroyRelationships($id)
	{
		$rel = MembersRelationships::find($id);
		$rel->delete();

		return response()->json([
			'message' 	=> Lang::get('backend.deleted')
		]);
	}

}