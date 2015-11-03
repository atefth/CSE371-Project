'use strict';

var app = angular.module('advising');
app
.controller('ScheduleCtrl', ['$scope', 'Schedule', '$state', function ($scope, Schedule, $state) {
    $scope.page = 'schedules';
    if ($scope.schedules === undefined || $scope.schedules === null) {
        fetchSchedules();
    };

    $scope.select = function (id) {
        $state.go('schedule', {id: id});
    };

    function fetchSchedules () {
        Schedule
        .list(0, 10)
        .success(function (response) {
            $scope.schedules = response;
        })
        .error(function(error) {
            $scope.errors = error;
        });
    }

}]);