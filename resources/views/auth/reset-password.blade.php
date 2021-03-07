@extends('template.main')

@section('content')

    <h1>Password Reset Page</h1>

    <form method="post" action="{{url('reset-password')}}">
        @csrf
        <input type="hidden" name="token" value="{{$request->token}}" />
        <div class="form-group">
            <label for="email">Email address</label>
            <input type="email" name="email" class="form-control @error('email') is-invalid @enderror" id="email" value="{{$request->email}}" aria-describedby="email">
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
        <button type="submit" class="btn btn-primary">Change</button>
    </form>

@endsection