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
        * REGISTER/CREATE USER
        * @param Request $request
        * @return USER =>
        *    IF ERROR {
        *        DATA: {
        *            satus: false,
        *            message: Details are not valid
        *            errors: <All the errors and their RULES>
        *        }
        *    }
        *    ELSE {
        *        DATA: {
        *            status: true,
        *            message: Registered successfully,
        *            user: < DATA OF THE USER FROM JUST CREATED >,
        *            access_token: < ACCESS TOKEN CREATED >,
        *            token_type: < TYPE OF TOKEN: Bearer >
        *        }
        *    }
    */
    public function register(Request $request)
    {

            // Validate USER DATA and giving error rules
            $validator = Validator::make($request->all(), [
                'username' => ['required', 'string', 'max:255','unique:'.User::class],
                'surname' => ['required', 'string', 'max:255'],
                'name' => ['required', 'string', 'max:255'],
                'email' => ['required', 'string', 'email', 'max:255', 'unique:'.User::class],
                'password' => ['required', 'confirmed', Rules\Password::defaults()],
            ]);

            // IF FAILS return ERROR -> DATA
            if($validator->fails()) {
                return [
                    'status' => false,
                    'message' => 'Details are not valid',
                    'errors' => $validator->messages()
                ];
            }

            // ELSE CREATE USER TOKEN
            $user = User::create([
                'username' => $request->username,
                'surname' => $request->surname,
                'name' => $request->name,
                'email' => $request->email,
                'password' => Hash::make($request->password)
            ]);

            return response()->json([
                'status' => true,
                'message' => 'Registered successfully',
                'user' => $user,
                'access_token' => $user->createToken('auth_token')->plainTextToken,
                'token_type' => 'Bearer',
            ]);
        }





    /**
        * LOGIN USER
        * @param Request $request
        * @return USER =>
        *    IF ERROR {
        *        DATA: {
        *            satus: false,
        *            message: Invalid login details
        *        }
        *    }
        *    ELSE {
        *        DATA: {
        *            status: true,
        *            message: User logged in Successfully,
        *            user: <DATA OF THE USER FROM DB>,
        *            access_token: <ACCESS TOKEN CREATED>,
        *            token_type: <TYPE OF TOKEN: Bearer>
        *        }
        *    }
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
