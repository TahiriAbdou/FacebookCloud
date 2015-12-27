<?php $lc = $locale; ?>
<?php $locale = !empty($lc) ? ($lc.'[') : ''; ?>
<?php $e = !empty($lc) ? ']' : ''; ?>
<div class="col-md-6">
	<div class="form-group @if ($errors->has($locale.'name'.$e)) has-error @endif">
		{!! Form::label($locale.'name'.$e,'Type name') !!}
		{!! Form::text($locale.'name'.$e,!isset($type) ? null : $type->translate($lc,true)->name,['class'=>'form-control','placeholder'=>'Enter Type name'])!!}
		@if ($errors->has($locale.'name'.$e)) <p class="help-block">{{ $errors->first($locale.'name'.$e) }}</p> @endif
	</div> 
</div>