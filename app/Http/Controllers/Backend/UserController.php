<?php

namespace App\Http\Controllers\Backend;

use App\User;
use App\Http\Controllers\Controller;
use http\Exception\BadConversionException;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index ()
    {
        $data[ 'users' ] = User::all()->sortBy('must');

        return view("backend.users.index", compact(['data']));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create ()
    {
        return view("backend.users.create");
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

        $request->validate(["name" => 'required', "email" => 'required|email', "password" => 'required|min:6', "file" => 'image|mimes:jpg,jpeg,png|max:2048']);


        if ($request->hasFile("file"))
        {

            $file_name = uniqid() . "." . $request->file->getClientOriginalExtension();
            $request->file->move(public_path('images/users'), $file_name);

        }
        else
        {
            $file_name = null;
        }

        $user = User::insert(["name" => $request->name, "role" => $request->role, "file" => $file_name, "email" => $request->email, "password" => Hash::make($request->password), "status" => $request->status,]);

        if ($user)
        {

            return redirect(route("user.index"))->with("success", "Başarıyla Eklendi");
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
        $user = User::where("id", $id)->first();

        return view("backend.users.edit")->with("user", $user);

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

        $request->validate(["name" => 'required', "email" => 'required|email', "file" => 'image|mimes:jpg,jpeg,png|max:2048']);

        if ($request->hasFile("file"))
        {

            $file_name = uniqid() . "." . $request->file->getClientOriginalExtension();
            $request->file->move(public_path('images/users'), $file_name);
            $path = "images/users/" . $request->old_file;
            if (file_exists(public_path($path)))
            {
                @unlink(public_path($path));
            }
        }
        else
        {
            $file_name = $request->old_file;
        }
		
		 if ($request->hasFile("twitter_post"))
        {

            $twitter_file_name = uniqid() . "." . $request->twitter_post->getClientOriginalExtension();
            $request->twitter_post->move(public_path('images/users'), $twitter_file_name);
            $path = "images/users/" . $request->old_twitter_post_file;
            if (file_exists(public_path($path)))
            {
                @unlink(public_path($path));
            }
        }
        else
        {
            $twitter_file_name = $request->old_twitter_post_file;
        }

        if (strlen($request->password) > 0)
        {
            $request->validate(["password" => "min:6"]);
            $user = User::where("id", $id)->update(["name" => $request->name,"description" => $request->description, "role" => $request->role, "file" => $file_name,"twitter_post" => $twitter_file_name, "email" => $request->email, "password" => Hash::make($request->password), "status" => $request->status]);

        }
        else
        {
            $user = User::where("id", $id)->update(["name" => $request->name,"description" => $request->description, "role" => $request->role, "file" => $file_name, "twitter_post" => $twitter_file_name,"email" => $request->email, "status" => $request->status]);

        }


        if ($user)
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
        $user = User::where("id", $id)->delete();
        if ($user)
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

            $users       = User::find(intval($value));
            $users->must = intval($key);
            $users->save();
        }
        echo true;
    }
}
