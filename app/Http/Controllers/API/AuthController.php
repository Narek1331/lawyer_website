<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Services\AuthService;
use App\Services\UserService;
use App\Http\Requests\API\SignupRequest;
use App\Http\Requests\API\SigninRequest;
use App\Http\Requests\API\ChangePasswordRequest;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    protected $authService;
    protected $userService;

    public function __construct(AuthService $authService, UserService $userService)
    {
        $this->authService = $authService;
        $this->userService = $userService;
    }

    /**
     * Signup a new user.
     *
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function signup(SignupRequest $request)
    {
        $data = $request->validated();
        $user = $this->userService->create($data);
        $token = $this->authService->createPersonalAccessToken($user);

        return response()->json(['token' => $token], 200);
    }

    /**
     * Signin a user.
     *
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function signin(SigninRequest $request)
    {
        $credentials = $request->only('email', 'password');
        $token = $this->authService->signin($credentials);

        if ($token) {
            return response()->json(['token' => $token], 200);
        }

        return response()->json(['error' => 'Unauthorized'], 401);
    }

    /**
     * Change user's password.
     *
     * @param ChangePasswordRequest $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function changePassword(ChangePasswordRequest $request)
    {

        // Change password using AuthService
        $success = $this->userService->changePassword(
            $request->current_password,
            $request->new_password
        );

        $token = $this->authService->createPersonalAccessToken(auth()->user());

        // Check if password change was successful
        if (!$success) {
            return response()->json(
                [
                    'error' => 'Current password is incorrect',
                    "message" => "The new password field is required.",
                    "errors" => [
                        "incorrect" => [
                            "Current password is incorrect."
                        ]
                    ]
                ]
                , 422);
        }

        return response()->json(
            [
                'message' => 'Password changed successfully',
                'token' => $token
            ]
            , 200);
    }

     /**
     * Get the authenticated user's data.
     *
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function me(Request $request)
    {
        // Retrieve the authenticated user
        $user = $request->user();

        // Return the user data in JSON response
        return response()->json(['user' => $user]);
    }
}
