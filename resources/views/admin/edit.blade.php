@extends('admin.master')

@section('main')

    <div style="padding-left: 30px" class="col-md-6 grid-margin stretch-card">
      <div class="card">
        <div class="card-body">
          <h4 class="card-title">Update Admin Details</h4>
          
          @if(session('status'))
          <div class="alert alert-success">
              {{ session('status') }}
          </div>
        @endif
          <form class="forms-sample" action="{{route('admin.update')}}" method="POST" 
          enctype="multipart/form-data">
            @csrf
            <div class="form-group">
              <label for="exampleInputUsername1">Name</label>
              <input name="title" value="{{Session::get('admin_name')}}" type="text" class="form-control" id="exampleInputUsername1" placeholder="Name">
            </div>
            <div class="form-group">
              <label for="exampleInputEmail1">Email</label>
              <input name="email" value="{{Session::get('admin_email')}}" type="email" class="form-control" id="exampleInputEmail1" placeholder="Email">
            </div>
            
            
            
            <button type="submit" class="btn btn-primary me-2">Update</button>
          </form>
        </div>
      </div>
    </div>

@endsection