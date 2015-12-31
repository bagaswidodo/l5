
<!doctype html>
<html>
<head>
    <meta charset="utf-8">
    <title>Angular Todo application</title>
    <link rel="stylesheet" href="/vendor/bootstrap/dist/css/bootstrap.css">
</head>
<body ng-app="todoApp">

<div class="container">
    <div ui-view></div>
</div>

</body>

<script src="/vendor/angular/angular.js"></script>
<script src="/vendor/angular-ui-router/release/angular-ui-router.js"></script>
<script src="/vendor/satellizer/satellizer.js"></script>

<script src="/jwt/todo/build.js"></script>