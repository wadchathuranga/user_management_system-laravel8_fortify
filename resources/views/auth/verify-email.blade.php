@extends('template.main')

@section('content')

    <h1>Verify your e-mail address</h1>

    <p>You must verify your email address to access this page!</p>

    <form action="{{route('verification.send')}}" method="post">
        @csrf
        <button type="submit" class="btn btn-primary">Resend verification email</button>
    </form>


@endsection

