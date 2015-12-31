<!DOCTYPE html>
<html ng-app="myApp" ng-app lang="en">
<head>
    <meta charset="utf-8">
    <link href="vendor/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <style type="text/css">
    ul>li, a{cursor: pointer;}
    </style>
    <title>CRUD App, Filter, Pagination</title>
</head>
<body>
	<div class="navbar navbar-default" id="navbar">
	    <div class="container" id="navbar-container">
	    <div class="navbar-header">
	        <a href="http://angularcode.com" class="navbar-brand">
	            CRUD Angular
	        </a><!-- /.brand -->
	        
	    </div><!-- /.navbar-header -->
	    </div>
	</div>

	<div class="container">

		<div ng-view="" id="ng-view"></div>
	</div>
</body>

<script src="vendor/angular/angular.min.js"></script>
<script src="vendor/angular-route/angular-route.min.js"></script>
<script src="vendor/angular-bootstrap/ui-bootstrap-tpls.min.js"></script>
<script src="customer/scripts.js"></script> 
</html>