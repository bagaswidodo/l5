<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Laravel 5 / AngularJS JWT example</title>

    <link rel="stylesheet" href="vendor/bootstrap/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="vendor/angular-loading-bar/src/loading-bar.css">
    <style type="text/css">
        body {
          padding-top: 60px;
          padding-bottom: 40px;
        }

        .navbar{
          font-size: 15px;
        }

        .error{
          color:red;
        }

        .table{
          font-size:14px;
        }

        .footer{
          position: absolute;
          bottom: 0;
          width: 100%;
          height: 30px;
          background-color: #4E5D6C;
        }

        .footer > .container {
          padding: 5px 15px 0;
          font-size:80%
        }
    </style>

</head>

<body ng-app="app">
    <div class="navbar navbar-inverse navbar-fixed-top" role="navigation" data-ng-controller="HomeController">
        <div class="container">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target=".navbar-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="#/">JWT Angular example</a>
            </div>
            <div class="navbar-collapse collapse">
                <ul class="nav navbar-nav navbar-right">
                    <li data-ng-show="token"><a ng-href="#/restricted">Restricted area</a></li>
                    <li data-ng-hide="token"><a ng-href="#/signin">Signin</a></li>
                    <li data-ng-hide="token"><a ng-href="#/signup">Signup</a></li>
                    <li data-ng-show="token"><a ng-href="#/" ng-click="logout()">Logout</a></li>
                </ul>
            </div>
        </div>
    </div>
    <div class="container" ng-view=""></div>
    <div class="footer">
        <div class="container">
            <p class="muted credit">Example by <a href="http://www.toptal.com/resume/tino-tkalec" title="Tino Tkalec">Tino Tkalec</a></p>
        </div>
    </div>

    <script src="vendor/jquery/dist/jquery.min.js"></script>
    <script src="vendor/bootstrap/dist/js/bootstrap.min.js"></script>
    <script src="vendor/angular/angular.min.js"></script>
    <script src="vendor/angular-route/angular-route.min.js"></script>
    <script src="vendor/ngstorage/ngStorage.js"></script>
    <script src="vendor/angular-loading-bar/src/loading-bar.js"></script>
    <script src="jwt/scripts/app.js"></script>
    <script src="jwt/scripts/controllers.js"></script>
    <script src="jwt/scripts/services.js"></script> 
</body>
</html>