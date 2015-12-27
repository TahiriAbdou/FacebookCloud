@extends('layouts.admin',[
	'page_title'		=> 'Maintenance Mode',
	'page_description'	=> 'Maintenance mode settings'
])

@section('content')
	
<div class="row">
	<div class="col-md-6">
		<div class="box box-info">
			<div class="box-header">
				<i class="fa fa-tasks"></i> Setup the maintenance mode
			</div>
			<div class="box-body">
				{!! Form::open(['action'=>'Dashboard\\SettingsController@postMaintenance']) !!}
					<div class="form-group">
						<div class="checkbox">
							<label class="checkbox inline">
								{!! Form::checkbox('on',true,\Cache::get('maintenance.on'),['class'=>''])!!}
								{!! 'Enable maintenance mode (Users can\'t able to access the site!).' !!}
							</label>
						</div>
					</div>
					<div class="form-group">
						{!! Form::label('body','Reason of maintenance') !!}
						{!! Form::textarea('body',$maintenance,['class'=>'form-control','rows'=>'4','placeholder'=>'Enter your reason'])!!}
					</div>
					{!! Form::submit('Save',['class'=>'btn btn-flat btn-primary']) !!}
				{!! Form::close() !!}
			</div>
			<div class="box-footer">
				<div class="callout callout-warning">
                  	<p>Note: Administrators still have access the full site!</p>
               	</div>
			</div>
		</div>
	</div>
</div>
@stop