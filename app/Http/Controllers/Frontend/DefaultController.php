<?php

namespace App\Http\Controllers\Frontend;

use App\Banners;
use App\Blogs;
use App\Categories;
use App\Helper\WeatherHelper;
use App\Helper\Para;
use App\Http\Controllers\Controller;
use App\Mail\SendMail;
use App\Pages;
use App\Sliders;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\DB;

class DefaultController extends Controller
{


    public function index ()
    {

        $data[ "last_news" ] = Blogs::whereNull("author")->get()->sortByDesc("id")->take(6)->toArray();
        $data["last_news"] = DB::table("blogs")
            ->join("categories","categories.id","=","blogs.main_cat")
            ->selectRaw("categories.name as category_name,categories.slug as category_slug,blogs.*")
            ->get()
            ->sortByDesc("id")
            ->take(6)
            ->toArray();

        $data[ "sliderL" ]  = Sliders::all()->sortBy("must");
        $data[ "blogs" ]    = Blogs::where("author", 0)->orderBy('id', 'desc')->get()->sortBy("must");
        $data[ "gundem" ]   = Categories::find(7)->news()->orderBy('id', 'desc')->distinct("blogs.id")->get()->take(6);
        $data[ "bannerSR" ] = Banners::where([["position", "=", 1], ["status", "=", "1"]])->orderBy('must', 'asc')->get()->take(2);
        $data[ "bannerST" ] = Banners::where("position", 3)->orderBy('id', 'desc')->get()->take(4);
        $data[ "yasam" ]    = Categories::find(9)->news()->distinct("blogs.id")->orderBy('id', 'desc')->get();
        $data[ "saglik" ]   = Categories::find(17)->news()->distinct("blogs.id")->orderBy('id', 'desc')->get()->take(6);
        $data[ "magazin" ]  = Categories::find(20)->news()->orderBy('id', 'desc')->get();
        $data[ "dunya" ]    = Categories::find(10)->news()->orderBy('id', 'desc')->get();
        $data[ "ekonomi" ]  = Categories::find(11)->news()->orderBy('id', 'desc')->get();
        $data[ "yerel" ]    = Categories::find(19)->news()->orderBy('id', 'desc')->get();
        $data[ "spor" ]     = Categories::find(8)->news()->orderBy('id', 'desc')->get();
        $data[ "borsa" ]     = DB::table("borsa")->get();
//        dd($data["borsa"]);

        /* HAVA DURUMU */
        $weather               = new WeatherHelper();
        $json                  = json_decode($weather->getWeatherData("istanbul, tr"));
        $data[ "hava_durumu" ] = $json;
        /* HAVA DURUMU */

        $data[ "getWriters" ] = User::where("role", "writer")->get();
        $data[ "writers" ]    = [];
        foreach ($data[ "getWriters" ] as $k => $v)
        {

            $data[ "blogInWriter" ] = Blogs::where("author", $v[ "id" ])->first();

            if ($data[ "blogInWriter" ])
            {
                array_push($data[ "writers" ], ["name" => $v[ "name" ], "file" => $v[ "file" ], "title" => $data[ "blogInWriter" ][ "title" ], "slug" => $data[ "blogInWriter" ][ "slug" ], "created_at" => $data[ "blogInWriter" ][ "created_at" ]]);
            }

        }

        return view("frontend.default.index", compact('data'));
    }

    public function index2 ()
    {
        return view("frontend.default.index2");

    }

    public function contact ()
    {
        return view("frontend.default.contact");

    }

    public function sendmail (Request $request)
    {
        $request->validate(["name" => "required", "email" => "required", "phone" => "required", "message" => "required"]);
        $data = $request->except("_token");
        Mail::to('mertcanyurekli@gmail.com')->send(New SendMail($data));

        return back()->with("success", "Mail başarıyla gönderildi.");
    }

    public function login ()
    {
        return view("frontend.default.login");
    }

    public function searchShow ()
    {
        return view("frontend.default.searchShow");
    }

    public function search (Request $request)
    {
        $data[ "results" ] = Blogs::where("title", "like", '%' . $request->s . '%')->whereNull("author")->get()->take(100);
        $data[ "word" ]    = $request->s;

        return view("frontend.default.search", compact("data"));
    }

    public function writers ()
    {
        setlocale(LC_TIME, 'tr_TR.utf8');
        $data[ "getWriters" ] = User::where("role", "writer")->get();
        $data[ "writers" ]    = [];
        foreach ($data[ "getWriters" ] as $k => $v)
        {

            $data[ "blogInWriter" ] = Blogs::where("author", $v[ "id" ])->orderBy('id', 'desc')->first();
            if ($data[ "blogInWriter" ])
            {
                array_push($data[ "writers" ], ["name" => $v[ "name" ], "file" => $v[ "file" ], "title" => $data[ "blogInWriter" ][ "title" ], "slugW" => $v[ "slug" ], "slug" => $data[ "blogInWriter" ][ "slug" ], "created_at" => $data[ "blogInWriter" ][ "created_at" ]]);
            }

        }

        return view("frontend.default.writers", compact("data"));
    }

    public function writerProfile ($slug)
    {
        $data[ "writer" ] = User::where("slug", $slug)->first();
        $data[ "blogs" ]  = Blogs::where("author", $data[ "writer" ][ "id" ])->get();

        return view("frontend.default.writer", compact("data"));

    }

    public function page ($slug)
    {

        $data[ "page" ] = Pages::where("slug", $slug)->first();

        return view("frontend.default.page", compact("data"));

    }



}
