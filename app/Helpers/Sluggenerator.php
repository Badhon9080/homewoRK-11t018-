<?php
namespace App\Helpers;
trait Sluggenerator{
    function createSlug($class,$title)
    {
        $slug=Str()->slug($title);
        $count=$class::where("slug","LIKE","%".$slug."%")->count();
        if($count > 0)
        {
          $count++;
          $slug=$slug. "-" .$count;
        }return $slug;
    }
}