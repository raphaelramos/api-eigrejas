<?php
namespace App\Http\Controllers\APIs;

use App\Models\{User, Member, PasswordReset};
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use App\Notifications\PasswordResetRequest;
use App\Notifications\PasswordResetSuccess;
use DB; use Config; use Lang; use Auth; use Helper;

class UserController extends Controller
{
    public function index($page = 1, $limit = 10, $search = '') {
        return User::select('id', 'name')
			->where('name', 'like', $search.'%')
			->limit($limit)
			->offset(($page - 1) * $limit)
			->orderBy('name')
			->get();
    }

    public function show($id) {
        return User::where('id', $id)->first();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $id = $request->id;

        $this->validate($request, [
            'photo' => 'mimes:png,jpeg,jpg,gif,webp',
            'name' => 'required',
            'email' => 'required|email|unique:users,email,' . $id,
            'phone' => 'nullable|unique:users,phone,' . $id,
            'password' => 'required_without:id'
        ]);

        $phone      = Helper::onlyNumber($request->phone);
        $member_id  = $request->member_id;

        if ($request->member) {
            $member = Member::firstOrNew(['id' => $id]);

            $member->name 				= mb_convert_case($request->name. ' ' .$request->last_name, MB_CASE_TITLE);
            $member->sex 				= $request->sex;
            $member->marital_status 	= $request->marital_status;
            $member->birth_date 		= Helper::dateForDB($request->birth_date);
            $member->baptism_date 		= Helper::dateForDB($request->baptism_date);
            $member->phone 				= $phone;
            $member->email 				= $request->email;
            $member->district 			= $request->district;
            $member->address 			= $request->address;

            $member->save();

            $member_id = $member->id;
        }

        $User = User::firstOrNew(['id' => $id]);

        // Start of Upload Files
        $formFileName = "photo";
        $fileFinalName = "";
        if ($request->hasFile($formFileName)) {
            $file = $request->file($formFileName);
            $fileFinalName = uniqid() . '.jpg';
            $path = @Helper::uploadPath('users');
            $this->resize($file, $path.$fileFinalName);

            $User->photo = $path.$fileFinalName;
        }
        // End of Upload Files
        
        $User->name             = $request->name;
        $User->last_name        = $request->last_name;
        $User->email            = $request->email;
        $User->phone            = $phone;
        $User->password         = bcrypt($request->password);
        $User->permissions_id   = $request->permissions_id;
        $User->member_id        = $member_id;
        $User->status = 1;
        if (isset(Auth::user()->id)) {
            $User->created_by   = Auth::user()->id;
        }
        $User->save();

        return response()->json(['message' => Lang::get('backend.saved')]);
    }
    
    private function resize($file, $path)
    {
        $img = Image::make($file);
        
        // crop the best fitting 1:1 ratio
        $img->fit(110, 110, function ($constraint) {
            $constraint->upsize();
        })->encode('jpg');

        // save image
        $img->save($path, 80);
    }
}