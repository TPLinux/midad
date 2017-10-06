<!DOCTYPE html>
<html  ng-app="userApp" >

    <head>
	<meta charset="UTF-8">
	<title>@yield('title')</title>
	<meta name="viewport" content="width=device-width, initial-scale=1.0,maximum-scale=1.0, user-scalable=no">
	<link href="https://fonts.googleapis.com/css?family=Amatic+SC|Anton|Cairo|Dancing+Script|Fjalla+One|Gloria+Hallelujah|Lateef|Lato|Lobster|Open+Sans|Pacifico|Play|Ravi+Prakash|Reem+Kufi|Roboto|Shadows+Into+Light" rel="stylesheet">
	<link rel="stylesheet" href="css/bootstrap.min.css">
	<link rel="stylesheet" href="css/font-awesome.min.css">
	<link rel="stylesheet" href="css/animate.css">
        <link rel="stylesheet" href="css/selectize.css">
	<link rel="stylesheet" href="css/style.css">
	<script src="js/angular.min.js"></script>	
    </head>
    <body>
	<a href="{{route('logout')}}">Logout</a>
	<br/>

	@if($user->confirmed == true)
	    You have logged in as : {{$user->user->u_email}}
	    @if($user->full_profile == false)
		
	    @endif
	    @yield('userd_content')
	@else
	    Please Confirm your account
	    <br/>
	    Try Confirm for test it from here -> <a href="{{route('confirm.user', $user->user->u_confirm_code)}}">CONFIRM</a>
	@endif
	<script src="js/jquery-1.12.4.min.js"></script>
	<script src="js/bootstrap.min.js"></script>
	<script src="js/npm.js"></script>
	<script src="js/wow.min.js"></script>
	<script src="js/main.js"></script>
	<script src="js/angular_user_app.js"></script>
        <script src="js/selectize.js"></script>
    </body>
</html>
