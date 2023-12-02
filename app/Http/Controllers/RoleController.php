<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Role;
use App\Models\Menu;
use App\Models\MenuRole;

class RoleController extends Controller
{
    public function index(){
        $roles = Role::get();
        return view('role.index',[
            'roles' => $roles
        ]);
    }

    public function addForm(){
        return view('role.form');
    }

    public function create(Request $request){
        $role = new Role;
        $role->roles_name = $request->roles_name;
        $result = $role->save();

        if($result){
            return redirect()->route('role-index');
        }
    }

    public function editForm($id){
        $role = Role::where('id',$id)->first();

        return view('role.form',[
            'role' => $role,
        ]);
    }

    public function update(Request $request){
        $role = Role::where('id',$request->id)->first();

        $role->roles_name = $request->roles_name;
        $result = $role->save();

        if($result){
            return redirect()->route('role-index');
        }
    }

    public function delete($id){
        $role = Role::where('id',$id)->first();
        $result = $role->delete();
        if($result){
            return redirect()->route('role-index');
        }
    }

    public function accessMenuForm($role_id){
        $menus = Menu::with(['menuRole' => function($query) use ($role_id){
            $query->where('role_id',$role_id);
        }])->get();
        
        return view('role.accessMenu',[
            'menus' => $menus,
            'role_id' => $role_id
        ]);
    }

    public function saveAccessMenu(Request $request){
        $menuRoles = MenuRole::where('role_id',$request->role_id)->delete();

        $insertData = array_map(function($data) use ($request){
            return [
                'role_id' => $request->role_id,
                'menu_id' => $data
            ];
        },$request->menu);

        $result = MenuRole::insert($insertData);
        if($result){
            return redirect()->route('role-index');
        }
    }
}
