@extends('template.main')

@section('content')

    <h1>Login Page</h1>

    <form method="post" action="{{route('login')}}">
        @csrf
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
        <button type="submit" class="btn btn-primary">Login</button>
    </form>
    <a href="{{route('password.request')}}">Forgotten your password?</a>
@endsection

