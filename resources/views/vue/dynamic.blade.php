<!DOCTYPE html>
<html>
<head>
	<title>Dynamic Task with vuejs</title>
	<link rel="stylesheet" type="text/css" href="vendor/bootstrap/dist/css/bootstrap.min.css">
</head>
<body>
	<div class="container">
	<h1>Task List</h1>

		<tasks></tasks>
	</div>

	<template id="task-template">
		<ul class="list-group">
			<li class="list-group-item" v-for="note in list">
			@{{note.body}} <a @click="delete(note)">X</a>
			</li>
		</ul>
	</template>
	<script src="vendor/jquery/dist/jquery.min.js"></script>
	<script src="vendor/vue/dist/vue.min.js"></script>
	<script>
	Vue.component('tasks',{
		template : '#task-template',
		data : function(){
			return {
				list : [] 
			}
		},
		created:function(){
			$.getJSON('api/notes',function(data){
				this.list=data;
			}.bind(this));
		},
		methods:{
			delete : function(note){
				this.list.$remove(note);
			}
		}
	});

	new Vue({
		el : 'body'
	});
	</script>
</body>
</html>