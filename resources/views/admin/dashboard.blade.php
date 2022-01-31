@extends('admin.master')

@section('main')

    <div style="padding-left: 30px" class="col-md-6 grid-margin stretch-card">
      <div class="card">
        <div class="card-body">
          <h4 class="card-title">Dash</h4>
          
          @if(session('status'))
          <div class="alert alert-success">
              {{ session('status') }}
          </div>
        @endif
          
        </div>
      </div>
    </div>

@endsection