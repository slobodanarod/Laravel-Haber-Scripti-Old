<?php

namespace App\Http\Controllers\Backend;

use App\Blogs;
use App\Categories;
use App\Http\Controllers\Controller;
use App\Tags;
use http\Exception\BadConversionException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Carbon\Carbon;

class BlogController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index ()
    {
        $data[ 'blogs' ] = Blogs::all()->sortBy('must');

        return view("backend.blogs.index", compact(['data']));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create ()
    {
        $data[ "categories" ] = Categories::all();

        return view("backend.blogs.create", compact("data"));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     *
     * @return \Illuminate\Http\Response
     */
    public function store (Request $request)
    {

        if (strlen($request->slug) > 3)
        {

            $str = Str::slug($request->slug);

        }
        else
        {
            $str = Str::slug($request->title);

        }

        $request->validate(["title" => 'required', "blog_content" => 'required', "file" => 'required|image|mimes:jpg,jpeg,png|max:2048']);
        if ($request->hasFile("file"))
        {
            $file_name = uniqid() . "." . $request->file->getClientOriginalExtension();
            $request->file->move(public_path('images/blogs'), $file_name);
        }
        else
        {
            $file_name = null;
        }

        $blog = Blogs::insertGetId(["title" => $request->title, "slug" => $str, "file" => $file_name, "content" => $request->blog_content, "status" => $request->status, "created_at" => Carbon::now(), "updated_at" => Carbon::now()]);


        if (isset($request->tags))
        {
            $tags = explode(",", $request->tags);

            foreach ($tags as $k => $v)
            {
                $control = Tags::where("name", $v)->first();
                if ($control[ "name" ] == $v)
                {
                    $blog_tag = DB::table("blogs_tags")->insert(["blogs_id" => $blog, "tags_id" => $control[ "id" ]]);
                }
                else
                {
                    $slug     = Str::slug($v);
                    $tag      = Tags::insertGetId(["name" => $v, "slug" => $slug]);
                    $blog_tag = DB::table("blogs_tags")->insert(["blogs_id" => $blog, "tags_id" => $tag]);
                }

            }
        }

        if ($blog)
        {

            if (isset($request->categories))
            {
                $i = 0;
                foreach ($request->categories as $k => $v)
                {
                    if ($i == 0)
                    {
                        $update     = Blogs::where("id", $blog)->update(["main_cat" => $v]);
                        $categories = DB::table("blogs_categories")->insert(["blogs_id" => $blog, "categories_id" => $v]);
                    }
                    else
                    {
                        $categories = DB::table("blogs_categories")->insert(["blogs_id" => $blog, "categories_id" => $v]);
                    }
                    $i++;
                }
            }

            return redirect(route("blog.index"))->with("success", "Başarıyla Eklendi");
        }

        return Back()->with("error", "sorun oluştu");
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     *
     * @return \Illuminate\Http\Response
     */
    public function show ($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     *
     * @return \Illuminate\Http\Response
     */
    public function edit ($id)
    {
        $data[ "categories" ]       = Categories::all();
        $data[ "blogs" ]            = Blogs::where("id", $id)->first();
        $data[ "categories_blogs" ] = DB::table("blogs_categories")->where("blogs_id", $id)->join("categories", "blogs_categories.categories_id", "categories.id")->get();
        $tags                       = DB::table("blogs_tags")->where("blogs_id", $id)->join("tags", "blogs_tags.tags_id", "tags.id")->get();
        $data[ "tags" ]             = "";
        foreach ($tags as $k => $v)
        {
            $data[ "tags" ] .= $v->name . ",";
        }
        $data[ "category" ] = Categories::where("id",$data["blogs"]["main_cat"])->first()->toArray();

        return view("backend.blogs.edit", compact('data'));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int                      $id
     *
     * @return \Illuminate\Http\Response
     */
    public function update (Request $request, $id)
    {
        if (strlen($request->slug) > 3)
        {

            $str = Str::slug($request->slug);

        }
        else
        {
            $str = Str::slug($request->title);

        }

        if ($request->hasFile("file"))
        {
            $file_name = uniqid() . "." . $request->file->getClientOriginalExtension();
            $request->file->move(public_path('images/blogs'), $file_name);
            $path = "images/blogs/" . $request->old_file;
            if (file_exists(public_path($path)))
            {
                @unlink(public_path($path));
            }
        }
        else
        {
            $file_name = $request->old_file;
        }

        $blog = Blogs::where("id", $id)->update(["title" => $request->title, "slug" => $str, "file" => $file_name, "content" => $request->blog_content, "status" => $request->status, "updated_at" => Carbon::now()]);

        Db::table("blogs_tags")->where("blogs_id", $id)->delete();

        if (isset($request->tags))
        {
            $tags = explode(",", $request->tags);

            foreach ($tags as $k => $v)
            {
                $control = Tags::where("name", $v)->first();
                if ($control[ "name" ] == $v)
                {
                    $blog_tag = DB::table("blogs_tags")->insert(["blogs_id" => $id, "tags_id" => $control[ "id" ]]);
                }
                else
                {
                    $slug     = Str::slug($v);
                    $tag      = Tags::insertGetId(["name" => $v, "slug" => $slug]);
                    $blog_tag = DB::table("blogs_tags")->insert(["blogs_id" => $id, "tags_id" => $tag]);
                }

            }
        }

        if ($blog)
        {
            DB::table("blogs_categories")->where("blogs_id", $id)->delete();
            if (isset($request->categories))
            {
                $i = 0;
                foreach ($request->categories as $k => $v)
                {
                    if ($i == 0)
                    {
                        $update     = Blogs::where("id", $id)->update(["main_cat" => $v]);
                        $categories = DB::table("blogs_categories")->insert(["blogs_id" => $id, "categories_id" => $v]);
                    }
                    else
                    {
                        $categories = DB::table("blogs_categories")->insert(["blogs_id" => $id, "categories_id" => $v]);
                    }
                    $i++;
                }
            }

            return redirect(route("blog.index"))->with("success", "Başarıyla Eklendi");
        }

        return Back()->with("error", "sorun oluştu");


    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     *
     * @return \Illuminate\Http\Response
     */
    public function destroy ($id)
    {
        $blog = Blogs::where("id", $id)->delete();
        if ($blog)
        {
            echo true;
        }
        else
        {
            echo false;
        }
    }

    public function sortable ()
    {

        foreach ($_POST[ "item" ] as $key => $value)
        {

            $blogs       = Blogs::find(intval($value));
            $blogs->must = intval($key);
            $blogs->save();
        }
        echo true;
    }

    public function upload (Request $request)
    {

        $file_name = "aa" . uniqid() . "." . $request->file->getClientOriginalExtension();
        $request->file->move(public_path('images/blogs'), $file_name);
        $path = "images/blogs/" . $request->old_file;
        if (file_exists(public_path($path)))
        {
            @unlink(public_path($path));
        }

        return env("APP_URL") . "/images/blogs/" . $file_name;


    }
}
