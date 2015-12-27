@extends('layouts.admin',[
	'page_title'		=> 'Hotels',
	'page_description'	=> 'Manage listing hotels'
])

@section('content')

{!! Form::open(['action'=>['Dashboard\\HotelsController@update',$hotel->id],'method'=>'PUT']) !!}
<div class="row">
	<div class="col-md-12">
		<div class="box box-warning">
			<div class="nav-tabs-custom">
				<ul class="nav nav-tabs pull-right box-header with-border">
					<li class="active"><a href="{!! url('dashboard/hotels/listing') !!}">Manage Hotels</a></li>
					<li class="pull-left header"><i class="fa fa-bed"></i> Editing hotel : {!! $hotel->name !!}</li>
				</ul>
			</div>
		</div>
	</div>
	<div class="col-md-12">
		<div class="nav-tabs-custom">
			<ul class="nav nav-tabs">
				<li class="active"><a data-toggle="tab" href="#tab-1"><i class="fa fa-info"></i> General informations</a></li>
				<li><a data-toggle="tab" href="#tab-2"><i class="fa fa-star"></i> Facilities</a></li>
				<li><a data-toggle="tab" href="#tab-3"><i class="fa fa-map-marker"></i> Map</a></li>
				<li><a data-toggle="tab" href="#tab-4"><i class="fa fa-picture-o"></i> Image Gallery</a></li>
			</ul>
			<div class="tab-content">
				@include('dashboard.hotels.listing.partials._form',['locale'=>App::getLocale(),'action'=>'edit'])
				<hr>
				<div class="form-group">
					{!! Form::submit('Edit :'.$hotel->name,['class'=>'btn btn-primary btn-flat']) !!}
				</div>
			</div>
		</div>
	</div>
</div>
{!! Form::close()!!}

@stop