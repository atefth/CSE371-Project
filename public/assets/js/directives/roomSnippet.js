var app = angular.module('advising');

app
.directive('roomSnippet', [function () {
    return {
        restrict: 'E',
        scope: {room: '=room', select: '=select', locate: '=locate', remove: '=remove', add: '=add', courses: '=courses', exclude: '=exclude'},
        templateUrl: 'views/rooms/snippet.html'
    };
}])