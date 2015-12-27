@extends('layouts.auth')

@section('content')

<p class="login-box-msg hidden">Sign in to start your session</p>

{!! Form::open(['url'=>url('/auth/login')]) !!}
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
  <div class="row">
    <div class="col-xs-8">
      <div class="checkbox icheck">
        <label>
          {!! Form::checkbox('remember') !!} Remember me
        </label>
      </div>
    </div><!-- /.col -->
    <div class="col-xs-4">
      <button type="submit" class="btn btn-primary btn-block btn-flat">Sign In</button>
    </div><!-- /.col -->
  </div>
{!! Form::close() !!}

<div class="social-auth-links text-center hidden">
  <p>- OR -</p>
  <a href="#" class="btn btn-block btn-social btn-facebook btn-flat"><i class="fa fa-facebook"></i> Sign in using Facebook</a>
  <a href="#" class="btn btn-block btn-social btn-google btn-flat"><i class="fa fa-google-plus"></i> Sign in using Google+</a>
</div><!-- /.social-auth-links -->

<a href="{!! url('/password/email') !!}">I forgot my password</a><br>
<a href="{!! url('/auth/register') !!}" class="text-center">Register a new membership</a>

@stop