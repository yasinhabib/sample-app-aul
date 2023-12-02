<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use File;

class ProductController extends Controller
{
    public function index(){
        $products = Product::get();
        return view('product.index',[
            'products' => $products
        ]);
    }

    public function addForm(){
        return view('product.form');
    }

    public function create(Request $request){
        $image = $request->file('image');
        $video = $request->file('video');
        if($image){
            $imageExt = $image->getClientOriginalExtension();
            $image->move('img',strtolower(str_replace(' ','-',$request->product_title)).'.'.$imageExt);

        }

        if($video){
            $videoExt = $video->getClientOriginalExtension();
            $video->move('video',strtolower(str_replace(' ','-',$request->product_title)).'.'.$videoExt);
        }

        $product = new Product;
        $product->product_title = $request->product_title;
        $product->product_description = $request->product_description;
        if($image){
            $product->product_img_path = '/img/'.strtolower(str_replace(' ','-',$request->product_title)).'.'.$imageExt;
        }
        if($video){
            $product->product_video_path = '/video/'.strtolower(str_replace(' ','-',$request->product_title)).'.'.$videoExt;
        }
        $result = $product->save();

       
        if($result){
            return redirect()->route('product-index');
        }
    }

    public function editForm($id){
        $product = Product::where('id',$id)->first();

        return view('product.form',[
            'product' => $product,
        ]);
    }

    public function update(Request $request){
        $product = Product::where('id',$request->id)->first();
        
        $image = $request->file('image');
        $video = $request->file('video');
        $imgPath = $product->product_img_path;
        $videoPath = $product->product_video_path;
        if($image){
            File::delete(substr($imgPath,1));
            $imageExt = $image->getClientOriginalExtension();
            $image->move('img',strtolower(str_replace(' ','-',$request->product_title)).'.'.$imageExt);
        }

        if($video){
            File::delete(substr($videoPath,1));
            $videoExt = $video->getClientOriginalExtension();
            $video->move('video',strtolower(str_replace(' ','-',$request->product_title)).'.'.$videoExt);
        }

        
        $product->product_title = $request->product_title;
        $product->product_description = $request->product_description;
        if($image){
            $product->product_img_path = '/img/'.strtolower(str_replace(' ','-',$request->product_title)).'.'.$imageExt;
        }
        if($video){
            $product->product_video_path = '/video/'.strtolower(str_replace(' ','-',$request->product_title)).'.'.$videoExt;
        }
        $result = $product->save();

       
        if($result){
            return redirect()->route('product-index');
        }
    }

    public function delete($id){
        $product = Product::where('id',$id)->first();
        $imgPath = $product->product_img_path;
        $videoPath = $product->product_video_path;
        File::delete(substr($imgPath,1));
        File::delete(substr($videoPath,1));
        $result = $product->delete();
        if($result){
            return redirect()->route('product-index');
        }
    }
}
