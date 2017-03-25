<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;

use App\Http\Requests\RegisterRequest;

use App\Models\User;

use JWTAuth;

class RegisterController extends Controller
{
	public function __construct(User $user) {
		$this->user = $user;
	}

	public function register(RegisterRequest $registerRequest) {
		$params = [
			'name' => $registerRequest['name'],
			'email' => $registerRequest['email'],
			'password' => bcrypt($registerRequest['password'])
		];

		$user = $this->user->create($params);

		$token = JWTAUth::fromUser($user);

		$returnData = [
			'token' => $token,
			'user' => [
				'id' => $user['id'],
				'name' => $user['name']
			]
		];

		return response()->json($returnData);
	}
}