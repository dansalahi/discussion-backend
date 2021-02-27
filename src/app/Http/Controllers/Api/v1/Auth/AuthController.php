<?php

namespace App\Http\Controllers\Api\v1\Auth;

use App\Enums\RolesEnum;
use App\Http\Controllers\Controller;
use App\Repositories\Contracts\UserRepositoryInterface;
use App\User;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\ValidationException;

class AuthController extends Controller
{
    /**
     * Register a new user.
     * @method POST
     *
     * @param Request $request
     * @param UserRepositoryInterface $userRepository
     * @return JsonResponse
     */
    public function register(Request $request, UserRepositoryInterface $userRepository)
    {
        $data = $request->validate([
            'name' => ['required'],
            'email' => ['required', 'email', 'unique:users'],
            'password' => ['required'],
        ]);

        $user = $userRepository->create(array_merge($data, ['password' => Hash::make($request->password)]));
        $defaultAdminEmailAddress = config('permissions.default_super_admin_email');
        $user->email = $defaultAdminEmailAddress ? $user->assignRole(RolesEnum::SUPER_ADMIN) : $user->assignRole(RolesEnum::REGULAR_USER);

        return response()->json([
            'message' => 'user created',
        ], Response::HTTP_CREATED);
    }

    /**
     * Check the user credentials for login
     * @method GET
     *
     * @param Request $request
     * @return JsonResponse
     * @throws ValidationException
     */
    public function login(Request $request)
    {
        $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);

        if (Auth::attempt($request->only(['email', 'password']))) {
            return response()->json(Auth::user(), Response::HTTP_OK);
        }

        throw ValidationException::withMessages([
            'email' => 'incorrect credentials',
        ]);

    }


    /**
     * @return JsonResponse
     */
    public function user()
    {
        return response()->json(Auth::user(), Response::HTTP_OK);
    }


    /**
     * @method POST
     * logout the user
     */
    public function logout()
    {
        Auth::logout();

        return response()->json([
            'message' => 'logout successfully',
        ], Response::HTTP_OK);
    }

}
