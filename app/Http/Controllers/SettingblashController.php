<?php

namespace App\Http\Controllers;

use App\Models\Settingblash;
use App\Http\Requests\StoreSettingblashRequest;
use App\Http\Requests\UpdateSettingblashRequest;
use Illuminate\View\View;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;

class SettingblashController extends Controller
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
            $query = Settingblash::query();
            $columns = ['jabatanName', 'jabatanDesc'];
            foreach($columns as $column){
                $query->orWhere($column, 'LIKE', '%' . $cari . '%');
            }
            $tables = $query->paginate(10);
        }else{
            $tables = Settingblash::paginate(10);
        }
        $title = 'Hapus Role!';
        $text = "Apakah anda yakin ingin menghapus?";
        confirmDelete($title, $text);
        return view('settingblash.view', ['table' => $tables]);
    

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
      
        //    
        return view('settingblash.tambah');
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreSettingblashRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreSettingblashRequest $request)
    {
        //
        Settingblash::create($request->all());
        return redirect()->route('settingblash.index')->withSuccess("berhasil di tambah");

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Settingblash  $settingblash
     * @return \Illuminate\Http\Response
     */
    public function show(Settingblash $settingblash)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Settingblash  $settingblash
     * @return \Illuminate\Http\Response
     */
    public function edit(Settingblash $settingblash)
    {
        //
        return view('settingblash.edit', [
            'single' => $settingblash
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateSettingblashRequest  $request
     * @param  \App\Models\Settingblash  $settingblash
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateSettingblashRequest $request, Settingblash $settingblash)
    {
        //
        $settingblash->update($request->all());
        return redirect()->back()
        ->withSuccess('Product is updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Settingblash  $settingblash
     * @return \Illuminate\Http\Response
     */
    public function destroy(Settingblash $settingblash)
    {
        //
         $settingblash->delete();
         return redirect()->back()
                 ->withSuccess('Berhasil Dihapus');
    }
}
