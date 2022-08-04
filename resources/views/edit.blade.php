@extends('layouts.app')
@section('content')
 
<div class="card">
  <div class="card-header">Contactus Page</div>
  <div class="card-body">
      
      <form action="{{ url('/edit/'. $product->id. '/change/') }}" method="post">
        {!! csrf_field() !!}
        @method("PATCH")
        <input type="hidden" name="id" id="id" value="{{$product->id}}" id="id" />
        <label>Product</label></br>
        <input type="text" name="product" id="name" value="{{$product->product}}" class="form-control"></br>
        <label>Category</label></br>
        <input type="text" name="category" id="address" value="{{$product->category}}" class="form-control"></br>
        
        <input type="submit" value="Update" class="btn btn-success"></br>
    </form>
   
  </div>
</div>
 
@stop  

