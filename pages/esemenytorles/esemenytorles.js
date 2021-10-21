var app = angular.module('myApp', []);
app.controller('customersCtrl', function($scope, $http) {
  $http.get("pages/esemenytorles/lekerdez.php")
  .then(function (response) {$scope.esemenyadatok = response.data;});

//rendezes oszlop szerint  
  $scope.sortBy = function(propertyName) {
    $scope.reverse = ($scope.propertyName === propertyName) ? !$scope.reverse : false;
    $scope.propertyName = propertyName;
  };
//rendezes veg  
  
// Remove record
 $scope.remove = function(index,esemeny_id){
 
  $http({
   method: 'post',
   url: 'pages/esemenytorles/torles.php',
   data: {esemeny_id:esemeny_id,request_type:3},
  }).then(function successCallback(response) {
     if(response.data == 1)
        $scope.esemenyadatok.splice(index, 1);
     else
        alert('Törlés sikertelen');
  }); 
 } 
//remove end  
 
  });