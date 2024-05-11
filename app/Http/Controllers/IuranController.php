<?php

namespace App\Http\Controllers;

use App\Models\Iuran;
use App\Models\iuran_member;
use App\Models\Member;
use App\Http\Requests\StoreIuranRequest;
use App\Http\Requests\UpdateIuranRequest;
use Illuminate\View\View;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;

class IuranController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        //
        $cari = $request->cari;
        if(!empty($cari)){
            $query = Iuran::query();
            $columns = ['jabatanName', 'jabatanDesc'];
            foreach($columns as $column){
                $query->orWhere($column, 'LIKE', '%' . $cari . '%');
            }
            $tables = $query->paginate(10);
        }else{
            $tables = Iuran::paginate(10);
        }
        
        $title = 'Hapus Role!';
        $text = "Apakah anda yakin ingin menghapus?";
        confirmDelete($title, $text);
        return view('iuran.view', ['table' => $tables]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('iuran.tambah');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreIuranRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreIuranRequest $request)
    {
        //
        Iuran::create($request->all());
        return redirect()->route('iuran.index')->withSuccess("jabatan baru berhasil di tambah");
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Iuran  $iuran
     * @return \Illuminate\Http\Response
     */
    public function show(Iuran $iuran , Request $request)
    {
        //
        $cari = "";
        if($request->cari){
            $cari = $request->cari;
            $memberx = Member::query();
            $memberx->get();
            $member= $memberx->get();
        }else{
            
            $member = Member::get();
        };
        
        return view('iuran.show', [
            'single' => $iuran,
            'member' => $member,
            'cari' => $cari
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Iuran  $iuran
     * @return \Illuminate\Http\Response
     */
    public function edit(Iuran $iuran)
    {
        //
        return view('iuran.edit', [
            'single' => $iuran
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateIuranRequest  $request
     * @param  \App\Models\Iuran  $iuran
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateIuranRequest $request, Iuran $iuran)
    {
        //
        $iuran->update($request->all());
        return redirect()->back()
        ->withSuccess('Product is updated successfully.');
    }
    public function bayar(Request $request)
    {
        print_r($request->all());
        iuran_member::create($request->all());
        return redirect()->back()->withSuccess("Berhasil Membayar Iuran");
        //
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Iuran  $iuran
     * @return \Illuminate\Http\Response
     */
    public function destroy(Iuran $iuran)
    {
        //
        
    }
}
