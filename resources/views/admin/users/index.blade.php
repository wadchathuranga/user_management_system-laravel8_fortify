@extends('template.main')

@section('content')

    <div class="row mt-2">
        <div class="col-12">
            <h1 class="float-left">Users</h1>
            <a href="{{route('admin.user.create')}}" class="btn btn-primary float-right" role="button">Add</a>
        </div>
    </div>

    <div class="card">
        <table class="table">
            <thead>
            <tr>
                <th scope="col">#Id</th>
                <th scope="col">Name</th>
                <th scope="col">Email</th>
                <th scope="col">Action</th>
            </tr>
            </thead>
            <tbody>
                @foreach($users as $user)
                    <tr>
                        <th scope="row">{{$user->id}}</th>
                        <td>{{$user->name}}</td>
                        <td>{{$user->email}}</td>
                        <td>
                            <a href="{{route('admin.user.edit', $user->id)}}" class="btn btn-sm btn-warning" role="button">Edit</a>
                            <button type="button" class="btn btn-sm btn-danger" onclick="event.preventDefault();
                            document.getElementById('delete-user-form-{{$user->id}}').submit()">Delete</button>
                            <form id="delete-user-form-{{$user->id}}" action="{{route('admin.user.destroy', $user->id)}}" method="post" style="display: none">
                                @csrf
                                @method('DELETE')
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        {{$users->links()}}
    </div>

@endsection