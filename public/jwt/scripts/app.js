(function () {
    'use strict';

    angular.module('app', [
        'ngStorage',
        'ngRoute',
        'angular-loading-bar'
    ])
        .constant('urls', {
            BASE: 'http://localhost:8000',
            BASE_API: 'http://localhost:8000/'
        })
        .config(['$routeProvider', '$httpProvider', function ($routeProvider, $httpProvider) {
            $routeProvider.
                when('/', {
                    templateUrl: 'jwt/partials/home.html',
                    controller: 'HomeController'
                }).
                when('/signin', {
                    templateUrl: 'jwt/partials/signin.html',
                    controller: 'HomeController'
                }).
                when('/signup', {
                    templateUrl: 'jwt/partials/signup.html',
                    controller: 'HomeController'
                }).
                when('/restricted', {
                    templateUrl: 'jwt/partials/restricted.html',
                    controller: 'RestrictedController'
                }).
                otherwise({
                    redirectTo: '/'
                });

            $httpProvider.interceptors.push(['$q', '$location', '$localStorage', function ($q, $location, $localStorage) {
                return {
                    'request': function (config) {
                        config.headers = config.headers || {};
                        if ($localStorage.token) {
                            config.headers.Authorization = 'Bearer ' + $localStorage.token;
                        }
                        return config;
                    },
                    'responseError': function (response) {
                        if (response.status === 401 || response.status === 403) {
                            delete $localStorage.token;
                            $location.path('/signin');
                        }
                        return $q.reject(response);
                    }
                };
            }]);
        }
        ]).run(function($rootScope, $location, $localStorage) {
            $rootScope.$on( "$routeChangeStart", function(event, next) {
                if ($localStorage.token == null) {
                    if ( next.templateUrl === "jwt/partials/restricted.html") {
                        $location.path("/signin");
                    }
                }
            });
        });
})();