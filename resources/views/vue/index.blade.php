<!DOCTYPE html>
<html>
<head>
	<title>Vue static</title>
	<link rel="stylesheet" type="text/css" href="vendor/bootstrap/dist/css/bootstrap.min.css">
	<style>
	.completed { text-decoration: line-through;}
	</style>
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
	

	<!-- wathc and computed -->
	<h1>@{{ fullName }}</h1>
	<input v-model="first" placeholder="First Name">
	<input v-model="last" placeholder="Last Name">


	<!-- subscription plan -->
	<h1>Plan subscription</h1>
	<div v-for="plan in plans">
		<plan :plan="plan" :active.sync="active"></plan>
	</div>

	<template id="plan-template">
		<div>
			<span class="Plan__name">
				@{{ plan.name }}
			</span>

			<span class="Plan__price">
				@{{plan.price}}/month
			</span>

			<button @click="setActivePlan" v-show="plan.name !== active.name">
				@{{ isUpdgraded ? 'Upgrade' : 'Downgrade' }}
			</button>

			<span v-else><strong>Current Plan</strong></span>
		</div>
	</template>


	<!-- rendering example -->
	<tasks :list="tasks"></tasks>

	<template id="tasks-template">
		<h1>My Tasks (@{{remaining}})</h1>
		<ul>
			<li :class="{'completed' : task.completed }"
			 v-for="task in list"
			 @click="task.completed = ! task.completed"
			 >@{{ task.body }}</li>
		</ul>
	</template>

	<!-- For Debugging purpose -->
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

	Vue.component('tasks',{
		template:'#tasks-template',
		props : ['list'],
		computed : {
			remaining : function(){
				return this.list.filter(this.inProgress).length;
			},
		},
		methods : {
			isCompleted : function(task){
				return task.completed
			},

			inProgress : function(task){
				return this.isCompleted(task);
			}
		}
	});


	new Vue({
		el : '#app',
		data : {
			'message' : '',
			'count' : 0,
			points : 50,
			first : 'Jeff',
			last : 'Way',
			fullName  : 'Jeff Way',
			plans : [
				{name : 'Enterprise', price : 100},
				{name : 'Pro', price : 50},
				{name : 'Personal', price : 10},
				{name : 'Free', price : 0},
			],
			tasks :[
				{body : 'Go To The store', completed:true},
				{body : 'Go To The Bank', completed:false},
				{body : 'Go To The doctor', completed:false},
			],
			active : {}
		},
		methods : {
			updateCount : function(){
				this.count +=1;
			},
			toggleCompletedFor : function(task){
				task.completed = !task.completed;
				// alert(!task.completed);
			},
		},
		computed : {
			skill : function(){
				if(this.points <= 100){
					return 'Beginner';
				}

				return 'Advanced';
			},
			fullName : function(){
				return this.first + ' ' + this.last;
			}
		},
		components : {
			plan : {
				template : '#plan-template',
				props : ['plan','active'],
				data : function () {
					return {
						active : false
					};
				},
				computed : {
					isUpdgraded : function(){
							return this.plan.price > this.active.price;
					}
				},
				methods : {
					setActivePlan : function(){
						this.active = this.plan;
						// console.log('change plan');
						// alert(this.active + ' ' + this.plan) ;
					}
				}
			}
		},
		
		
	});
</script>
	
</body>
</html>