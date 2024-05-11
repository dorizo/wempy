<?php

namespace App\Http\Controllers;

use App\Models\member_kats;
use App\Http\Requests\Storemember_katsRequest;
use App\Http\Requests\Updatemember_katsRequest;
use Illuminate\View\View;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;

class MemberKatsController extends Controller
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
            $query = member_kats::query();
            $columns = ['jabatanName', 'jabatanDesc'];
            foreach($columns as $column){
                $query->orWhere($column, 'LIKE', '%' . $cari . '%');
            }
            $tables = $query->paginate(10);
        }else{
            $tables = member_kats::paginate(10);
        }
        $title = 'Hapus Role!';
        $text = "Apakah anda yakin ingin menghapus?";
        confirmDelete($title, $text);
        return view('kategori.view', ['table' => $tables]);
    

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //    
        return view('kategori.tambah');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\Storemember_katsRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Storemember_katsRequest $request)
    {
        //
        member_kats::create($request->all());
        return redirect()->route('kategori.index')->withSuccess("kategori baru berhasil di tambah");

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\member_kats  $member_kats
     * @return \Illuminate\Http\Response
     */
    public function show(member_kats $member_kats)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\member_kats  $member_kats
     * @return \Illuminate\Http\Response
     */
    public function edit(member_kats $member_kats)
    {
        //
        //    dd($member_kats);
        //
        return view('kategori.edit', [
            'single' => $member_kats
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\Updatemember_katsRequest  $request
     * @param  \App\Models\member_kats  $member_kats
     * @return \Illuminate\Http\Response
     */
    public function update(Updatemember_katsRequest $request, member_kats $member_kats)
    {
        //
        $member_kats->update($request->all());
        return redirect()->back()
        ->withSuccess('Product is updated successfully.');
    }
    

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\member_kats  $member_kats
     * @return \Illuminate\Http\Response
     */
    public function destroy(member_kats $member_kats)
    {
        //
         //
        //  dd($member_kats);
         $member_kats->delete();
         return redirect()->back()
                 ->withSuccess('Berhasil Dihapus');
    }
}
