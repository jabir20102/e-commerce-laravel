@extends('admin.master')

@section('main')
<div class="row">
<div style="" class="col-md-12 grid-margin stretch-card">
<div class="card">
<div class="card-body">
    <h4 class="card-title">Latest Product</h4>
    
    @if(session('status'))
    <div class="alert alert-success">
        {{ session('status') }}
    </div>
@endif
<table class="table table-striped bg-light">
    <tr class="bg-success ">
        <td>ID</td>
        <td>Title</td>
        {{-- <td style="width:200px" >Description</td> --}}
        <td>price</td>
        <td>Images</td>
        <td>Action</td>
    </tr>
    @foreach ($products as $product)
        <tr>
            <td>{{$product->id}}</td>
            <td>
            <a href="{{url('/product')}}/{{$product->id}}/{{strtolower(trim(preg_replace('/[^A-Za-z0-9-]+/', '-', $product->title)))}}">
                {{$product->title}}</a></td>
            
            {{-- <td>{!!$product->description!!}</td> --}}
            <td>{{$product->price}}</td>
            <td>
                <a class="btn btn-success btn-sm" href="{{route('admin.images',$product->id)}}">
                    Images</a>
            </td>
            <td>
                <a class="btn btn-primary btn-sm" href="{{route('admin.product.edit',$product->id)}}">Edit</a>
                <a class="btn btn-danger btn-sm" href="{{route('admin.product.delete',$product->id)}}">Delete</a>
            </td>
        </tr>
    @endforeach
</table>
</div>
</div>


@endsection
