<?php $lc = $locale; ?>
<?php $locale = !empty($lc) ? ($lc.'[') : ''; ?>
<?php $e = !empty($lc) ? ']' : ''; ?>
<div class="col-md-6">
	<div class="form-group @if ($errors->has($locale.'title'.$e)) has-error @endif">
		{!! Form::label($locale.'title'.$e,'Page Title') !!}
		{!! Form::text($locale.'title'.$e,!isset($page) ? null : $page->translate($lc,true)->title,['class'=>'form-control','placeholder'=>'Enter your page title'])!!}
		@if ($errors->has($locale.'title'.$e)) <p class="help-block">{{ $errors->first($locale.'title'.$e) }}</p> @endif
	</div>
	<div class="form-group @if ($errors->has($locale.'slug'.$e)) has-error @endif">
		{!! Form::label($locale.'slug'.$e,'Page Slug') !!}
		{!! Form::text($locale.'slug'.$e,!isset($page) ? null : $page->translate($lc,true)->slug,['class'=>'form-control','placeholder'=>'Enter your page slug'])!!}
		@if ($errors->has($locale.'slug'.$e)) <p class="help-block">{{ $errors->first($locale.'slug'.$e) }}</p> @endif
	</div>
	<div class="form-group @if ($errors->has($locale.'meta_description'.$e)) has-error @endif">
		{!! Form::label($locale.'meta_description'.$e,'Page Meta description') !!}
		{!! Form::textarea($locale.'meta_description'.$e,!isset($page) ? null : $page->translate($lc,true)->meta_description,['class'=>'form-control','rows'=>2,'placeholder'=>'Enter your page Meta description'])!!}
		@if ($errors->has($locale.'meta_description'.$e)) <p class="help-block">{{ $errors->first($locale.'meta_description'.$e) }}</p> @endif
	</div>
	@if ($action == 'add')
	<div class="form-group">
		<div class="checkbox">
			<label class="checkbox inline">
				{!! Form::checkbox('display_menu') !!} <strong>Display the page link on header menu bar.</strong>
			</label>
		</div>
	</div>
	<div class="form-group">
		<div class="checkbox">
			<label class="checkbox inline">
				{!! Form::checkbox('display_footer') !!} <strong>Display the page link on footer menu bar.</strong>
			</label>
		</div>
	</div>
	@endif 
</div>
<div class="col-md-6">
	<div class="form-group @if ($errors->has($locale.'meta_title'.$e)) has-error @endif">
		{!! Form::label($locale.'meta_title'.$e,'Page Meta Title') !!}
		{!! Form::text($locale.'meta_title'.$e,!isset($page) ? null : $page->translate($lc,true)->meta_title,['class'=>'form-control','placeholder'=>'Enter your page Meta Title'])!!}
		@if ($errors->has($locale.'meta_title'.$e)) <p class="help-block">{{ $errors->first($locale.'meta_title'.$e) }}</p> @endif
	</div>
	<div class="form-group @if ($errors->has($locale.'meta_keywords'.$e)) has-error @endif">
		{!! Form::label($locale.'meta_keywords'.$e,'Page Meta Keywords') !!}
		{!! Form::textarea($locale.'meta_keywords'.$e,!isset($page) ? null : $page->translate($lc,true)->meta_keywords,['class'=>'form-control','rows'=>8,'placeholder'=>'Enter your page Meta Keywords'])!!}
		@if ($errors->has($locale.'meta_keywords'.$e)) <p class="help-block">{{ $errors->first($locale.'meta_keywords'.$e) }}</p> @endif
	</div>
</div>
<div class="col-md-12">
	<div class="form-group @if ($errors->has($locale.'content'.$e)) has-error @endif">
		{!! Form::label($locale.'content'.$e,'Content') !!}
		{!! Form::textarea($locale.'content'.$e,!isset($page) ? null : $page->translate($lc,true)->content,['class'=>'form-control editor','rows'=>8,'placeholder'=>'Content'])!!}
		@if ($errors->has($locale.'content'.$e)) <p class="help-block">{{ $errors->first($locale.'content'.$e) }}</p> @endif
	</div>
</div>
