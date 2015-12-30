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
	
	<h3>Event handling</h3>
	<button type="submit" @click="count+=1">
		Likes : @{{ count }}
	</button>

	<!-- <input type="color"></input> -->
	<my-counter subject="Likes"></my-counter>
	<my-counter subject="Dislikes"></my-counter>

	<template id="counter-template">
		<h1>@{{subject}}</h1>
		<button @click="count += 1">@{{ count }}</button>
	</template>


	<!-- computed prop -->
	<h1>Skill : @{{ skill }}</h1>
	<input v-model="points">
	<h5>Debugging</h5>
	<hr>
	<pre>
		@{{ $data | json }}
	</pre>


</div>


<script src="vendor/vue/dist/vue.min.js"></script>
<script>
	Vue.component('my-counter',{
		template : '#counter-template',
		props : ['subject'],
		data : function() {
			return {count : 0};
		}
	});


	new Vue({
		el : '#app',
		data : {
			'message' : '',
			'count' : 0,
			points : 50,
		},
		methods : {
			updateCount : function(){
				this.count +=1;
			}
		},
		computed : {
			skill : function(){
				if(this.points <= 100){
					return 'Beginner';
				}

				return 'Advanced';
			}
		}
		
	});
</script>
	
</body>
</html>