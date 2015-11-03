var app = angular.module('advising');

app
.directive('scheduleSnippet', [function () {
    return {
        restrict: 'E',
        scope: {schedule: '=schedule', select: '=select'},
        templateUrl: 'views/schedules/snippet.html'
    };
}])