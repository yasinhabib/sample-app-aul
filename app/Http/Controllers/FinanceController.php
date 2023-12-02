<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

class FinanceController extends Controller
{
    public function index(){
        $products = Product::get();
        return view('finance.index',[
            'products' => $products
        ]);
    }

    public function editForm($id){
        $product = Product::where('id',$id)->first();

        return view('finance.form',[
            'product' => $product,
        ]);
    }

    public function update(Request $request){
        $product = Product::where('id',$request->id)->first();
        
        $product->product_price = $request->product_price;
        $result = $product->save();

        if($result){
            return redirect()->route('finance-index');
        }
    }
}
