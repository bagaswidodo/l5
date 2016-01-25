<!DOCTYPE html>
<html>
<head>
 
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
      
    <title>Read Products</title>
     
    <!-- include material design CSS -->
    <link rel="stylesheet" href="{{ asset('vendor/materialize/dist/css/materialize.min.css') }}" />
     
    <!-- include material design icons -->
    <!-- <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet" /> -->
     <!-- custom CSS -->
 
	<style>
	.width-30-pct{
		width:30%;
	}
	 
	.text-align-center{
		text-align:center;
	}
	 
	.margin-bottom-1em{
		margin-bottom:1em;
	}


	/* font configuration */
	@font-face {
	    font-family: 'Material Icons';
	    font-style: normal;
	    font-weight: 400;
	    src: url({{ asset('fonts') }}/material/MaterialIcons-Regular.eot); /* For IE6-8 */
	    src: local('Material Icons'),
	         local('MaterialIcons-Regular'),
	         url({{ asset('fonts') }}/material/MaterialIcons-Regular.woff2) format('woff2'),
	         url({{ asset('fonts') }}/material/MaterialIcons-Regular.woff) format('woff'),
	         url({{ asset('fonts') }}/material/MaterialIcons-Regular.ttf) format('truetype');
	  }

	  .material-icons {
	    font-family: 'Material Icons';
	    font-weight: normal;
	    font-style: normal;
	    font-size: 24px;  /* Preferred icon size */
	    display: inline-block;
	    width: 1em;
	    height: 1em;
	    line-height: 1;
	    text-transform: none;
	    letter-spacing: normal;
	    word-wrap: normal;
	    white-space: nowrap;
	    direction: ltr;

	    /* Support for all WebKit browsers. */
	    -webkit-font-smoothing: antialiased;
	    /* Support for Safari and Chrome. */
	    text-rendering: optimizeLegibility;

	    /* Support for Firefox. */
	    -moz-osx-font-smoothing: grayscale;

	    /* Support for IE. */
	    font-feature-settings: 'liga';
	  }
	</style>
</head>
<body>
<!-- page content and controls will be here -->
 <div class="container" ng-app="myApp" ng-controller="productsCtrl">
    <div class="row">
        <div class="col s12">
            <h4>Products</h4>
			
			<!-- used for searching the current list -->
			<input type="text" ng-model="search" class="form-control" placeholder="Search product...">
			 
			<!-- table that shows product record list -->
			<table class="hoverable bordered">
				<thead>
					<tr>
						<th class="text-align-center">ID</th>
						<th class="width-30-pct">Name</th>
						<th class="width-30-pct">Description</th>
						<th class="text-align-center">Price</th>
						<th class="text-align-center">Action</th>
					</tr>
				</thead>
				<tbody ng-init="getAll()">
					<tr ng-repeat="d in names | filter:search">
						<td class="text-align-center">@{{ d.id }}</td>
						<td>@{{ d.name }}</td>
						<td>@{{ d.description }}</td>
						<td class="text-align-center">@{{ d.price }}</td>
						<td>
							<a ng-click="readOne(d.id)" class="waves-effect waves-light btn margin-bottom-1em"><i class="material-icons left">edit</i>Edit</a>
							<a ng-click="removeOne(d.id)" class="waves-effect waves-light btn margin-bottom-1em"><i class="material-icons left">delete</i>Delete</a>
						</td>
					</tr>
				</tbody> 
			</table>
			
			<!-- floating button for creating product -->
			<div class="fixed-action-btn" style="bottom:45px; right:24px;">
				<a class="waves-effect waves-light btn modal-trigger btn-floating btn-large red" href="#modal-product-form"  ng-click="showCreateForm()">
					<i class="large material-icons">add</i>
				</a>
			</div>
             
			
			 
			<!-- modal for for creating new product -->
			<div id="modal-product-form" class="modal">
				<div class="modal-content">
					<h4 id="modal-product-title">Create New Product</h4>
					<div class="row">
						<div class="input-field col s12">
							<input ng-model="name" type="text" class="validate" id="form-name" placeholder="Type name here..." />
							<label for="name">Name</label>
						</div>
						<div class="input-field col s12">
							<textarea ng-model="description" type="text" class="validate materialize-textarea" placeholder="Type description here..."></textarea>
							<label for="description">Description</label>
						</div>
						<div class="input-field col s12">
							<input ng-model="price" type="text" class="validate" id="form-price" placeholder="Type price here..." />
							<label for="price">Price</label>
						</div>
						<input type="hidden" ng-model="category_id" value="0" class="">
						<div class="input-field col s12">
							<a id="btn-create-product" class="waves-effect waves-light btn margin-bottom-1em" ng-click="createProduct()"><i class="material-icons left">add</i>Create</a>
							 
							<a id="btn-update-product" class="waves-effect waves-light btn margin-bottom-1em" ng-click="updateProduct()"><i class="material-icons left">edit</i>Save Changes</a>
							 
							<a class="modal-action modal-close waves-effect waves-light btn margin-bottom-1em"><i class="material-icons left">close</i>Close</a>
						</div>
					</div>
				</div>
			</div> 
 
        </div> <!-- end col s12 -->
    </div> <!-- end row -->
