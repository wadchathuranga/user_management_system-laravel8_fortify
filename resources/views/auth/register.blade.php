@extends('template.main')

@section('content')

    <h1>Register Page</h1>

    <form method="post" action="{{route('register')}}">
        @csrf
        <div class="form-group">
            <label for="name">User Name</label>
            <input type="name" name="name" class="form-control @error('name') is-invalid @enderror" id="name" value="{{old('name')}}" aria-describedby="name">
            @error('name')
                <span class="invalid-feedback" role="alert">
                    {{$message}}
                </span>
            @enderror
        </div>
        <div class="form-group">
            <label for="email">Email address</label>
            <input type="email" name="email" class="form-control @error('email') is-invalid @enderror" id="email" value="{{old('email')}}" aria-describedby="email">
            @error('email')
            <span class="invalid-feedback" role="alert">
                    {{$message}}
                </span>
            @enderror
        </div>
        <div class="form-group">
            <label for="password">Password</label>
            <input type="password" name="password" class="form-control @error('password') is-invalid @enderror" id="password">
            @error('password')
            <span class="invalid-feedback" role="alert">
                    {{$message}}
                </span>
            @enderror
        </div>
        <div class="form-group">
            <label for="password_confirmation">Password Confirm</label>
            <input type="password" name="password_confirmation" class="form-control" id="password_confirmation">
            @error('password_confirmation')
            <span class="invalid-feedback" role="alert">
                    {{$message}}
                </span>
            @enderror
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>

@endsection