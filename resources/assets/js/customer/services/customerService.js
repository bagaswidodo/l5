var app = angular.module('myApp', ['ngRoute','ui.bootstrap']);
app.factory("services",['$http',function($http){
	var serviceBase = 'api/'
	var obj = {};

	obj.getCustomers = function(){
		return $http.get(serviceBase + 'customer');
	}

	obj.getCustomer = function(customerID){
		return $http.get(serviceBase + 'customer/' + customerID);
	}

	obj.insertCustomer = function (customer) {
      return $http.post(serviceBase + 'customer/', customer).then(function (results) {
          return results;
      });
	};

	obj.updateCustomer = function (id,customer) {
		console.log('update me');
	    return $http.put(serviceBase + 'customer/' + id, customer).then(function (status) {
	        return status.data;
	    });
	};

	obj.deleteCustomer = function (id) {
	    return $http.delete(serviceBase + 'customer/' + id).then(function (status) {
	        return status.data;
	    });
	};

	return obj;
}]);