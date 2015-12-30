<!DOCTYPE html>
<html>
<head>
	<title>Vue static</title>
	<link rel="stylesheet" type="text/css" href="vendor/bootstrap/dist/css/bootstrap.min.css">
</head>
<body>

<div id="app">
	<h1>@{{ message }}</h1>	

	<span class="error" v-show="!message">
		Please enter a message 
	</span>
	<hr />
	<input v-model="message">

	<button class="btn btn-info" v-show="message">Send Message</button>
	<h5>Debugging</h5>
	<hr>
	<pre>
		@{{ $data | json }}
	</pre>
</div>


<script src="vendor/vue/dist/vue.min.js"></script>
<script>
	new Vue({
		el : '#app',
		data : {
			'message' : ''
		},
	});
</script>
	
</body>
</html>