@extends('layouts.admin',[
	'page_title' 		=> 'Pages',
	'page_description'	=> 'Static content'
	])

@inject('core','Hoteru\\Core')
@section('content')

<div class="row">

	{!! Form::open(['action'=>['Dashboard\\PagesController@update',$page->id],'method'=>'PUT']) !!}
	<div class="col-md-12">

	<div class="box box-warning">
		<!-- Custom Tabs (Pulled to the right) -->
		<div class="nav-tabs-custom box-header with-border">
			<ul class="nav nav-tabs pull-right">
				<li><a href="{!! url('dashboard/pages') !!}">Manage Pages</a></li>
				<li class="pull-left header"><i class="fa fa-book"></i>Edit page : <b>{!! $page->title !!}</b></li>
			</ul>
			<div class="tab-content box-body">
				<div class="tab-pane active" id="">
					<div class="nav-tabs-custom">
						@include('partials._tablang',['locales'=>$core->getLocales()])
						<div class="tab-content">
							<div class="tab-pane active" id="tab-{!! App::getLocale() !!}">
								<div class="row">
									@include('dashboard.pages.partials._form',['buttonText'=>'','action'=>'edit','locale'=>App::getLocale()])
								</div>
							</div>
							@foreach($core->getLocales() as $l)
							<div class="tab-pane" id="tab-{!! $l !!}">
								<div class="row">
									@include('dashboard.pages.partials._form',['buttonText'=>'','action'=>'edit','locale'=>$l])
								</div>
							</div>
							@endforeach
							<div class="row">
								<div class="col-md-12">
									{!! Form::submit('Edit : '.$page->title,['class'=>'btn btn-flat btn-primary']) !!}
								</div>
							</div>
						</div>
					</div>
				</div>
			</div><!-- /.tab-content -->
		</div><!-- nav-tabs-custom -->
		</div>
	</div>
</div>
{!! Form::close() !!}
</div>
@stop