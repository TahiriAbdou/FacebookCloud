@extends('layouts.auth')

@section('content')

<p class="login-box-msg hidden">Reset your password</p>

{!! Form::open(['url'=>url('/password/email')]) !!}

  <div class="form-group has-feedback  @if ($errors->has('email')) has-error @endif">
    {!! Form::text('email',old('email'),['class'=>'form-control','placeholder'=>'Email']) !!}
    <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
    @if ($errors->has('email')) <p class="help-block">{{ $errors->first('email') }}</p> @endif
  </div>

  <div class="form-group has-feedback @if ($errors->has('password')) has-error @endif">
  	{!! Form::password('password',['class'=>'form-control','placeholder'=>'Password']) !!}
    <span class="glyphicon glyphicon-lock form-control-feedback"></span>
    @if ($errors->has('password')) <p class="help-block">{{ $errors->first('password') }}</p> @endif
  </div>

  <div class="form-group has-feedback @if ($errors->has('password_confirmation')) has-error @endif">
  	{!! Form::password('password_confirmation',['class'=>'form-control','placeholder'=>'Confirm Password']) !!}
    <span class="glyphicon glyphicon-log-in form-control-feedback"></span>
    @if ($errors->has('password_confirmation')) <p class="help-block">{{ $errors->first('password_confirmation') }}</p> @endif
  </div> 

  <div class="row">

    <div class="col-xs-12">
      <button type="submit" class="btn btn-primary btn-block btn-flat">Reset Password</button>
    </div><!-- /.col -->
  </div>
{!! Form::close() !!}

<a href="{!! url('/auth/login') !!}">I already have a membership</a><br>
@stop