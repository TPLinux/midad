var app = angular.module('userApp', [], function($interpolateProvider){
    $interpolateProvider.startSymbol('<%');
    $interpolateProvider.endSymbol('%>');
});


app.controller('settingsController', ['$scope', '$http', function($scope, $http){
    
}]);
