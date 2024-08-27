<?php

namespace App\Http\Controllers\Frontend;

use App\Models\Product;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ProductController extends Controller
{ function ShowCategoryProduct($slug)
    {$category=Category::select("id","category")->where("slug",$slug)->first();
        $products=Product::
        with(["galleries"=>function($query)
        {return $query->select("id","product_id","title")->first();

        }
        ])
        ->whereHas("categories",function($q) use($slug)
        {return $q->where("slug",$slug);})->where("status",true)->select("id","title","slug","featured_img","price","selling_price","status")->get();
       // dd($products);
       return view("Frontend.categoryArchieve",compact("products","category"));
    }
   function ShowProduct($slug)
   {$product=Product::with(["galleries","reviews.user"])->where("slug",$slug)->first();
  //  dd($product->reviews);
    return view("Frontend.single-product",compact("product"));

   }
   function searchProduct(Request $request)
   {$search = $request->search;
    $products = Product::where("title","LIKE","%". $search . "%")->take(2)->get();
    $count = Product::where("title","LIKE","%". $search . "%")->count();

    return response()->json([
        "products" => $products,
        "productsCount" => $count,
    ]);

   }
}
