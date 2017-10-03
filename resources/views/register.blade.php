@extends('index_layout')

@section('title') Register
@endsection

@section('content')
    <div ng-app="app" ng-controller="registerController">
	<form onsubmit="return false;">
	    {{ csrf_field() }}
	    <input name="u_fname" ng-model="fname" type="text" placeholder="الاسم الاول"/>
	    <input name="u_sname" ng-model="sname" type="text" placeholder="الاسم الثاني"/> 
	    <input name="u_tname" ng-model="tname" type="text" placeholder="الاسم الثالث"/> <br/><br/>
	    
	    <input name="u_gender" ng-model="gender" type="radio" value="0"/> ذكر
	    <input name="u_gender" ng-model="gender" type="radio" value="1"/> انثى
	    <br/><br/>
	    <input name="u_email" ng-model="email" type="text" placeholder="البريد الالكتروني"/><br/><br/>
	    <input name="u_pass1" ng-model="password" type="password" placeholder="كلمة المرور"/>
	    <input name="u_pass2" ng-model="password2" type="password" placeholder="اعد كتابة كلمة المرور"/><br/><br/>
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
