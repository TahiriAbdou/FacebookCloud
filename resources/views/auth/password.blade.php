@extends('layouts.auth')

@section('content')

<p class="login-box-msg hidden">Reset your password</p>

@if (session('status'))
	<div class="alert alert-success">
		{{ session('status') }}
	</div>
@endif

{!! Form::open(['url'=>url('/password/email')]) !!}

  <div class="form-group has-feedback  @if ($errors->has('email')) has-error @endif">
    {!! Form::text('email',old('email'),['class'=>'form-control','placeholder'=>'Email']) !!}
    <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
    @if ($errors->has('email')) <p class="help-block">{{ $errors->first('email') }}</p> @endif
  </div>

  <div class="row">

    <div class="col-xs-12">
      <button type="submit" class="btn btn-primary btn-block btn-flat">Send Password Reset Link</button>
    </div><!-- /.col -->
  </div>
{!! Form::close() !!}

<a href="{!! url('/auth/login') !!}">I already have a membership</a><br>
<a href="{!! url('/auth/register') !!}" class="text-center">Register a new membership</a>

@stop