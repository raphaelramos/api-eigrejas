<?php

namespace App\Http\Controllers\APIs;
 
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\{Country, State, City};
use Validator; use Response; use Redirect; use Cache;

class GeoController extends Controller
{
    public function index($country = 31)
    {
        $data['countries'] = $this->country();
        $data['states'] = $this->state($country);
        return $data;
    }

    public function country()
    {
        return Cache::rememberForever('countries', function () {
            $data = Country::get(["name", "id"]);
            return $data;
        });
    }

    public function state($country_id)
    {
        return Cache::rememberForever('state_'.$country_id, function () use ($country_id) {
            $data = State::where("country_id", $country_id)->orderBy('name')->get(["name", "id"]);
            return response()->json($data);
        });
    }

    public function city($state_id)
    {
        $data = City::where("state_id", $state_id)->orderBy('name')->get(["name", "id"]);
        return response()->json($data);
    }
}