<?php

namespace App\Http\Controllers\Api\V1\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\LoginRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class LoginController extends Controller
{
    /**
     * Handle the incoming request.
     * @bodyParam email string required The email of the User. Example: test@g.co
     * @bodyParam password string required The password of the User.
     * @response {"name":"MayeJacob","access_token":"6|QQC2acm4f2OTb5iMBjvo99jJ7fz0aU44JpjJ26vM"}
     */
    public function __invoke(LoginRequest $request)
    {
        $user = User::where('email', $request->email)->first();
        if (! $user || ! Hash::check($request->password, $user->password)) {
            return response()->json([
                'error' => 'The provided credentials are incorrect',
            ], 422);
        }

        $device = substr($request->userAgent() ?? '', 0, 255);

        return response()->json([
            'name' => $user->name,
            'access_token' => $user->createToken($device)->plainTextToken,
        ]);
    }
}
