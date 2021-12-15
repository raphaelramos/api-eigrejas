<?php

namespace App\Http\Controllers\APIs\Panel;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\{Group, Member, Ministry, Network, Place, Role, DecisionStatus, Permissions};
use Helper; use Cache;

class FilterController extends Controller
{
    public function index($filters) {
        $groups = [];
        $members = [];
        $ministries = [];
        $networks = [];
        $pastors = [];
        $places = [];
        $roles = [];
        $decisions_status = [];
        $permissions = [];

        if (strpos($filters, 'groups') !== false) {
            $groups = $this->groups();
        }

        if (strpos($filters, 'members') !== false) {
            $members = $this->members();
        }

        if (strpos($filters, 'ministries') !== false) {
            $ministries = $this->ministries();
        }

        if (strpos($filters, 'networks') !== false) {
            $networks = $this->networks();
        }

        if (strpos($filters, 'pastors') !== false) {
            $pastors = $this->pastors();
        }

        if (strpos($filters, 'places') !== false) {
            $places = $this->places();
        }

        if (strpos($filters, 'roles') !== false) {
            $roles = $this->roles();
        }

        if (strpos($filters, 'decisions_status') !== false) {
            $decisions_status = $this->decisions_status();
        }

        if (strpos($filters, 'permissions') !== false) {
            $permissions = $this->permissions();
        }

        $response = [
            'groups' => $groups,
            'members' => $members,
            'ministries' => $ministries,
            'networks' => $networks,
            'pastors' => $pastors,
            'places' => $places,
            'roles' => $roles,
            'decisions_status' => $decisions_status,
            'permissions' => $permissions
        ];
        return response()->json($response, 200);
    }

    public function groups() {
		return Cache::rememberForever('groups', function () {
			return Group::select('id', 'name')
				->orderBy('name')
				->get();
		});
    }
	
	public function members() {
        return Member::select('id', 'name')
            ->orderBy('name')
            ->get();
    }

    public function ministries() {
        return Ministry::select('id', 'name')
            ->orderBy('name')
            ->get();
    }

    public function networks() {
        return Cache::rememberForever('networks', function () {
            return Network::select('id', 'name')
                ->orderBy('name')
                ->get();
        });
    }

    public function pastors() {
		return Member::select('id', 'name')
            ->where('role_id', 1)
            ->orWhere('role_id', 2)
            ->orderBy('name')
            ->get();
    }

    public function places() {
		return Cache::rememberForever('places', function () {
			return Place::select('id', 'name')
				->orderBy('name')
				->get();
		});
    }

    public function roles() {
		return Cache::rememberForever('roles', function () {
			return Role::select('id', 'name')
				->orderBy('name')
				->get();
		});
    }

    public function decisions_status() {
		return Cache::rememberForever('decisions_status', function () {
			return DecisionStatus::select('id', 'name')
				->orderBy('name')
				->get();
		});
    }

    public function permissions() {
		return Cache::rememberForever('permissions', function () {
			return Permissions::select('id', 'name')
				->orderBy('name')
				->get();
		});
    }
}