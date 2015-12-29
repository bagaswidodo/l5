<!doctype html>
<html>
    <head>
        <title>Time Tracker</title>
        <link rel="stylesheet" href="css/style.css">
        <link rel="stylesheet" href="bower_components/bootstrap/dist/css/bootstrap.css">
    </head>
    <body ng-app="timeTracker" ng-controller="TimeEntry as vm">

    <nav class="navbar navbar-default">
        <div class="container-fluid">
            <div class="navbar-header">
                <a class="navbar-brand" href="#">Time Tracker</a>
            </div>
        </div>
        <div class="container-fluid time-entry">
            <div class="timepicker">
                <span class="timepicker-title label label-primary">Clock In</span>
                <timepicker ng-model="vm.clockIn" hour-step="1" minute-step="1" show-meridian="true">
                </timepicker> 
            </div>
            <div class="timepicker">
                <span class="timepicker-title label label-primary">Clock Out</span>
                <timepicker ng-model="vm.clockOut" hour-step="1" minute-step="1" show-meridian="true">
                </timepicker>
            </div>
            <div class="time-entry-comment">                
                <form class="navbar-form">
                    <input class="form-control" ng-model="vm.comment" placeholder="Enter a comment">
                    </input>
                    <button class="btn btn-primary" ng-click="vm.logNewTime()">Log Time</button>
                </form>
            </div>    
        </div>
    </nav>

    <div class="container">
        <div class="col-sm-8">
            <div class="well timeentry" ng-repeat="time in vm.timeentries">
                <div class="row">
                    <div class="col-sm-8">
                        <h4><i class="glyphicon glyphicon-user"></i> 
                        {{time.user_firstname}} {{time.user_lastname}}</h4>
                        <p><i class="glyphicon glyphicon-pencil"></i> {{time.comment}}</p>                  
                    </div>
                    <div class="col-sm-4 time-numbers">
                        <h4><i class="glyphicon glyphicon-calendar"></i> 
                        {{time.end_time | date:'mediumDate'}}</h4>
                    </div>
                </div>
            </div>
        </div>
    </div>

</body>    

    <!-- Application Dependencies -->
    <script type="text/javascript" src="bower_components/angular/angular.js"></script>
    <script type="text/javascript" src="bower_components/angular-bootstrap/ui-bootstrap-tpls.js"></script>
    <script type="text/javascript" src="bower_components/angular-resource/angular-resource.js"></script>
    <script type="text/javascript" src="bower_components/moment/moment.js"></script>

    <!-- Application Scripts -->
    <script type="text/javascript" src="scripts/app.js"></script>
    <script type="text/javascript" src="scripts/controllers/TimeEntry.js"></script>
    <script type="text/javascript" src="scripts/services/time.js"></script>
</html>