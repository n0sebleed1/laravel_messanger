@extends('layout.app')

@section('name')
    Login
@endsection
@section('content')
    <h2>Login</h2>
    @foreach ($errors->all() as $message)
        <li>{{ $message }}</li>
    @endforeach
    <form action="{{ route('login') }}" method="post" novalidate>
        @csrf
        <label for="name">Name</label>
        <input name="name" type="text" placeholder="Type login...">
        <label for="password">Password</label>
        <input name="password" type="password" placeholder="Type password...">
        <input type="submit" value="Login">
        <a href="/">Back</a>
    </form>
@endsection