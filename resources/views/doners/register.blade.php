@extends('index_layout')

@section('title') Register Doners
@endsection

@section('content')
    <div ng-app="donerRegisterApp" ng-controller="donerRegisterController">
	<form onsubmit="return false;">
	    {{ csrf_field() }}
	    <input name="doner_name" ng-model="name" type="text" placeholder="اسم الشركة"/>
	    <input name="doner_phone" ng-model="phone" type="text" placeholder="الهاتف المحمول"/> 
	    <input name="doner_email" ng-model="email" type="text" placeholder="البريد الالكتروني"/> <br/><br/>
	    <input name="doner_owner" ng-model="owner" type="text" placeholder="المالك"/> <br/><br/>
	    <input name="doner_manager" ng-model="manager" type="text" placeholder="المدير"/><br/><br/>
	    <input name="doner_password" ng-model="password" type="password" placeholder="كلمة المرور"/>
	    <input name="doner_password2" ng-model="password2" type="password" placeholder="اعد كتابة كلمة المرور"/><br/><br/>
	    <button ng-click="register()">تسجيل</button>
	    <ul ng-repeat="err in regErrors">
		<li><span ng-bind="err.toString()" style="color:red"></span></li>
	    </ul>

	    <div>
		<span ng-bind="greenMsg" style="color:green"></span>
	    </div>
	</form>
    </div>
@endsection
