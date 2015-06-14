@extends('app')

@section('title', 'Login')

@section('content')
    @include('partials/errors')
    <form id="login" name="login" method="post">
        {!! csrf_field() !!}

        <label for="email">Email:</label> <input type="text" id="email" name="email" value="{{ old('email') }}">
        <label for="password">Password:</label><input type="password" id="password" name="password" value="">
        <label for="remember">Remember Me?</label> <input type="checkbox" id="remember" name="remember" value="1">

        <input type="submit" id="submit" name="submit" value="Login">
    </form>
@endsection