@extends('layout')

@section('content')
    <div class="container">
        <div class="d-flex flex-row align-items-center justify-content-between">
            <h1>Product</h1>
            <a class="btn btn-sm btn-info" href="/product/add">Add</a>
        </div>
        <table class="table table-sm">
            <thead>
                <tr>
                    <th>
                        Product Title
                    </th>
                    <th>
                        Product Description
                    </th>
                    <th>
                        Product Image
                    </th>
                    <th>
                        Product Video
                    </th>
                    <th>
                        Action
                    </th>
                </tr>
            </thead>
            <tbody>
                @foreach($products as $product)
                    <tr>
                        <td>
                            {{$product->product_title}}
                        </td>
                        <td>
                            {{$product->product_description}}
                        </td>
                        <td>
                            <a href={{$product->product_img_path}} target="_blank">Download</a>
                        </td>
                        <td>
                            <a href={{$product->product_video_path}} target="_blank">Download</a>
                        </td>
                        <td>
                            <a class="btn btn-sm btn-warning" href="/product/edit/{{$product->id}}">Edit</a>
                            <a class="btn btn-sm btn-danger" href="/product/delete/{{$product->id}}">Delete</a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection