<?php

namespace App\Http\Controllers\APIs;
 
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\{Plan};
use Validator; use Response;

class PlanController extends Controller
{
    /**
     * Get resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        return Plan::where('status', 1)
            ->where("members", ">", $request->members)
            ->orderBy('members', 'ASC')
            ->first();
    }
}