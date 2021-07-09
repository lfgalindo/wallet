<?php

namespace App\Http\Controllers;

use Exception;
use App\Http\Requests\UserStoreRequest;
use App\Services\User\Contracts\UserService;

class UserController extends Controller
{
    private $userService;

    public function __construct (UserService $userService)
    {
        $this->userService = $userService;
    }

    public function store(UserStoreRequest $request)
    {
        try {
            $user = $this->userService->createUser($request->all());
            
            return response()->json([
                'resource' => $user
            ], 201);
        } catch (Exception $exception) {
            return response()->json($exception->getMessage(), $exception->getCode());
        }
    }
}
