@extends('layouts.app')

@section('content')
<link rel="stylesheet" type="text/css" href="{{ url('/css/style.css') }}" />
  <div class="login-box">
    <h2>Register</h2>
    <form method="POST" action="{{ route('user.store') }}">
      {{ csrf_field() }}
      <div class="user-box">
        <input type="text" id="text" name="name" value="" required autofocus>
        @if ($errors->has('name'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                @endif
                                <label for="name" class="col-md-4 control-label">Name</label>

      </div>
      <div class="user-box">
      <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" required>

@if ($errors->has('email'))
    <span class="help-block">
        <strong>{{ $errors->first('email') }}</strong>
    </span>
@endif
<label for="email" class="col-md-4 control-label">E-Mail Address</label>

      </div>

    
      <div class="user-box">
      <input id="adress" type="text" class="form-control" name="adress" value="{{ old('adress') }}" required autofocus>

@if ($errors->has('adress'))
    <span class="help-block">
        <strong>{{ $errors->first('adress') }}</strong>
    </span>
@endif
<label for="adress" class="col-md-4 control-label">Adress</label>
 </div>
 <div class="user-box">
 <input id="city" type="text" class="form-control" name="city" value="{{ old('city') }}" required autofocus>

@if ($errors->has('city'))
    <span class="help-block">
        <strong>{{ $errors->first('city') }}</strong>
    </span>
@endif
<label for="city" class="col-md-4 control-label">City</label>
 </div>
 <div class="user-box">
 <input id="phone" type="number" class="form-control" name="phone" value="{{ old('phone') }}" required autofocus>

                                @if ($errors->has('phone'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('phone') }}</strong>
                                    </span>
                                @endifspan>
@endif
<label for="phone" class="col-md-4 control-label">Phone</label>
 </div>
      <a href="/">
        <span></span>
        <span></span>
        <span></span>
        <span></span>
        <input type="submit" value="Sign up" class="save"/> 
      </a>
    </form>
  </div>
  
@endsection
