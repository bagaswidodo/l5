<!doctype html>
<html ng-app="todoApp">
  <head>
    <script src="vendor/angular/angular.min.js"></script>
    <script src="todo/main.js"></script>
    <link rel="stylesheet" type="text/css" href="vendor/bootstrap/dist/css/bootstrap.min.css">
    <!-- <link rel="stylesheet" href="todo.css"> -->
    <style type="text/css">
	.done-true {
	  text-decoration: line-through;
	  color: grey;
	}
    </style>
  </head>
  <body>
  <div class="container">
	    <h2>Todo</h2>
	    <div ng-controller="TodoListController as todoList">
	      <span>@{{todoList.remaining()}} of @{{todoList.todos.length}} remaining</span>
	      [ <a href="" ng-click="todoList.archive()">archive</a> ]
	      <ul class="unstyled">
	        <li ng-repeat="todo in todoList.todos">
	          <input type="checkbox" ng-model="todo.done">
	          <span class="done-@{{todo.done}}">@{{todo.text}}</span>
	        </li>
	      </ul>
	      <form ng-submit="todoList.addTodo()">
	        <input type="text" ng-model="todoList.todoText"  size="30"
	               placeholder="add new todo here" class="form-control">
	        <input class="btn btn-primary" type="submit" value="add">
	      </form>
	    </div>
	</div>
  </body>
</html>