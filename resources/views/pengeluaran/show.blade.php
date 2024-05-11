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
                           {{$single}}
                        </div>
                    </div>
                    
              </div>
            </div>
@endsection