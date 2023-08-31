<?php

namespace App\Http\Controllers;

use view;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Http\Requests\UserCreateRequest;
use App\Http\Requests\UserUpdateRequest;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $user = User::all();
        return response()->json([
            // 'status' => true,
            // 'message' => 'successful',
            'user' => $user

        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(UserCreateRequest  $request)
    {
        $user = User::query()->create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->passwword)
        ]);

        return response()->json([
            'status' => true,
            'message' => 'Records stored successfully',
            'data'=> $user
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

    }

    /**
     * Display the specified resource.
     */
    public function show(User $user)
    {
        return response()->json([
            'data' => $user
        ]);
        
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit()
    {
        return view('welcome');
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(User $user, UserUpdateRequest $request)
    {
        $request->only('name', 'email', 'password');
        $user->update([
            'name' => $request->name ?? $user->name,
            'email' => $request->email ?? $user->email,
            'pasword' => Hash::make($request->password) ?? $user->password
        ]);

        if($user){
            return response()->json([
                'status' => true,
                'message'=>'Record updated Successfully!',
            ]);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $user)
    {
        if($user->delete()){
            return response()->json([
                'status' => true,
                'message' => 'record deleted'
            ]);
        }
    }
}
