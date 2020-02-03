<?php

namespace App\Http\Controllers\Backend;

use App\Banners;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class BannerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index ()
    {

        $banners = Banners::all()->sortBy("must");

        return view("backend.banners.index", compact("banners"));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create ()
    {

        $positions = DB::table("banners_category")->get();

        return view("backend.banners.create", compact("positions"));

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

        $request->validate(["file" => "required", "position" => "required", "url" => "required"]);

        if ($request->hasFile("file"))
        {

            $file_name = uniqid() . "." . $request->file->getClientOriginalExtension();
            $request->file->move(public_path('images/banners'), $file_name);
            $path = "images/banners/" . $request->old_file;
            if (file_exists(public_path($path)))
            {
                @unlink(public_path($path));
            }
        }
        else
        {
            $file_name = $request->old_file;
        }

        $banner = Banners::insert(["name" => $request->name, "description" => $request->description, "position" => $request->position, "url" => $request->url, "status" => $request->status, "file" => $file_name, "must" => 0]);

        if ($banner)
        {

            return redirect(route("banners.index"))->with("success", "Banner başarıyla eklendi.");

        }
        else
        {
            return back()->with("error", "Malesef ekleyemedik..");

        }


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

        $data[ "banner" ]    = Banners::where("id",$id)->get();
        $data[ "positions" ] = DB::table("banners_category")->get();

        return view("backend.banners.edit", compact("data"));

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

        $request->validate(["position" => "required", "url" => "required"]);

        if ($request->hasFile("file"))
        {

            $file_name = uniqid() . "." . $request->file->getClientOriginalExtension();
            $request->file->move(public_path('images/banners'), $file_name);
            $path = "images/banners/" . $request->old_file;
            if (file_exists(public_path($path)))
            {
                @unlink(public_path($path));
            }
        }
        else
        {
            $file_name = $request->old_file;
        }

        $banner = Banners::where("id", $id)->update(["name" => $request->name, "description" => $request->description, "position" => $request->position, "url" => $request->url, "status" => $request->status, "file" => $file_name]);

        if ($banner)
        {

            return back()->with("success", "Banner başarıyla güncellendi.");

        }
        else
        {
            return back()->with("error", "Malesef ekleyemedik..");

        }


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
        $banner = Banners::where("id", $id)->delete();
        if ($banner)
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
            $banners       = Banners::find(intval($value));
            $banners->must = intval($key);
            $banners->save();
        }
        echo true;
    }
}
