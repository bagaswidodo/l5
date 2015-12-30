myApp.controller('userController', ['$scope','$location','userModel',  function($scope, $location, userModel) {
    angular.extend($scope, {
       		doLogin: function(loginForm){
       			var data={
					email : $scope.login.username,
					password : $scope.login.password
				};
       			userModel.doLogin(data).then(function(){
       				$location.path('/dashboard');
       			});
       		},
       		doLogout: function(){
       			userModel.doUserLogout();
       			$location.path('/');
       		}
    });
}]);
myApp.controller('globalController', ['$scope', function($scope) {
    $scope.global = {};
    $scope.global.navUrl = 'gallery/js/templates/partials/nav.html';
}]);
myApp.controller('navController', ['$scope', '$location', 'userModel', function($scope, $location, userModel) {
    /*Variables*/
    angular.extend($scope, {
        user: userModel.getUserObject(),
        navUrl: [{
            link: 'Home',
            url: '/dashboard',
            subMenu: [{
                link: 'View Gallery',
                url: '/gallery/view'
            }, {
                link: 'Add Gallery',
                url: '/gallery/add'
            }]
        }, {
            link: 'View Gallery',
            url: '/gallery/view'
        }, {
            link: 'Add Gallery',
            url: '/gallery/add'
        }]
    });

    /*Methods*/
    angular.extend($scope, {
        doLogout: function() {
            userModel.doUserLogout();
            $location.path('/');
        },
        checkActiveLink: function(routeLink) {
            if ($location.path() == routeLink) {
                return 'make-active';
            }
        }
    });
}]);