@extends('layouts.admin')

@section('content')

            <div class="row">
              <div class="col-12">
                <div class="card">
                  <div class="card-header">
                    <h4>Tambah {{Route::current()->getName()}} </h4>
                  </div>
                  <div class="card-body">
                    <form method="post" action="{{ route('kategori.update' , $single->id_member_kats) }}">
                        @csrf
                        @method("PUT")
                         
                        <div class="form-group row mb-4">
                        <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Kategori Name</label>
                        <div class="col-sm-12 col-md-7">
                        <input type="text" class="form-control @error('memberkatName') is-invalid @enderror" name="memberkatName" value="{{ $single->memberkatName }}">
                            @if ($errors->has('memberkatName'))
                                <span class="text-danger">{{ $errors->first('memberkatName') }}</span>
                            @endif
                        </div>
                        </div>
                        
                        <div class="form-group row mb-4">
                        <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Kategori Desc</label>
                        <div class="col-sm-12 col-md-7">
                            <input type="text" class="form-control @error('memberkatdesc') is-invalid @enderror"  name="memberkatdesc"  value="{{ $single->memberkatdesc }}">
                            @if ($errors->has('memberkatdesc'))
                                <span class="text-danger">{{ $errors->first('memberkatdesc') }}</span>
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