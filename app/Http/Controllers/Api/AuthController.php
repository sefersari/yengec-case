<?php

namespace App\Http\Controllers\Api;

use App\Helper\ApiHelper;
use App\Http\Controllers\Controller;
use App\Http\Requests\AuthLoginRequest;
use App\Http\Requests\AuthRegisterRequest;
use App\Repository\UserRepository;

class AuthController extends Controller
{

    private UserRepository $userRepository;

    public function __construct()
    {
        $this->userRepository = new UserRepository();
    }

    public function login(AuthLoginRequest $request)
    {
        $data = $request->validated();
        return $this->loginProcess($data);
    }

    public function register(AuthRegisterRequest $request)
    {
        $data = $request->validated();
        $this->userRepository->create($data);
        unset($data['username']);
        return $this->loginProcess($data);
    }

    private function loginProcess($data)
    {
        if (!auth()->attempt($data)) {
            return ApiHelper::errorResponse('Invalid Username And Password');
        }
        $token = auth()->user()->createToken('API Token')->accessToken;
        return ApiHelper::successResponse([
            "user" => auth()->user(),
            'access_token' => $token
        ]);
    }
}
