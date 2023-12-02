@extends('layout')

@section('content')
    <div class="container">
        <div class="d-flex flex-row align-items-center justify-content-between">
            <h1>Product</h1>
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
                        Product Price
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
                            {{$product->product_price}}
                        </td>
                        <td>
                            <a class="btn btn-sm btn-warning" href="/finance/edit/{{$product->id}}">Edit</a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection