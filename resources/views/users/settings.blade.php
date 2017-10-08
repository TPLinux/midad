@extends('users.layout')
@section('userd_content')
    <form ng-controller="settingsController">
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
	<p>email: <input name="email" type="text" value=""/></p>
	<p>password: <input name="password" type="password" value=""/></p>

	<p>FName: <input name="fname" type="text" value=""/></p>
	<p>LName: <input name="lname" type="text" value=""/></p>
	<p>Father Name: <input name="father_name" type="text" value=""/></p>
	<p>Location: <input name="location" type="text" value=""/></p>
	
	<p>BD: <input name="age" type="text" value=""/></p>
	<p>Study Year: <input name="study_year" type="text" value=""/></p>
	<select name="gender">
	    <option value="0">Male</option>
	    <option value="1">Female</option>
	</select>
	<select name="country">
	    <option value="">country</option>
	</select>
	<br/>
	<select name="lang">
	    <option value="">Language</option>
	</select>
	<br/>
	<select name="univer-name">
	    <option value="">University</option>
	</select>
	<br/>
	<select name="univer-class">
	    <option value="">University Class</option>
	</select>
	<br/>
	<select name="study-city">
	    <option value="">Study City</option>
	</select>
	<br/>
	<select name="study-lang">
	    <option value="">Study Language</option>
	</select>
	<br/>
	<br/>
	<button>Save</button>
    </form>
    <script type="text/javascript">
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
