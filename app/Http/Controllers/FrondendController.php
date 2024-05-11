<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\berita;
use App\Models\beritavideo;
use App\Models\menu;
use App\Models\beritakat;
use Illuminate\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Str;

class FrondendController extends Controller
{
    //
    public function index(Request $request)
    {
        $berita = berita::get();
        $video = beritavideo::first();
        $profile = menu::where("menuLink" ,"profile-korpri-kemendagri")->first();
        return view("frondend.home",[
            "berita" => $berita,
            "profile" => $profile,
            "video" => $video
            ]);

    }
    public function halaman(Request $request,$kode){
        $detail = menu::where("menuCode",$kode)->first();
        return view("frondend.halaman",[
            "detail" => $detail,
            ]);
    }
}
