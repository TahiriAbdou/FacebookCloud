@extends('layouts.admin',[
	'page_title'		=> 'Posts',
	'page_description'	=> 'Manage Created Posts'
])

@section('content')

<div class="row">
<div class="col-md-12">
	<div class="box box-warning">
	<div class="nav-tabs-custom">
		<ul class="nav nav-tabs pull-right box-header with-border">
			<li><a href="{!! url('dashboard/posts/create') !!}">Add a post</a></li>
			<li class="active"><a href="{!! url('dashboard/posts') !!}">Manage Posts</a></li>
			
			<li class="pull-left header"><i class="fa fa-bed"></i> Manage Created Posts</li>
		</ul>
		<div class="tab-content box-body">
			<div class="tab-pane active" id="">
				<table class="table table-bordered" id="posts-table">
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
		    $('#posts-table').DataTable({
		        processing: true,
		        serverSide: true,
		        ajax: '{!! url('dashboard/api/posts') !!}',
		        columns: [
		            { data: 'id', name: 'id' },
		            { data: 'created_at', name: 'created_at' },
		            {data: 'action', name: 'action', orderable: false, searchable: false}
		        ]
		    });
		});
	</script>
@stop