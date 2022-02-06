        @extends('admin.master')

        @section('main')



        <div class="row">
        <div style="" class="col-md-12 grid-margin stretch-card">
        <div class="card">
        <div class="card-body">
          <a href="{{url('/admin/products')}}" class="btn btn-success">Back</a>
          <h4 class="card-title">Images</h4>
          
          @if(session('status'))
          <div class="alert alert-success">
              {{ session('status') }}
          </div>
        @endif
        <div class="panel panel-default">
          <div class="panel-heading">
            <h3 class="panel-title">Select Image</h3>
          </div>
          <div class="panel-body">
            <form method="post" id="dropzoneForm" class="dropzone" 
            action="{{ url('admin/product/addImages' )}}">
              @csrf
            </form>
            <div>
              <button type="button" class="btn btn-info" id="submit-all">Upload</button>
            </div>
          </div>
        </div>
        <br />


        <div style="" class="panel panel-default">
          <div class="panel-heading">
              <h3 class="panel-title">Uploaded Image</h3>
              
          </div>
          <div class="lightbox">
            <div class="multi-carousel">
              <div id="loading" style="display: none" class="spinner" role="status">
                <span class="sr-only">Loading...</span>
              </div>

              <div class="multi-carousel-inner" id="uploaded_image">
                
              </div>
                </div>
              </div>
        </div>
        




        @endsection
