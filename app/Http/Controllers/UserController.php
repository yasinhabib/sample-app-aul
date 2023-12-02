<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Role;

class UserController extends Controller
{
    public function index(){
        $users = User::with('roles')->where('name','<>','admin')->get();
        return view('user.index',[
            'users' => $users
        ]);
    }

    public function addForm(){
        $roles = Role::get();
        return view('user.form',[
            'roles' => $roles
        ]);
    }

    public function create(Request $request){
        $user = new User;
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = $request->password;
        $user->role_id = $request->role_id;
        $result = $user->save();

        if($result){
            return redirect()->route('user-index');
        }
    }

    public function editForm($id){
        $roles = Role::get();
        $user = User::where('id',$id)->first();

        return view('user.form',[
            'roles' => $roles,
            'user' => $user,
        ]);
    }

    public function update(Request $request){
        $user = User::where('id',$request->id)->first();

        $user->name = $request->name;
        $user->email = $request->email;
        if($request->password){
            $user->password = $request->password;
        }
        $user->role_id = $request->role_id;
        $result = $user->save();

        if($result){
            return redirect()->route('user-index');
        }
    }

    public function delete($id){
        $user = User::where('id',$id)->first();
        $result = $user->delete();
        if($result){
            return redirect()->route('user-index');
        }
    }
}
