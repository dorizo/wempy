<?php

namespace App\Http\Controllers\Master;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Permission;
use Illuminate\Http\RedirectResponse;
class PermissionController extends Controller
{
    //
    public function index(Request $request )
    {
        $cari = $request->cari;
        if(!empty($cari)){
            $query = Permission::query();
            $columns = ['permissionNama', 'PermissionDesc'];
            foreach($columns as $column){
                $query->orWhere($column, 'LIKE', '%' . $cari . '%');
            }
            $tables = $query->paginate(10);
        }else{
            $tables = Permission::paginate(10);
        }
        $title = 'Delete User!';
        $text = "Are you sure you want to delete?";
        confirmDelete($title, $text);
        return view('master.permission', ['table' => $tables]);
    }
    public function add(){
        
        return view('master.permissioncreate');
    }
    public function store(Request $request) : RedirectResponse
    {
        // print_r($request->all());
        $validated = $request->validate([
            'permissionNama' => ['required', 'unique:permissions,permissionNama', 'max:255'],
            'permissionDesc' => ['required'],
        ]);
        Permission::create($request->all());
        return redirect()->route('permission.index')
                ->withSuccess('New product is added successfully.');
    }
    public function update(Request $request ,$id) : RedirectResponse
    {
        $q = Permission::find($id);
        $validated = $request->validate([
            'permissionNama' => ['required','max:255'],
            'permissionDesc' => ['required'],
        ]);;
        $q->update($request->all());
        return redirect()->route('permission.index')
                ->withSuccess('New product is added successfully.');
    }
    public function destroy($id) : RedirectResponse
    {
        $result = Permission::where('permissionCode', $id)->delete();
        return redirect()->route('permission.index')
                ->withSuccess('Product is deleted successfully.');
    }
    public function edit($Permission){
        $Permissiondata = Permission::where("permissionCode" ,$Permission )->first();
        return view('master.permissionedit', [
            'Permission' => $Permissiondata
        ]);
    }
}
