var app = angular.module('myApp', []);
app.controller('customersCtrl', function($scope, $http) {
  $http.get("pages/jegytorles/lekerdez.php")
  .then(function (response) {$scope.jegyadatok = response.data;});

//rendezes oszlop szerint  
  $scope.sortBy = function(propertyName) {
    $scope.reverse = ($scope.propertyName === propertyName) ? !$scope.reverse : false;
    $scope.propertyName = propertyName;
  };
//rendezes veg  
  
// Remove record
 $scope.remove = function(index,jegyek_id){
 
 

 
 
  $http({
   method: 'post',
   url: 'pages/jegytorles/torles.php',
   data: {jegyek_id:jegyek_id,request_type:3},
  }).then(function successCallback(response) {
     if(response.data == 1)
        $scope.jegyadatok.splice(index, 1);
     else
        alert('Törlés sikertelen');
  }); 
 } 
//remove end  
 
  });
  
  
