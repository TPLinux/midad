@extends('index_layout')

@section('title') Register Doners
@endsection

@section('content')
    <div ng-app="compRegisterApp" ng-controller="compRegisterController">
	<form  onsubmit="return false;"> <!-- onsubmit="return true;" -->
	    {{ csrf_field() }}
	    <input ng-model="comp_name" type="text" placeholder="اسم الشركة"/>
	    <input ng-model="comp_phone" type="text" placeholder="الهاتف المحمول"/> 
	    <input ng-model="comp_email" type="text" placeholder="البريد الالكتروني"/> <br/><br/>
	    <input ng-model="comp_owner" type="text" placeholder="المالك"/> <br/><br/>
	    <input ng-model="comp_manager" type="text" placeholder="المدير"/><br/><br/>
	    <input ng-model="comp_password" type="password" placeholder="كلمة المرور"/>
	    <input ng-model="comp_password2" type="password" placeholder="اعد كتابة كلمة المرور"/><br/><br/>
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
