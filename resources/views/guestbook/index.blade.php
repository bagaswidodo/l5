<!DOCTYPE html>
<html>
<meta name="token" id="token" value="{{ csrf_token() }}">
<head>
	<title>GuestBook With vueJS</title>
	<link rel="stylesheet" type="text/css" href="vendor/bootstrap/dist/css/bootstrap.min.css">
	<style>
	.success-transition {
		transition: all .5s ease-in-out;
	}
	.success-enter, .success-leave {
		opacity: 0;
	}
	</style>
</head>
<body>
	<div class="container">
		<div id="guestbook">
			<div class="alert alert-success" transition="success" v-if="success">Your Message has been posted</div>
			<form action="#" @submit.prevent="AddNewMessage" method="POST">
				<div class="form-group">
					<label for="name">Name:</label>
					<input v-model="newMessage.name" type="text" id="name" name="name" class="form-control">
				</div>

				<div class="form-group">
					<label for="message">Message:</label>
					<textarea v-model="newMessage.body" 
					type="text" id="message" name="message" class="form-control"
					>

					</textarea>
				</div>

				<div class="form-group">
					<button :disabled="!isValid" class="btn btn-default" type="submit" v-if="!edit">Post Message</button>

					<!-- <button :disabled="!isValid" class="btn btn-default" type="submit" v-if="edit" @click="EditUser(newUser.id)">Edit User</button> -->
				</div>

			</form>

			<article v-for="message in list">
				<h3>@{{ message.name }}</h3>
				<p>@{{ message.body }}</p>
				<button class="btn btn-danger" @click="removeMessage(message.id)">Remove</button>
			</article>
		</div>
	</div>
	<script src="js/vendor/vue-vendor.js"></script>
	<script src="guestbook/scripts.js"></script>
</body>
</html>