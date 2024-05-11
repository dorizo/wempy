<?php

namespace App\Http\Controllers;

use App\Models\beritavideo;
use App\Models\beritakat;
use App\Http\Requests\StoreberitavideoRequest;
use App\Http\Requests\UpdateberitavideoRequest;
use Illuminate\View\View;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Str;

class BeritavideoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function  index(Request $request)
    {
        //
        $cari = $request->cari;
        if(!empty($cari)){
            $query = beritavideo::query();
            $columns = ['jabatanName', 'jabatanDesc'];
            foreach($columns as $column){
                $query->orWhere($column, 'LIKE', '%' . $cari . '%');
            }
            $tables = $query->paginate(10);
        }else{
            $tables = beritavideo::paginate(10);
        }
        $title = 'Hapus Role!';
        $text = "Apakah anda yakin ingin menghapus?";
        confirmDelete($title, $text);
        return view('beritavideo.view', ['table' => $tables]);
    
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
           //
           $beritakat= beritakat::get();
           return view('beritavideo.tambah',[
               'beritakat' =>$beritakat
           ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreberitavideoRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreberitavideoRequest $request)
    {
        //
        $request->request->add(['slug' => Str::slug( $request->get("judul"))]);
        beritavideo::create($request->all());
        return redirect()->route('beritavideo.index')->withSuccess("jabatan baru berhasil di tambah");
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\beritavideo  $beritavideo
     * @return \Illuminate\Http\Response
     */
    public function show(beritavideo $beritavideo)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\beritavideo  $beritavideo
     * @return \Illuminate\Http\Response
     */
    public function edit(beritavideo $beritavideo)
    {
        //
        $beritakat= beritakat::get();
        return view('beritavideo.edit',[
            'single' => $beritavideo ,
            'beritakat' =>$beritakat
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateberitavideoRequest  $request
     * @param  \App\Models\beritavideo  $beritavideo
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateberitavideoRequest $request, beritavideo $beritavideo)
    {
        //
        
        $beritavideo->update($request->all());
        return redirect()->back()
        ->withSuccess('Product is updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\beritavideo  $beritavideo
     * @return \Illuminate\Http\Response
     */
    public function destroy(beritavideo $beritavideo)
    {
        //
    }
}
