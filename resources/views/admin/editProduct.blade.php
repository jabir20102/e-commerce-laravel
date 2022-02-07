@extends('admin.master')

@section('main')

    <div style="padding-left: 30px" class="col-md-6 grid-margin stretch-card">
      <div class="card">
        <div class="card-body">
          <h4 class="card-title">Update Product</h4>
          
          @if(session('status'))
          <div class="alert alert-success">
              {{ session('status') }}
          </div>
        @endif
          <form class="forms-sample" action="{{route('admin.product.update',['id'=>$product->id])}}" method="POST" 
          enctype="multipart/form-data">
            @csrf
            <div class="form-group">
              <label for="exampleInputUsername1">Title</label>
              <input name="title" value="{{$product->title}}" type="text" class="form-control" id="exampleInputUsername1" placeholder="Title">
            </div>
            <div class="form-group">
              <label for="shortDescription">Brief Description</label>
              <textarea name="shortDescription" id="" cols="30" rows="10" class="form-control">
                {{$product->shortDescription}}
              </textarea>
            </div>
            <div class="form-group">
              <label for="exampleInputEmail1">Price</label>
              <input name="price" value="{{$product->price}}" type="number" class="form-control" id="exampleInputEmail1" placeholder="Price">
            </div>
            <div class="form-group">
              <label for="exampleInputEmail1">Offer Price</label>
              <input name="offerPrice" type="number" value="{{$product->offerPrice}}" class="form-control" id="exampleInputEmail1" placeholder="Offer Price">
            </div>
            <div class="form-check form-check-flat form-check-primary">
              <label class="form-check-label">
                <input name="offer" type="checkbox" class="form-check-input" {{$product->offer?"checked":""}}> Offer <i class="input-helper"></i></label>
            </div>
            <div class="form-group">
              <label for="exampleInputEmail1">Description</label>
              <textarea name="description" id="" cols="30" rows="20" class="form-control">
                {{$product->description}}
              </textarea>
            </div>
            
            <button type="submit" class="btn btn-primary me-2">Update</button>
          </form>
        </div>
      </div>
    </div>

@endsection