<?php

namespace App\Http\Controllers\BacKend;

use App\Models\Gallery;
use App\Models\Product;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Helpers\MediaUploader;
use App\Helpers\Sluggenerator;
use App\Http\Controllers\Controller;

class ProductController extends Controller{use Sluggenerator,MediaUploader;
    function product(){$categories=Category::select("id","category")->latest()->get();
        return view("layouts.componentS.addpRoduct.addProduct",compact("categories"));
    }
    function productStore(Request $request,$id=null)
    {
        $request->validate(["galleries.*"=>"mimes:jpg,png,jpeg",
                "featured_img"=>"mimes:jpg,png,jpeg",
        ]);
        $productStore=Product::findOrNew($id);
        if($request->hasFile("featured_img"))
        {
            $featured_img=$this->uploadSingleMedia($request->featured_img,$this->createSlug(Product::class,$request->title),"product",$productStore->featured_img);
        }
        $productStore->title=$request->title;
        $productStore->slug=$this->createSlug(Product::class,$request->title);
        $productStore->featured_img=$featured_img ?? $productStore->featured_img;
        $productStore->price=$request->price;
        $productStore->selling_price=$request->selling_price;
        $productStore->sku=$request->sku;
        $productStore->brand=$request->brand;
        $productStore->stock=$request->stock;
        $productStore->status=$request->status ?? 0;
        $productStore->featured=$request->featured ?? 0;
        $productStore->short_detail=$request->short_detail;
        $productStore->long_detail=$request->long_detail;
        $productStore->save();

        if($productStore)
        {
            $productStore->categories()->sync($request->categories);
        }//galleRieS
        if( $request->galleries && count($request->galleries)>0){
             $galleries=$this->uploadMultipleMedia($request->galleries,"galleries");
             foreach($galleries as $SingleGalleryImage)
             {
                $gallery=new Gallery();
                $gallery->title=$SingleGalleryImage;
                $gallery->product_id=$productStore->id;
                $gallery->save();
             }
        }
    }
}