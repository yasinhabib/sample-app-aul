@extends('layout')

@section('content')
    <div class="container">
        <div class="d-flex flex-row align-items-center justify-content-between">
            <h1>Menu</h1>
            <a class="btn btn-sm btn-info" href="/menu/add">Add</a>
        </div>
        <table class="table table-sm">
            <thead>
                <tr>
                    <th>
                        Menu Name
                    </th>
                    <th>
                        URL
                    </th>
                    <th>
                        Action
                    </th>
                </tr>
            </thead>
            <tbody>
                @foreach($menus as $menu)
                    <tr>
                        <td>
                            {{$menu->menu_name}}
                        </td>
                        <td>
                            {{$menu->url}}
                        </td>
                        <td>
                            <a class="btn btn-sm btn-warning" href="/menu/edit/{{$menu->id}}">Edit</a>
                            <a class="btn btn-sm btn-danger" href="/menu/delete/{{$menu->id}}">Delete</a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection