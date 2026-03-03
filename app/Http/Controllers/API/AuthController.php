<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\API\BaseController;
use App\Http\Controllers\Controller;
use App\Models\User;
use Exception;
use Illuminate\Http\Request;
use PHPOpenSourceSaver\JWTAuth\Facades\JWTAuth;

class AuthController extends BaseController
{
    public function login(Request $request)
    {
        try {
            $credentials = $request->only(['email', 'password']);

            if (!JWTAuth::attempt($credentials)) {
                return $this->error('Your email and password is something wrong!', null, 401);
            }

            $user = User::where('email', $credentials['email'])->first();

            $payload = [
                'id' => $user->id,
                'name' => $user->name,
                'address' => $user->address,
                'phone' => $user->phone,
                'gender' => $user->gender,
                'status' => $user->status == 1 ? 'Active' : "Inactive",
            ];


            $token = JWTAuth::customClaims($payload)->attempt(['email' => $user->email, 'password' =>  $credentials['password']]);


            return $this->success($token, "User Login Successfully", 200);
        } catch (Exception $e) {

            return $this->error('Something went wrong!', null, 500);
        }
    }
}
