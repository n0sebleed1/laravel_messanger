@extends('layout.app')

@section('name')
    Register
@endsection
@section('content')
    <h2>Register</h2>
    <ul>
        @foreach ($errors->all() as $message)
            <li>{{ $message }}</li>
        @endforeach
    </ul>
    <form action="{{ route('register') }}" method="post" novalidate>
        @csrf
        <label for="name">Login</label>
        <input name="name" type="text" placeholder="Type name...">
        <label for="password">Password</label>
        <input name="password" type="password" placeholder="Type password...">
        <input type="submit" value="Register">
        <a href="/">Back</a>
    </form>
@endsection