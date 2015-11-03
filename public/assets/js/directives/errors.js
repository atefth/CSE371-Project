var app = angular.module('advising');

app
.directive('errors', [function () {
    return {
        restrict: 'E',
        scope: {errors: '=errors', messages: '=messages'},
        templateUrl: 'views/commons/errors.html'
    };
}])