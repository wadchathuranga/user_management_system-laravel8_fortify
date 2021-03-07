@extends('template.main')

@section('content')

    <h1>Reset Password</h1>

    <form method="post" action="{{route('password.email')}}">
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
        <button type="submit" class="btn btn-primary">Reset Password</button>
    </form>
@endsection

