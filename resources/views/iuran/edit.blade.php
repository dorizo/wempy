@extends('layouts.admin')

@section('content')

            <div class="row">
              <div class="col-12">
                <div class="card">
                  <div class="card-header">
                    <h4>Tambah {{Route::current()->getName()}} </h4>
                  </div>
                  <div class="card-body">
                    <form method="post" action="{{ route('iuran.update' , $single->iuranCode) }}">
                        @csrf
                        @method("PUT")
                         
                        @csrf
                        <div class="form-group row mb-4">
                        <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Iuran Desc</label>
                        <div class="col-sm-12 col-md-7">
                        <input type="text" class="form-control @error('iuranDesc') is-invalid @enderror" name="iuranDesc" value="{{ $single->iuranDesc }}">
                            @if ($errors->has('iuranDesc'))
                                <span class="text-danger">{{ $errors->first('iuranDesc') }}</span>
                            @endif
                        </div>
                        </div>
                        <div class="form-group row mb-4">
                        <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">TAHUN</label>
                        <div class="col-sm-12 col-md-7">
                            <select class="form-control" name="tahun">
                            {{ $last= date('Y')-120 }}
                             {{ $now = date('Y') }}
                             <option value="">Pilih</option>
                              @for ($i = $now; $i >= $last; $i--)
                              <option value="{{ $i }}" @if($single->tahun == $i) selected @endif >{{ $i }}</option>
                              @endfor
                            
                            </select>
                            @if ($errors->has('tahun'))
                                <span class="text-danger">{{ $errors->first('tahun') }}</span>
                            @endif
                        </div>
                        </div>
                        <div class="form-group row mb-4">
                        <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">BULAN</label>
                        <div class="col-sm-12 col-md-7">
                            <select class="form-control" name="bulan">
                              <option value="">Pilih</option>
                              @for ($i = 1; $i <= 12; $i++)
                              <option value="{{ $i }}"  @if($single->bulan == $i) selected @endif >{{ $i }}</option>
                              @endfor
                            </select>
                            @if ($errors->has('bulan'))
                                <span class="text-danger">{{ $errors->first('bulan') }}</span>
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