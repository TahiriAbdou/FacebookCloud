@if(\Session::has('success'))
<div class="alert alert-success alert-dismissible">
	<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
	<h4>  <i class="icon fa fa-check"></i> Success</h4>
	{!! Session::get('success') !!}
</div>
@elseif(\Session::has('warning'))
<div class="alert alert-warning alert-dismissible">
	<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
	<h4>  <i class="icon fa fa-warning"></i> Warning</h4>
	{!! Session::get('warning') !!}
</div>
@elseif(\Session::has('info'))
<div class="alert alert-info alert-dismissible">
	<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
	<h4>  <i class="icon fa fa-info"></i> Alert Info</h4>
	{!! Session::get('info') !!}
</div>
@elseif(\Session::has('danger'))
<div class="alert alert-danger alert-dismissible">
	<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
	<h4>  <i class="icon fa fa-ban"></i> Error</h4>
	{!! Session::get('danger') !!}
</div>
@endif