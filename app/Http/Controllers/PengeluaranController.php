<?php

namespace App\Http\Controllers;

use App\Models\pengeluaran;
use App\Http\Requests\StorepengeluaranRequest;
use App\Http\Requests\UpdatepengeluaranRequest;
use Illuminate\View\View;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;

class PengeluaranController extends Controller
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
            $query = pengeluaran::query();
            $columns = ['jabatanName', 'jabatanDesc'];
            foreach($columns as $column){
                $query->orWhere($column, 'LIKE', '%' . $cari . '%');
            }
            $tables = $query->paginate(10);
        }else{
            $tables = pengeluaran::paginate(10);
        }
        $title = 'Hapus Role!';
        $text = "Apakah anda yakin ingin menghapus?";
        confirmDelete($title, $text);
        return view('pengeluaran.view', ['table' => $tables]);
    

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pengeluaran.tambah');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StorepengeluaranRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StorepengeluaranRequest $request) : RedirectResponse
    {
        //
        pengeluaran::create($request->all());
        return redirect()->route('pengeluaran.index')->withSuccess("pengeluaran baru berhasil di tambah");
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\pengeluaran  $pengeluaran
     * @return \Illuminate\Http\Response
     */
    public function show(pengeluaran $pengeluaran)
    {
        
        //
        return view('pengeluaran.show' , ["single" => $pengeluaran]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\pengeluaran  $pengeluaran
     * @return \Illuminate\Http\Response
     */
    public function edit(pengeluaran $pengeluaran)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdatepengeluaranRequest  $request
     * @param  \App\Models\pengeluaran  $pengeluaran
     * @return \Illuminate\Http\Response
     */
    public function update(UpdatepengeluaranRequest $request, pengeluaran $pengeluaran)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\pengeluaran  $pengeluaran
     * @return \Illuminate\Http\Response
     */
    public function destroy(pengeluaran $pengeluaran)
    {
        //
        $pengeluaran->delete();
        return redirect()->back()
                ->withSuccess('Berhasil Dihapus');
    }
}
