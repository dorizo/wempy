<?php

namespace App\Http\Controllers;

use App\Models\whatsapp;
use App\Models\whatsapp_detail;
use App\Http\Requests\StorewhatsappRequest;
use App\Http\Requests\UpdatewhatsappRequest;

use Illuminate\View\View;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
class WhatsappController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public  function index(Request $request )
    {
        //
        $cari = $request->cari;
        if(!empty($cari)){
            $query = whatsapp::query();
            $columns = ['jabatanName', 'jabatanDesc'];
            foreach($columns as $column){
                $query->orWhere($column, 'LIKE', '%' . $cari . '%');
            }
            $tables = $query->paginate(10);
        }else{
            $tables = whatsapp::paginate(10);
        }
        $title = 'Hapus Role!';
        $text = "Apakah anda yakin ingin menghapus?";
        confirmDelete($title, $text);
        return view('whatsapp.view', ['table' => $tables]);
    

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        ////
        
        return view('whatsapp.tambah');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StorewhatsappRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StorewhatsappRequest $request): RedirectResponse
    {
        //
        
        $fileName = time().'_'.$request->file("gambar")->getClientOriginalName();
        $filePath = $request->file('gambar')->storeAs('uploads', $fileName, 'public');
        $name = time().'_'.$request->file("gambar")->getClientOriginalName();
        
        $param = array();
        if($request->file("gambar")){
        $param["whatsappName"] = $request->get("whatsappName");
        $param["WhatsappDesc"] = $request->get("WhatsappDesc");
        $param["type"] = $request->get("type");
        $param["gambar"] = $fileName;
        }else{
            echo "kosong";
        };
        whatsapp::create($param);
        
        return redirect()->route('whatsapp.index')->withSuccess("jabatan baru berhasil di tambah");

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\whatsapp  $whatsapp
     * @return \Illuminate\Http\Response
     */
    public function show(whatsapp $whatsapp,Request $request )
    {
        //
        return view("whatsapp.show",[
            "single"=>$whatsapp,
            "run" =>$request->run
        ]);
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\whatsapp  $whatsapp
     * @return \Illuminate\Http\Response
     */
    public function edit(whatsapp $whatsapp)
    {
        //
        return view('whatsapp.edit', [
            'single' => $whatsapp
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdatewhatsappRequest  $request
     * @param  \App\Models\whatsapp  $whatsapp
     * @return \Illuminate\Http\Response
     */
    public function update(UpdatewhatsappRequest $request, whatsapp $whatsapp)
    {
        //
        $whatsapp->update($request->all());
        return redirect()->back()
        ->withSuccess('Product is updated successfully.');
    }

   

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\whatsapp  $whatsapp
     * @return \Illuminate\Http\Response
     */
    public function destroy(whatsapp $whatsapp)
    {
        
        $whatsapp->delete();
        return redirect()->back()
                ->withSuccess('Berhasil Dihapus');
        //
    }
    public function submitdetail(Request  $request){
            // print_r($request->all());
            whatsapp_detail::create($request->all());
    }
}
