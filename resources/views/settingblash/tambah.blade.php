@extends('layouts.admin')

@section('content')
            <div class="row">
              <div class="col-12">
                <div class="card">
                  <div class="card-header">
                    <h4>Tambah {{Route::current()->getName()}} </h4>
                  </div>
                  <div class="card-body">
                    <form method="post" action="{{ route('settingblash.store') }}">
                        
                        @csrf
                        <div class="form-group row mb-4">
                        <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">phone</label>
                        <div class="col-sm-12 col-md-7">
                        <input type="text" class="form-control @error('phone') is-invalid @enderror" name="phone" value="{{ old('phone') }}">
                            @if ($errors->has('phone'))
                                <span class="text-danger">{{ $errors->first('phone') }}</span>
                            @endif
                        </div>
                        </div>
                        
                        <div class="form-group row mb-4">
                        <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">apikey</label>
                        <div class="col-sm-12 col-md-7">
                            <input type="text" class="form-control @error('apikey') is-invalid @enderror"  name="apikey" value="{{ old('apikey') }}">
                            @if ($errors->has('apikey'))
                                <span class="text-danger">{{ $errors->first('apikey') }}</span>
                            @endif
                        </div>
                        </div>
                        
                        <!-- <div class="form-group row mb-4">
                        <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">IURAN</label>
                        <div class="col-sm-12 col-md-7">
                            <input type="number" class="form-control @error('iuran') is-invalid @enderror"  name="iuran" value="{{ old('iuran') }}">
                            @if ($errors->has('iuran'))
                                <span class="text-danger">{{ $errors->first('iuran') }}</span>
                            @endif
                        </div>
                        </div> -->
                    
                    
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