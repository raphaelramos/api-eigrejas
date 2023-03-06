<?php
namespace App\Http\Controllers\APIs;

use App\Models\User;
use App\Models\PasswordReset;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use App\Notifications\PasswordResetRequest;
use App\Notifications\PasswordResetSuccess;
use DB; use Config; use Lang; use Auth;

class AuthController extends Controller
{
    protected function credentials(Request $request)
    {
        if(is_numeric($request->get('email'))) {
            return User::where('phone', $request->email)->first();
        }
        elseif (filter_var($request->get('email'), FILTER_VALIDATE_EMAIL)) {
            return User::where('email', $request->email)->first();
        }

        abort(401);
    }

    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required',
            'password' => 'required'
        ]);

        $user = $this->credentials($request);

        $device_name = 'web';
        if ($request->filled('device_name'))
        {
            $device_name =$request->device_name;
        }

        if (! $user || ! Hash::check($request->password, $user->password))
        {
            return response()->json(['error' => 'invalid_credentials'], 400);
        }
        
        $token = $user->createToken($device_name)->plainTextToken;

        return response()->json([
            'status_code' => 200,
            'token' => $token,
            'token_type' => 'Bearer',
        ]);
    }

    public function logout(Request $request)
    {
        $request->user()->currentAccessToken()->delete();

        return response()->json(['message' => 'Saiu do usuário']);
    }

    public function me(Request $request)
    {
        return response()->json([
            'user' => $request->user(),
            'church' => tenant('id'),
            'permission' => @Auth::user()->permissionsGroup
        ]);
    }

    public function recover(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
        ]);
        $user = User::where('email', $request->email)->first();
        if (!$user)
            return response()->json([
                'message' => Lang::get('auth.email_not')
            ], 404);
        $passwordReset = PasswordReset::updateOrCreate(
            ['email' => $user->email],
            [
                'email' => $user->email,
                'token' => Str::random(60)
            ]
        );
        if ($user && $passwordReset)
            $user->notify(
                new PasswordResetRequest($passwordReset->token)
            );
        return response()->json([
            'message' => Lang::get('frontend.emailSend')
        ]);
    }
}