var app = angular.module('advising');

app
.directive('studentSnippet', [function () {
    return {
        restrict: 'E',
        scope: {student: '=student', select: '=select'},
        templateUrl: 'views/students/snippet.html'
    };
}])