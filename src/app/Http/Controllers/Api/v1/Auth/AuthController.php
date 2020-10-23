<?php

namespace App\Http\Controllers\Api\v1\Auth;

use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
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
     */
    public function register(Request $request)
    {
        $data = $request->validate([
            'name'     => ['required'],
            'email'    => ['required', 'email', 'unique:users'],
            'password' => ['required'],
        ]);
        User::query()->create(array_merge($data, ['password' => Hash::make($request->password)]));
        return response()->json([
            'message' => 'user created',
        ], 201);
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
        $data = $request->validate([
            'name'     => ['required'],
            'email'    => ['required', 'email'],
            'password' => ['required'],
        ]);

        if (Auth::attempt($request->only(['email', 'password']))) {
            return response()->json(Auth::user(), 200);
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
        return response()->json(Auth::user(), 200);
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
        ], 200);
    }

}
