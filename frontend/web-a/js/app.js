var myApp = angular.module('myApp',[]);
myApp.controller('patientTypeCtrl',['$scope','$http', function($scope,$http){
	$http.get("/clinic/frontend/web/Data/patient-type-price.php")
	.success(function (data) {
        $scope.data=data;
    }).error(function () {
        $scope.data="error in fetching data";
    });
}]);

myApp.controller('inventoryReportCtrl',['$scope','$http', function($scope,$http){
	$http.get("/clinic/frontend/web/Data/inventory-report.php")
	.success(function (data) {
        $scope.data=data;
    }).error(function () {
        $scope.data="error in fetching data";
    });
}]);

myApp.controller('inventoryHistoryReportCtrl',['$scope','$http', function($scope,$http){
	$http.get("/clinic/frontend/web/Data/inventory-history-report.php")
	.success(function (data) {
        $scope.data=data;
    }).error(function () {
        $scope.data="error in fetching data";
    });
}]);
myApp.controller('pharmacyReportCtrl',['$scope','$http', function($scope,$http){
	$http.get("/clinic/frontend/web/Data/pharmacy-report.php")
	.success(function (data) {
        $scope.data=data;
    }).error(function () {
        $scope.data="error in fetching data";
    });
}]);
myApp.controller('bankReportCtrl',['$scope','$http', function($scope,$http){
	$http.get("/clinic/frontend/web/Data/bank-report.php")
	.success(function (data) {
        $scope.data=data;
    }).error(function () {
        $scope.data="error in fetching data";
    });
}]);
myApp.controller('empReportCtrl',['$scope','$http', function($scope,$http){
	$http.get("/clinic/frontend/web/Data/emp-report.php")
	.success(function (data) {
        $scope.data=data;
    }).error(function () {
        $scope.data="error in fetching data";
    });
}]);

myApp.controller('indoorHistoryReportCtrl',['$scope','$http', function($scope,$http){
	$http.get("/clinic/frontend/web/Data/indoor-history-report.php")
	.success(function (data) {
        $scope.data=data;
				$scope.calcTotal = function(data){
				 var sum = 0;
				 for(var i = 0 ; i<data.length ; i++){
						sum = sum + (data[i].sale_price*data[i].item_qty);
				 }
				 return sum;
				};

    }).error(function () {
        $scope.data="error in fetching data";
    });


}]);

myApp.controller('incubationHistoryReportCtrl',['$scope','$http', function($scope,$http){
	$http.get("/clinic/frontend/web/Data/incubation-history-report.php")
	.success(function (data) {
        $scope.data=data;
				$scope.calcSum = function(data){
					var sum = 0;
					for(var i = 0 ; i<data.length ; i++){
						sum = sum + (data[i].sale_price*data[i].item_qty);
					}
					return sum;
				};

    }).error(function () {
        $scope.data="error in fetching data";
    });
}]);
myApp.controller('doctorsNeedsReportCtrl',['$scope','$http', function($scope,$http){
	$http.get("/clinic/frontend/web/Data/doctors-needs.php")
	.success(function (data) {
        $scope.data=data;
				$scope.calcAll = function(data){
					var sum = 0;
					for(var i = 0 ; i<data.length ; i++){
						sum = sum + (data[i].item_cost*data[i].item_qty);
					}
					return sum;
				};

    }).error(function () {
        $scope.data="error in fetching data";
    });
}]);

myApp.controller('formCtrl',['$scope','$http', function($scope,$http){

	$scope.$watch(function() {

	  return $scope.doctor;

	},
	function(newValue, oldValue) {
		$http.post("/clinic/frontend/web/Data/doctor-need.php",{'doctor_id':$scope.doctor})
			.success(function(data, status, headers, config){
					$scope.data=data;

					$scope.nameDoctor=function(data){
							return data[0].doctor_name;
					};

					$scope.calcNeed = function(data){
						var sum = 0;
						for(var i = 0 ; i<data.length ; i++){
							sum = sum + (data[i].item_cost*data[i].item_qty);
						}
						return sum;
					};
			});

	});


}]);

myApp.controller('empSalaryCtrl',['$scope','$http', function($scope,$http){

	$scope.cal= function(newValue, oldValue) {
		$http.post("/clinic/frontend/web/Data/emp-salary.php",{'employe_id':$scope.employe_id,'month':$scope.month})
			.success(function(data, status, headers, config){
					$scope.data=data;
						$scope.empName= function(data){
									return data[0].employe_name;
						};
			});

	};

}]);
