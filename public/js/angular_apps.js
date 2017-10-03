var registerApp = angular.module('registerApp', [], function($interpolateProvider){
    $interpolateProvider.startSymbol('<%');
    $interpolateProvider.endSymbol('%>');
});

var donerRegisterApp = angular.module('donerRegisterApp', [], function($interpolateProvider){
    $interpolateProvider.startSymbol('<%');
    $interpolateProvider.endSymbol('%>');
});

var beneRegisterApp = angular.module('beneRegisterApp', [], function($interpolateProvider){
    $interpolateProvider.startSymbol('<%');
    $interpolateProvider.endSymbol('%>');
});

/*
  registerApp.config(['$qProvider', function ($qProvider) {
  $qProvider.errorOnUnhandledRejections(false);
  }]);
*/
registerApp.controller('registerController', ['$scope', '$http', function($scope, $http){

    $scope.register = function(){

	if($scope.password !== $scope.password2){
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
	    });;
	}
    }
    
}]);

// doners
donerRegisterApp.controller('donerRegisterController', ['$scope', '$http', function($scope, $http){

    $scope.register = function(){

	if($scope.password !== $scope.password2){
	    alert('password not match');
	}else{
	    var formData = {
		doner_name: $scope.name,
		doner_phone: $scope.phone,
		doner_email: $scope.email,
		doner_password: $scope.password,
		doner_manager: $scope.manager,
		doner_owner: $scope.owner,
	    };

	    var regRequest = $http({
		method: 'POST',
		url: 'doner-register',
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
	    });;
	}
    }
    
}]);


// bene
beneRegisterApp.controller('beneRegisterController', ['$scope', '$http', function($scope, $http){

    $scope.register = function(){

	if($scope.password !== $scope.password2){
	    alert('password not match');
	}else{
	    var formData = {
		bene_name: $scope.name,
		bene_phone: $scope.phone,
		bene_email: $scope.email,
		bene_password: $scope.password,
		bene_manager: $scope.manager,
		bene_owner: $scope.owner,
	    };

	    var regRequest = $http({
		method: 'POST',
		url: 'bene-register',
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
	    });;
	}
    }
    
}]);
