<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Image;
use Illuminate\Http\Request;

class AuthController extends Controller
{
 public function register(Request $request)
 {
    $user=User::create([
        'name'=>$request->name,
        'email'=>$request->email,
        'password'=>bcrypt( $request->password),
    ]);

    if ($request->hasFile('image')) {
        $image = $request->file('image');
        $imagePath = $this->uploadPhoto($image, 'avatars'); 

        Image::create([
            'path' => $imagePath,
            'imageable_id' => $user->id,
            'imageable_type' => User::class, 
        ]);
    $token =$user->createToken('auth_token')->plainTextToken;
    return response()->json([
        'success'=>true,
        'token'=>$token,
        'user'=>$user
    ]);
}
    
    
 }
 public function login(Request $request)
 {

 }
 public function logout()
 {

 }
}
