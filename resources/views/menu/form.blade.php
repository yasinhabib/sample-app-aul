@extends('layout')

@section('content')
    <div class="container">
        <div class="d-flex flex-row align-items-center justify-content-between">
            <h1>{{Request::route()->getName() == 'menu-form-add' ? 'Add' : 'Edit'}} Menu </h1>
        </div>
        <form method="POST" class="row g-3" action="{{Request::route()->getName() == 'menu-form-add' ? route('menu-create') : route('menu-update')}}">
            @csrf
            <input type="hidden" name="id" value="{{ isset($menu) ? $menu->id : ''}}">
            <div class="col-md-12">
                <label class="form-label">Menu Name</label>
                <input type="text" name="menu_name" class="form-control" value="{{ isset($menu) ? $menu->menu_name : ''}}">
            </div>
            <div class="col-md-12">
                <label class="form-label">URL</label>
                <input type="text" name="url" class="form-control" id="input-url" value="{{ isset($menu) ? $menu->url : ''}}">
            </div>
            <div class="col-12">
                <button type="submit" class="btn btn-primary">Save</button>
                <a href="{{route('menu-index')}}" class="btn btn-danger">Back</a>
            </div>
        </form>
    </div>
@endsection