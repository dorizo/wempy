@extends('layouts.admin')

@section('content')

            <div class="row">
              <div class="col-12">
                <div class="card">
                  <div class="card-header">
                    <h4>Tambah {{Route::current()->getName()}} </h4>
                  </div>
                  <div class="card-body">
                    <form method="post" action="{{ route('jabatan.update' , $single->jabatanCode) }}">
                        @csrf
                        @method("PUT")
                         
                        @csrf
                        <div class="form-group row mb-4">
                        <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Jabtan Name</label>
                        <div class="col-sm-12 col-md-7">
                        <input type="text" class="form-control @error('jabatanName') is-invalid @enderror" name="jabatanName" value="{{ $single->jabatanName }}">
                            @if ($errors->has('jabatanName'))
                                <span class="text-danger">{{ $errors->first('jabatanName') }}</span>
                            @endif
                        </div>
                        </div>
                        
                        <div class="form-group row mb-4">
                        <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Jabatan Desc</label>
                        <div class="col-sm-12 col-md-7">
                            <input type="text" class="form-control @error('jabatanDesc') is-invalid @enderror"  name="jabatanDesc" value="{{ $single->jabatanDesc }}">
                            @if ($errors->has('jabatanDesc'))
                                <span class="text-danger">{{ $errors->first('jabatanDesc') }}</span>
                            @endif
                        </div>
                        </div>
                        
                        <div class="form-group row mb-4">
                        <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">IURAN</label>
                        <div class="col-sm-12 col-md-7">
                            <input type="number" class="form-control @error('iuran') is-invalid @enderror"  name="iuran" value="{{ $single->iuran }}">
                            @if ($errors->has('iuran'))
                                <span class="text-danger">{{ $errors->first('iuran') }}</span>
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