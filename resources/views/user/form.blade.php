@extends('layout')

@section('content')
    <div class="container">
        <div class="d-flex flex-row align-items-center justify-content-between">
            <h1>{{Request::route()->getName() == 'user-form-add' ? 'Add' : 'Edit'}} User </h1>
        </div>
        <form method="POST" class="row g-3" action="{{Request::route()->getName() == 'user-form-add' ? route('user-create') : route('user-update')}}">
            @csrf
            <input type="hidden" name="id" value="{{ isset($user) ? $user->id : ''}}">
            <div class="col-md-12">
                <label for="input-name" class="form-label">Name</label>
                <input type="text" name="name" class="form-control" value="{{ isset($user) ? $user->name : ''}}">
            </div>
            <div class="col-md-12">
                <label for="input-email" class="form-label">Email</label>
                <input type="email" name="email" class="form-control" value="{{ isset($user) ? $user->email : ''}}">
            </div>
            <div class="col-md-12">
                <label for="input-password" class="form-label">Password</label>
                <input type="password" name="password" class="form-control">
            </div>
            <div class="col-md-12">
                <label for="input-password" class="form-label">Role</label>
                <select name="role_id" class="form-control">
                    <option></option>
                    @foreach($roles as $role)
                        <option value="{{$role->id}}" @if(isset($user)) @if($user->role_id == $role->id) selected @endif @endif>{{$role->roles_name}}</option>
                    @endforeach
                </select>
            </div>
            <div class="col-12">
                <button type="submit" class="btn btn-primary">Save</button>
                <a href="{{route('user-index')}}" class="btn btn-danger">Back</a>
            </div>
        </form>
    </div>
@endsection