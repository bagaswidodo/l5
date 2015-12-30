myApp.factory('userModel',['$http','$cookies', function($http, $cookies){
	var userModel = {};

	userModel.doLogin =   function(data){
		return $http({
			headers : {
				'Content-Type' : 'application/json'
			},
			url : baseUrl + 'login',
			method:'POST',
			data:{
				email : data.email,
				password : data.password
			}
		}).success(function(response){
			console.log(response);
			$cookies.put('auth',JSON.stringify(response));
		}).error(function(data,status,headers){
			console.log(data,status,headers);
			alert(data);
		});
	};

	userModel.getAuthStatus = function() {
        var status = $cookies.get('auth');
        if (status) {
            return true;
        } else {
            return false;
        }
    };

    userModel.getUserObject = function() {
        var userObj = angular.fromJson($cookies.get('auth'));
        return userObj;
    }

    userModel.doUserLogout = function() {
        $cookies.remove('auth');
    };

	return userModel;
}]);
myApp.factory('galleryModel', ['$http', function($http) {
    return {
        saveGallery: function(galleryData) {
            return $http({
                headers: {
                    'Content-Type': 'application/json'
                },
                url: baseUrl + 'galeri',
                method: "POST",
                data: {
                    name: galleryData.name
                }
            });
        },
        getAllGalleries: function() {
            return $http.get(baseUrl + 'galeri');
        },
        getGalleryById: function(id) {
            return $http.get(baseUrl + 'galeri/' + id);
        }
    };
}])