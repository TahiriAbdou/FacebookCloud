@extends('layouts.admin',[
	'page_title'		=> 'Hotels',
	'page_description'	=> 'Manage listing hotels'
])

@section('content')

<div class="row">
<div class="col-md-12">
	<div class="box box-warning">
	<div class="nav-tabs-custom">
		<ul class="nav nav-tabs pull-right box-header with-border">
			<li><a href="{!! url('dashboard/hotels/listing/create') !!}">Add New Hotel</a></li>
			<li class="active"><a href="{!! url('dashboard/hotels/listing') !!}">Manage Hotels</a></li>
			
			<li class="pull-left header"><i class="fa fa-bed"></i> Manage listing hotels</li>
		</ul>
		<div class="tab-content box-body">
			<div class="tab-pane active" id="">
				<table class="table table-bordered" id="hotels-table">
			        <thead>
			            <tr>
			                <th>Hotel</th>
			                <th>Type</th>
			                <th>Quarter</th>
			                <th>User</th>
			                <th>Added</th>
			                <th>Action</th>
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
		    $('#hotels-table').DataTable({
		        processing: true,
		        serverSide: true,
		        ajax: '{!! url('dashboard/api/hotels') !!}',
		        columns: [
		            { data: 'name', name: 'name' },
		            { data: 'hoteru_type', name: 'hoteru_type' },
		            { data: 'quarter', name: 'quarter' },
		            { data: 'user', name: 'user' },
		            { data: 'created_at', name: 'hoterus.created_at' },
		            {data: 'action', name: 'action', orderable: false, searchable: false}
		        ]
		    });
		});
	</script>
@stop