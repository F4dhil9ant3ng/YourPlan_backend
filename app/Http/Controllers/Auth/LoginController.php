<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;

// use Illuminate\Http\Request;
use App\Http\Requests\LoginRequest;

use App\Models\User;

use JWTAuth;

class LoginController extends Controller
{
	public function __construct(User $user) {
		$this->user = $user;
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

		$user = $this->user->where('email', '=', $loginRequest['email'])->first();

		$returnData = [
			'token' => $token,
			'user' => [
				'id' => $user['id'],
				'name' => $user['name']
			]
		];

		return response()->json(['token' => $token]);
	}
}