<!DOCTYPE html>
<html>
<head>
	<title>Dynamic Task with vuejs</title>
	<link rel="stylesheet" type="text/css" href="vendor/bootstrap/dist/css/bootstrap.min.css">
</head>
<body>
	<div class="container">
	<h1>Task List</h1>

		<tasks list="{{ json_encode($notes) }}"></tasks>
	</div>

	<template id="task-template">
		<ul class="list-group">
			<li class="list-group-item" v-for="note in list">
			@{{note.body}}
			</li>
		</ul>
	</template>
	<script src="vendor/vue/dist/vue.min.js"></script>
	<script>
	Vue.component('tasks',{
		template : '#task-template',
		props : ['list'],
		created(){
			this.list = JSON.parse(this.list);
		}
	});

	new Vue({
		el : 'body'
	});
	</script>
</body>
</html>