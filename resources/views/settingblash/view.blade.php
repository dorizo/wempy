@extends('layouts.admin')

@section('content')
<div class="section-header">
            <h1>{{Route::current()->getName()}}</h1>
            <div class="section-header-breadcrumb">
              <div class="breadcrumb-item active"><a href="{{URL::to('/home')}}">Home</a></div>
              <?php $segments = ''; ?>
                @foreach(Request::segments() as $segment)
                    <?php $segments .= '/'.$segment; ?>
                    <div class="breadcrumb-item">
                        <a href="{{ URL::to($segments) }}">{{$segment}}</a>
                    </div>
                @endforeach
            </div>
</div>
<div class="row">
    <div class="col-12 col-md-12 col-lg-12">
                <div class="card">
                  <div class="card-header">
                  <h4>List {{Route::current()->getName()}}</h4>
                  <div class="card-header-form">
                      <form>
                        <div class="input-group">
                          <input type="text" class="form-control" name="cari" placeholder="Search">
                          <div class="input-group-btn">
                            <button class="btn btn-primary"><i class="fas fa-search"></i></button>
                          </div>
                        </div>
                      </form>
                    </div>
                  </div>
                  <div class="card-body p-0">
                    <div class="table-responsive">
                      <table class="table table-striped table-md">
                        <tr>
                          <th>#</th>
                          <th>Name</th>
                          <th>Status</th>
                          <th colspan=3;  width="20%">Action</th>
                        </tr>
                    @foreach($table as $p)
                        <tr>
                          <td>{{$p->blashCode }}</td>
                          <td>{{$p->phone}}</td>
                          <td><div class="badge badge-success">{{$p->apikey}}</div></td>
                          <td>
                          <a href="{{ route('settingblash.destroy', $p->blashCode ) }}" class="btn btn-danger" data-confirm-delete="true"><i class="fa fa-trash"></i> Delete</a>
                          </td>
                          <td>
                          <a href="{{ route('settingblash.edit', $p->blashCode ) }}" class="btn btn-primary"><i class="fa fa-edit"></i> Edit</a>
                        </td>
                        <td>
                            <a href="{{ route('settingblash.show', $p->blashCode ) }}" class="btn btn-primary"><i class="fa fa-edit"></i> Show</a>
                        </td>
                        </tr>
                    @endforeach

                      </table>
                    </div>
                  </div>
                  <div class="card-footer text-right">
                    {!!$table->appends(request()->input())->links('pagination.custom')!!}
                    
                  </div>
                </div>
              </div>
</div>
 
@endsection
