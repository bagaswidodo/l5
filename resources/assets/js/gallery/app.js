/*This is the main file where angular is defined*/
var myApp = angular.module('myApp', ['ngRoute', 'ngCookies']);

myApp.config(['$routeProvider', '$locationProvider',
    function($routeProvider, $locationProvider) {
        $routeProvider.when('/', {
            templateUrl: 'gallery/js/templates/users/login.html',
            controller: 'userController'
        });

        $routeProvider.when('/dashboard', {
            templateUrl: 'gallery/js/templates/users/dashboard.html',
            controller: 'userController',
            authenticated: true
        });

        $routeProvider.when('/gallery/view', {
            templateUrl: 'gallery/js/templates/gallery/gallery-view.html',
            controller: 'userController',
            authenticated: true
        });
        
        $routeProvider.when('/gallery/add', {
            templateUrl: 'gallery/js/templates/gallery/gallery-add.html',
            controller: 'userController',
            authenticated: true
        });

        $routeProvider.when('/gallery/:id', {
            templateUrl: 'gallery/js/templates/gallery/gallery-single.html',
            controller: 'userController',
            authenticated: true
        });

        $routeProvider.when('/logout', {
            templateUrl: 'gallery/js/templates/users/logout.html',
            controller: 'userController',
            authenticated: true
        });

        $routeProvider.otherwise('/');
    }
]);

myApp.run(["$rootScope", "$location", 'userModel',
    function($rootScope, $location, userModel) {
        $rootScope.$on("$routeChangeStart",
            function(event, next, current) {
                if (next.$$route.authenticated) {
                    if (!userModel.getAuthStatus()) {
                        $location.path('/');
                    }
                }

                if (next.$$route.originalPath == '/') {
                    if (userModel.getAuthStatus()) {
                        $location.path(current.$$route.originalPath);
                    }
                }
            });
    }
]);