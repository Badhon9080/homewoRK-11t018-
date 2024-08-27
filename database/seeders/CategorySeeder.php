<?php

namespace Database\Seeders;
use App\Models\Category;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {$categories = [
        [
            "category"=>"Furniture",
            "slug"=>"furniture",
            "icon"=>"demo/product/categories/furni-1.png",
          ],
          [
            "category"=>"Jewelary",
            "slug"=>"jewelary",
            "icon"=>"demo/product/categories/jewelry-9.png",
          ],
          [
            "category"=>"Electronics",
            "slug"=>"electronics",
            "icon"=>"demo/product/categories/elec-5.png",
          ],
    ];
     foreach ($categories as $category)
     {Category::create($category);

     }


    }
}

/*

*/
