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
				<table class="table table-bordered" id="hoteltypes-table">
			        <thead>
			            <tr>
			                <th>Hotel Type</th>
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
		    $('#hoteltypes-table').DataTable({
		        processing: true,
		        serverSide: true,
		        ajax: '{!! url('dashboard/api/hoteltypes') !!}',
		        columns: [
		            { data: 'name', name: 'name' },
		            {data: 'action', name: 'action', orderable: false, searchable: false}
		        ]
		    });
		});
	</script>
@stop