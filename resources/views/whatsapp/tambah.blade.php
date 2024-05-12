@extends('layouts.admin')

@section('content')
            <div class="row">
              <div class="col-12">
                <div class="card">
                  <div class="card-header">
                    <h4>Tambah {{Route::current()->getName()}} </h4>
                  </div>
                  <div class="card-body">
                    <form method="post" action="{{ route('whatsapp.store') }}" enctype="multipart/form-data">
                        
                        @csrf
                        <div class="form-group row mb-4">
                        <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">type</label>
                        <div class="col-sm-12 col-md-7">
                        <select name="type" name="type" class="form-control" >
                          <option value="text">Text</option>
                          <option value="gambar">Gambar</option>
                          <option value="template">template</option>
                        </select>
                            
                        </div>
                        </div>
                        <div class="form-group row mb-4">
                        <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Whatsapp Name</label>
                        <div class="col-sm-12 col-md-7">
                        <input type="text" class="form-control @error('whatsappName') is-invalid @enderror" name="whatsappName" value="{{ old('whatsappName') }}">
                            @if ($errors->has('whatsappName'))
                                <span class="text-danger">{{ $errors->first('whatsappName') }}</span>
                            @endif
                        </div>
                        </div>
                        
                        <div class="form-group row mb-4">
                        <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">whatsapp text</label>
                        <div class="col-sm-12 col-md-7">
                            <textarea class="form-control @error('WhatsappDesc') is-invalid @enderror"  name="WhatsappDesc">{{ old('WhatsappDesc') }}</textarea>
                            @if ($errors->has('WhatsappDesc'))
                                <span class="text-danger">{{ $errors->first('WhatsappDesc') }}</span>
                            @endif
                        </div>
                        </div>
                        <div class="form-group row mb-4">
                        <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Foto berita</label>
                        <div class="col-sm-12 col-md-7">
                     
                                   <input name="gambar" class="form-control form-control-lg" id="gambar"
                                           type="file">
                                           @if ($errors->has('gambar'))
                                          <span class="text-danger">{{ $errors->first('gambar') }}</span>
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