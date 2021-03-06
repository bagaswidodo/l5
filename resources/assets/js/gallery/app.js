/*This is the main file where angular is defined*/
var myApp = angular.module('myApp', ['ngRoute', 'ngCookies']);

myApp.config(['$routeProvider', '$locationProvider',
    function($routeProvider, $locationProvider) {
        $routeProvider.when('/', {
            templateUrl: 'gallery/templates/users/login.html',
            controller: 'userController'
        });

        $routeProvider.when('/dashboard', {
            templateUrl: 'gallery/templates/users/dashboard.html',
            controller: 'userController',
            authenticated: true
        });

        $routeProvider.when('/gallery/view', {
            templateUrl: 'gallery/templates/gallery/gallery-view.html',
            controller: 'galleryController',
            authenticated: true
        });
        
        $routeProvider.when('/gallery/add', {
            templateUrl: 'gallery/templates/gallery/gallery-add.html',
            controller: 'galleryController',
            authenticated: true
        });

        $routeProvider.when('/gallery/:id', {
            templateUrl: 'gallery/templates/gallery/gallery-single.html',
            controller: 'galleryController',
            authenticated: true
        });

        $routeProvider.when('/logout', {
            templateUrl: 'gallery/templates/users/logout.html',
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