<!DOCTYPE html>
<html ng-app="myApp">
<head>
	<title>Laravel 5 Gallery SPA</title>
	<link rel="stylesheet" type="text/css" href="vendor/bootstrap/dist/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="gallery/css/styles.css">
	<script>
	 var baseUrl = "{{ url('/') }}/";
	  var csrfToken = "{{ csrf_token() }}";
	</script>
</head>
<body>
	<div class="container" ng-controller="globalController">
		<div ng-view></div>
	</div>

	<script src="vendor/jquery/dist/jquery.min.js"></script>
	<script src="vendor/bootstrap/dist/js/bootstrap.min.js"></script>
	<script src="vendor/angular/angular.min.js"></script>
	<script src="vendor/angular-route/angular-route.min.js"></script>
	<script src="vendor/angular-cookies/angular-cookies.min.js"></script>
	<script src="gallery/js/app.js"></script>
	<script src="gallery/js/models.js"></script>
	<script src="gallery/js/controller.js"></script>


</body>
</html>