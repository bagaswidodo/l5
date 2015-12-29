(function() {
    
    'use strict';

    angular
        .module('timeTracker')
        .factory('time', time);

        function time($resource) {

            // ngResource call to our static data
            // var Time = $resource('data/time.json');

            // ngResource call to the API with id as a paramaterized URL
            // and setup for the update method
            var Time = $resource('api/time/:id', {}, {
                update: {
                    method: 'PUT'
                }
            });

            // $promise.then allows us to intercept the results of the 
            // query so we can add the loggedTime property
            function getTime() {
                return Time.query().$promise.then(function(results) {
                    angular.forEach(results, function(result) {

                        // Add the loggedTime property which calls 
                        // getTimeDiff to give us a duration object
                        result.loggedTime = getTimeDiff(result.start_time, result.end_time);
                    });
                    return results;
                }, function(error) { // Check for errors
                    console.log(error);
                });
            }

            // Grab data passed from the view and send
            // a POST request to the API to save the data
            function saveTime(data) {

              return Time.save(data).$promise.then(function(success) {
                console.log(success);
              }, function(error) {
                console.log(error);
              });
            }

            // Use Moment.js to get the duration of the time entry
            function getTimeDiff(start, end) {
                var diff = moment(end).diff(moment(start));
                var duration = moment.duration(diff);
                return {
                    duration: duration
                }
            }
            
            // Add up the total time for all of our time entries
            function getTotalTime(timeentries) {
                var totalMilliseconds = 0;

                angular.forEach(timeentries, function(key) {
                    totalMilliseconds += key.loggedTime.duration._milliseconds;
                });

                // After 24 hours, the Moment.js duration object
                // reports the next unit up, which is days.
                // Using the asHours method and rounding down with
                // Math.floor instead gives us the total hours
                return {
                    hours: Math.floor(moment.duration(totalMilliseconds).asHours()),
                    minutes: moment.duration(totalMilliseconds).minutes()
                }
            }

            return {
                getTime: getTime,
                getTimeDiff: getTimeDiff,
                getTotalTime: getTotalTime,
                saveTime: saveTime
            }
        }
            
})();