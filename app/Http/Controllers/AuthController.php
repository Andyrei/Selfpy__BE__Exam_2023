<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Validation\Rules;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;

class AuthController extends Controller
{

    /**
        * CREATE USER
        * @param Request $request
        * @return User
    */
    public function register(Request $request)
    {
        // trying to register USER
        try{
            // Validate USER DATA
            $validateUser = Validator::make($request->all(), [
                'username' => ['required', 'string', 'max:255'],
                'name' => ['required', 'string', 'max:255'],
                'surname' => ['required', 'string', 'max:255'],
                'email' => ['required', 'string', 'email', 'max:255', 'unique:'.User::class],
                'password' => ['required', 'confirmed', Rules\Password::defaults()],
            ]);

            if($validateUser->fails()) {
                return response()->json([
                    'status' => false,
                    'message' => 'validation error',
                    'errors' => $validateUser->messages()
                ], 401);
            }

            //I USER IS VALID THEN CREATE BEARER TOKEN
            $user = User::create([
                'username' => $request->username,
                'surname' => $request->surname,
                'name' => $request->name,
                'email' => $request->email,
                'password' => Hash::make($request->password)
            ]);

            return response()->json([
                'user' => $user,
                'status' => true,
                'message' => 'User Created Successfully',
                'access_token' => $user->createToken('auth_token')->plainTextToken,
                'token_type' => 'Bearer',
            ]);


        }catch (\Throwable $th) {
            return response()->json([
                'status' => false,
                'message' => $th->getMessage()
            ], 500);
        }

    }





    /**
        * LOGIN USER
        * @param Request $request
     */
    public function login(Request $request)
    {

        if (!Auth::attempt($request->only('email', 'password'))) {
            return response()->json([
                'status' => false,
                'message' => 'Invalid login details'
            ], 401);
        }

        // RETURN THE API TOKEN IF USER LOGED IN
        $user = User::where('email', $request['email'])->firstOrFail();
        return response()->json([
            'status' => true,
            'message' => 'User logged in Successfully',
            'user' => $user,
            'access_token' => $user->createToken('auth_token')->plainTextToken,
            'token_type' => 'Bearer',
        ]);
    }
}
