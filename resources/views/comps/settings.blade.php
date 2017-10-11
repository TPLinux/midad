@extends('comps.compd')
@section('compd_content')


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
			    <img alt="" src=""/>
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
			    <img alt="" src=""/>
			</div>
	  	    </div>
	  	</div>

	    </div>
	</div>
    </div>

    <form id="comp-settings-form" onsubmit="return false">
	<style>
	 .red_input{
	     color:white;
	     background:red;
	 }
	</style>
	اسم الشركة
	<input type="text" name="name" value="{{$comp->comp_name}}">
	<br/>
	اسم الشركة اللاتيني
	<input type="text" name="name_en" value="{{$comp->comp_name_en}}">
	<br/>
	username
	<input type="text" class="username-input" name="comp_username" value="{{$comp->comp_username}}">
	<br>
	مجال عمل الشركة
	<select name="work">
	    <option value="{{$comp->comp_work}}">{{$comp->work_name}}</option>
	    @foreach($works as $work)
		@if($work->work_id == $comp->comp_work)
		    @continue
		@endif
		<option value="{{$work->work_id}}">{{$work->work_name}}</option>
	    @endforeach
	</select>
	<br>
	ايميل الشركة
	<input type="email" name="email" value="{{$comp->comp_email}}">
	<br>
	كلمة المرور
	<input type="password" name="password" value="123">
	<br>
	رقم الترخيص
	<input type="text" name="lnumber" value="{{$comp->comp_lnumber}}">
	<br>
	phone
	<input type="text" name="phone" value="{{$comp->comp_phone}}">
	<br>
	manager
	<input type="text" name="manager" value="{{$comp->comp_manager}}">
	<br>
	owner
	<input type="text" name="owner" value="{{$comp->comp_owner}}">
	<br>
	بلد الشركة
	<select name="country">
	    <option value="{{$comp->comp_country}}">{{$comp->country_name}}</option>
	    @foreach($countries as $country)
		@if($country->country_id == $comp->comp_country)
		    @continue
		@endif
		<option value="{{$country->country_id}}">{{$country->country_name}}</option>
	    @endforeach
	</select>
	<br>
	مدينة الشركة
	<select name="city">
	    <option value="{{$comp->comp_city}}">{{$comp->city_name}}</option>
	    @foreach($cities as $city)
		@if($city->city_id == $comp->comp_city)
		    @continue
		@endif
		<option value="{{$city->city_id}}">{{$city->city_name}}</option>
	    @endforeach
	</select>
	<br>
	العنوان
	<input name="location" type="text" value="{{$city->city_location}}"/>
	<br/>
	<br/>
	{{ csrf_field() }}
	<button>
	    save
	</button>
	<br/>
	<br/>
    </form>
    <script>
     $("#comp-settings-form").submit(function(e){
	 var formData = $("#comp-settings-form").serialize();
	 console.log(formData);
	 $.ajax({
	     type: 'POST',
	     url: '{{route("update.comp.settings")}}',
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
	 postUrl: '{{route('comp.upload.pic')}}',
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
	 postUrl: '{{route('comp.upload.cover')}}',
	 theToken: '{{ csrf_token() }}'
     });
    </script>
@endsection
