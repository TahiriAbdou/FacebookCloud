@extends('layouts.admin',[
	'page_title'		=> 'Site Settings',
	'page_description'	=> 'Site details settings'
])

@section('content')
{!! Form::open(['action'=>'Dashboard\\SettingsController@postIndex']) !!}
<div class="row">
	<div class="col-md-12">
		<div class="box box-info">
			<div class="row">
				<div class="col-md-6">
					<div class="box-header with-border">
						<i class="fa fa-cog"></i> Site Details
					</div>
					<div class="box-body">
						<div class="form-group">
							{!! Form::label('name','Site name') !!}
							{!! Form::text('name',$settings['name'],['class'=>'form-control input-sm','placeholder'=>'Enter site name'])!!}
						</div>
						<div class="form-group">
							{!! Form::label('copyrights','Copyrights Text') !!}
							{!! Form::text('copyrights',$settings['copyrights'],['class'=>'form-control input-sm','placeholder'=>'Enter copyrights text'])!!}
						</div>
						<div class="form-group">
							{!! Form::label('contact_address','Contact Address') !!}
							{!! Form::text('contact_address',$settings['contact_address'],['class'=>'form-control input-sm','placeholder'=>'Enter contact address'])!!}
						</div>
						<div class="form-group">
							{!! Form::label('contact_phone','Contact Phone') !!}
							{!! Form::text('contact_phone',$settings['contact_phone'],['class'=>'form-control input-sm','placeholder'=>'Enter contact email'])!!}
						</div>
						<div class="form-group">
							{!! Form::label('contact_mail','Contact email') !!}
							{!! Form::text('contact_mail',$settings['contact_mail'],['class'=>'form-control input-sm','placeholder'=>'Enter contact email'])!!}
						</div>
						<div class="form-group">
							{!! Form::label('admin_mail','Admin Email ID (This will be used for outgoing emails sent via the site)') !!}
							{!! Form::text('admin_mail',$settings['admin_mail'],['class'=>'form-control input-sm','placeholder'=>'Enter Admin Email'])!!}
						</div>
					</div>
				</div>
				<div class="col-md-6">
					<div class="box-header with-border">
						<i class="fa fa-share-square"></i> Socialmedia Links
					</div>
					<div class="box-body">
						<div class="form-group">
							{!! Form::label('facebook_url','Facebook URL') !!}
							{!! Form::text('facebook_url',$settings['facebook_url'],['class'=>'form-control input-sm','placeholder'=>'Enter Facebook url'])!!}
						</div>
						<div class="form-group">
							{!! Form::label('twitter_url','Twitter URL') !!}
							{!! Form::text('twitter_url',$settings['twitter_url'],['class'=>'form-control input-sm','placeholder'=>'Enter Twitter url'])!!}
						</div>
						<div class="form-group">
							{!! Form::label('google_url','Google-plus URL') !!}
							{!! Form::text('google_url',$settings['google_url'],['class'=>'form-control input-sm','placeholder'=>'Enter Google-plus url'])!!}
						</div>
						<div class="form-group">
							{!! Form::label('pinterest_url','Pinterest URL') !!}
							{!! Form::text('pinterest_url',$settings['pinterest_url'],['class'=>'form-control input-sm','placeholder'=>'Enter Pinterest url'])!!}
						</div>
						<div class="form-group">
							{!! Form::label('instagram_url','Instagram URL') !!}
							{!! Form::text('instagram_url',$settings['instagram_url'],['class'=>'form-control input-sm','placeholder'=>'Enter Instagram url'])!!}
						</div>
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col-md-6">
					<div class="box-header with-border">
						<i class="fa fa-google"></i> SEO Details
					</div>
					<div class="box-body">
						<div class="form-group">
							{!! Form::label('title_tag','Title Tag') !!}
							{!! Form::text('title_tag',$settings['title_tag'],['class'=>'form-control input-sm','placeholder'=>'Enter site title tag'])!!}
						</div>
						<div class="form-group">
							{!! Form::label('meta_description','Meta Description') !!}
							{!! Form::text('meta_description',$settings['meta_description'],['class'=>'form-control input-sm','placeholder'=>'Enter description'])!!}
						</div>
						<div class="form-group">
							{!! Form::label('meta_keywords','Meta Keywords\'s') !!}
							{!! Form::text('meta_keywords',$settings['meta_keywords'],['class'=>'form-control input-sm','placeholder'=>'Enter meta keywords'])!!}
						</div>
						<div class="form-group">
							{!! Form::label('footer_tags','Footer popular tags') !!}
							{!! Form::text('footer_tags',$settings['footer_tags'],['class'=>'form-control input-sm','placeholder'=>'Enter Footer tags'])!!}
						</div>
						<div class="form-group">
							{!! Form::label('google_analytics','Google Analytics:') !!}
							{!! Form::text('google_analytics',$settings['google_analytics'],['class'=>'form-control input-sm','placeholder'=>'UA-XXXXX-XX'])!!}
						</div>
					</div>
				</div>
				<div class="col-md-12">
					<div class="box-body">
						<div class="form-group">
							{!! Form::submit('Save',['class'=>'btn btn-flat btn btn-primary']) !!}
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
{!! Form::close() !!}
@stop