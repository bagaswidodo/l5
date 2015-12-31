var app = angular.module('todoApp', ['ui.router', 'satellizer'])
    .config(function($stateProvider, $urlRouterProvider, $authProvider,$provide) {

        $authProvider.loginUrl = '/api/jwt/authenticate';

        $urlRouterProvider.otherwise('/login');

        $stateProvider
            .state('login', {
                url: '/login',
                templateUrl: '/jwt/todo/tpl/login.html',
                controller: 'AuthController'
            })
            .state('register', {
                url: '/register',
                templateUrl: '/jwt/todo/tpl/register.html',
                controller: 'AuthController'
            })
            .state('todo', {
            url: '/todo',
            templateUrl: '/jwt/todo/tpl/todo.html',
            controller: 'TodoController'
        });

        function redirectWhenLoggedOut($q, $injector) {
            return {
                responseError: function (rejection) {
                    var $state = $injector.get('$state');
                    var rejectionReasons = ['token_not_provided', 'token_expired', 'token_absent', 'token_invalid'];

                    angular.forEach(rejectionReasons, function (value, key) {
                        if (rejection.data.error === value) {
                            localStorage.removeItem('user');
                            $state.go('login');
                        }
                    });

                    return $q.reject(rejection);
                }
            }
        }

        $provide.factory('redirectWhenLoggedOut', redirectWhenLoggedOut);

    });

/**
 * Created by andrea.terzani on 13/07/2015.
 */

app.controller('AuthController',  function($auth, $state,$http,$rootScope, $scope) {

    $scope.email='';
    $scope.password='';
    $scope.newUser={};
    $scope.loginError=false;
    $scope.loginErrorText='';

        $scope.login = function() {

            var credentials = {
                email: $scope.email,
                password: $scope.password
            }

            $auth.login(credentials).then(function() {

                return $http.get('api/authenticate/user');

            }, function(error) {
                $scope.loginError = true;
                $scope.loginErrorText = error.data.error;

            }).then(function(response) {

               // var user = JSON.stringify(response.data.user);

              //  localStorage.setItem('user', user);
                $rootScope.authenticated = true;
                $rootScope.currentUser = response.data.user;
                $scope.loginError = false;
                $scope.loginErrorText = '';

                $state.go('todo');
            });
        }

        $scope.register = function () {

            $http.post('/api/jwt/register',$scope.newUser)
                .success(function(data){
                    $scope.email=$scope.newUser.email;
                    $scope.password=$scope.newUser.password;
                    $scope.login();
            })

        };


});
/**
 * Created by andrea.terzani on 13/07/2015.
 */
/**
 * Created by andrea.terzani on 13/07/2015.
 */

app.controller('TodoController',  function($state,$http,$rootScope, $scope,$auth) {

    $scope.todos=[];
    $scope.newTodo={};

    $scope.init = function (){
        $http.get('/api/jwt/todo').success(function(data){
            $scope.todos=data;
        })
    };

    $scope.save = function(){
        $http.post('/api/jwt/todo',$scope.newTodo).success(function (data) {
            $scope.todos.push(data);
            $scope.newTodo={};
        });
    };

    $scope.update = function(index){
         $http.put('/api/jwt/todo/'+ $scope.todos[index].id,$scope.todos[index]);
    };

    $scope.delete = function(index){
         $http.delete('/api/jwt/todo/'+ $scope.todos[index].id).success(function(){
             $scope.todos.splice(index,1);
         });
    };

    $scope.logout = function() {
        // $auth.logout().then(function() {
        //     localStorage.removeItem('user');
        //     $rootScope.authenticated = false;
        //     $rootScope.currentUser = null;
        // });
    }

    $scope.init();

});