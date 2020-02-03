<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Blogs;
use Illuminate\Support\Str;
use App\User;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{

    public function news ()
    {

        $writer_id      = Auth::user()->id;
        $data[ "news" ] = Blogs::where("author", $writer_id)->get();

        return view("frontend.writers.index", compact("data"));

    }

    public function newsCreate ()
    {

        return view("frontend.writers.create");

    }

    public function newsStore (request $request)
    {


        $blog = Blogs::insertGetId(["title" => $request->title, "author" => Auth::user()->id, "slug" => Str::slug($request->title), "file" => "", "content" => $request->blog_content, "status" => "0", "created_at" => Carbon::now(), "updated_at" => Carbon::now()]);

        if ($blog)
        {

            return Back()->with("success", "Başarıyla Gönderildi.");
        }

        return Back()->with("error", "sorun oluştu");


    }

    public function newsEdit ($id)
    {
        $data[ "new" ] = Blogs::where("id", $id)->first();
        if ($data[ "new" ][ "author" ] != Auth::user()->id)
        {
            return back()->with("error", "Erişim yetkiniz yoktur.");
        }

        return view("frontend.writers.edit", compact("data"));

    }

    public function newsUpdate (request $request, $id)
    {
        $data[ "new" ] = Blogs::where("id", $id)->first();
        if ($data[ "new" ][ "author" ] != Auth::user()->id)
        {
            return back()->with("error", "Erişim yetkiniz yoktur.");
        }

        $blog = Blogs::where("id", $id)->update(["title" => $request->title, "author" => Auth::user()->id, "slug" => Str::slug($request->title), "file" => "", "content" => $request->blog_content, "status" => "0", "created_at" => Carbon::now(), "updated_at" => Carbon::now()]);

        if ($blog)
        {
            return back()->with("success", "Başarıyla güncellendi.");
        }
        else
        {

            return back()->with("error", "Erişim yetkiniz yoktur.");

        }

    }

    public function settings ()
    {
        $data[ "info" ] = User::where("id", Auth::user()->id)->first();

        return view("frontend.user.edit", compact("data"));
    }

    public function settingsUpdate (request $request)
    {

        $request->validate(["name" => 'required']);

        if ($request->hasFile("file"))
        {
            $request->validate(["file" => 'image|mimes:jpg,jpeg,png|max:2048']);
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

        $user = User::where("id", Auth::user()->id)->update(["name" => $request->name, "file" => $file_name, "phone" => $request->phone]);

        if ($user)
        {
            return redirect()->back()->with("success", "Başarıyla güncellendi.");
        }
        else
        {
            return redirect()->back()->with("error", "Hata oluştu.");

        }


    }

    public function passwordRestart ()
    {
        return view("frontend.user.password");
    }

    public function passwordRestartUpdate (Request $request)
    {
        $info           = User::where("id", Auth::user()->id)->first();
        $hashedPassword = Hash::make($request->old_password);
        if (Hash::check($request->old_password, $info[ "password" ]))
        {

            if ($request->new_password == $request->new_password1)
            {

                $update = User::where("id", Auth::user()->id)->update(["password" => Hash::make($request->new_password)]);

                if ($update)
                {

                    return redirect("/logout")->with("error", "Parolanız değişti. Lütfen tekrar giriş yapınız.");

                }
            }
            else
            {

                return back()->with("error", "Yeni parolalarınız eşleşmiyor.");

            }


        }
        else
        {
            return back()->with("error", "Eski parolanız doğru değil. Lütfen tekrar deneyin.");
        }


    }

}
