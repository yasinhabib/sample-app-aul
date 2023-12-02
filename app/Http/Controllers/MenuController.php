<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Menu;

class MenuController extends Controller
{
    public function index(){
        $menus = Menu::get();
        return view('menu.index',[
            'menus' => $menus
        ]);
    }

    public function addForm(){
        return view('menu.form');
    }

    public function create(Request $request){
        $menu = new Menu;
        $menu->menu_name = $request->menu_name;
        $menu->url = $request->url;
        $result = $menu->save();

        if($result){
            return redirect()->route('menu-index');
        }
    }

    public function editForm($id){
        $menu = Menu::where('id',$id)->first();

        return view('menu.form',[
            'menu' => $menu,
        ]);
    }

    public function update(Request $request){
        $menu = Menu::where('id',$request->id)->first();

        $menu->menu_name = $request->menu_name;
        $menu->url = $request->url;
        $result = $menu->save();

        if($result){
            return redirect()->route('menu-index');
        }
    }

    public function delete($id){
        $menu = Menu::where('id',$id)->first();
        $result = $menu->delete();
        if($result){
            return redirect()->route('menu-index');
        }
    }
}
