@extends('index_layout')

@section('title') Register Bene
@endsection

@section('content')
    <div ng-app="beneRegisterApp" ng-controller="beneRegisterController">
	<form onsubmit="return false;">
	    {{ csrf_field() }}
	    <input name="bene_name" ng-model="name" type="text" placeholder="اسم الشركة"/>
	    <input name="bene_phone" ng-model="phone" type="text" placeholder="الهاتف المحمول"/> 
	    <input name="bene_email" ng-model="email" type="text" placeholder="البريد الالكتروني"/> <br/><br/>
	    <input name="bene_owner" ng-model="owner" type="text" placeholder="المالك"/> <br/><br/>
	    <input name="bene_manager" ng-model="manager" type="text" placeholder="المدير"/><br/><br/>
	    <input name="bene_password" ng-model="password" type="password" placeholder="كلمة المرور"/>
	    <input name="bene_password2" ng-model="password2" type="password" placeholder="اعد كتابة كلمة المرور"/><br/><br/>
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
