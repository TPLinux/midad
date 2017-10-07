function uploadImageCrop(oo){
    var theType = oo.type || 'square';
    var editDivSelector = oo.editDivSelector || '';
    var inputFileSelector = oo.inputFileSelector || '';
    var postUrl = oo.postUrl || '';
    var theToken = oo.theToken || '';
    var uploadBtnSelector = oo.uploadBtnSelector || '';
    var viewSelector = oo.viewSelector || '';
    
    $uploadCrop = $(editDivSelector).croppie({
	enableExif: true,
	viewport: {
	    width: 200,
	    height: 200,
	    type: theType
	},
	boundary: {
	    width: 300,
	    height: 300
	}
    });

    $(inputFileSelector).on('change', function () { 
	var reader = new FileReader();
	reader.onload = function (e) {
    	    $uploadCrop.croppie('bind', {
    		url: e.target.result
    	    }).then(function(){
    		console.log('jQuery bind complete');
    	    });
	}
	reader.readAsDataURL(this.files[0]);
    });

    $(uploadBtnSelector).on('click', function (ev) {
	$uploadCrop.croppie('result', {
	    type: 'canvas',
	    size: 'viewport'
	}).then(function (resp) {
	    $.ajax({
		url: postUrl,
		type: "POST",
		data: {
		    "image":resp,
		    "_token": theToken
		},
		success: function (data) {
		    html = '<img src="' + resp + '" />';
		    $(viewSelector).html(html);
		}
	    });
	});
    });
}
