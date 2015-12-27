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
			<li><a href="{!! url('dashboard/pages/create') !!}">Add New Page</a></li>
			<li class="active"><a href="{!! url('dashboard/pages') !!}">Manage Pages</a></li>
			
			<li class="pull-left header"><i class="fa fa-book"></i> Manage static site contents</li>
		</ul>
		<div class="tab-content box-body">
			<div class="tab-pane active" id="">
				<table class="table table-bordered" id="pages-table">
			        <thead>
			            <tr>
			                <th>Title</th>
			                <th>Slug</th>
			                <th>Created At</th>
			                <th>Last Update</th>
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
		    $('#pages-table').DataTable({
		        processing: true,
		        serverSide: true,
		        ajax: '{!! url('dashboard/api/pages') !!}',
		        columns: [
		            { data: 'title', name: 'title' },
		            { data: 'slug', name: 'slug' },
		            { data: 'created_at', name: 'created_at' },
		            { data: 'updated_at', name: 'updated_at' },
		            {data: 'action', name: 'action', orderable: false, searchable: false}
		        ]
		    });
		});
	</script>
@stop