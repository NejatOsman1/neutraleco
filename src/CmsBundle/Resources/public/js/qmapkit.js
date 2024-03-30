/*
	qMapKit is an open wrapper for easier Apple MapKit JS functions

	Basic config:

	qmapkit.token = 'eyJhbGciOiJFUzI1NiIsInR5cCI6IkpXVCIsImtpZCI6IkJYMjczQ0s1WjcifQ.eyJpc3MiOiJOM1E0MkczNjY0IiwiaWF0IjoxNTY1MTgxNjYzLCJleHAiOjE1NjUxODUyNjN9.MEQCIGrvtXABLL7f8x94avxNM40SyqJVJsH7u1J0gpJFRfQiAiBEIcYKL9Y-_KTvNS5sF2gW-MDSzVRN9q-XG4UwCiB7kw';
	qmapkit.init('nl');
	qmapkit.setRegion(52.1008333, 5.6461111, 0.167647972, 0.354985255);
	qmapkit.addMarker({
		title: "Work", // Required
		coords: [52.1008333, 5.6461111],
		color: '#969696',
		subtitle: "Apple Park",
		selected: "true",
		glyphText: "",
		callout: {} // Comment to hide callout and only enlarge the marker
	});
*/
if(typeof qmapkit == 'undefined'){
	var mapkit_initialized = null;
	var qmapkit = {
		id: 'map',
		token: '',
		locale: '',
		markers: [],
		geocoder: null,
		directionsObj: null,
		etaObj: null,
		map: null,
		region: null,
		init: function(locale, callback, showMap){
			if(mapkit_initialized == null){
				mapkit_initialized = true;
				showMap = (typeof showMap != 'undefined' ? showMap : true);
				// var script = document.createElement('script');
				// script.onload = function () {
					mapkit.init({
						authorizationCallback: function(done) {
							// console.log('Done:', qmapkit.token);
							done(qmapkit.token);
							if(showMap){
								qmapkit.map = new mapkit.Map(qmapkit.id);
								qmapkit.map.distances = mapkit.Map.Distances.Metric;								qmapkit.map.showsCompass = mapkit.FeatureVisibility.Hidden;
								qmapkit.map.showsMapTypeControl = false;
								qmapkit.map.showsZoomControl = false;
								qmapkit.map.isZoomEnabled = false;
								qmapkit.map.isScrollEnabled = false;
							}
							// qmapkit.map.showsUserLocation = true;
							// qmapkit.map.userLocationAnnotation = true;
							if(typeof callback != 'undefined'){
								callback();
							}
						},
						language: locale
					});
				// };
				// script.src = 'https://cdn.apple-mapkit.com/mk/5.x.x/mapkit.js';
				// document.head.appendChild(script);
				this.locale = locale;
			}else{
				callback();
			}
		},

		/*
			Enable zoom control
		*/
		enableZoom: function(){
			this.map.showsZoomControl = true;			this.map.isZoomEnabled = true;
		},

		/*
			Enable pan gestures
		*/
		enablePan: function(){
			this.map.isScrollEnabled = true;
		},

		/*
			Enable map control
		*/
		enableMapType: function(){
			this.map.showsMapTypeControl = true;
		},

		/*
			Set default map type
		*/
		setMapType: function(val){
			if(val == 'MutedStandard'){
				this.map.mapType = mapkit.Map.MapTypes.MutedStandard;
			}else if(val == 'Satellite'){
				this.map.mapType = mapkit.Map.MapTypes.Satellite;
			}else if(val == 'Hybrid'){
				this.map.mapType = mapkit.Map.MapTypes.Hybrid;
			}else{
				this.map.mapType = mapkit.Map.MapTypes.Standard;
			}
		},

		/*
			Show compass
		*/
		enableCompass: function(){
			this.map.showsCompass = mapkit.FeatureVisibility.Adeptive;
		},

		/*
			Enable dark mode
		*/
		setDark: function(){
			this.map.colorScheme = mapkit.Map.ColorSchemes.Dark;
		},

		/*
			Set region to zoom to
		*/
		setRegion: function(lat, lng, span_lat, span_lng){

			if(typeof lng == 'undefined'){
				if(typeof lat == 'object'){
					if(typeof lat.center != 'undefined' || typeof lat.region != 'undefined'){
						if(typeof lat.region != 'undefined'){
							lat = lat.region;
						}

						this.region = new mapkit.CoordinateRegion(
							new mapkit.Coordinate(lat.center.latitude, lat.center.longitude),
							new mapkit.CoordinateSpan(lat.span.latitudeDelta, lat.span.longitudeDelta)
						);
					}else{
						console.log( 'QMAPKIT: invalid region:', lat );
					}
				}
			}else{
				this.region = new mapkit.CoordinateRegion(
					new mapkit.Coordinate(lat, lng),
					new mapkit.CoordinateSpan(span_lat, span_lng)
				);
			}

			if(this.region){
				this.map.region = this.region;
			}
		},

		/*
			Click + shift event
		*/
		shiftClick: function(callback){
			this.map.element.addEventListener("click", function(event) {
				if(!event.shiftKey) { return; }

				if(typeof callback == 'function'){ callback(); }
			});
		},

		/*
			Click event
		*/
		click: function(callback){
			this.map.element.addEventListener("click", function(event) {
				if(typeof callback == 'function'){ callback(); }
			});
		},

		/*
			Remove marker
		*/
		removeMarker: function(marker){
			this.map.removeAnnotation(marker);
		},

		/*
			Define marker
		*/
		defineMarker: function(obj){
			var marker = null;
			if(typeof obj.title != 'undefined'){

				if(typeof obj.coords == 'object' && typeof obj.coords.latitude != 'undefined'){
					var coordsArr = [obj.coords.latitude, obj.coords.longitude];
					obj.coords = coordsArr;
				}

				var markerCoords = new mapkit.Coordinate(obj.coords[0], obj.coords[1]);
				if(typeof obj.icon != 'undefined'){
					marker = new mapkit.ImageAnnotation(markerCoords, {url: obj.icon});
				}else{
					marker = new mapkit.MarkerAnnotation(markerCoords);
				}

				// Title is required for marker
				marker.title = obj.title;
				
				if(typeof obj.color != 'undefined'){
					marker.color = obj.color;
				}
				if(typeof obj.subtitle != 'undefined'){
					marker.subtitle = obj.subtitle;
				}
				if(typeof obj.selected != 'undefined'){
					marker.selected = obj.selected;
				}
				if(typeof obj.glyphText != 'undefined'){
					marker.glyphText = obj.glyphText;
				}

				// Show callout if defined
				if(typeof obj.callout != 'undefined'){
					marker.callout = obj.callout;
				}

			}else{
				console.warn('QMAPKIT: marker title is required.');
			}

			return marker;
		},

		/*
			Append marker to map
		*/
		appendMarker: function(obj){
			var marker = this.defineMarker(obj);
			this.map.addAnnotation(marker);
			return marker;
		},

		/*
			Add marker (collection based)
		*/
		addMarker: function(obj){
			var marker = this.defineMarker(obj);

			if(marker){
				this.markers.push(marker);
				this.map.showItems(this.markers);
			}

			return marker;
		},

		/*
			Search for address
		*/
		lookup: function(searchString, callback){
			if(this.geocoder == null){
				this.geocoder = new mapkit.Geocoder({
					language: this.locale,
					getsUserLocation: true
				});
			}
			this.geocoder.lookup(searchString, function(err, data) {
				if(data.results.length){
					var res = data.results[0];
					if(res.geocodeAccuracy != "UNKNOWN"){
						// We need at least something better than 'UNKNOWN'

						if(typeof callback == 'function'){ callback(res); }
					}else{
						console.log( 'QMAPKIT: No geo results (accuracy: ' + res.geocodeAccuracy + ')' );	
					}
				}else{
					console.log( 'QMAPKIT: No geo results (literal)' );
				}
			});
		},

		/*
			Get directions
		*/
		directions: function(from, to, callbackRoute){
			if(this.directionsObj == null){
				this.directionsObj = new mapkit.Directions({
					language: this.locale
				});
			}
			this.directionsObj.route({ 
				origin: from, 
				destination: to, 
				transportType: mapkit.Directions.Transport.Automobile
			}, function(err, data) {
				if(typeof callbackRoute == 'function'){ 
					callbackRoute(err, data);
				}
			});
		},
	};
}