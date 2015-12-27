@extends('layouts.admin',[
	'page_title' 		=> 'Dashboard',
	'page_description'	=> 'Control panel'
	])

@section('content')

<!-- Some box stats -->

<div class="row">
	<div class="col-lg-3 col-xs-6">
		<!-- small box -->
		<div class="small-box bg-yellow">
			<div class="inner">
				<h3>44</h3>
				<p>Projects</p>
			</div>
			<div class="icon">
				<i class="fa fa-project"></i>
			</div>
			<a href="{!! url('dashboard/users') !!}" class="small-box-footer">{!! 'More info' !!} <i class="fa fa-arrow-circle-right"></i></a>
		</div>
	</div>
	<div class="col-lg-3 col-xs-6">
		<!-- small box -->
		<div class="small-box bg-blue">
			<div class="inner">
				<h3>44</h3>
				<p>Pending Polls Questions</p>
			</div>
			<div class="icon">
				<i class="fa fa-poll"></i>
			</div>
			<a href="{!! url('dashboard/users') !!}" class="small-box-footer">{!! 'More info' !!} <i class="fa fa-arrow-circle-right"></i></a>
		</div>
	</div>
	<div class="col-lg-6 col-xs-12">
		<!-- small box -->
		<div class="small-box bg-red">
			<div class="inner">
				<h3>8</h3>
				<p>Pending Poll contents</p>
			</div>
			<div class="icon">
				<i class="fa fa-poll"></i>
			</div>
			<a href="{!! url('dashboard/users') !!}" class="small-box-footer">{!! 'More info' !!} <i class="fa fa-arrow-circle-right"></i></a>
		</div>
	</div>
</div>


<div class="row">
	<div class="col-xs-8">
		<div class="box box-primary">
			<div class="box-header">
				<i class="fa fa-th-list"></i>
				<h3 class="box-title">Admin History </h3>
				<div class="box-tools">
					<button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
					<button class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
				</div>
			</div><!-- /.box-header -->
			<div class="box-body table-responsive no-padding">
				<table class="table table-hover">
					<thead>
						<th>Date</th>
						<th>Ip</th>
						<th>Country</th>
						<th>Browser</th>
					</thead>
					<tbody>
						@foreach (Auth::user()->history() as $e)
						<tr>
							<td>{!! $e->created_at->diffForHumans() !!}</td>
							<td>{!! $e->ip !!}</td>
							<td>{!! $e->country or 'N/A' !!}</td>
							<td>{!! $e->browser !!}</td>
						</tr>
						@endforeach
					</tbody>
				</table>
			</div><!-- /.box-body -->
		</div><!-- /.box -->
	</div>
	<div class="col-xs-4">
		<div class="box box-primary">
			<div class="box-header">
				<i class="fa fa-server"></i>
				<h3 class="box-title">Server Information</h3>
				<div class="box-tools">
					<button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
					<button class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
				</div>
			</div><!-- /.box-header -->
			<div class="box-body table-responsive no-padding">
				<table class="table table-hover">
					<tbody>
						<tr>
							<td>Server IP</td>
							<td><b> {!! System::serverIp() !!} </b></td>
						</tr>
						<tr>
							<td>Free Disk Space</td>
							<td><b> {!! System::freeDiskSpace() !!} </b></td>
						</tr>
						<tr class="hidden">
							<td>Disk Space user by Script</td>
							<td><b> {!! '' /* System::usedDiskSpaceByScript() it consume too much fucking time */ !!} </b></td>
						</tr>
						<tr>
							<td>Memory Used</td>
							<td><b> {!! System::memoryUse() !!} </b></td>
						</tr>
						<tr>
							<td>Current CPU Load</td>
							<td><b> {!! System::currentCpuLoad() !!} </b></td>
						</tr>
						<tr>
							<td>PHP Version</td>
							<td><b> {!! System::phpVersion() !!} </b></td>
						</tr>
						<tr>
							<td>MySQL Version</td>
							<td><b> {!! System::mysqlVersion() !!} </b></td>
						</tr>
				</table>
			</div><!-- /.box-body -->
		</div><!-- /.box -->
	</div>
</div>



@stop