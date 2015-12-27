@extends('layouts.admin',[
	'page_title' 		=> 'Pages',
	'page_description'	=> 'Static content'
])

@section('content')

<div class="row">
<div class="col-md-12">
	<div class="box box-warning">
	<div class="nav-tabs-custom">
			<ul class="nav nav-tabs pull-right box-header with-border">
				<li class="active"><a href="{!! url('dashboard/pages/create') !!}">Add New Page</a></li>
				<li><a href="{!! url('dashboard/pages') !!}">Manage Pages</a></li>
				
				<li class="pull-left header"><i class="fa fa-book"></i> Manage static site contents</li>
			</ul>
			<div class="tab-content box-body">
				<div class="tab-pane active" id="">
					{!! Form::open(['action'=>'Dashboard\\PagesController@store']) !!}
					<div class="row">
						@include('dashboard.pages.partials._form',['action'=>'add','locale'=>''])
						<div class="col-md-12">
							{!! Form::submit('Add Page',['class'=>'btn btn-flat btn-primary']) !!}
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