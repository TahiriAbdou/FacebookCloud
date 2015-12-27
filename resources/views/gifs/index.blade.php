@extends('layouts.admin',[
	'page_title'		=> 'Gallery Images',
	'page_description'	=> 'Manage Created Images'
])

@section('content')

<div class="row">
<div class="col-md-12">
	<div class="box box-warning">
	<div class="nav-tabs-custom">
		<ul class="nav nav-tabs pull-right box-header with-border">
			<li><a href="{!! url('dashboard/gifs/create') !!}">Create an image using Image Creator</a></li>
			<li class="active"><a href="{!! url('dashboard/gifs') !!}">Manage Images</a></li>
			
			<li class="pull-left header"><i class="fa fa-bed"></i> Manage Created Images</li>
		</ul>
		<div class="tab-content box-body">
			<div class="tab-pane active" id="">
				<table class="table table-bordered" id="gifs-table">
			        <thead>
			            <tr>
			                <th>Id</th>
			            </tr>
			        </thead>
			    </table>
			</div>
		</div><!-- /.tab-content -->
		</div><!-- nav-tabs-custom -->
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
		    $('#gifs-table').DataTable({
		        processing: true,
		        serverSide: true,
		        ajax: '{!! url('dashboard/api/gifs') !!}',
		        columns: [
		            { data: 'id', name: 'id' },
		            { data: 'created_at', name: 'created_at' },
		            {data: 'action', name: 'action', orderable: false, searchable: false}
		        ]
		    });
		});
	</script>
@stop