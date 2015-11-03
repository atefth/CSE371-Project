var app = angular.module('advising');

app
.directive('gradeSnippet', [function () {
    return {
        restrict: 'E',
        scope: {grade: '=grade', select: '=select'},
        templateUrl: 'views/grades/snippet.html'
    };
}])