<?php $lc = $locale; ?>
<?php $locale = !empty($lc) ? ($lc.'[') : ''; ?>
<?php $e = !empty($lc) ? ']' : ''; ?>

@inject('core','Hoteru\\Core')

<div class="tab-pane active" id="tab-1">
	<div class="row">
		<div class="col-md-3">
			<div class="form-group @if ($errors->has('hoteru_type_id')) has-error @endif">
				{!! Form::label('hoteru_type_id','Name of the hotel type') !!}
				{!! Form::select('hoteru_type_id',$types,!isset($hotel) ? null : $hotel->hoteru_type_id,['class'=>'form-control select2','placeholder'=>'Enter the hotel type'])!!}
				@if ($errors->has('hoteru_type_id')) <p class="help-block">{{ $errors->first('hoteru_type_id') }}</p> @endif
			</div>
		</div>
		<div class="col-md-4">
			<div class="form-group @if ($errors->has('quarter_id')) has-error @endif">
				{!! Form::label('quarter_id','Name the quarter') !!}
				{!! Form::select('quarter_id',$quarters,!isset($hotel) ? null : $hotel->quarter_id,['class'=>'form-control select2','placeholder'=>'Enter the hotel type'])!!}
				@if ($errors->has('quarter_id')) <p class="help-block">{{ $errors->first('quarter_id') }}</p> @endif
			</div>
		</div>
		<div class="col-md-5">
			<div class="form-group @if ($errors->has('address')) has-error @endif">
				{!! Form::label('address','Hotel Address') !!}
				{!! Form::text('address',!isset($hotel) ? null : $hotel->address,['class'=>'form-control','placeholder'=>'Enter Hotel Address'])!!}
				@if ($errors->has('address')) <p class="help-block">{{ $errors->first('address') }}</p> @endif
			</div>
		</div>
		@if($action=='edit')
		<div class="col-md-12">
			<div class="nav-tabs-custom">
				@include('partials._tablang',['locales'=>$core->getLocales()])
				<div class="tab-content">
					<div class="tab-pane active" id="tab-{!! App::getLocale() !!}">
						<div class="row">
							@include('dashboard.hotels.listing.partials._el',['locale'=>App::getLocale()])
						</div>
					</div>
					@foreach($core->getLocales() as $l)
					<div class="tab-pane" id="tab-{!! $l !!}">
						<div class="row">
							@include('dashboard.hotels.listing.partials._el',['locale'=>$l])
						</div>
					</div>
					@endforeach
				</div>
			</div>
		</div>
		@else
			@include('dashboard.hotels.listing.partials._el',['locale'=>''])
		@endif
	</div>
</div>
<div class="tab-pane" id="tab-2" ng-app="hoteru" ng-controller="facilities">
	<div class="row">
		<div class="col-md-12">
			<div class="pull-right" style="margin-bottom: 15px;">
				<input type="text" class="form-control input-sm" ng-model="query" value="" placeholder="Search for facilities ..">
			</div>
		</div>
		<div class="col-md-3 col-sm-4" ng-repeat="f in filteredItems = (facilities|filter:query)">
			<button class="btn btn-block btn-sm" ng-class="isSelected(f) ? 'btn-success' : ''" type="button" ng-click="toggle(f)" style="margin-bottom:5px">
				<i ng-show="isSelected(f)" class="fa fa-check"></i> @{{ f.name }}
			</button>
		</div>
		<div class="col-md-4">
			<div ng-hide="filteredItems.length">No items found</div>
		</div>
		{!! Form::hidden('facilities',null,['ng-value'=>'selectedFacilities','id'=>'facilitiesField']) !!}
	</div>
</div>
<div class="tab-pane" id="tab-3">
	<div class="form-group">
		{!! Form::label('','Please Locate the city using a google map marker') !!}
		{!! Form::text('','',['class'=>'map-searchbox','id'=>'pac-input']) !!}
		<div id="mapcanvas"></div>
	</div>
	<div class="form-group">
		{!! Form::text('gps[latitude]',null,['class'=>'form-control','readonly','placeholder'=>'Latitude','id'=>'lat'])!!}
	</div>
	<div class="form-group">
		{!! Form::text('gps[longitude]',null,['class'=>'form-control','readonly','placeholder'=>'Longitude','id'=>'lng'])!!}
	</div>
</div>
<div class="tab-pane" id="tab-4">
	tab4
</div>

@section('script')
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCh-ulCiZNgFLuxHgEBI4aT5LS4ZUKV0ls&v=3.exp&sensor=false&libraries=places"></script>
<script src="//ajax.googleapis.com/ajax/libs/angularjs/1.4.7/angular.min.js" type="text/javascript"></script>
<script src="{!! asset('assets/js/map.js') !!}"></script>
<script>
MapCanvas.positionPicker({
	canvasSelector 	: 'mapcanvas',
	defaultLat 		: {!! $hotel->gps->latitude or '31.632705674610456' !!},
	defaultLng 		: {!! $hotel->gps->longitude or '-8.009468078613281' !!},
	targetLat		: 'lat',
	targetLng		: 'lng',
	searchInput		: 'pac-input'
});
var app = angular.module('hoteru',[]);

app.controller('facilities',function($scope){
		
	var refactor = function(arr){
		return arr.map(function(value){
			return {
				id : value.id,
				name : value.name
			};
		});
	};
	var items = refactor({!! $facilities !!});
	var selected = refactor({!! $selected or '[]' !!});

	var has = function(id,arr,exists){
		for (i = 0; i < arr.length; i++ )
	    {
	        if (arr[i].id == id)
	        {
	            return (exists === true) ? true : i;
	        }
	    }
	}

	var stringify = function(arr){
		return arr.map(function(elem){
			return elem.id;
		}).join(';');
	};

	$scope.facilities = items.slice(0);

	angular.element('#facilitiesField').val(stringify(selected));

	$scope.toggle = function(f){
		if (has(f.id,selected)){
			var index = has(f.id,selected);
			selected.splice(index,1);
		}else{
			selected.push(f);
		}
		angular.element('#facilitiesField').val(stringify(selected));
	};

	$scope.isSelected = function(f){
		return has(f.id,selected,true);
	};

});
</script>
@stop

@section('css')
<style>
#mapcanvas{
    width:100%;
    height:250px !important;
}
.map-searchbox {
  margin-top: 10px;
  border: 1px solid transparent;
  border-radius: 2px 0 0 2px;
  box-sizing: border-box;
  -moz-box-sizing: border-box;
  height: 32px;
  outline: none;
  box-shadow: 0 2px 6px rgba(0, 0, 0, 0.3);
}

#pac-input {
  background-color: #fff;
  font-family: Roboto;
  font-size: 15px;
  font-weight: 300;
  margin-left: 12px;
  padding: 0 11px 0 13px;
  text-overflow: ellipsis;
  width: 300px;
}

#pac-input:focus {
  border-color: #4d90fe;
}

.pac-container {
  font-family: Roboto;
}

#type-selector {
  color: #fff;
  background-color: #4d90fe;
  padding: 5px 11px 0px 11px;
}

#type-selector label {
  font-family: Roboto;
  font-size: 13px;
  font-weight: 300;
}
</style>
@stop