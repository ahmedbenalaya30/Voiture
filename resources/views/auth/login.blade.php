@extends('layouts.app')

@section('content')
<link rel="stylesheet" type="text/css" href="{{ url('/css/style.css') }}" />
  <div class="login-box">
    <h2>Login</h2>
    <form method="POST" action="{{ route('login') }}">
      {{ csrf_field() }}
      <div class="user-box">
        <input type="email" id="email" name="email" value="" required>
        @if ($errors->has('email'))
        <span class="help-block">
            <strong>{{ $errors->first('email') }}</strong>
        </span>
    @endif
        <label for="email">E-mail Adresse</label>
      </div>
      <div class="user-box">
        <input id="password" type="password"  name="password" value="" required autofocus required="">
        @if ($errors->has('password'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
        <label for="password" class="col-md-4 control-label">Password</label>
      </div>
      <a href="/">
        <span></span>
        <span></span>
        <span></span>
        <span></span>
        <input type="submit" value="Sign in" class="save"/> 
      </a>
      <a href="{{ route('password.request') }}">
        <input type="button" name="cancel" value="Forgot Your Password?" class="cancel"/>
      </a>
    </form>
  </div>
  
@endsection
