<?php $lc = $locale; ?>
<?php $locale = !empty($lc) ? ($lc.'[') : ''; ?>
<?php $e = !empty($lc) ? ']' : ''; ?>

<div class="col-md-8">
	<div class="form-group @if ($errors->has($locale.'name'.$e)) has-error @endif">
		{!! Form::label($locale.'name'.$e,'Name of the hotel') !!}
		{!! Form::text($locale.'name'.$e,!isset($hotel) ? null : $hotel->translate($lc,true)->name,['class'=>'form-control','placeholder'=>'Enter the hotel name'])!!}
		@if ($errors->has($locale.'name'.$e)) <p class="help-block">{{ $errors->first($locale.'name'.$e) }}</p> @endif
	</div>
	<div class="form-group @if ($errors->has($locale.'booking'.$e)) has-error @endif">
		{!! Form::label($locale.'booking'.$e,'Hotel Booking condition ') !!}
		{!! Form::textarea($locale.'booking'.$e,!isset($hotel) ? null : $hotel->translate($lc,true)->booking,['class'=>'form-control editor','placeholder'=>'Enter Hotel Booking conditions','rows'=>'4'])!!}
		@if ($errors->has($locale.'booking'.$e)) <p class="help-block">{{ $errors->first($locale.'booking'.$e) }}</p> @endif
	</div>
</div>
<div class="col-md-4">
	<div class="form-group @if ($errors->has($locale.'meta_title'.$e)) has-error @endif">
		{!! Form::label($locale.'meta_title'.$e,'Meta Page Title') !!}
		{!! Form::text($locale.'meta_title'.$e,!isset($hotel) ? null : $hotel->translate($lc,true)->meta_title,['class'=>'form-control','placeholder'=>'Enter Meta title'])!!}
		@if ($errors->has($locale.'meta_title'.$e)) <p class="help-block">{{ $errors->first($locale.'meta_title'.$e) }}</p> @endif
	</div>
	<div class="form-group @if ($errors->has($locale.'meta_description'.$e)) has-error @endif">
		{!! Form::label($locale.'meta_description'.$e,'Meta Page Title') !!}
		{!! Form::textarea($locale.'meta_description'.$e,!isset($hotel) ? null : $hotel->translate($lc,true)->meta_description,['class'=>'form-control','placeholder'=>'Enter Meta description','rows'=>'2'])!!}
		@if ($errors->has($locale.'meta_description'.$e)) <p class="help-block">{{ $errors->first($locale.'meta_description'.$e) }}</p> @endif
	</div>
	<div class="form-group @if ($errors->has($locale.'meta_keywords'.$e)) has-error @endif">
		{!! Form::label($locale.'meta_keywords'.$e,'Meta Keywords') !!}
		{!! Form::textarea($locale.'meta_keywords'.$e,!isset($hotel) ? null : $hotel->translate($lc,true)->meta_keywords,['class'=>'form-control','placeholder'=>'Enter Meta Keywords','rows'=>'2'])!!}
		@if ($errors->has($locale.'meta_keywords'.$e)) <p class="help-block">{{ $errors->first($locale.'meta_keywords'.$e) }}</p> @endif
	</div>
</div>
<div class="col-md-12">
	<div class="form-group @if ($errors->has($locale.'description'.$e)) has-error @endif">
		{!! Form::label($locale.'description'.$e,'Hotel Description') !!}
		{!! Form::textarea($locale.'description'.$e,!isset($hotel) ? null : $hotel->translate($lc,true)->description,['class'=>'form-control editor','placeholder'=>'Enter Hotel Description','rows'=>'4'])!!}
		@if ($errors->has($locale.'description'.$e)) <p class="help-block">{{ $errors->first($locale.'description'.$e) }}</p> @endif
	</div>
</div>