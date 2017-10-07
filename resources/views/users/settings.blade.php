@extends('users.layout')
@section('userd_content')
    <form ng-controller="settingsController">
	<div class="container">
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
			    <input type="file" id="upload">
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
	<p>FName: <input ng-model="fname" type="text" value=""/></p>
	<p>LName: <input ng-model="lname" type="text" value=""/></p>
	<p>BD: <input ng-model="age" type="text" value=""/></p>
	<p>Study Year: <input ng-model="study_year" type="text" value=""/></p>
	<select id="country">
	    <option value="">country</option>
	</select>
	<br/>
	<select id="lang">
	    <option value="">Language</option>
	</select>
	<br/>
	<select id="univer-name">
	    <option value="">University</option>
	</select>
	<br/>
	<select id="univer-class">
	    <option value="">University Class</option>
	</select>
	<br/>
	<select id="study-city">
	    <option value="">Study City</option>
	</select>
	<br/>
	<select id="study-lang">
	    <option value="">Study Language</option>
	</select>
	<br/>
	<select id="gender">
	    <option value="0">Male</option>
	    <option value="1">Female</option>
	</select>
	<br/>
	<br/>
	<br/>
	<button>Save</button>
    </form>
    <script type="text/javascript">
     uploadImageCrop({
	 type: 'rectangle',
	 editDivSelector: '#upload-demo',
	 inputFileSelector: '#upload',
	 uploadBtnSelector: '.upload-result',
	 viewSelector: "#upload-demo-i",
	 postUrl: '{{route('user.upload.image')}}',
	 theToken: '{{ csrf_token() }}'
     });
    </script>
@endsection
