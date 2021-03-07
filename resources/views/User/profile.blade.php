@extends('template.main')

@section('content')

    <h1>Update Profile</h1>

    <form method="post" action="{{route('user-profile-information.update')}}">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="name">User Name</label>
            <input type="name" name="name" class="form-control @error('name') is-invalid @enderror" id="name" value="{{ auth()->user()->name }}" aria-describedby="name">
            @error('name')
                <span class="invalid-feedback" role="alert">
                    {{$message}}
                </span>
            @enderror
        </div>
        <div class="form-group">
            <label for="email">Email address</label>
            <input type="email" name="email" class="form-control @error('email') is-invalid @enderror" id="email" value="{{ auth()->user()->email }}" aria-describedby="email">
            @error('email')
            <span class="invalid-feedback" role="alert">
                    {{$message}}
                </span>
            @enderror
        </div>
        <button type="submit" class="btn btn-warning">Update</button>
    </form>

@endsection