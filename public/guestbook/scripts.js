new Vue({
	http: {
      headers: {
        'X-CSRF-TOKEN': document.querySelector('#token').getAttribute('value')
      }
    },
	el : '#guestbook',
	data: {
		newUser: {
			id: '',
			name: '',
			body: ''
		},

		success: false,
	},
	created:function(){
			this.fetchMessages();
	},
	computed: {
		validation: function () {
			return {
				name: !!this.newMessage.name.trim(),
				body: !!this.newMessage.body.trim()
			}
		},

		isValid: function () {
			var validation = this.validation
			return Object.keys(validation).every(function (key) {
				return validation[key]
			})
		}
	},
	methods:{
		delete : function(note){
			this.list.$remove(note);
		},
		fetchMessages : function(){
			this.$http.get('api/guestbook',function(data){
				this.$set('list', data);
			});
		},
		AddNewMessage: function () {
			// User input
			var message = this.newMessage

			// Clear form input
			this.newMessage = { name:'', body:'' }

			// Send post request
			this.$http.post('/api/guestbook/', message)

			// Show success message
			self = this
			this.success = true
			setTimeout(function () {
				self.success = false
			}, 5000)

			// Reload page
			this.fetchMessages()

		},
		removeMessage: function (id) {
			var ConfirmBox = confirm("Are you sure, you want to delete this Message?")

			if(ConfirmBox) this.$http.delete('/api/guestbook/' + id)

			this.fetchMessages()
		},
	}
});