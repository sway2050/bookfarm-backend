<?php

namespace App\Http\Controllers;

use App\Models\AdminUser;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class AuthController extends Controller
{
    public function login(Request $request)
    {
        $user = AdminUser::whereEmail($request->email)->first();
        if (empty($user)) {
            return response()->json(['error' => 'User not found, Please check email'], 401);
        }

        if (!Hash::check($request->password, $user->password)) {
            return response()->json(['error' => 'Invalid Password'], 422);
        }

        $user->token = Str::random(50);
        $user->save();
        return response()->json(['data' => $user->token], 200);
    }

    public function logout()
    {
        $findUser = AdminUser::first();
        $findUser->token = '';
        $findUser->save();

        return response()->json(['message' => 'Logged out Successfully.'], 200);
    }
}
