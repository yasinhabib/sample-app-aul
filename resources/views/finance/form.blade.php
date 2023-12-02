@extends('layout')

@section('content')
    <div class="container">
        <div class="d-flex flex-row align-items-center justify-content-between">
            <h1>Edit Product Price</h1>
        </div>
        <form method="POST" class="row g-3" action="{{route('finance-update')}}" enctype="multipart/form-data">
            @csrf
            <input type="hidden" name="id" value="{{ isset($product) ? $product->id : ''}}">
            <div class="col-md-12">
                <label class="form-label">Product Title</label>
                <input type="text" class="form-control" value="{{ isset($product) ? $product->product_title : ''}}" disabled>
            </div>
            <div class="col-md-12">
                <label class="form-label">Product Description</label>
                <textarea class="form-control" disabled>{{ isset($product) ? $product->product_description : ''}}</textarea>
            </div>
            <div class="col-md-12">
                <label class="form-label">Price</label>
                <input type="number" name="product_price" class="form-control" value="{{ isset($product) ? $product->product_price : ''}}">
            </div>
            <div class="col-12">
                <button type="submit" class="btn btn-primary">Save</button>
                <a href="{{route('product-index')}}" class="btn btn-danger">Back</a>
            </div>
        </form>
    </div>
@endsection