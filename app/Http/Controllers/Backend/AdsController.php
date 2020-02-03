<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use App\Ads;

class AdsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index ()
    {
        $ads = Ads::all();

        return view("backend.ads.index", compact("ads"));


    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create ()
    {
        return view("backend.ads.create");
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

        $request->validate(["name" => "required", "content" => "required"]);

        $insert = Ads::insert(["name" => $request->name, "content" => $request->content]);

        if ($insert)
        {
            return back()->with("success", "Başarıyla eklendi");
        }
        else
        {
            return back()->with("error", "Sorun oluştu");
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

        $ad = Ads::find($id)->first();

        return view("backend.ads.edit", compact("ad"));

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


        $request->validate(["name" => "required", "content" => "required"]);
        $ads = Ads::where("id", $id)->update(["name" => $request->name, "content" => $request->content]);

        if ($ads)
        {
            return back()->with("success", "Düzenleme başarılı");
        }
        else
        {
            return back()->with("error", "Sorun oluştu");
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
        $ad = Ads::find($id)->delete();
        if ($ad)
        {
            echo true;
        }
        else
        {
            echo false;
        }
    }
}
