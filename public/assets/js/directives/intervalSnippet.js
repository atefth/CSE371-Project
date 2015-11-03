var app = angular.module('advising');

app
.directive('intervalSnippet', [function () {
    return {
        restrict: 'E',
        scope: {interval: '=interval', select: '=select', locate: '=locate', remove: '=remove', add: '=add', courses: '=courses', exclude: '=exclude'},
        templateUrl: 'views/intervals/snippet.html'
    };
}])