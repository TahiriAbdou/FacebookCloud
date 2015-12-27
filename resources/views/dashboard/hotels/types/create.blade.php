@inject('core','Hoteru\\Core')
@extends('layouts.admin',[
	'page_title'		=> 'Hotel Types',
	'page_description'	=> 'Manage hotel types'
])

@section('content')

<div class="row">
	<div class="col-md-12">
		<div class="box box-warning">
			<div class="nav-tabs-custom">
				<ul class="nav nav-tabs pull-right box-header with-border">
					<li><a href="{!! url('dashboard/hotels/types/create') !!}">Add New Hotel Type</a></li>
					<li class="active"><a href="{!! url('dashboard/hotels/types') !!}">Manage Hotel types</a></li>		
					<li class="pull-left header"><i class="fa fa-bed"></i> Manage Hotel types</li>
				</ul>
				<div class="tab-content box-body">
					<div class="tab-pane active" id="">
						{!! Form::open(['action'=>'Dashboard\\HotelTypesController@store']) !!}
						<div class="row">
							@include('dashboard.hotels.types.partials._form',['action'=>'add','locale'=>''])
							<div class="col-md-12">
								{!! Form::submit('Add Hotel Type',['class'=>'btn btn-flat btn-primary']) !!}
							</div>
						</div>
						{!! Form::close() !!}
					</div>
				</div><!-- /.tab-content -->
			</div><!-- nav-tabs-custom -->
		</div>
	</div>
</div>
@stop