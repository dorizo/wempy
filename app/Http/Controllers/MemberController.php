<?php

namespace App\Http\Controllers;

use App\Models\Member;
use App\Models\Jabatan;
use App\Models\User;
use App\Models\member_kat;
use App\models\whatsapp_detail;
use App\Models\Master\user_role;
use App\Models\Maseter\Role;
use App\Http\Requests\StoreMemberRequest;
use App\Http\Requests\UpdateMemberRequest;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Password;
use Illuminate\View\View;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use DB;

class MemberController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request )
    {
        //
        $cari = $request->cari;
        if(!empty($cari)){
            $query = Member::query();
            $columns = ['nama_lengkap', 'memberkatName'];
            $query->JOIN("member_kats","member_kats.id_member_kats","members.id_member_kats");
            foreach($columns as $column){
                $query->orWhere($column, 'LIKE', '%' . $cari . '%');
            }
            $tables = $query->paginate(10);
        }else{
            $tables = Member::paginate(10);
        }
        $title = 'Hapus Role!';
        $text = "Apakah anda yakin ingin menghapus?";
        confirmDelete($title, $text);
        return view('member.view', ['table' => $tables]);
    

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $member_kat = member_kat::get();
        $jabatan = Jabatan::get();
        $role = role::get();
        
        return view('member.tambah',[ 
            'jabatan' => $jabatan,
            'role' => $role,
            'kategori' => $member_kat
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreMemberRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreMemberRequest $request)
    {
        DB::transaction(function () use ($request) {
             $user = user::insertGetId([
                "name" => $request["nama_lengkap"],
                "email" => $request["email"],
                "password" => Hash::make($request["password"])
            ]);
            $members = member::insertGetId([
                "nomorinduk" => $request["nomorinduk"],
                "telp" => $request["telp"],
                "email" => $request["email"],
                "nama_lengkap" => $request["nama_lengkap"],
                "jabatan_jabatanCode" => $request["jabatan_jabatanCode"],
                "user_id" => $user,
                "id_member_kats" => $request["id_member_kats"],
                
            ]);
            $userrole = user_role::create([
                "user_id" => $user,
                "role_roleCode" => $request["role_roleCode"],
            ]);


        });
        
        return redirect()->route('member.index')->withSuccess("Member baru berhasil di tambah");
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Member  $member
     * @return \Illuminate\Http\Response
     */
    public function show(Member $member)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Member  $member
     * @return \Illuminate\Http\Response
     */
    public function edit(Member $member)
    {
        
        $jabatan = Jabatan::get();
        $role = role::get();
        return view('member.edit', [
            'single' => $member,
            'jabatan' => $jabatan,
            'role' => $role
        ]);
        //
    }
    public function change(Member $member)
    {
        
       
        return view('member.changepw', [
            'single' => $member,
           
        ]);
        //
    }
    public function changepw(Request $request)
    {
        User::where('id', $request["user_id"])
       ->update([
           'password' =>  Hash::make($request["password"])
        ]);
        
        
        return redirect()->route('member.index')->withSuccess("Password Berhasil dirubah");

    }
    

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateMemberRequest  $request
     * @param  \App\Models\Member  $member
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateMemberRequest $request, Member $member)
    {
        DB::transaction(function () use ($request , $member) {
           $mmmm =  $member->update($request->all());
           $userrole = user_role::where("user_id", $request["user_id"])->update([
            "user_id" => $request["user_id"],
            "role_roleCode" => $request["role_roleCode"],
        ]);
        });
        //
      
        return redirect()->back()
        ->withSuccess('Product is updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Member  $member
     * @return \Illuminate\Http\Response
     */
    public function destroy(Member $member)
    {
        //
    }
    public function listdata($id){
        // $member = member::addSelect([
        //     // Key is the alias, value is the sub-select
        //     'lastPost' => whatsapp_detail::query()
        //          ->select("whatsappdetailstatus")
        //          ->where("whatsapp_details.memberCode" , "members.memberCode")
        //         ->take(1)
        // ])->get();
        $member =DB::select("select * from (select `members`.*, (select `whatsappdetailstatus` from `whatsapp_details` where `whatsapp_details`.`memberCode` = members.memberCode AND whatsappCode=$id order by `created_at` desc limit 1) as `status` from `members` left join `whatsapp_details` on `whatsapp_details`.`memberCode` = `members`.`memberCode`) a where status IS NULL ");
        
        return response()->json($member);

    }
    public function runwa($id){
        $member =DB::select("select * from (select `members`.*, (select `whatsappdetailstatus` from `whatsapp_details` where `whatsapp_details`.`memberCode` = members.memberCode AND whatsappCode=$id order by `created_at` desc limit 1) as `status` , (select `whatsappdetailCode` from `whatsapp_details` where `whatsapp_details`.`memberCode` = members.memberCode AND whatsappCode=$id order by `created_at` desc limit 1) as `whatsappdetailCode` from `members` left join `whatsapp_details` on `whatsapp_details`.`memberCode` = `members`.`memberCode` GROUP by telp) a where status IS NOT NULL ");
        
        return response()->json($member);

    }
    
}
