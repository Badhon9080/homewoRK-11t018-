<?php

namespace App\Http\Controllers\Frontend;

use App\Models\Product;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use function Symfony\Component\String\b;

class FrontendController extends Controller
{function home()
    {$categories=Category::latest()->take(12)->get();
        return view("Frontend.HomeIndex",compact("categories"));
    }
    function shopPage()
    { $products=Product::with(["galleries"=>function($query)
        {return $query->select("id","product_id","title")->first();

        }
        ])
        ->where("status",true)->select("id","title","slug","featured_img","price","selling_price","status")->paginate(15);
         $categories=Category::get();

        return view("Frontend.shopSidebar",compact("products","categories"));

    }
    function filterProducts(Request $request)
    {$query=Product::query();

        //categories
        if($request->categories)
        {$query->whereHas("categories",function($q) use($request)
        {return $q->whereIn("slug",$request->categories);

        });}/*pRIciNG*/
        if($request->price){$query->whereBeetween("price",[$request->price["min"],$request->price["max"]]);
        }$products=$query->with("galleries")->orderBy($request->ordering["order"],$request->ordering["sort"])->get();
        return $products;
         //return $request->ordering;
    }
}