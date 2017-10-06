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
	@if($user->confirmed == true)
	    @if($user->full_profile == false)
		يرجى اكمال معلوماتك الشخصية
		@extends('users.settings')
	    @else
		@yield('userd_content')
	    @endif
	@else
	    Please Confirm your account from email
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