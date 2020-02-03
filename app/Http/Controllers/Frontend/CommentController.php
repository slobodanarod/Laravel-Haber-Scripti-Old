<?php

namespace App\Http\Controllers\Frontend;

use App\Comments;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CommentController extends Controller
{

    public function send (Request $request)
    {

        $request->validate(["content" => "required|min:3|max:400"]);

        $comment = Comments::insert(["content" => $request->content, "blogs_id" => $request->blogs_id, "users_id" => $request->users_id, "status" => "1", "created_at" => \Carbon\Carbon::now(), "updated_at" => \Carbon\Carbon::now()]);

        if ($comment)
        {
            return back()->with("success", "Yorumunuz başarıyla yayınlandı.");
        }
        else
        {

            return back()->with("error", "Yorumunuz yayınlanamadı.");
        }


    }

    public function delete ($id)
    {
        $comment_id = Comments::where("id", $id)->select("id", "users_id")->first();

        if (Auth::user()->id == $comment_id->users_id)
        {
            $comment = Comments::find($id)->delete();
            if ($comment)
            {
                return back()->with("success", "Yorumunuz Başarıyla silindi.");
            }
            else
            {
                return back()->with("error", "Yorumunuz silinemedi.");
            }
        }
        else
        {
            return back()->with("error", "Yorumunuz silinemedi.");
        }
    }

}
