@extends('layouts.admin')

@section('content')
            <div class="row">
              <div class="col-12">
                <div class="card">
                  <div class="card-header">
                    <h4>Tambah {{Route::current()->getName()}} </h4>
                  </div>
                  <div class="card-body">
                    <form method="post" action="{{ route('role.store') }}">
                        
                        @csrf
                        <div class="form-group row mb-4">
                        <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Role Name</label>
                        <div class="col-sm-12 col-md-7">
                        <input type="text" class="form-control @error('RoleName') is-invalid @enderror" name="RoleName" value="{{ old('RoleName') }}">
                            @if ($errors->has('RoleName'))
                                <span class="text-danger">{{ $errors->first('RoleName') }}</span>
                            @endif
                        </div>
                        </div>
                        
                        <div class="form-group row mb-4">
                        <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Role Desc</label>
                        <div class="col-sm-12 col-md-7">
                            <input type="text" class="form-control @error('RoleDesc') is-invalid @enderror"  name="RoleDesc" value="{{ old('RoleDesc') }}">
                            @if ($errors->has('RoleDesc'))
                                <span class="text-danger">{{ $errors->first('RoleDesc') }}</span>
                            @endif
                        </div>
                        </div>
                    
                    
                        <div class="form-group row mb-4">
                        <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3"></label>
                        <div class="col-sm-12 col-md-7">
                            <button class="btn btn-primary">Publish</button>
                        </div>
                        </div>
                    </form>
                  </div>
                </div>
              </div>
            </div>
@endsection