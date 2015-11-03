var app = angular.module('advising');

app
.directive('semesterSnippet', [function () {
    return {
        restrict: 'E',
        scope: {semester: '=semester', select: '=select'},
        templateUrl: 'views/semesters/snippet.html'
    };
}])