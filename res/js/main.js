var assignment5 = angular.module('assignment5' , ['ngAnimate']);

assignment5.controller('partsController', function($scope, $http) {
    $http.get("http://75.127.14.7/assign4/res/php/part.php").success(function(response) {
        $scope.parts = response.records;
        console.log("hi mom!");
    });

});

assignment5.controller('vendorsController', function($scope, $http) {
    $http.get("http://75.127.14.7/assign4/res/php/vendor.php").success(function(response) {
        $scope.vendors = response.records;
        console.log("hi mom!");
    });
});



assignment5.controller('global', function($scope) {
    $scope.showBoth = true,
    $scope.showVendors = false,
    $scope.showParts = false,
    $scope.vendorClick = function() {
        $scope.showVendors = true;
        $scope.showParts = false;
    }
    $scope.partClick = function() {
        $scope.showVendors = false;
        $scope.showParts = true;
    }
});