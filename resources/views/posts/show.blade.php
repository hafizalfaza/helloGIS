<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
	<script
	  src="https://code.jquery.com/jquery-3.2.1.min.js"
	  integrity="sha256-hwg4gsxgFZhOsEEamdOYGBf13FyQuiTwlAQgxVSNgt4="
	  crossorigin="anonymous"></script>
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
	<style>
		#map{
			height: 400px;
			width: 650px;
		}
	</style>
</head>
<body>
    <div id="app">
        @include('inc.navbar')
		<div class="container" >
			@include('inc.messages')
			<div class="row" style="border: 1px solid black">
				<div class="col-xs-7" >
					<div class="row">
						<div class="col-xs-8">
							<span style="font-size: 20px; font-weight: bold">{{$post->title}}</span>
						</div>
						<div class="col-xs-4 text-center">
							<select id="selectAttr" class="align-middle ">
								<option id="emptyAttribute">Select Attribute</option>
							</select>
						</div>
					</div>
					<div id="map"></div>
				</div>
				
				<div class="col-xs-5" >
					<div style="padding-top: 30px">
						{!!$post->body!!}
					</div>
					<hr>
					<small>Posted at {{$post->created_at}} by <strong>{{$post->user->name}}</strong></small>
					<hr>
					
				</div>
			</div>
			<div style="padding-top: 50px;">
				@if(!Auth::guest())
					@if(Auth::user()->id == $post->user_id)
						<a href="/posts/{{$post->id}}/edit" class="btn btn-default">Edit</a>
						
						{!!Form::open(['action' => ['PostsController@destroy', $post->id], 'method' => 'POST', 'class' => 'pull-right'])!!}
							{{Form::hidden('_method', 'DELETE')}}
							{{Form::submit('Delete', ['class' => 'btn btn-danger'])}}
						{!!Form::close()!!}
					@endif
				@endif
				<button id="toggleLayer" class="btn btn-default btn-md">Toggle Layer Display</button>
			</div>
		</div>    
    </div>
    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}"></script>
    <script src="{{ asset('js/mapStyle.js') }}"></script>
	<script>
		var mapStyle = {!! json_encode($post->map_style) !!};
		var jsonFile = {!! json_encode($post->json_file) !!};

		function initMap(){
			
			var options = {
				zoom: 2,
				center: {lat:50.5819, lng:115.1771},
				styles: getStyles(mapStyle),
			}
			
			var map = new 
			google.maps.Map(document.getElementById('map'), options);
			
			 var infowindow = new google.maps.InfoWindow({
			  size: new google.maps.Size(150, 50)
			});
			
			
			function addDataLayer(){
				map.data.loadGeoJson("/storage/json/"+jsonFile);
				
				var fillColor = '#'+Math.floor(Math.random()*16777215).toString(16);
				
				map.data.setStyle({
				  fillColor: fillColor,
				  fillOpacity: 0.6,
				  strokeWeight: 2,
				  visible: true,
				});
				
				
				
				map.data.addListener('mouseover', function(event) {
					if(event.feature.getProperty('fillColor')){
						fillColor = event.feature.getProperty('fillColor');
					}
				   
				   map.data.overrideStyle(event.feature, {fillColor: 'grey'});
				});
				
				map.data.addListener('mouseout', function(event) {
				   map.data.overrideStyle(event.feature, {fillColor: fillColor});
				});
				
				
				map.data.addListener('click', function(event) {
					   var contentString;
						contentString = "No attribute selected!"
						 infowindow.setContent(contentString);
						infowindow.setPosition(event.latLng);
						infowindow.open(map);
						
					});
				
				
				function onSelectChange(){
					var selectedAttr = document.getElementById('selectAttr').value;
					var maxNumber;
					var minNumber;
					map.data.addListener('click', function(event) {
						// console.log(event.feature);
						map.data.forEach(function(feature){
							// console.log(typeof feature.f[selectedAttr]);
						});
						// console.log(map.data)
					   var contentString;
						contentString = selectedAttr +': '+event.feature.f[selectedAttr].toString();
						infowindow.setContent(contentString);
						infowindow.setPosition(event.latLng);
						infowindow.open(map);
						
						// $.each(event.feature.f, function(index, value) {
							// console.log(value);
						// }); 
					});
						
					
						map.data.forEach(function(feature){
							if(typeof feature.f[selectedAttr] == 'string'){
								var eachFillColor = '#'+Math.floor(Math.random()*16777215).toString(16);
								 map.data.overrideStyle(feature, {fillColor: eachFillColor});
								 feature.setProperty('fillColor', eachFillColor);
							}else if(typeof feature.f[selectedAttr] == 'number'){
								
								function getMinMax(){

									if(maxNumber && minNumber){
										if(feature.f[selectedAttr] > maxNumber){
											maxNumber = feature.f[selectedAttr];
										}
										
										if(feature.f[selectedAttr] < minNumber){
											minNumber = feature.f[selectedAttr];
										}
										

									}else{
										maxNumber = feature.f[selectedAttr];
										minNumber = feature.f[selectedAttr];	
									}
									
									return {maxNumber, minNumber};
								}
									
								function numberRange(minMax){
									return minMax.maxNumber;
								}
								
								console.log(feature.f[selectedAttr]/numberRange(getMinMax()));
								 
								 function ColorLuminance(hex, lum) {

									// validate hex string
									hex = String(hex).replace(/[^0-9a-f]/gi, '');
									if (hex.length < 6) {
										hex = hex[0]+hex[0]+hex[1]+hex[1]+hex[2]+hex[2];
									}
									lum = lum || 0;

									// convert to decimal and change luminosity
									var rgb = "#", c, i;
									for (i = 0; i < 3; i++) {
										c = parseInt(hex.substr(i*2,2), 16);
										c = Math.round(Math.min(Math.max(0, c + (c * lum)), 255)).toString(16);
										rgb += ("00"+c).substr(c.length);
									}

									return rgb;
								}
								var denominator;
								if(feature.f[selectedAttr]/numberRange(getMinMax()) < 0){
									denominator = 0.01;
								}else{
									denominator = feature.f[selectedAttr]/numberRange(getMinMax());
								}
								
								var eachFillColor = ColorLuminance("6699CC", (denominator));
								 map.data.overrideStyle(feature, {fillColor: eachFillColor});
								 feature.setProperty('fillColor', eachFillColor);
							
						}
 
						})
					
				}
				
				function attrSelectFocus(){
					document.getElementById('emptyAttribute').disabled=true;
				}
				function attrSelectBlur(){
					document.getElementById('emptyAttribute').disabled=false;
				}
				
				document.getElementById('selectAttr').onchange = onSelectChange;
				
				document.getElementById('selectAttr').onfocus = attrSelectFocus;
				
				document.getElementById('selectAttr').onblur = attrSelectBlur;
				
			}
			
			addDataLayer();
			
			var optionsList;
			
			$.getJSON("/storage/json/"+jsonFile, function(json) {
				$.each(json.features[0].properties, function(index, value) {
					var node = document.createElement("OPTION");  
					var textnode = document.createTextNode(index);  
					node.appendChild(textnode);    
					document.getElementById('selectAttr').appendChild(node);
				});
			});
			
			
			var layerVisible = true;
			
			document.getElementById('toggleLayer').onclick = function(){
				if(layerVisible){
					map.data.forEach(function(feature) {
						   //filter...
							map.data.remove(feature);
							
					});
					layerVisible=false;
				}else{
					addDataLayer();
					layerVisible=true;
				}					
					
			}
			
			// google.maps.event.addListener(map, 'click', function(event) {
					// console.log(map.getZoom());
			// });

		}
		
	</script>
	<script async defer
	src="https://maps.googleapis.com/maps/api/js?key=AIzaSyD4rUCbWKJ65c9RWyRoo6XiUiYY-wfNPbU&callback=initMap">
    </script>
</body>
</html>
