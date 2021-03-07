@extends('template.main')

@section('content')

    <h1>Create New User</h1>

    <div class="card bd-light">
        <form method="post" action="{{route('admin.user.store')}}">
            @include('admin.users.components.form', ['create'=> true ])
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>

@endsection