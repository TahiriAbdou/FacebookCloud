var MapCanvas = function(){
	var map;
	var marker;
	var currentLocation;
	var input;
	var searchBox;
	return {
		initialize : function(options){
			map = new google.maps.Map(
				document.getElementById(options.canvasSelector),
				{
					center 		: new google.maps.LatLng(options.defaultLat,options.defaultLng),
					zoom 		: 12,
					styles 		: this.style(),
					mapTypeId 	: google.maps.MapTypeId.ROADMAP
				}
			);

			currentLocation = new google.maps.LatLng(options.defaultLat, options.defaultLng);
			marker = new google.maps.Marker({
				position : currentLocation,
				map: map,
				draggable : true
			});
			document.getElementById(options.targetLat).value = currentLocation.lat();
			document.getElementById(options.targetLng).value = currentLocation.lng();
			
			google.maps.event.addListener(marker,'dragend',function(event){
				var currentLocation = marker.getPosition();
				document.getElementById(options.targetLat).value = currentLocation.lat();
				document.getElementById(options.targetLng).value = currentLocation.lng();
			});
			input = document.getElementById(options.searchInput);
			searchBox = new google.maps.places.SearchBox(input);
			map.controls[google.maps.ControlPosition.TOP_LEFT].push(input);

			// Bias the SearchBox results towards current map's viewport.
			map.addListener('bounds_changed', function() {
				searchBox.setBounds(map.getBounds());
			});

			var markers = [];
			// [START region_getplaces]
			// Listen for the event fired when the user selects a prediction and retrieve
			// more details for that place.
			searchBox.addListener('places_changed', function() {
			var places = searchBox.getPlaces();

			if (places.length == 0) {
			  	return;
			}

			// Clear out the old markers.
			markers.forEach(function(marker) {
			  	marker.setMap(null);
			});
			markers = [];

			// For each place, get the icon, name and location.
			var bounds = new google.maps.LatLngBounds();
			places.forEach(function(place) {
				var icon = {
					url: place.icon,
					size: new google.maps.Size(71, 71),
					origin: new google.maps.Point(0, 0),
					anchor: new google.maps.Point(17, 34),
					scaledSize: new google.maps.Size(25, 25)
				};

				// Create a marker for each place.
				markers.push(new google.maps.Marker({
					map: map,
					icon: icon,
					title: place.name,
					position: place.geometry.location,
					draggable: true
				}));

				if (place.geometry.viewport) {
					// Only geocodes have viewport.
					bounds.union(place.geometry.viewport);
				} else {
					bounds.extend(place.geometry.location);
				}
			});
			if(markers.length == 0){
				return;
			}
			markers.forEach(function(m){
				google.maps.event.addListener(m,'dragend',function(event){
					var currentLocation = m.getPosition();
					document.getElementById(options.targetLat).value = currentLocation.lat();
					document.getElementById(options.targetLng).value = currentLocation.lng();
				});
			});
				document.getElementById(options.targetLat).value = markers[0].getPosition().lat();
				document.getElementById(options.targetLng).value = markers[0].getPosition().lng();
				map.fitBounds(bounds);
			});

		},
		markLocation :  function(options,marker){
			var currentLocation = marker.getPosition();
			document.getElementById(options.targetLat).value = currentLocation.lat();
			document.getElementById(options.targetLng).value = currentLocation.lng();
		},

		addToDOM : function(){
			google.maps.event.addDomListener(window, 'load', this.initialize);
		},

		positionPicker : function(options){
			this.initialize(options);/*
			if(currentLocation==undefined){
				currentLocation = new google.maps.LatLng(options.defaultLat, options.defaultLng);
			}
			if(marker==undefined){
				marker = new google.maps.Marker({
					position : currentLocation,
					map: map,
					draggable : true
				});
				marker.setPosition(currentLocation);
				this.markLocation(options);
				call = this.markLocation;
				google.maps.event.addListener(marker,'dragend',function(event){call(options);});
			}
			return options;*/
		},

		style : function(){
			return JSON.parse('[{"featureType":"administrative","elementType":"labels.text.fill","stylers":[{"color":"#444444"}]},{"featureType":"landscape","elementType":"all","stylers":[{"color":"#f2f2f2"}]},{"featureType":"poi","elementType":"all","stylers":[{"visibility":"off"}]},{"featureType":"road","elementType":"all","stylers":[{"saturation":-100},{"lightness":45}]},{"featureType":"road.highway","elementType":"all","stylers":[{"visibility":"simplified"}]},{"featureType":"road.arterial","elementType":"labels.icon","stylers":[{"visibility":"off"}]},{"featureType":"transit","elementType":"all","stylers":[{"visibility":"off"}]},{"featureType":"water","elementType":"all","stylers":[{"color":"#46bcec"},{"visibility":"on"}]}]');
		}
	};
}();