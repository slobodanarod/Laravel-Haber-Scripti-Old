<?php

namespace App\Http\Controllers\Backend;

use App\Pages;
use App\Http\Controllers\Controller;
use http\Exception\BadConversionException;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class PageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index ()
    {
        $data[ 'pages' ] = Pages::all()->sortBy('must');

        return view("backend.pages.index", compact(['data']));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create ()
    {
        return view("backend.pages.create");
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

        $request->validate([
            "title" => 'required',
            "page_content" => 'required',
            "file" => 'required|image|mimes:jpg,jpeg,png|max:2048'
        ]);
        if ($request->hasFile("file"))
        {

            $file_name = uniqid() . "." . $request->file->getClientOriginalExtension();
            $request->file->move(public_path('images/pages'), $file_name);

        }
        else
        {
            $file_name = null;
        }

        $page = Pages::insert(["title" => $request->title, "slug" => $str, "file" => $file_name, "content" => $request->page_content, "status" => $request->status,]);

        if ($page)
        {

            return redirect(route("page.index"))->with("success", "Başarıyla Eklendi");
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
        $page = Pages::where("id",$id)->first();
        return view("backend.pages.edit")->with("page",$page);

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

        $request->validate([
            "title" => 'required',
            "page_content" => 'required',
            "file" => 'image|mimes:jpg,jpeg,png|max:2048'
        ]);
        if ($request->hasFile("file"))
        {

            $file_name = uniqid() . "." . $request->file->getClientOriginalExtension();
            $request->file->move(public_path('images/pages'), $file_name);
            $path = "images/pages/".$request->old_file;
            if(file_exists(public_path($path)))
            {
                @unlink(public_path($path));
            }
        }
        else
        {
            $file_name = $request->old_file;
        }

        $page = Pages::where("id",$id)->update(["title" => $request->title, "slug" => $str, "file" => $file_name, "content" => $request->page_content, "status" => $request->status,]);

        if ($page)
        {

            return back()->with("success", "Başarıyla Eklendi");
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
        $page = Pages::where("id", $id)->delete();
        if ($page)
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

            $pages       = Pages::find(intval($value));
            $pages->must = intval($key);
            $pages->save();
        }
        echo true;
    }
}
