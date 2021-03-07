@extends('template.main')

@section('content')

    <h1>Edit User</h1>

    <div class="card bd-light">
        <form method="post" action="{{route('admin.user.update', $user->id)}}">
            @method('PATCH')
            @include('admin.users.components.form')
            <button type="submit" class="btn btn-warning">Update</button>
        </form>
    </div>

@endsection