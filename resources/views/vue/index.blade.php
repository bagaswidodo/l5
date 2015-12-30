<!DOCTYPE html>
<html>
<head>
	<title>Vue static</title>
	<link rel="stylesheet" type="text/css" href="vendor/bootstrap/dist/css/bootstrap.min.css">
</head>
<body>

<div id="app">
	<h1>@{{ message }}</h1>	
</div>


<script src="vendor/vue/dist/vue.min.js"></script>
<script>
	new Vue({
		el : '#app',
		data : {
		'message' : 'Hello World'
		},
	});
</script>
	
</body>
</html>