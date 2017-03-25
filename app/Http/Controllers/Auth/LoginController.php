<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;

// use Illuminate\Http\Request;
use App\Http\Requests\LoginRequest;

use JWTAuth;

class LoginController extends Controller
{
	public function __construct() {
		
	}

	public function login(LoginRequest $loginRequest) {
		$credentials = $loginRequest->only('email', 'password');

		try {
			if(!$token = JWTAuth::attempt($credentials)) {
				return response()->json(['error' => 'invalid'], 401);
			}
		} catch (JWTException $e) {
			return response()->json(['error' => 'could_not_create_token'], 500);
		}

		return response()->json(['token' => $token]);
	}
}