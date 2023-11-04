<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UsersController extends Controller
{
    public function index(){
        $users = User::all();
        return view('backend.users',compact('users'));
    }

    public function deleteUser($id){
        $user_individual = User::find($id);
        $user_individual->delete();
        return redirect()->Route('users.index');
    }

    public function editUser($id){
        $user_individual = User::find($id);
        // dd($user_individual);
        return view('backend.editUser' ,compact('user_individual'));
    }
    public function updateUser(Request $request , $id){
        $user_individual = User::find($id);
        $user_individual->name = $request->name;
        $user_individual->email = $request->email;
        $user_individual->password = Hash::make($request->password);
        $user_individual->save();
        return redirect()->route('users.index');
    }

    public function addUserForm(){
        return view('backend.addUser');
    }

    public function addUser(Request $request){
        $validated = $request->validate([
            'name' => 'required',
            'email' => 'required|email|max:45|unique:users',
            'password' => 'required|min:8|confirmed',
        ]);

        $user =new User();
        $user->name =$request->name;
        $user->email =$request->email;
        $user->password =$request->password;
        $user->save();
        return redirect()->route('users.index');
    }
}
