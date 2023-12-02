@extends('layout')

@section('content')
    <div class="container">
        <div class="d-flex flex-row align-items-center justify-content-between">
            <h1>Role Access Menu</h1>
        </div>
        <form method="POST" class="row g-3" action="{{route('save-role-form-access')}}">
            @csrf
            <input type="hidden" name="role_id" value="{{$role_id}}" />
            <table class="table table-sm">
                <thead>
                    <tr>
                        <th>
                            Menu
                        </th>
                        <th>
                            Active
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
                                <input type="checkbox" name="menu[{{$menu->id}}]" value="{{$menu->id}}" @if(isset($menu->menuRole)) checked @endif/>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            <div class="col-12">
                <button type="submit" class="btn btn-primary">Save</button>
                <a href="{{route('role-index')}}" class="btn btn-danger">Back</a>
            </div>
        </form>
    </div>
@endsection