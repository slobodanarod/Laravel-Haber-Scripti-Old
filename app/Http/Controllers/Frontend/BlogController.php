<?php

namespace App\Http\Controllers\Frontend;

use App\Ads;
use App\Blogs;
use App\Categories;
use App\Http\Controllers\Controller;
use App\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class BlogController extends Controller
{
    public function index ($slug)
    {
        setlocale(LC_TIME, 'tr_TR.utf8');
        $data[ "blog" ] = Blogs::where("slug", $slug)->first();
        Blogs::where("slug", $slug)->update(["hit" => $data[ "blog" ][ "hit" ] + 1]);
        $data[ "sidebarReklam" ] = Ads::where("id", 1)->get();
        if ($data[ "blog" ][ "author" ] != 0)
        {
            $data[ "writer" ]   = User::where("id", $data[ "blog" ][ "author" ])->first();
            $data[ "comments" ] = DB::table('comments')
                ->join('users', 'users.id', '=', 'comments.users_id')
                ->where('blogs_id', $data[ "blog" ][ "id" ])->selectRaw("comments.*,users.name,users.file,users.id as userID")->get();
            $data[ "gundem" ]     = Categories::find(7)->news()->distinct("blogs.id")->get()->take(6)->sortByDesc("id");

        }
        else
        {
            $data[ "categories" ] = Blogs::find($data[ "blog" ][ "id" ])->categories()->get();
            $data[ "tags" ]       = Blogs::find($data[ "blog" ][ "id" ])->tags()->get();
            $data[ "realted" ]    = Categories::find($data[ "categories" ][ "0" ][ "id" ])->news()->get()->take(6);
            $data[ "gundem" ]     = Categories::find(7)->news()->distinct("blogs.id")->get()->take(6)->sortByDesc("id");
            $data[ "comments" ]   = DB::table('comments')->join('users', 'users.id', '=', 'comments.users_id')->where('blogs_id', $data[ "blog" ][ "id" ])->selectRaw("comments.*,users.name,users.file,users.id as userID")->get();
        }


        return view("frontend.blog.index", compact('data'));
    }
}
