@extends('layout')

@section('content')
    <div class="container">
        <div class="d-flex flex-row align-items-center justify-content-between">
            <h1>{{Request::route()->getName() == 'product-form-add' ? 'Add' : 'Edit'}} Product </h1>
        </div>
        <form method="POST" class="row g-3" action="{{Request::route()->getName() == 'product-form-add' ? route('product-create') : route('product-update')}}" enctype="multipart/form-data">
            @csrf
            <input type="hidden" name="id" value="{{ isset($product) ? $product->id : ''}}">
            <div class="col-md-12">
                <label class="form-label">Product Title</label>
                <input type="text" name="product_title" class="form-control" value="{{ isset($product) ? $product->product_title : ''}}">
            </div>
            <div class="col-md-12">
                <label class="form-label">Product Description</label>
                <textarea class="form-control" name="product_description">{{ isset($product) ? $product->product_description : ''}}</textarea>
            </div>
            <div class="col-md-12">
                <label class="form-label">Image</label>
                <input type="file" name="image" class="form-control">
                @if(isset($product))
                    <a href={{$product->product_img_path}} target="_blank">Download</a>
                @endif
            </div>
            <div class="col-md-12">
                <label class="form-label">Video</label>
                <input type="file" name="video" class="form-control">
                @if(isset($product))
                    <a href={{$product->product_video_path}} target="_blank">Download</a>
                @endif
            </div>
            <div class="col-12">
                <button type="submit" class="btn btn-primary">Save</button>
                <a href="{{route('product-index')}}" class="btn btn-danger">Back</a>
            </div>
        </form>
    </div>
@endsection