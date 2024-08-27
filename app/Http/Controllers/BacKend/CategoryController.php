<?php

namespace App\Http\Controllers\BacKend;

use App\Helpers\MediaUploader;
use App\Helpers\Sluggenerator;
use App\Models\Category;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CategoryController extends Controller{use Sluggenerator,MediaUploader;
    public function category()
    {$categories=Category::with("subcategories")->latest()->get();
        $parentCategories=$categories->where("category_id",null)->flatten();
        return view("category.index",compact("categories","parentCategories"));
    }//SToRe
    public function categoryStore(Request $request)
    {
        $request->validate([
            "icon"=>"mimes:jpg,png,jpeg",
        ]);$slug=$this->createSlug(Category::class,$request->category);
        if($request->hasFile("icon"))
        {
          $iconPath=$this->uploadSingleMedia($request->icon,$slug,"category");
        }
        $categoryStore=new Category();
        $categoryStore->category=$request->category;
        $categoryStore->slug=$slug;
        $categoryStore->icon=$request->hasFile("icon") ? $iconPath : null;
        $categoryStore->category_id=$request->category_id;
        $categoryStore->save();return back();
    }
    //delete
    public function delete($id)
    {
        Category::find($id)->delete();return back();
    }
    //ediT
    public function edit($id)
{ $categories=Category::with("subcategories")->latest()->get();
        $parentCategories=$categories->where("category_id",null)->flatten();
        $findCategory=$categories->where("id",$id)->first();
        return view("category.index",compact("categories","parentCategories","findCategory"));
}
    //update
    public function update(Request $request,$id)
    {$slug=$this->createSlug(Category::class,$request->category);
        if($request->hasFile("icon"))
        {
          $iconPath=$this->uploadSingleMedia($request->icon,$slug,"category",$request->old);
        }
        $categoryStore=Category::find($id);
        $categoryStore->category=$request->category;
        $categoryStore->slug=$slug;
        $categoryStore->icon=$request->hasFile("icon") ? $iconPath : null;
        $categoryStore->category_id=$request->category_id;
        $categoryStore->save();return back();
    }

}