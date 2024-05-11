@extends('layouts.admin')

@section('content')

            <div class="row">
              <div class="col-12">
                <div class="card">
                  <div class="card-header">
                    <h4>Tambah {{Route::current()->getName()}} </h4>
                  </div>
                  <div class="card-body">
                    <form method="post" action="{{ route('permission.update' , $Permission->permissionCode) }}">
                        @csrf
                        @method("PUT")
                        <div class="form-group row mb-4">
                        <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Permision Code</label>
                        <div class="col-sm-12 col-md-7">
                        <input type="hidden"  name="permissionCode" value="{{ $Permission->permissionCode }}">
                        <input type="text" class="form-control @error('permissionNama') is-invalid @enderror" name="permissionNama" value="{{ $Permission->permissionNama }}">
                            @if ($errors->has('permissionNama'))
                                <span class="text-danger">{{ $errors->first('permissionNama') }}</span>
                            @endif
                        </div>
                        </div>
                        
                        <div class="form-group row mb-4">
                        <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Permision Desc</label>
                        <div class="col-sm-12 col-md-7">
                            <input type="text" class="form-control @error('permissionDesc') is-invalid @enderror"  name="permissionDesc" value="{{ $Permission->permissionDesc }}">
                            @if ($errors->has('permissionDesc'))
                                <span class="text-danger">{{ $errors->first('permissionDesc') }}</span>
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