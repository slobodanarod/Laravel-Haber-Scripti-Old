<?php

namespace App\Http\Controllers\Backend;

use App\Sliders;
use App\Http\Controllers\Controller;
use http\Exception\BadConversionException;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class SliderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index ()
    {
        $data[ 'sliders' ] = Sliders::all()->sortBy('must');

        return view("backend.sliders.index", compact(['data']));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create ()
    {
        return view("backend.sliders.create");
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
            "slider_content" => 'required',
            "file" => 'required|image|mimes:jpg,jpeg,png|max:2048'
        ]);
        if ($request->hasFile("file"))
        {

            $file_name = uniqid() . "." . $request->file->getClientOriginalExtension();
            $request->file->move(public_path('images/sliders'), $file_name);

        }
        else
        {
            $file_name = null;
        }

        $slider = Sliders::insert(["title" => $request->title, "slug" => $str, "file" => $file_name, "content" => $request->slider_content, "url" => $request->url ,"status" => $request->status,]);

        if ($slider)
        {

            return redirect(route("slider.index"))->with("success", "Başarıyla Eklendi");
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
        $slider = Sliders::where("id",$id)->first();
        return view("backend.sliders.edit")->with("slider",$slider);

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
            "slider_content" => 'required',
            "file" => 'image|mimes:jpg,jpeg,png|max:2048'
        ]);
        if ($request->hasFile("file"))
        {

            $file_name = uniqid() . "." . $request->file->getClientOriginalExtension();
            $request->file->move(public_path('images/sliders'), $file_name);
            $path = "images/sliders/".$request->old_file;
            if(file_exists(public_path($path)))
            {
                @unlink(public_path($path));
            }
        }
        else
        {
            $file_name = $request->old_file;
        }

        $slider = Sliders::where("id",$id)->update(["title" => $request->title, "slug" => $str, "file" => $file_name, "content" => $request->slider_content,"url" => $request->url ,"status" => $request->status,]);

        if ($slider)
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
        $slider = Sliders::where("id", $id)->delete();
        if ($slider)
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

            $sliders       = Sliders::find(intval($value));
            $sliders->must = intval($key);
            $sliders->save();
        }
        echo true;
    }
}
