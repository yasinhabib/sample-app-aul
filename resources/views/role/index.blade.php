@extends('layout')

@section('content')
    <div class="container">
        <div class="d-flex flex-row align-items-center justify-content-between">
            <h1>Role</h1>
            <a class="btn btn-sm btn-info" href="/role/add">Add</a>
        </div>
        <table class="table table-sm">
            <thead>
                <tr>
                    <th>
                        Role Name
                    </th>
                    <th>
                        Action
                    </th>
                </tr>
            </thead>
            <tbody>
                @foreach($roles as $role)
                    <tr>
                        <td>
                            {{$role->roles_name}}
                        </td>
                        <td>
                            <a class="btn btn-sm btn-warning" href="/role/edit/{{$role->id}}">Edit</a>
                            <a class="btn btn-sm btn-danger" href="/role/delete/{{$role->id}}">Delete</a>
                            <a class="btn btn-sm btn-info" href="/role/access-menu/{{$role->id}}">Access Menu</a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection