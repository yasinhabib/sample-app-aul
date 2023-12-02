@extends('layout')

@section('content')
    <div class="container">
        <div class="d-flex align-items-center justify-content-center vh-100 w-100">
            <h1>Selamat datang {{Auth::user()->name}}</h1>
        </div>
    </div>
@endsection