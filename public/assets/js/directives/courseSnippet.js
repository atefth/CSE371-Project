var app = angular.module('advising');

app
.directive('courseSnippet', [function () {
    return {
        restrict: 'E',
        scope: {course: '=course', select: '=select'},
        templateUrl: 'views/courses/snippet.html'
    };
}])