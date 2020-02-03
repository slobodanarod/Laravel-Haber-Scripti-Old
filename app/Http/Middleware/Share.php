<?php

namespace App\Http\Middleware;

use App\Blogs;
use App\Categories;
use App\Pages;
use App\Settings;
use Closure;
use Illuminate\Support\Facades\View;
use Sunra\PhpSimple\HtmlDomParser;

class Share
{
    /**
     * Handle an incoming request.
     *
     * @param \Illuminate\Http\Request $request
     * @param \Closure                 $next
     *
     * @return mixed
     */
    public function handle ($request, Closure $next)
    {
        $data[ "settings" ] = Settings::all();
        foreach ($data[ "settings" ] as $key)
        {
            $settings[ $key->key ] = $key->value;
        }

        $settings[ "pages" ] = Pages::all()->sortBy("must");

        // CATEGORIES
        $allcategories = [];
        $childMenu     = function($parent_id) {
            $array = [];
            foreach (Categories::where(["main_cat" => $parent_id, "status" => "1"])->get()->sortBy("must") as $k => $v)
            {
                array_push($array, ["slug" => $v->slug, "name" => $v->name]);
            }

            return $array;
        };

        foreach (Categories::where(["main_cat" => 0, "status" => "1"])->get()->sortBy("must") as $k => $v)
        {
            if (Categories::where(["main_cat" => $v->id, "status" => "1"])->first())
            {

                array_push($allcategories, ["slug" => $v->slug, "name" => $v->name, "child" => [$childMenu($v->id)]]);

            }
            else
            {
                array_push($allcategories, ["slug" => $v->slug, "name" => $v->name, "child" => null]);
            }
        }
        $settings[ "frontmenu" ] = $allcategories;

        // CATEGORIES

        $settings[ "gram_altin" ] = 1;
        $settings[ "euro" ]       = 1;
        $settings[ "dolar" ]      = 1;
        $settings[ "whatsapp" ]   = $settings[ "whatsapp" ];

        $settings [ "last_news_header_text" ] = Blogs::whereNull("author")->select(["title", "slug"])->get()->take(5);


        //last_news_header_text


        View::share("settings", $settings);

        return $next($request);
    }
}
