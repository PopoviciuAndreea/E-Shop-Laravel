<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\User;
use App\Http\Requests\StoreUserRequest;
use App\Http\Requests\UpdateUserRequest;
use Illuminate\Support\Facades\Hash;

class UsersController extends Controller
{
    public function index()
    {
        $users = User::latest()->paginate(10);
        return view('users.index', compact('users'));
    }

    public function create()
    {
        return view('users.create');
    }

    public function store(User $user, StoreUserRequest $request)
    {
        $user->create(array_merge($request->validated(), [
            'password' => 'test'
        ]));

        return redirect()->route('users.index')
           ->withSuccess(__('User created successfully'));
    }

    public function show(User $user)
    {
        return view('users.show',[
            'user' => $user
        ]);
    }

    public function edit(User $user)
    {
        return view('users.edit', [
            'user' => $user
        ]);
    }

    public function update(User $user, UpdateUserRequest $request) 
    {
        $user->update($request->validated());
        return redirect()->route('users.index')
            ->withSuccess(__('User updated successfully'));
    }

    public function destroy(User $user)
    {
        $user->delete();
        return redirect()->route('users.index')
            ->withSuccess(__('User deteled successfully'));
    }


}
