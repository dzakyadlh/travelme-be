<?php

namespace App\Http\Controllers;

use App\helpers\ResponseFormatter;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules\Password;
use Illuminate\Validation\ValidationException;
use Laravel\Sanctum\PersonalAccessToken;

class UserController extends Controller{
    public function register(Request $request){
        try {
            $request->validate([
                'name'=>['required','string','max:30'],
                'email'=>['required','string','max:30','unique:users', 'email'],
                'password'=>['required','string', 'max:20', new Password(8)],
            ]);

            User::create([
                'name'=>$request->name,
                'email'=>$request->email,
                'password'=>$request->password,
            ]);

            $user = User::where('email', $request->email)->first();

            $token = $user->createToken('auth_token')->plainTextToken;

            return ResponseFormatter::success([
                'access_token'=>$token,
                'token_type'=>'Bearer',
                'user'=>$user
            ]);
        } catch (ValidationException $error) {
            return ResponseFormatter::error([
                'message'=>'Registration failed',
                'error'=>$error->errors(),
            ], 'Registration Failed', 500);
        }catch(\Exception $error){
            return ResponseFormatter::error([
                'message'=>'Registration failed',
                'error'=>$error->getMessage(),
            ],'Registration failed',500);
        }
    }

    public function login(Request $request){
        try {
            $request->validate([
                'email'=>'email|required',
                'password'=>'required'
            ]);

            $credentials = request(['email','password']);

            if (!Auth::attempt($credentials)) {
                return ResponseFormatter::error([
                    'message'=>'Incorrect email or password',
                ],'Authentication failed',500);
            }

            $user = User::where('email',$request->email)->first();

            if (!Hash::check($request->password, $user->password, [])) {
                throw new \Exception('Incorrect password');
            }

            $token = $user->createToken('auth_token')->plainTextToken;

            return ResponseFormatter::success([
                'access_token' => $token,
                'token_type' => 'Bearer',
                'user' => $user,
            ],'Login success');
        } catch (ValidationException $error) {
            return ResponseFormatter::error([
                'message' => 'Login failed',
                'error' => $error->errors(),
            ], ' Login failed', 500);
        } catch (\Exception $error){
            return ResponseFormatter::error([
                'message' => 'Login failed',
                'error'=>$error->getMessage(),
            ],'Login failed', 500);
        }
    }

    public function fetch(Request $request){
        return ResponseFormatter::success($request->user(), 'User profile fetched successfully');
    }

    public function getUserByToken(Request $request){
        $user = Auth::user();

        if (!$user) {
            return ResponseFormatter::error([
                'message' => 'User not authenticated',
            ],'Token not found', 404);
        }

        return ResponseFormatter::success([
            'user' => $user,
        ],'User obtained');
    }

    public function logout(Request $request){
        $token = $request->user()->currentAccessToken()->delete();

        return ResponseFormatter::success($token, 'Logged out successfully');
    }
}