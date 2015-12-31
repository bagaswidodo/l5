new Vue({
	el : '#guestbook',
	data : function(){
		return {
			list : [] 
		}
	},
	created:function(){
			this.fetchTaskList();
	},
	methods:{
		delete : function(note){
			this.list.$remove(note);
		},
		fetchTaskList : function(){
			this.$http.get('api/guestbook',function(data){
				this.list=data;
			});
		}
	}
});