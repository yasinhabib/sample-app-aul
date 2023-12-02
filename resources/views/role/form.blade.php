@extends('layout')

@section('content')
    <div class="container">
        <div class="d-flex flex-row align-items-center justify-content-between">
            <h1>{{Request::route()->getName() == 'role-form-add' ? 'Add' : 'Edit'}} Role </h1>
        </div>
        <form method="POST" class="row g-3" action="{{Request::route()->getName() == 'role-form-add' ? route('role-create') : route('role-update')}}">
            @csrf
            <input type="hidden" name="id" value="{{ isset($role) ? $role->id : ''}}">
            <div class="col-md-12">
                <label class="form-label">Role Name</label>
                <input type="text" name="roles_name" class="form-control" value="{{ isset($role) ? $role->roles_name : ''}}">
            </div>
            <div class="col-12">
                <button type="submit" class="btn btn-primary">Save</button>
                <a href="{{route('role-index')}}" class="btn btn-danger">Back</a>
            </div>
        </form>
    </div>
@endsection