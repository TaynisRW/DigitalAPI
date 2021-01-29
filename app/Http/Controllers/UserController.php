<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    // POST insert data
    public function store(Request $request)
    {
        // Catch data
        $input = $request->all();
        // Encrypt password
        $input['password'] = Hash::make($request->password);
        // Create record
        User::create($input);
        // Response message
        return response()->json([
            'res' => true,
            'message' => 'Successfully created user'
        ], 201);
    }

    // POST login user
    public function login(Request $request)
    {
        // Search user in table users
        $user = User::whereEmail($request->email)->first();
        if(!is_null($user) && Hash::check($request->password, $user->password))
        {
            // Create token for the user
            $token = $user->createToken('DigitalAPI')->accessToken;
            // Response success
            return response()->json([
                'res' => true,
                'token' => $token,
                'message' => 'Welcome to the API REST '.$user->name
            ], 200);
        }
        else
        {
            // Response failed
            return response()->json([
                'res' => true,
                'message' => 'Opps! Something went wrong with credentials'
            ], 200);
        }
    }

    // POST logout user
    public function logout()
    {
        // Reset api_token of an user
        $user = auth()->user();
        $user->api_token = null;
        $user->save();
        return response()->json([
            'res' => true,
            'message' => 'GoodBye',
        ], 200);
    }
}
