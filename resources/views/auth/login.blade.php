@extends('app')

@section('title', 'Login')

@section('content')
    @include('partials/errors')
    <form id="login" name="login" method="post">
        {!! csrf_field() !!}

        <div>
            <label for="email" class="label label-primary">Email:</label> <input type="text" id="email" name="email" value="{{ old('email') }}" class="form-control">
        </div>

        <br>

        <div>
            <label for="password" class="label label-primary">Password:</label><input type="password" id="password" name="password" value="" class="form-control">
        </div>

        <br>

        <div>
            <label for="remember" class="label label-primary">Remember Me?</label> <input type="checkbox" id="remember" name="remember" value="1">
        </div>

        <br>
        <div>
            <input type="submit" id="submit" name="submit" value="Login" class="btn btn-primary">
        </div>
    </form>
@endsection