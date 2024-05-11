@extends('layouts.admin')

@section('content')
<style>
  .modal-backdrop.show{
    z-index: 0;
    }
</style>

            <div class="row">
              <div class="col-12">
                <div class="card">
                    <div class="card-header">
                      <h4>Tambah {{Route::current()->getName()}} </h4>
                    </div>
                    <div class="card-body">
                      <div class="hero bg-primary text-white">
                          <div class="hero-inner">
                            <div class="row">
                              <div class="col-7">
                                <h2>Code Master Iuran : {{$single->iuranCode}}</h2>
                                <h3 class="lead"> {{$single->iuranDesc}}</h3>
                                <h3 class="lead"> {{$single->bulan.' - '.$single->tahun}}</h3>
                              </div>
                              
                              <div class="col-5">
                                <form>
                                  <div class="input-group">
                                    <select class="form-control" name="cari" placeholder="Search">
                                      <option value="">pilih</option>
                                      <option value="Lunas" @if($cari=="Lunas") selected @endif >Lunas</option>
                                      <option value="BelumLunas" @if($cari=="BelumLunas") selected @endif >Belum Lunas</option>
                                    </select>
                                  </div>
                                  <hr/>
                                  <div class="input-group">
                                      <button class="btn btn-primary"><i class="fas fa-search"></i>Cari</button>
                                    </div>
                                </form>
                                
                              </div>
                            </div>
                          </div>
                      </div>
                  </div>
                  <table class="table table-striped table-md">
                        <tr>
                          <th>Name</th>
                          <th>Status</th>
                          <th>Iuran</th>
                          <th colspan=3;  width="10%">Action</th>
                        </tr>
                          @foreach($member as $p)
                        <tr>
                          <td>{{$p->nomorinduk}}</td>
                          <td>{{$p->nama_lengkap}}</td>
                          <td><div class="font-monospace">@rupiah($p->jabatan->iuran)</div></td>
                          @if(DB::table('iuran_members')->where('iuranCode',$single->iuranCode)->where('memberCode',$p->memberCode)->count() == 1)
                          <td>
                            <div  class="badge badge-success">
                              <i class="fa fa-check"></i> LUNAS
                            </div>
                          </td>
                          @else
                          <td>
                            <button type="button" data-id="{{ $p }}" class="btn btn-danger open-code" data-bs-toggle="modal" data-bs-target="#exampleModal">
                              <i class="fa fa-book"></i> bayar
                            </button>
                          </td>
                          @endif

                          
                          
                          
                        </tr>
                          @endforeach

                      </table>

                      

                      <!-- Modal -->
                      <!-- <div class="modal fade" data-backdrop="false" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true"> -->
                      <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" data-backdrop="false">
                         <div class="modal-dialog">
                          <div class="modal-content">
                            <form method="post" action="{{ route('iuran.bayar') }}">
                            @csrf
                              <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                              </div>
                              <div class="modal-body">
                                  <div class="mb-3">
                                    <label for="exampleInputEmail1" class="form-label">Apakah anda yakin ingin membayara iuran di user <span id="nama_lengkap"></span></label>
                                    <input type="hidden" name="iuranCode" value="{{$single->iuranCode}}" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                                    <input type="hidden" name="creator" value="{{Auth::user()->email}}" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                                    <input type="hidden" id="total"  name="total"  class="form-control" >
                                    <input type="hidden" id="memberCode"  name="memberCode"  class="form-control" >

                                  </div>
                              </div>
                              <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                <button type="submit" class="btn btn-primary">Bayar Sekarang</button>
                              </div>
                            </form>
                          </div>
                        </div>
                      </div>
              </div>
            </div>
            
@endsection