<!DOCTYPE html>
<html  ng-app="userApp" >

    <head>
	<meta charset="UTF-8">
	<title>@yield('title')</title>
	<meta name="viewport" content="width=device-width, initial-scale=1.0,maximum-scale=1.0, user-scalable=no">
	<link href="https://fonts.googleapis.com/css?family=Amatic+SC|Anton|Cairo|Dancing+Script|Fjalla+One|Gloria+Hallelujah|Lateef|Lato|Lobster|Open+Sans|Pacifico|Play|Ravi+Prakash|Reem+Kufi|Roboto|Shadows+Into+Light" rel="stylesheet">
	<link rel="stylesheet" href="{{ asset('/css/bootstrap.min.css') }}">
	<link rel="stylesheet" href="{{ asset('/css/font-awesome.min.css') }}">
	<link rel="stylesheet" href="{{ asset('/css/animate.css') }}">
        <link rel="stylesheet" href="{{ asset('/css/selectize.css') }}">
	<link rel="stylesheet" href="{{ asset('/css/style.css') }}">
	<script src="{{ asset('/js/jquery-c.js') }}"></script>
	<script src="{{ asset('/js/croppie.js') }}"></script>
	<link rel="stylesheet" href="{{ asset('/css/bootstrap-3.min.css') }}">
	<link rel="stylesheet" href="{{ asset('/css/croppie.css') }}">
	<script src="{{ asset('/js/angular.min.js') }}"></script>	
	<script src="{{ asset('/js/upload_image_crop.js') }}"></script>	
    </head>
    <body>
	<a href="{{route('logout')}}">Logout</a>
	<br/>
	@yield('userd_content')
	<script src="{{ asset('/js/jquery-1.12.4.min.js') }}"></script>
	<script src="{{ asset('/js/bootstrap.min.js') }}"></script>
	<script src="{{ asset('/js/npm.js') }}"></script>
	<script src="{{ asset('/js/wow.min.js') }}"></script>
	<script src="{{ asset('/js/main.js') }}"></script>
	<script src="{{ asset('/js/angular_user_app.js') }}"></script>
        <script src="{{ asset('/js/selectize.js') }}"></script>
    </body>
</html>
