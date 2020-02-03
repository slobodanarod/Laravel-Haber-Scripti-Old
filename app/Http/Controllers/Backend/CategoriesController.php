<?php

namespace App\Http\Controllers\Backend;

use App\Categories;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class CategoriesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index ()
    {

        $data = ["categories" => Categories::all()];

        return view("backend.categories.index", compact("data"));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create ()
    {
        $data = ["categories" => Categories::all()];

        return view("backend.categories.create", compact("data"));

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

        $request->validate(["name" => 'required', "title" => 'required', "keywords" => 'required', "description" => 'required']);


        $category = Categories::insert(["title" => $request->title,"must" => 0,"slug" => $str, "main_cat" => $request->main_cat, "name" => $request->name, "keywords" => $request->keywords, "description" => $request->description, "status" => $request->status,]);

        if ($category)
        {

            return redirect(route("category.index"))->with("success", "Başarıyla Eklendi");
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

        $data = ["category" => Categories::where("id",$id)->first(),"categories" => Categories::all()];
        return view("backend.categories.edit",compact("data"));

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

        if(strlen($request->slug) > 3)
        {
            $slug = $request->slug;
        }else{
            $slug = Str::slug($request->title);
        }

        $request->validate([
            "name" => "required",
            "title" => "required",
            "description" => "required",
            "keywords" => "required"
        ]);


            $category =  Categories::where("id",$id)->update([
            "name" => $request->name,
            "title" => $request->title,
            "status" => $request->status,
            "description" => $request->description,
            "main_cat" => $request->main_cat,
            "keywords" => $request->keywords,
            "slug" => $request->slug
       ]);

       if($category)
       {

           return back()->with("success","Başarıyla güncellendi");

       }else{
           return back()->with("error","sorun oluştu");

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
        $category = Categories::where("id",$id)->delete();

        if($category)
        {
            return redirect(route("category.index"))->with("success","Başarıyla silindi");

        }else{

            return back()->with("error","Bir sorun oluştu ve silinemedi.");

        }
    }


    public function sortable(Request $request)
    {



        foreach ($_POST["item"] as $k => $v)
        {

            $category = Categories::find(intval($v));
            $category->must = intval($k);
            $category->save();

        }
        echo true;

    }

}
