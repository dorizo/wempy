@extends('layouts.admin')

@section('content')

            <div class="row">
              <div class="col-12">
                <div class="card">
                  <div class="card-header">
                    <h4>Tambah {{Route::current()->getName()}} </h4>
                  </div>
                  <div class="card-body">
                    <div class="hero bg-primary text-white">
                        <div class="hero-inner">
                            <h2> {{$single->RoleName}}</h2>
                            <p class="lead"> {{$single->RoleDesc}}</p>
                        </div>
                    </div>
                    <div class="card">
                    <div class="card-header">
                        <h4>Tambah Permission Pada Role </h4>
                    </div>
                  <div class="card-body">
                        <form method="post" action="{{ route('permissionrole.store') }}">
                            @csrf
                            <input type="hidden" value="{{$single->RoleCode}}" name="role_RoleCode" />
                            <div class="form-group row mb-4">
                                <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Role Name</label>
                                <div class="col-sm-12 col-md-12">
                                <select name="permission_permissionCode" class="form-control">
                                    @foreach($permission as $p)
                                    <option value="{{$p->permissionCode}}">{{$p->permissionNama}}( {{$p->permissionDesc}} )</option>
                                    @endforeach
                                </select>
                                </div>
                            </div>
                            <div class="form-group row mb-4">
                                <div class="col-sm-12 col-md-7">
                                    <button class="btn btn-primary">Tambah Permission</button>
                                </div>
                            </div>
                        </form>
                        <hr /><br />
                        @foreach($permissionrole as $pr)
                        <div class="alert alert-primary ">
                            {{$pr->permission->permissionNama}} (
                            {{$pr->permission->permissionDesc}})
                            <hr />
                            <a href="{{ route('permissionrole.destroy', $pr->id) }}" class="btn btn-danger" data-confirm-delete="true"><i class="fa fa-trash"></i> Delete</a>
                          </div>
                        @endforeach
                    </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
@endsection