<?php

namespace App\Http\Controllers;

use App\Models\berita;
use App\Models\beritakat;
use App\Http\Requests\StoreberitaRequest;
use App\Http\Requests\UpdateberitaRequest;
use Illuminate\View\View;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Str;

class BeritaController extends Controller
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
            $query = Berita::query();
            $columns = ['jabatanName', 'jabatanDesc'];
            foreach($columns as $column){
                $query->orWhere($column, 'LIKE', '%' . $cari . '%');
            }
            $tables = $query->paginate(10);
        }else{
            $tables = Berita::paginate(10);
        }
        $title = 'Hapus Role!';
        $text = "Apakah anda yakin ingin menghapus?";
        confirmDelete($title, $text);
        return view('berita.view', ['table' => $tables]);
    
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $beritakat= beritakat::get();
        return view('berita.tambah',[
            'beritakat' =>$beritakat
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreberitaRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreberitaRequest $request)
    {
        $fileName = time().'_'.$request->file("gambar")->getClientOriginalName();
        $filePath = $request->file('gambar')->storeAs('uploads', $fileName, 'public');
        $name = time().'_'.$request->file("gambar")->getClientOriginalName();
        print_r(Str::slug( $request->get("judul")));
        berita::create([
            "gambar" => $name,
            "judul" => $request->get("judul"),
            "slug"=> Str::slug( $request->get("judul")),
            "isi" => $request->get("isi"),
            "beritakatCode" => $request->get("beritakatCode"),
            "publish" => $request->get("publish"),
            "creator" => $request->get("creator"),
            ]
        );
        return redirect()->route('beritas.index')->withSuccess("jabatan baru berhasil di tambah");
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\berita  $berita
     * @return \Illuminate\Http\Response
     */
    public function show(berita $berita)
    {
        //
        print_r($berita);
    }
    
  


    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\berita  $berita
     * @return \Illuminate\Http\Response
     */
    public function edit(berita $berita)
    {
        //
        
        $beritakat= beritakat::get();
        return view('berita.edit',[
            'single' => $berita ,
            'beritakat' =>$beritakat
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateberitaRequest  $request
     * @param  \App\Models\berita  $berita
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateberitaRequest $request, berita $berita)
    {
        //
        // print_r($request->file("gambar"));
        if($request->file("gambar")){
            $fileName = time().'_'.$request->file("gambar")->getClientOriginalName();
            $filePath = $request->file('gambar')->storeAs('uploads', $fileName, 'public');
            $name = time().'_'.$request->file("gambar")->getClientOriginalName();
        $berita->update([
            "gambar" => $name,
            "judul" => $request->get("judul"),
            "slug"=> Str::slug( $request->get("judul")),
            "isi" => $request->get("isi"),
            "beritakatCode" => $request->get("beritakatCode"),
            "publish" => $request->get("publish"),
            "creator" => $request->get("creator"),
            ]);
        return redirect()->back()
        ->withSuccess('Product is updated successfully.');
        }else{
            
          $berita->update([
            'judul'     => $request->judul,
            'isi'   => $request->isi,
            'publish'   => $request->publish,
            'beritakatCode'   => $request->beritakatCode
          ]);
          return redirect()->back()
          ->withSuccess('Product is updated successfully.');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\berita  $berita
     * @return \Illuminate\Http\Response
     */
    public function destroy(berita $berita)
    {
        //
    }
}
