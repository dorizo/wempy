<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use Session;
use App\Models\Member;
use App\Models\member_kat;
use App\Models\pengeluaran;
use App\Models\berita;
use App\Models\beritavideo;
use App\Models\iuran_member;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */

     public function berita()
     {
         //
         $berita = Berita::get();
         return view('user.berita',[
             'berita' => $berita ,
         ]);
     }
     public function beritavideo()
     {
         //
         $berita = beritavideo::get();
         return view('user.beritavideo',[
             'berita' => $berita ,
         ]);
     }
     
     public function beritavideodetail(beritavideo $berita)
     {
         //
         $berita = beritavideo::get();
         return view('user.beritavideoview',[
             'berita' => $berita ,
         ]);
     }

    public function index(Request $req)
    {
        $ss = permission("AdminAkses");
        $pa = permission("pelaksanaAkses");
        if($ss){
            $bulan = date("m");
            $tahun = date("Y");
            if($req->get("bulan")){
            $bulan = $req->get("bulan");
            }
            if($req->get("tahun")){
            $tahun = $req->get("tahun");
            }
            $iuran = iuran_member::join("iurans" , "iurans.iuranCode" , "iuran_members.iuranCode")->where("bulan" , $bulan )->where("tahun" , $tahun)->sum("total");
            $member = iuran_member::join("iurans" , "iurans.iuranCode" , "iuran_members.iuranCode")->where("bulan" , $bulan )->where("tahun" , $tahun)->get();
            $JPTMADYA = Member::join("iuran_members" , "members.memberCode" , "iuran_members.memberCode")->join("iurans" , "iurans.iuranCode" , "iuran_members.iuranCode")->where("bulan" , $bulan )->where("tahun" , $tahun)->where("jabatan_jabatanCode" , 2)->count();
            $JPTPRATAMA = Member::join("iuran_members" , "members.memberCode" , "iuran_members.memberCode")->join("iurans" , "iurans.iuranCode" , "iuran_members.iuranCode")->where("bulan" , $bulan )->where("tahun" , $tahun)->where("jabatan_jabatanCode" , 3)->count();
            $ADMINISTRATOR = Member::join("iuran_members" , "members.memberCode" , "iuran_members.memberCode")->join("iurans" , "iurans.iuranCode" , "iuran_members.iuranCode")->where("bulan" , $bulan )->where("tahun" , $tahun)->where("jabatan_jabatanCode" , 4)->count();
            $PENGAWAS = Member::join("iuran_members" , "members.memberCode" , "iuran_members.memberCode")->join("iurans" , "iurans.iuranCode" , "iuran_members.iuranCode")->where("bulan" , $bulan )->where("tahun" , $tahun)->where("jabatan_jabatanCode" , 5)->count();
            $Pelaksana = Member::join("iuran_members" , "members.memberCode" , "iuran_members.memberCode")->join("iurans" , "iurans.iuranCode" , "iuran_members.iuranCode")->where("bulan" , $bulan )->where("tahun" , $tahun)->where("jabatan_jabatanCode" , 6)->count();
            $memberall = Member::join("iuran_members" , "members.memberCode" , "iuran_members.memberCode")->join("iurans" , "iurans.iuranCode" , "iuran_members.iuranCode")->where("bulan" , $bulan )->where("tahun" , $tahun)->count();
            $keluar =  Pengeluaran::whereYear('created_at', '=', $tahun)
            ->whereMonth('created_at', '=', $bulan)->sum("total");
            $kategori = member_kat::get();
            return view('admin.dashboard' , [
                "JPTMADYA" => $JPTMADYA,
                "JPTPRATAMA" => $JPTPRATAMA,
                "ADMINISTRATOR" => $ADMINISTRATOR,
                "PENGAWAS" => $PENGAWAS,
                "Pelaksana" => $Pelaksana,
                "memberall" => $memberall,
                "iuran" => $iuran,
                "bulan" => $bulan,
                "tahun" => $tahun,
                "member" => $member,
                "pengeluaran" => $keluar,
                "kategori" => $kategori
            ]);
        }elseif($pa){
            $member = Member::where("user_id" ,Auth::user()->id )->first();
           
            return view('admin.pelaksana' , ["member" => $member]);
        }else{
            $member = Member::where("user_id" ,Auth::user()->id )->first();
            return view('admin.homeuser' , ["member" => $member]);
        };
    }
}
