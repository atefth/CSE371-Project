var app = angular.module('advising');

app
.directive('facultySnippet', [function () {
    return {
        restrict: 'E',
        scope: {faculty: '=faculty', select: '=select'},
        templateUrl: 'views/faculties/snippet.html'
    };
}])