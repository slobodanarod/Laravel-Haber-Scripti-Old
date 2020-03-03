<?php

namespace App\Http\Controllers\Backend;

use App\Helper\Para;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class DefaultController extends Controller
{

    public function index ()
    {
        return view("backend.default.index");

    }

    public function login ()
    {

        return view("backend.default.login");

    }

    public function authenticate (Request $request)
    {

        $request->flash();
        $credentials = $request->only("email", "password");
        $remember_me = $request->has('remember_me') ? true : false;
        if (Auth::attempt($credentials,$remember_me))
        {

            return redirect()->intended(route("nedmin.index"));

        }
        else
        {
            return back()->with("error", "Hatalı kullanıcı girişi");
        }

    }

    public function logout()
    {

        Auth::logout();
        return redirect(route("nedmin.login"));

    }

    public function borsarest()
    {

        $para1 = new Para();
        $url = 'https://api.collectapi.com/economy/borsaIstanbul';
        $key = 'apikey 5yXEP0IJ7RfoHaf4beh7HC:3GpTTkix1mjwYsINH8hTyp';
        $borsaa = $para1->curlfunc($url,$key);
        $url = 'https://api.collectapi.com/economy/allCurrency';
        $key = 'apikey 5yXEP0IJ7RfoHaf4beh7HC:3GpTTkix1mjwYsINH8hTyp';
        $para =  $para1->curlfunc($url,$key);
        $url = 'https://api.collectapi.com/economy/goldPrice';
        $key = 'apikey 5yXEP0IJ7RfoHaf4beh7HC:3GpTTkix1mjwYsINH8hTyp';
        $altinn = $para1->curlfunc($url,$key);

        $data["altin"]["fiyat"] = $altinn[ "result" ][0]["buying"];
        $data["altin"]["artis"] = $altinn[ "result" ][0]["rate"];
        DB::table("borsa")->where("id",1)->update(["fiyat" => $data["altin"]["fiyat"],"artis" => $data["altin"]["artis"]]);
        $data["euro"]["artis"] = $para[ "result" ][1]["rate"];
        $data["euro"]["fiyat"] = $para[ "result" ][1]["buying"];
        DB::table("borsa")->where("id",2)->update(["fiyat" => $data["euro"]["fiyat"],"artis" => $data["euro"]["artis"]]);
        $data["dolar"]["fiyat"] = $para[ "result" ][0]["buying"];
        $data["dolar"]["artis"] = $para[ "result" ][0]["rate"];
        DB::table("borsa")->where("id",3)->update(["fiyat" => $data["dolar"]["fiyat"],"artis" => $data["dolar"]["artis"]]);
        $data["borsa"]["fiyat"] = $borsaa[ "result" ][0]["currentstr"];
        $data["borsa"]["artis"] = $borsaa[ "result" ][0]["changerate"];
        DB::table("borsa")->where("id",4)->update(["fiyat" => $data["borsa"]["fiyat"],"artis" => $data["borsa"]["artis"]]);
        // PARA
    }


}
