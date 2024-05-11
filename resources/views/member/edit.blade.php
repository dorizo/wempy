@extends('layouts.admin')

@section('content')
            <div class="row">
              <div class="col-12">
                <div class="card">
                  <div class="card-header">
                    <h4>Tambah {{Route::current()->getName()}} </h4>
                  </div>
                  <div class="card-body">
                    <form method="post" action="{{ route('member.update' , $single->memberCode) }}">
                        
                        @csrf
                        @method("PUT")
                        <div class="form-group row mb-4">
                        <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Kode Member</label>
                        <div class="col-sm-12 col-md-7">
                        <input type="text" class="form-control @error('nomorinduk') is-invalid @enderror" name="nomorinduk" value="{{ $single->nomorinduk}}" readonly>
                            @if ($errors->has('nomorinduk'))
                                <span class="text-danger">{{ $errors->first('nomorinduk') }}</span>
                            @endif
                        </div>
                        </div>
                        
                        <div class="form-group row mb-4">
                        <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Nomor Handphone</label>
                        <div class="col-sm-12 col-md-7">
                        <input type="hidden"  name="user_id" value="{{ $single->user_id }}" readonly>
                       
                        <input type="text" class="form-control @error('telp') is-invalid @enderror" name="telp" value="{{ $single->telp }}" readonly>
                            @if ($errors->has('telp'))
                                <span class="text-danger">{{ $errors->first('telp') }}</span>
                            @endif
                        </div>
                        </div>
                        
                        <div class="form-group row mb-4">
                        <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Email</label>
                        <div class="col-sm-12 col-md-7">
                            <input type="email" class="form-control @error('email') is-invalid @enderror"  name="email" value="{{ $single->email }}" readonly>
                            @if ($errors->has('email'))
                                <span class="text-danger">{{ $errors->first('email') }}</span>
                            @endif
                        </div>
                        </div>
                        
                        <div class="form-group row mb-4">
                        <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Nama Lengkap</label>
                        <div class="col-sm-12 col-md-7">
                            <input type="text" class="form-control @error('nama_lengkap') is-invalid @enderror"  name="nama_lengkap" value="{{ $single->nama_lengkap}}">
                            @if ($errors->has('nama_lengkap'))
                                <span class="text-danger">{{ $errors->first('nama_lengkap') }}</span>
                            @endif
                        </div>
                        </div>
                        <div class="form-group row mb-4">
                        <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Jabatan</label>
                        <div class="col-sm-12 col-md-7">
                            <select class="form-control" name="jabatan_jabatanCode">
                              <option>Pilih</option>
                              @foreach($jabatan as $jb)
                              <option value="{{$jb->jabatanCode}}" @if($single->jabatan_jabatanCode == $jb->jabatanCode) selected @endif   >{{$jb->jabatanName}} ( {{$jb->jabatanDesc}} )</option>
                              @endforeach
                            </select>
                            @if ($errors->has('jabatan_jabatanCode'))
                                <span class="text-danger">{{ $errors->first('jabatan_jabatanCode') }}</span>
                            @endif
                        </div>
                        </div>
                        
                        <div class="form-group row mb-4">
                        <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Role</label>
                        <div class="col-sm-12 col-md-7">
                            <select class="form-control" name="role_roleCode">
                              <option>Pilih</option>
                              @foreach($role as $jb)
                              <option value="{{$jb->RoleCode}}" @if($single->userrole->role_roleCode == $jb->RoleCode) selected @endif   >{{$jb->RoleName}} ( {{$jb->RoleDesc}} )</option>
                              @endforeach
                            </select>
                            @if ($errors->has('role_roleCode'))
                                <span class="text-danger">{{ $errors->first('role_roleCode') }}</span>
                            @endif
                        </div>
                        </div>
                        

                        <!-- <div class="form-group row mb-4">
                        <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Jabatan</label>
                        <div class="col-sm-12 col-md-7">
                            <select class="form-control" name="role_roleCode">
                              <option>Pilih</option>
                              @foreach($role as $jb)
                              <option value="{{$jb->RoleCode}}" @if($single->role_roleCode == $jb->RoleCode) selected @endif   >{{$jb->RoleName}} ( {{$jb->RoleDesc}} )</option>
                              @endforeach
                            </select>
                            @if ($errors->has('role_roleCode'))
                                <span class="text-danger">{{ $errors->first('role_roleCode') }}</span>
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