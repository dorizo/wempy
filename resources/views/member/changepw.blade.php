@extends('layouts.admin')

@section('content')
            <div class="row">
              <div class="col-12">
                <div class="card">
                  <div class="card-header">
                    <h4>Tambah {{Route::current()->getName()}} </h4>
                  </div>
                  <div class="card-body">
                    <form method="post" action="{{ route('member.changepwput') }}">
                        
                        @csrf
                        <div class="form-group row mb-4">
                        <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">RubahPassword</label>
                        <div class="col-sm-12 col-md-7">
                        <input type="hidden" name="user_id" value="{{ $single->user_id}}" readonly>
                        <input type="text" class="form-control @error('nomorinduk') is-invalid @enderror" name="password">
                            @if ($errors->has('nomorinduk'))
                                <span class="text-danger">{{ $errors->first('nomorinduk') }}</span>
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