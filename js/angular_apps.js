var app = angular.module('app', [], function($interpolateProvider){
    $interpolateProvider.startSymbol('<%');
    $interpolateProvider.endSymbol('%>');
});
/*
  registerApp.config(['$qProvider', function ($qProvider) {
  $qProvider.errorOnUnhandledRejections(false);
  }]);
*/
app.controller('registerController', ['$scope', '$http', function($scope, $http){

    $scope.register = function(){

	if($scope.password !== $scope.password2){
	    alert('password not match');
	    alert('password not match');
	}else{
	    var formData = {
		u_fname: $scope.fname,
		u_sname: $scope.sname,
		u_tname: $scope.tname,
		u_email: $scope.email,
		u_password: $scope.password,
		u_gender: $scope.gender,
	    };

	    var regRequest = $http({
		method: 'POST',
		url: 'register',
		data: formData
	    });

	    regRequest.then(function(resp){
		if(resp.status === 200){
		    $scope.regErrors = resp.data.errors;
		    if(resp.data.status == true){
			console.log(resp.data.msg);
			$scope.greenMsg = resp.data.msg;
		    }else{
			$scope.greenMsg = null;
		    }
		}
	    }).catch(function(err){
		$scope.regErrors = err.data.errors;
		for(var x in err.data.errors){
		    console.log(err.data.errors[x]);
		}
	    });
	}
    }
    
}]);


// companies
app.controller('compRegisterController', ['$scope', '$http', function($scope, $http){

    $scope.register = function(){
	if($scope.comp_password !== $scope.comp_password2){
	    alert('password not match');
	}else{
	    var formData = {
		comp_name: $scope.comp_name,
		comp_phone: $scope.comp_phone,
		comp_email: $scope.comp_email,
		comp_password: $scope.comp_password,
		comp_manager: $scope.comp_manager,
		comp_owner: $scope.comp_owner,
	    };
	    console.log(formData);
	    var regRequest = $http({
		method: 'POST',
		url: 'comp-register',
		data: formData
	    });

	    regRequest.then(function(resp){
		if(resp.status === 200){
		    $scope.regErrors = resp.data.errors;
		    if(resp.data.status == true){
			console.log(resp.data.msg);
			$scope.greenMsg = resp.data.msg;
		    }else{
			$scope.greenMsg = null;
		    }
		}
	    }).catch(function(err){
		$scope.regErrors = err.data.errors;
		for(var x in err.data.errors){
		    console.log(err.data.errors[x]);
		}
	    });
	}
    }
    
}]);

// login
app.controller('loginController', ['$scope', '$http', function($scope, $http){
    
    $scope.login = function(){
	var formData = {
	    email: $scope.email,
	    password: $scope.password,
	};

	$scope.login_tp = document.getElementById('login-tp').value;
	console.log(formData);
	console.log($scope.login_tp);
	var loginRequest = $http({
	    method: 'POST',
	    url: $scope.login_tp,
	    data: formData
	});

	loginRequest.then(function(resp){
	    if(resp.status === 200){
		var info = resp.data;
		if(info.status == true){
		    alert(info.msg);
		    window.location.href = info.panel;
		}else{
		    alert(info.msg);
		}
		    
	    }
	}).catch(function(err){
	    console.log(err);
	});
    }
}]);
