@extends('layouts.admin')

@section('content')

            <div class="row">
              <div class="col-12">
                <div class="card">
                  <div class="card-header">
                    <h4>Tambah {{Route::current()->getName()}} </h4>
                  </div>
                  <div class="card-body">
                    <form method="post" action="{{ route('beritavideo.update' , $single->beritavideoCode) }}"  enctype="multipart/form-data">
                        @csrf
                        @method("PUT")
                         
                        <div class="form-group row mb-4">
                        <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Judul</label>
                        <div class="col-sm-12 col-md-7">
                        <input type="text" class="form-control @error('judul') is-invalid @enderror" name="judul" value="{{ $single->judul }}">
                            @if ($errors->has('judul'))
                                <span class="text-danger">{{ $errors->first('judul') }}</span>
                            @endif
                            <input type="hidden" class="form-control @error('judul') is-invalid @enderror" name="creator" value="{{ Auth::user()->email }}">
                        
                        </div>
                        </div>
                        
                        <div class="form-group row mb-4">
                        <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Publish</label>
                        <div class="col-sm-12 col-md-7">
                            <select class="form-control" name="publish">
                              <option value="">Pilih</option>
                              <option value="1" @if( $single->publish == 1 ) selected @endif >Publish</option>
                              <option value="2" @if($single->publish == 2 ) selected @endif >tidah</option>
                            
                            </select>
                            @if ($errors->has('publish'))
                                <span class="text-danger">{{ $errors->first('publish') }}</span>
                            @endif
                        </div>
                        </div>
                        
                        <div class="form-group row mb-4">
                        <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Kategori</label>
                        <div class="col-sm-12 col-md-7">
                            <select class="form-control" name="beritakatCode">
                              <option value="">Pilih</option>
                              @foreach($beritakat as $jb)
                              <option value="{{$jb->beritakatCode}}" @if($single->beritakatCode == $jb->beritakatCode) selected @endif   >{{$jb->beritakatName}} </option>
                              @endforeach
                            </select>
                            @if ($errors->has('beritakatCode'))
                                <span class="text-danger">{{ $errors->first('beritakatCode') }}</span>
                            @endif
                        </div>
                        </div>
                        
                        <div class="form-group row mb-4">
                        <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Link Video</label>
                        <div class="col-sm-12 col-md-7">
                     
                        <input type="text" class="form-control @error('link') is-invalid @enderror" name="link" value="{{ $single->link }}">
                            @if ($errors->has('link'))
                                <span class="text-danger">{{ $errors->first('link') }}</span>
                            @endif
                     
                        </div>
                        </div>
                        
                        <div class="form-group row mb-4">
                        <div class="col-sm-12 col-md-12">
                            <textarea class="form-control @error('isi') is-invalid @enderror ckeditor" name="isi" >{{$single->isi }}</textarea>
                            @if ($errors->has('isi'))
                                <span class="text-danger">{{ $errors->first('isi') }}</span>
                            @endif
                        </div>

                        <div class="form-group row mb-4 pt-5">
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