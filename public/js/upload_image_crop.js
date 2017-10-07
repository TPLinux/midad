function uploadImageCrop(oo){
    var theType = oo.type || 'square';
    var aWidth = oo.width || 200;
    var aHeight = oo.height || 200;
    var bWidth = oo.bWidth || 300;
    var bHeight = oo.bHeight || 300;
    var editDivSelector = oo.editDivSelector || '';
    var inputFileSelector = oo.inputFileSelector || '';
    var postUrl = oo.postUrl || '';
    var theToken = oo.theToken || '';
    var uploadBtnSelector = oo.uploadBtnSelector || '';
    var viewSelector = oo.viewSelector || '';
    
    $uploadCrop = $(editDivSelector).croppie({
	enableExif: true,
	viewport: {
	    width: aWidth,
	    height: aHeight,
	    type: theType
	},
	boundary: {
	    width: bWidth,
	    height: bHeight
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
