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

}
