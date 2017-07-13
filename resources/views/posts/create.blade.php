<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
	<style>
		#map{
			height: 200px;
			width: 300px;
		}
	</style>
</head>
<body>
    <div id="app">
        @include('inc.navbar')
		<div class="container">
			@include('inc.messages')
			 <h1>Create Post</h1>
		{!! Form::open(['action' => 'PostsController@store', 'method' => 'POST', 'enctype'=>'multipart/form-data']) !!}
			<div class="form-group">
			{{Form::label('title', 'Title')}}
			{{Form::text('title', '', ['class' => 'form-control', 'placeholder' => 'Title'])}}
			</div>
			<div style="margin: auto; max-width: 600px;">
				<div class="row">
					<div id="map" class="col-xs-6" ></div>
					<div class="col-xs-6">
						<div class="form-group">
						{{Form::label('map_style', 'Map Style')}}
						{{ Form::select('map_style', [
						   'default' => 'Default',
						   'black_and_white' => 'Black and White',
						   'pale_down' => 'Pale Down',
						   'paper' => 'Paper',
						   'shades_of_grey' => 'Shades of Grey',
						   'subtle_grayscale' => 'Subtle GrayScale',
						   'unsaturated_browns' => 'Unsaturated Browns'],
						   'default', 
							array('id' => 'mapStyle')
						) }}
						</div>
						<div class="form-group">
							{{Form::label('cover_image', 'Cover Image')}}
							{{Form::file('cover_image')}}
						</div>
						<div class="form-group">
							{{Form::label('json_file', 'JSON File')}}
							{{Form::file('json_file')}}
						</div>
					</div>
				</div>
			</div>
			<div class="form-group">
			{{Form::label('body', 'body')}}
			{{Form::textarea('body', '', ['id' => 'article-ckeditor', 'class' => 'form-control', 'placeholder' => 'Body/Text'])}}
			</div>
			{{Form::submit('submit', ['class' => 'btn btn-primary'])}}
		{!! Form::close() !!}
		</div>    
    </div>
    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}"></script>
	<script src="{{ asset('js/mapStyle.js') }}"></script>
	<script src="/vendor/unisharp/laravel-ckeditor/ckeditor.js"></script>
    <script>
        CKEDITOR.replace( 'article-ckeditor' );
    </script>
	<script>
		function initMap(){
			var options = {
				zoom: 8,
				center: {lat:-8.5819, lng:115.1771},
			}
			
			var map = new 
			google.maps.Map(document.getElementById('map'), options);
			
			function foo(){
				var mapStyle = document.getElementById('mapStyle').value;
				var mapOptions = {
					zoom: 8,
					center: {lat:-8.5819, lng:115.1771},
					styles: getStyles(mapStyle),
				}
				map.setOptions(mapOptions);
			}
		
			document.getElementById('mapStyle').onchange = foo;
			
		}

	</script>
	<script async defer
	src="https://maps.googleapis.com/maps/api/js?key=AIzaSyD4rUCbWKJ65c9RWyRoo6XiUiYY-wfNPbU&callback=initMap">
    </script>
</body>
</html>