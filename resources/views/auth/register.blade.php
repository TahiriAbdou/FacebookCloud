@extends('layouts.auth',['page'=>'register'])

@section('content')

<p class="login-box-msg hidden">Sign in to start your session</p>

{!! Form::open(['url'=>url('/auth/register')]) !!}

  <div class="form-group has-feedback  @if ($errors->has('name')) has-error @endif">
    {!! Form::text('name',old('name'),['class'=>'form-control','placeholder'=>'Full name']) !!}
    <span class="glyphicon glyphicon-user form-control-feedback"></span>
    @if ($errors->has('name')) <p class="help-block">{{ $errors->first('name') }}</p> @endif
  </div>

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
    <div class="col-xs-8">
      <div class="checkbox icheck @if ($errors->has('password')) has-error @endif">
        <label>
          {!! Form::checkbox('agree') !!} i agree to the <a href="{!! url('pages/terms') !!}" target="_blanc">terms</a>
        </label>
        @if ($errors->has('agree')) <p class="help-block">{{ $errors->first('agree') }}</p> @endif
      </div>
    </div><!-- /.col -->
    <div class="col-xs-4">
      <button type="submit" class="btn btn-primary btn-block btn-flat">Register</button>
    </div><!-- /.col -->
  </div>
{!! Form::close() !!}


<div class="social-auth-links text-center hidden">
  <p>- OR -</p>
  <a href="#" class="btn btn-block btn-social btn-facebook btn-flat"><i class="fa fa-facebook"></i> Sign in using Facebook</a>
  <a href="#" class="btn btn-block btn-social btn-google btn-flat"><i class="fa fa-google-plus"></i> Sign in using Google+</a>
</div><!-- /.social-auth-links -->


<a href="{!! url('/auth/login') !!}">I already have a membership</a><br>

@stop