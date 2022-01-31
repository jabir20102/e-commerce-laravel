@extends('admin.master')

@section('main')

    <div style="padding-left: 30px" class="col-md-6 grid-margin stretch-card">
      <div class="card">
        <div class="card-body">
          <h4 class="card-title">Add new Product</h4>
          
          @if(session('status'))
          <div class="alert alert-success">
              {{ session('status') }}
          </div>
        @endif
          <form class="forms-sample" action="{{url('admin/addProduct')}}" method="POST" 
          enctype="multipart/form-data">
            @csrf
            <div class="form-group">
              <label for="exampleInputUsername1">Title</label>
              <input name="title" type="text" class="form-control" id="exampleInputUsername1" placeholder="Title">
            </div>
            <div class="form-group">
              <label for="category">Category</label>
              <select name="category" id="category" class="form-select" aria-label="Default select example">
                <option value="mobiles">Mobiles</option>
                <option value="Laptops">Laptops</option>
                <option value="lcds">LCDs</option>
              </select>  
            </div>
            
            <div class="form-group">
              <label for="exampleInputEmail1">Price</label>
              <input name="price" type="number" class="form-control" id="exampleInputEmail1" placeholder="Price">
            </div>
             <div class="form-group">
              <label for="exampleInputEmail1">Offer Price</label>
              <input name="offerPrice" type="number" class="form-control" id="exampleInputEmail1" placeholder="Offer Price">
            </div>
            <div class="form-group">
              <label for="exampleInputEmail1">Description</label>
              <textarea name="description" id="" cols="30" rows="20" class="form-control"></textarea>
            </div>
              <div class="form-check form-check-flat form-check-primary">
              <label class="form-check-label">
                <input name="offer" type="checkbox" class="form-check-input"> Offer <i class="input-helper"></i></label>
            </div>
            <button type="submit" class="btn btn-primary me-2">Submit</button>
          </form>
        </div>
      </div>
    </div>

@endsection