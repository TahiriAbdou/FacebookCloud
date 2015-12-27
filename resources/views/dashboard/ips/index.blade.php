@extends('layouts.admin',[
	'page_title'	=> 'Ban user ip',
	])

@section('content')
<div class="row">
	<div class="col-md-4">
		<div class="box box-warning">
			<div class="box-header">
				<i class="fa fa-ban"></i> Add User IP Ban
			</div>
			<div class="box-body">
				{!! Form::open(['action'=>'Dashboard\\IpsController@postIndex']) !!}
					<div class="form-group @if ($errors->has('ip')) has-error @endif">
						{!! Form::label('ip','User IP') !!}
						{!! Form::text('ip',null,['class'=>'form-control','placeholder'=>'ip'])!!}
						<p class="help-block">{{ 'Note: Banned IP\'s can\'t able to browse the site!' }}</p>
						@if ($errors->has('ip')) <p class="help-block">{{ $errors->first('ip') }}</p> @endif
					</div>
					
				{!! Form::submit('Ban IP',['class'=>'btn btn-flat btn-warning']) !!}
				{!! Form::close() !!}
			</div>
		</div>
	</div>
	<div class="col-md-8">
		<div class="box box-info">
			<div class="box-header"><i class="fa fa-ban"></i> List of Blacklist IPs</div>
			<div class="box-body">
				<table class="table table-bordered" id="ips-table">
			        <thead>
			            <tr>
			                <th>Ip</th>
			                <th>Added</th>
			                <th>Action</th>
			            </tr>
			        </thead>
			    </table>
			</div>
		</div>
	</div>
</div>
@stop

@section('css')
<link rel="stylesheet" type="text/css" href="{{ asset("/bower_components/admin-lte/plugins/datatables/dataTables.bootstrap.css")}}">
@stop

@section('script')
	<script type="text/javascript" src="{{ asset("/bower_components/admin-lte/plugins/datatables/jquery.dataTables.min.js")}}"></script>
	<script type="text/javascript" src="{{ asset("/bower_components/admin-lte/plugins/datatables/dataTables.bootstrap.min.js")}}"></script>
	<script type="text/javascript">
		$(function() {
		    $('#ips-table').DataTable({
		        processing: true,
		        serverSide: true,
		        ajax: '{!! url('dashboard/api/ips') !!}',
		        columns: [
		            { data: 'ip', name: 'ip' },
		            { data: 'created_at', name: 'created_at' },
		            {data: 'action', name: 'action', orderable: false, searchable: false}
		        ]
		    });
		});
	</script>
@stop