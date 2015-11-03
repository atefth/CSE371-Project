'use strict';

var app = angular.module('advising', ['ui.router', 'ui.bootstrap']);
app
.config(['$interpolateProvider', '$httpProvider', 'CSRF_TOKEN', function ($interpolateProvider, $httpProvider, CSRF_TOKEN) {
    $interpolateProvider.startSymbol('[[');
    $interpolateProvider.endSymbol(']]');
    delete $httpProvider.defaults.headers.common["X-Requested-With"];
}]);

app.filter('exclude', function() {
    return function(array, params, inputs) {
        var filtered = [];
        var dup = false;
        angular.forEach(params.courses, function(course) {
            dup = false;
            angular.forEach(params.existingCourses, function(oldCourse) {
                if(oldCourse !== undefined && course !== undefined && oldCourse.id === course.id){
                    dup = true;
                };
            });
            if (dup === false) {
                filtered.push(course);
            };
        });
        return filtered;
    };
});

app
.run(['$rootScope', 'Auth', '$state', '$window', function ($rootScope, Auth, $state, $window) {
    if ($rootScope.user === undefined || $rotoScope.user === null) {
        $rootScope.user = {id: 0};
    };
    Auth
    .check()
    .success(function (response) {
        if (response === 'false') {
            $rootScope.user = {id: 0};
        }else{
            $rootScope.user = response;
        }
    })
    .error(function(error) {
        $rootScope.user = {id: 0};
    });

    $rootScope.$watch('user', function (newValue, oldValue) {
        if (newValue !== oldValue && newValue !== undefined && newValue !== null) {
            if ($state.current.name === 'login' && newValue.id > 0) {
                $state.go('profile');
            };
            if ($state.current.name === 'profile' && newValue.id === 0) {
                $state.go('home');
            };
        };
    });


    $rootScope.logout = function () {
        Auth
        .logout()
        .success(function (response) {
            if (response === 'true') {
                $rootScope.user = {id: 0};
                $state.go('home');
            };
        });
    }

    $rootScope.goBack = function(){
        $window.history.back();
    }

    $rootScope.locate = function (id) {
        console.log(id);
        $state.go('course', {id: id});
    }

}]);
