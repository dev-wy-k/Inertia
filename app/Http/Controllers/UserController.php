<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Inertia\Inertia;

class UserController extends Controller
{

    public function index()
    {
        $users = User::when(request()->search, function($query){
            $search = request()->search; 
            $query->where('name', 'like', "%$search%")->orWhere('email', 'like', "%$search%");
        })
        ->orderBy('id', 'desc')->paginate(7);
        return Inertia::render('User/Index', [
            'users' => $users ,
            'search_key' => request()->search ? request()->search : ''
        ]);
    }

    public function create()
    {
        return Inertia::render('User/Create', [
            'user' => new User 
        ]);
    }

    
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|min:3',
            'email' => 'required|unique:users|email',
            'password' => 'required|min:6'
        ]);
        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password)
        ]);
        return redirect()->route('user.index')->with('success', 'Create a user successfully');
    }

   
    public function show($id)
    {
        //
    }

    
    public function edit(User $user)
    {
        return Inertia::render('User/Edit', compact('user'));
    }

    
    public function update(Request $request, User $user)
    {

        $request->validate([
            'name' => 'min:3|max:100',
            'email' => 'unique:users,email,'.$user->id,
            'password' => 'nullable|min:6'
        ]);

        $user->update([
            'name' => $request->name,
            'email' => $request->email,
        ]);

        if($request->filled('password')){
            $user->update([
                'password' => Hash::make($request->password)
            ]);
        }

        return redirect()->route('user.index')->with('success', 'User was updated successfully');


    }

    public function destroy(User $user)
    {
        $user->delete();

        return redirect()->route('user.index')->with('success', 'User was deleted successfully');
    }
}
