<?php

namespace App\Http\Controllers\Master;

use App\Http\Controllers\Controller;
use App\Models\Maseter\Role;
use App\Models\Permission;
use App\Models\Master\permission_role;
use Illuminate\View\View;
use Illuminate\Http\Request;
use App\Http\Requests\StoreRoleRequest;
use App\Http\Requests\UpdateRoleRequest;
use App\Http\Requests\permissionroleRequest;

use Illuminate\Http\RedirectResponse;

class RoleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request )
    {
        $cari = $request->cari;
        if(!empty($cari)){
            $query = Role::query();
            $columns = ['RoleName', 'RoleDesc'];
            foreach($columns as $column){
                $query->orWhere($column, 'LIKE', '%' . $cari . '%');
            }
            $tables = $query->paginate(10);
        }else{
            $tables = Role::paginate(10);
        }
        $title = 'Hapus Role!';
        $text = "Apakah anda yakin ingin menghapus?";
        confirmDelete($title, $text);
        return view('master.role.view', ['table' => $tables]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create() : View
    {
        //
        return view('master.role.tambah');
    }

   
    public function store(StoreRoleRequest $request) : RedirectResponse
    {
        Role::create($request->all());
        return redirect()->route('role.index')
                ->withSuccess('New product is added successfully.');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Maseter\Role  $role
     * @return \Illuminate\Http\Response
     */
    public function show(Role $role)
    {  
         $title = 'Hapus Role!';
        $text = "Apakah anda yakin ingin menghapus?";
        confirmDelete($title, $text);
        $permission = Permission::get();
        $permissionrole = permission_role::where("role_RoleCode" , $role["RoleCode"])->get();
        return view('master.role.show', [
            'single' => $role , 
            'permission' => $permission , 
            'permissionrole' => $permissionrole
        ]);

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Maseter\Role  $role
     * @return \Illuminate\Http\Response
     */
    public function edit(Role $role)
    {
        //
        return view('master.role.edit', [
            'single' => $role
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateRoleRequest  $request
     * @param  \App\Models\Maseter\Role  $role
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateRoleRequest $request, Role $role)
    {
        //
        $role->update($request->all());
        return redirect()->back()
        ->withSuccess('Product is updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Maseter\Role  $role
     * @return \Illuminate\Http\Response
     */
    public function destroy(Role $role)
    {
        //]
        $role->delete();
        return redirect()->route('role.index')
                ->withSuccess('Product is deleted successfully.');
    }
    public function permission_role(permissionroleRequest $request) : RedirectResponse
    {
        permission_role::create($request->all());
        return redirect()->back()
                ->withSuccess('New product is added successfully.');

    }
    public function permission_destroy(permission_role $permission_role)
    {
        $permission_role->delete();
        return redirect()->back()
                ->withSuccess('Permission is deleted successfully.');
    }
}
