<?php

namespace App\Http\Controllers\Frontend;

use App\Pages;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class PageController extends Controller
{
    public function index ()
    {
        $data[ "pages" ] = Pages::all()->sortBy("must");

        return view("frontend.page.index", compact('data'));

    }

    public function detail ($slug)
    {
        $data["pageList"] = Pages::all()->sortBy("must");
        $data[ "page" ] = Pages::where("slug", $slug)->get()->first();

        return view("frontend.page.detail", compact('data'));
    }

}
