@extends('app')

@section('title', 'Get in touch...')

@section('content')
    @include('partials/errors')

    @if(session('captcha_errors'))
        <div class="alert alert-danger">
            @foreach(session('captcha_errors') as $captcha_error)
                <p>{{ $captcha_error }}</p>
            @endforeach
        </div>
    @endif

    @if(session('success'))
        <div class="alert alert-success">Thanks! I'll be in touch as soon as possible.</div>
    @endif

    <form method="post" novalidate="novalidate">
        {!! csrf_field() !!}

        <div class="container-fixed">
            <label for="body"></label>
            <textarea id="body" name="body" class="form-control" placeholder="Don't be shy, write a few words...">{{ old('body') }}</textarea>
        </div>

        <br>

        <div class="container-fixed">
            <label for="email" class="label label-primary">Email:</label>
            <input type="email" name="email" id="email" value="{{ old('email') }}" class="form-control" placeholder="john.doe@gmail.com">
        </div>

        <br>

        <div class="container-fixed g-recaptcha" data-sitekey="6LfHWQgTAAAAAPTE28aEu_hEn-XgRm6katjcia5F"></div>

        <br>

        <input type="submit" name="submit" value="Send" class="btn btn-primary">
    </form>
@endsection