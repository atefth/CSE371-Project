var app = angular.module('advising');

app
.directive('courseSnippetSmall', [function () {
    return {
        restrict: 'E',
        scope: {course: '=course', locate: '=locate'},
        templateUrl: 'views/courses/snippet-sm.html'
    };
}])