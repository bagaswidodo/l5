angular.module('todoApp', [])
  .controller('TodoListController', function($http) {
    var todoList = this;
    // todoList.todos = [
    //   {text:'learn angular', done:true},
    //   {text:'build an angular app', done:false}];

    // console.log($http);
 	$http.get("api/todos").success(function(hasil){
 		todoList.todos = hasil;
 	});

    todoList.addTodo = function() {
    	var todo = {
    		body : todoList.todoText,
    		completed : false
    	};


      // todoList.todos.push({text:todoList.todoText, done:false});
      todoList.todos.push(todo);

      $http.post('api/todos',todo);
      todoList.todoText = '';
    };
 
    todoList.remaining = function() {
      var count = 0;
      angular.forEach(todoList.todos, function(todo) {
        count += todo.done ? 0 : 1;
      });
      return count;
    };
 
    todoList.archive = function() {
      var oldTodos = todoList.todos;
      todoList.todos = [];
      angular.forEach(oldTodos, function(todo) {
        if (!todo.done) todoList.todos.push(todo);
      });
    };
  });