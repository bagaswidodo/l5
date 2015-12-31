<!DOCTYPE html>
<html>
<head>
	<title>GuestBook With vueJS</title>
	<link rel="stylesheet" type="text/css" href="vendor/bootstrap/dist/css/bootstrap.min.css">
</head>
<body>
	<div class="container">
		<div id="guestbook">
			<article v-for="message in list">
				<h3>@{{ message.name }}</h3>
				<p>@{{ message.messages }}</p>
			</article>
		</div>
	</div>
	<script src="js/vendor/vue-vendor.js"></script>
	<script src="guestbook/scripts.js"></script>
</body>
</html>