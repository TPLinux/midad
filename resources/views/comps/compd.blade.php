<!doctype html>
<html lang="en">
    <head>
        <meta charset="UTF-8"/>
        <title>Comp Dashboard</title>
    </head>
    <body>
	<a href="{{route('logout')}}">Logout</a>
	<br/>
	<br/>
	@if($comp->comp_confirmed == false)
	    Please Confirm your account
	    <br/>
	    Try Confirm for test it from here -> <a href="{{route('confirm.comp', $comp->comp_confirm_code)}}">CONFIRM</a>
	@endif
	@if($comp->comp_confirmed == true)
	    You have logged in as : {{ $comp->comp_email }}
	@endif
    </body>
</html>
