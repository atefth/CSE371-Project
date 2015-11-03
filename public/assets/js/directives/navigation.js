var app = angular.module('advising');

app
.directive('navigation', [function () {
    return {
        restrict: 'E',
        scope: {page: '=page', user: '=user', logout: '=logout'},
        templateUrl: 'views/commons/navigation.html'
    };
}])