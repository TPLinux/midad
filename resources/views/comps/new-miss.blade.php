<div id="new-miss"><h3>انشاء مهمة جديدة</h3></div>
<div class="container miss-class" style="display:none">
    <div class="panel panel-default">
	<div class="panel-heading"></div>
	<div class="panel-body">
	    <div class="row">
	  	<div class="col-md-4 text-center">
		    <div id="upload-demo-miss" style="width:350px"></div>
	  	</div>
	  	<div class="col-md-4" style="padding-top:30px;">
		    <br/><br/><br/>
		    <br/><br/><br/>
		    <br/><br/><br/>
		    <br/><br/><br/>
		    <br/><br/><br/>
		    <strong>Select Image:</strong>
		    <input type="file" id="upload-miss">
		    <br/>
		    <span class="btn btn-success upload-result-miss" style="display:none"></span>
	  	</div>

	  	<div class="col-md-4" style="">
		    <div id="upload-demo-miss-i" style="background:#e1e1e1;width:300px;padding:30px;height:300px;margin-top:30px">
			<img alt="" src=""/>
		    </div>
	  	</div>
	    </div>

	</div>
    </div>
    <form id="new-mission-form" onsubmit="return false;">
	<h2>مهمة جديدة</h2>
	mission name <input name="name" type="text" value=""/><br/><br/>
	mission points <input name="points" type="number" value=""/><br/><br/>

	mission location <input name="location" type="text" value=""/><br/><br/>
	mission country
	<select id="" name="country">
	    <option value="">mission country</option>
	    @foreach($countries as $country)
		<option value="{{$country->country_id}}">{{$country->country_name}}</option>
	    @endforeach
	</select>
	<br/>
	mission city
	<select id="" name="city">
	    <option value="">mission city</option>
	    @foreach($cities as $city)
		<option value="{{$city->city_id}}">{{$city->city_name}}</option>
	    @endforeach
	</select>
	<br/>
	mission range
	<select id="mrange" name="range">
	    <option value="">mission range</option>
	    <option value="0">No</option>
	    <option value="1">Yes</option>
	</select>
	<div id="miss-dates" style="display:none">
	    <br/>
	    mission start date <input name="start_date" type="date"/><br/><br/>
	    mission end date <input name="end_date" type="date"/><br/><br/>
	</div>
	<br/>
	<br/>
	<textarea cols="30" id="" rows="10" name="desc"></textarea>
	<br/>
	<br/>
	{{csrf_field()}}
	<button id="new-miss-btn">Next</button>
	<br/>
	<br/>
    </form>
    <script>
     $("#new-miss-btn").click(function(e){
	 var formData = $("#new-mission-form").serialize();
	 console.log(formData);
	 if($("#upload-miss").val() == ''){
	     alert("Please Select image for this mission");
	 }else{
	     $.ajax({
		 type: 'POST',
		 url: '{{route("new-miss")}}',
		 data: formData,
		 success: function(resp){
		     console.log(resp);
		     if(resp.success == true){
			 $(".upload-result-miss").click();
		     }
		 }
	     });
	 }
     });
     
     uploadImageCrop({
	 aObject: 'miss-pic',
	 type: 'square',
	 editDivSelector: '#upload-demo-miss',
	 inputFileSelector: '#upload-miss',
	 uploadBtnSelector: '.upload-result-miss',
	 viewSelector: "#upload-demo-miss-i",
	 postUrl: '{{route('miss.upload.logo')}}',
	 theToken: '{{ csrf_token() }}'
     });
    </script>