</div> <!-- end container -->


<!-- include jquery -->
<script src="{{ asset('vendor/jquery/dist/jquery.min.js') }}"></script>
<script src="{{ asset('vendor/materialize/dist/js/materialize.min.js') }}"></script>
<script src="{{ asset('vendor/angular/angular.min.js') }}"></script>
<script>
// angular js codes will be here
var app = angular.module('myApp', []);
app.controller('productsCtrl', function($scope, $http) {

	    // more angular JS codes will be here
	$scope.showCreateForm = function(){
		// clear form
		$scope.clearForm();

		$('#modal-product-title').text("Create New Product");
		$('#modal-product-form').openModal();
		// hide update product button
		$('#btn-update-product').hide()
		// show create product button
		$('#btn-create-product').show();
	}
	
	// read products
	$scope.getAll = function(){
		$http.get("{{ url('angular/materialize/api/products') }}").success(function(response){
			$scope.names = response;
		});
	}

	// clear variable / form values
	$scope.clearForm = function(){
		$scope.id = "";
		$scope.name = "";
		$scope.description = "";
		$scope.price = "";
	}

	// create new product 
	$scope.createProduct = function(){
			 
		// fields in key-value pairs
		$http.post("{{url('angular/materialize/crud')}}", {
				'name' : $scope.name, 
				'description' : $scope.description, 
				'price' : $scope.price,
				'category_id' : 1
			}
		).success(function (data, status, headers, config) {
			console.log(data);
			// tell the user new product was created
			Materialize.toast(data, 4000);
			 
			// close modal
			$('#modal-product-form').closeModal();
			 
			// clear modal content
			$scope.clearForm();
			 
			// refresh the list
			$scope.getAll();
		});
	}

	$scope.removeOne = function(id)
	{
		// ask the user if he is sure to delete the record
		if(confirm("Are you sure?")){
			// post the id of product to be deleted
			$http.delete("{{url('angular/materialize/crud/')}}/"+id)
			.success(function (data, status, headers, config){
				 
				// tell the user product was deleted
				Materialize.toast(data, 4000);
				 
				// refresh the list
				$scope.getAll();
			});
		}
	}
	// retrieve record to fill out the form
	$scope.readOne = function(id){
		 
		// change modal title
		$('#modal-product-title').text("Edit Product");
		 
		// show udpate product button
		$('#btn-update-product').show();
		 
		// show create product button
		$('#btn-create-product').hide();
		 
		// post id of product to be edited
		$http.get("{{url('angular/materialize/crud/')}}/" + id )
		.success(function(data, status, headers, config){
			 console.log(data);
			// put the values in form
			$scope.id = data.id;
			$scope.name = data.name;
			$scope.description = data.description;
			$scope.price = data.price;
			 
			// show modal
			$('#modal-product-form').openModal();
		})
		.error(function(data, status, headers, config){
			Materialize.toast('Unable to retrieve record.', 4000);
		});
	}

	$scope.updateProduct = function(){
			$http.put("{{url('angular/materialize/crud/')}}/" + $scope.id, {
				'id' : $scope.id,
				'name' : $scope.name, 
				'description' : $scope.description, 
				'price' : $scope.price
			})
			.success(function (data, status, headers, config){             
				// tell the user product record was updated
				Materialize.toast(data, 4000);
				 
				// close modal
				$('#modal-product-form').closeModal();
				 
				// clear modal content
				$scope.clearForm();
				 
				// refresh the product list
				$scope.getAll();
		});
	}
});
</script>
</body>
</html>