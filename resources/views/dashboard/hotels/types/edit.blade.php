@inject('core','Hoteru\\Core')
@extends('layouts.admin',[
	'page_title'		=> 'Hotel Types',
	'page_description'	=> 'Manage hotel types'
	])

	@section('content')

	<div class="row">

		{!! Form::open(['action'=>['Dashboard\\HotelTypesController@update',$type->id],'method'=>'PUT']) !!}
		<div class="col-md-12">
			<div class="box box-warning">
				<div class="nav-tabs-custom">
					<ul class="nav nav-tabs pull-right box-header with-border">
						<li class="active"><a href="{!! url('dashboard/hotels/types') !!}">Manage Hotel types</a></li>		

						<li class="pull-left header"><i class="fa fa-bed"></i> Manage Hotel types</li>
					</ul>
					<div class="tab-content box-body">
						<div class="tab-pane active" id="">
							<div class="nav-tabs-custom">
								@include('partials._tablang',['locales'=>$core->getLocales()])
								<div class="tab-content">
									<div class="tab-pane active" id="tab-{!! App::getLocale() !!}">
										<div class="row">
										@include('dashboard.hotels.types.partials._form',['buttonText'=>'','action'=>'edit','locale'=>App::getLocale()])
										</div>
									</div>
									@foreach($core->getLocales() as $l)
									<div class="tab-pane" id="tab-{!! $l !!}">
										<div class="row">
										@include('dashboard.hotels.types.partials._form',['buttonText'=>'','action'=>'edit','locale'=>$l])
										</div>
									</div>
									@endforeach
									<div class="row">
										<div class="col-md-12">
											{!! Form::submit('Edit : '.$type->name,['class'=>'btn btn-flat btn-primary']) !!}
										</div>
									</div>
								</div>
							</div>
						</div>
					</div><!-- /.tab-content -->
				</div><!-- nav-tabs-custom -->
			</div>
		</div>
		{!! Form::close() !!}
	</div>
	@stop