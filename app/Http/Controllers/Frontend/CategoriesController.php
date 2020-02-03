<?php

namespace App\Http\Controllers\Frontend;

use App\Categories;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CategoriesController extends Controller
{

    public function index ($slug)
    {
        $category   = Categories::select(["id", "slug", "name"])->where("slug", $slug)->first();
        $categories = Categories::find($category[ "id" ])->news()->orderBy('id', 'desc')->distinct("blogs.id")->paginate(21);

        return view("frontend.categories.index", compact(["category", "categories"]));
    }
}
