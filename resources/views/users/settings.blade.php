@extends('users.layout')
@section('userd_content')
	<div class="container">
	    <div class="panel panel-default">
		<div class="panel-heading"></div>
		<div class="panel-body">

	  	    <div class="row">
	  		<div class="col-md-4 text-center">
			    <div id="upload-demo-cover" style="width:350px"></div>
	  		</div>
	  		<div class="col-md-4" style="padding-top:30px;">
			    <br/><br/><br/>
			    <br/><br/><br/>
			    <br/><br/><br/>
			    <br/><br/><br/>
			    <br/><br/><br/>
			    <strong>Select Image:</strong>
			    <input type="file" id="upload-cover">
			    <br/>
			    <button class="btn btn-success upload-result-cover">Upload Image</button>
	  		</div>

	  		<div class="col-md-4" style="">
			    <div id="upload-demo-i-cover" style="background:#e1e1e1;width:300px;padding:30px;height:300px;margin-top:30px">
				<img alt="" src="{{ asset('public' . $user->u_cover) }}"/>
			    </div>
	  		</div>
	  	    </div>

		</div>
	    </div>
	    <div class="panel panel-default">
		<div class="panel-heading"></div>
		<div class="panel-body">

	  	    <div class="row">
	  		<div class="col-md-4 text-center">
			    <div id="upload-demo" style="width:350px"></div>
	  		</div>
	  		<div class="col-md-4" style="padding-top:30px;">
			    <strong>Select Image:</strong>
			    <br/>
			    <input type="file" id="upload" onclick="">
			    <br/>
			    <button class="btn btn-success upload-result">Upload Image</button>
	  		</div>

	  		<div class="col-md-4" style="">
			    <div id="upload-demo-i" style="background:#e1e1e1;width:300px;padding:30px;height:300px;margin-top:30px">
				<img alt="" src="{{ asset('public' . $user->u_pic) }}"/>
			    </div>
	  		</div>
	  	    </div>

		</div>
	    </div>
	</div>
	<form id="user-setting-form">
	    <style>
	     .red_input{
		 color:white;
		 background:red;
	     }
	    </style>
	    <p>username: <input class="username-input" name="username" type="text" value="{{$user->u_username}}"/></p>
	    <p>email: <input name="email" type="text" value="{{$user->u_email}}"/></p>
	    <p>password: <input name="password" type="password" value="***"/></p>

	<p>FName: <input name="fname" type="text" value="{{$user->u_fname}}"/></p>
	<p>LName: <input name="lname" type="text" value="{{$user->u_lname}}"/></p>
	<p>Father Name: <input name="father_name" type="text" value="{{$user->u_father_name}}"/></p>
	
	<p>BD: <input name="age" type="date" value="{{$user->u_age}}" format="yyyy-mm-dd"/></p>
	<p>Study Year: <input name="study_year" type="text" value="{{$user->u_study_year}}"/></p>
	<p>
	    الحالة الاجتماعية
	    <select name="user_status">
		<option value="{{$user->u_status}}">{{ ($user->u_status == 0) ? 'Not Married' : 'Married' }}</option>
		<option value="0">Not-Married</option>
		<option value="1">Married</option>
	    </select>
	</p>
	<p>
	    الجنس
	    <select name="gender">
		<option value="{{$user->u_gender}}">{{ ($user->u_gender == 0) ? 'Male' : 'Female' }}</option>
		<option value="0">Male</option>
		<option value="1">Female</option>
	    </select>
	</p>
	<p>
	    البلد
	    <select name="country">
		@if($countryById($user->u_country) != null)
		    <option value="{{$user->u_country}}">{{$countryById($user->u_country)->country_name}}</option>
		@endif
		@foreach($setting->countries as $country)
		    @if($country['country_id'] == $countryById($user->u_country)->country_id)
			@continue
		    @endif
			<option value="{{$country['country_id']}}">{{$country['country_name']}}</option>
		@endforeach
	    </select>
	</p>
	<p>
	    المدينة
	    <select name="city">
		@if($cityById($user->u_city) != null)
		    <option value="{{$user->u_city}}">{{$cityById($user->u_city)->city_name}}</option>
		@endif
		@foreach($setting->cities as $city)
		    @if($cityById($user->u_city) != null && $city['city_id'] == $cityById($user->u_city)->city_id)
			@continue
		    @endif
		    <option value="{{$city['city_id']}}">{{$city['city_name']}}</option>
		@endforeach
	    </select>
	</p>
	<p>Location: <input name="location" type="text" value="{{$user->u_location}}"/></p>
	<br/>
	
	<p>
	    اللغة
	    <select name="lang">
		@if($langById($user->u_lang) != null)
		    <option value="{{$user->u_lang}}">{{$langById($user->u_lang)->lang_name}}</option>
		@endif
		@foreach($setting->langs as $lang)
		    @if($langById($user->u_lang) != null && $lang['lang_id'] == $langById($user->u_lang)->lang_id)
			@continue
		    @endif
		    <option value="{{$lang['lang_id']}}">{{$lang['lang_name']}}</option>
		@endforeach
	    </select>
	</p>
	<br/>
	<p>
	    الجامعة
	    <select name="univer_name">
		<option value="{{$user->u_univ_name}}">{{$user->univer_name}}</option>
		@foreach($setting->univers as $univer)
		    @if($univer['univer_id'] == $user->u_univ_name)
			@continue
		    @endif
		    <option value="{{$univer['univer_id']}}">{{$univer['univer_name']}}</option>
		@endforeach
	    </select>
	</p>
	<br/>
	<p>
	    فرع الدراسة
	    <select name="univer_sec">
		<option value="{{$user->u_univ_sec}}">{{$user->univer_sec_name}}</option>
		@foreach($setting->univer_sections as $univer_sec)
		    @if($univer_sec['univer_sec_id'] == $user->u_univ_sec)
			@continue
		    @endif
		    <option value="{{$univer_sec['univer_sec_id']}}">{{$univer_sec['univer_sec_name']}}</option>
		@endforeach
	    </select>
	</p>
	<br/>
	<p>
	    بلد الدراسة
	    <select name="study_country">
		<option value="{{$user->u_study_country}}">{{$user->country_name}}</option>
		@foreach($setting->countries as $country)
		    @if($country['country_id'] == $user->u_study_country)
			@continue
		    @endif
		    <option value="{{$country['country_id']}}">{{$country['country_name']}}</option>
		@endforeach
	    </select>
	<p>
	    مدينة الدراسة
	    <select name="study_city">
		<option value="{{$user->u_study_city}}">{{$user->city_name}}</option>
		@foreach($setting->cities as $city)
		    @if($city['city_id'] == $user->u_study_city)
			@continue
		    @endif
		    <option value="{{$city['city_id']}}">{{$city['city_name']}}</option>
		@endforeach
	    </select>
	</p>
	<br/>
	<p>
	    لغة الدراسة
	    <select name="study_lang">
		<option value="{{$user->u_study_lang}}">{{$user->lang_name}}</option>
		@foreach($setting->langs as $lang)
		    @if($lang['lang_id'] == $user->u_study_lang)
			@continue
		    @endif
		    <option value="{{$lang['lang_id']}}">{{$lang['lang_name']}}</option>
		@endforeach
	    </select>
	</p>
	<p>
	    التخصص
	    <select name="study_class">
		<option value="{{$user->u_study_class}}">{{$user->study_class_name}}</option>
		@foreach($setting->study_classes as $study_class)
		    @if($study_class['study_class_id'] == $user->u_study_class)
			@continue
		    @endif
		    <option value="{{$study_class['study_class_id']}}">{{$study_class['study_class_name']}}</option>
		@endforeach
	    </select>
	</p>
	<p>
	    مجال التطوع المفضل
	    <input name="fav_work" type="text" value="{{$user->u_fav_work}}"/>
	</p>
	<br/>
	<br/>
	{{ csrf_field() }}
	<button>Save</button>
    </form>
    <script type="text/javascript">

     $("#user-setting-form").submit(function(e){
	 var formData = $("#user-setting-form").serialize();
	 console.log(formData);
	 $.ajax({
	     type: 'POST',
	     url: '{{route("update.user.settings")}}',
	     data: formData,
	     success: function(resp){
		 console.log(resp);
		 if(resp.success == true){
		     alert('Settings saved !!');
		     if(resp.username == false){
			 $('.username-input').addClass('red_input');
		     }else{
			 $('.username-input').removeClass('red_input');
		     }
		 }
	     }
	 });
     });
     uploadImageCrop({
	 aObject: 'pic',
	 type: 'square',
	 editDivSelector: '#upload-demo',
	 inputFileSelector: '#upload',
	 uploadBtnSelector: '.upload-result',
	 viewSelector: "#upload-demo-i",
	 postUrl: '{{route('user.upload.pic')}}',
	 theToken: '{{ csrf_token() }}'
     });
     
     uploadImageCrop({
	 aObject: 'cover',
	 type: 'rectangle',
	 aWidth: 500,
	 aHeight: 200,
	 bWidth: 600,
	 bHeight: 300,
	 editDivSelector: '#upload-demo-cover',
	 inputFileSelector: '#upload-cover',
	 uploadBtnSelector: '.upload-result-cover',
	 viewSelector: "#upload-demo-i-cover",
	 postUrl: '{{route('user.upload.cover')}}',
	 theToken: '{{ csrf_token() }}'
     });
    </script>
@endsection
