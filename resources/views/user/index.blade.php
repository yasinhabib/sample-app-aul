@extends('layout')

@section('content')
    <div class="container">
        <div class="d-flex flex-row align-items-center justify-content-between">
            <h1>User</h1>
            <a class="btn btn-sm btn-info" href="/user/add">Add</a>
        </div>
        <table class="table table-sm">
            <thead>
                <tr>
                    <th>
                        Name
                    </th>
                    <th>
                        Email
                    </th>
                    <th>
                        Role
                    </th>
                    <th>
                        Action
                    </th>
                </tr>
            </thead>
            <tbody>
                @foreach($users as $user)
                    <tr>
                        <td>
                            {{$user->name}}
                        </td>
                        <td>
                            {{$user->email}}
                        </td>
                        <td>
                            {{$user->roles->roles_name}}
                        </td>
                        <td>
                            <a class="btn btn-sm btn-warning" href="/user/edit/{{$user->id}}">Edit</a>
                            <a class="btn btn-sm btn-danger" href="/user/delete/{{$user->id}}">Delete</a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection