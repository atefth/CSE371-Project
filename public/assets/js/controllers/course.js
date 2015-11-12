'use strict';

var app = angular.module('advising');
app
.controller('CourseCtrl', ['$scope', 'Course', '$state', 'Flash', function ($scope, Course, $state, Flash) {
    $scope.page = 'courses';
    if ($scope.courses === undefined || $scope.courses === null) {
        $scope.offset = 0;
        $scope.limit = 5;
        $scope.loaded = false;
        fetchCourses();
    };

    if ($state.params.id !== undefined && $state.params.id !== null) {
        fetchCourse($state.params.id);
    };

    $scope.select = function (id) {
        $state.go('course', {id: id});
    };

    $scope.loadMore = function () {
        var oldCount = $scope.courses.length;
        Course
        .list($scope.offset, $scope.limit)
        .success(function (response) {
            response.forEach(function(course, index){
                $scope.courses.push(course);
            });
            $scope.offset = $scope.courses[$scope.courses.length - 1].id;
            var newCount = $scope.courses.length;
            if (newCount === oldCount) {
                $scope.loaded = true;
            };
        })
        .error(function(error) {
            var errors = '';
            var data = $.map(error, function (value, index) {
                return [value];
            })
            data.forEach(function(element, index){
                errors = errors + '<p class="error-p"><strong>' + element + '</strong></p>';
            });
            Flash.create('danger', errors, 'danger flash');
        });
    }

    $scope.addCourse = function () {
        Course
        .create($scope.newCourse)
        .success(function (response) {
            if (response.id !== undefined && response.id !== null) {
                $scope.errors = [];
                $scope.messages = [['Course Added!']];
                $state.go('course', {id: response.id});
            }else{
                var errors = '';
                var data = $.map(response, function (value, index) {
                    return [value];
                })
                data.forEach(function(element, index){
                    errors = errors + '<p class="error-p"><strong>' + element + '</strong></p>';
                });
                Flash.create('danger', errors, 'danger flash');
            }
        })
        .error(function(error) {
            var errors = '';
            var data = $.map(error, function (value, index) {
                return [value];
            })
            data.forEach(function(element, index){
                errors = errors + '<p class="error-p"><strong>' + element + '</strong></p>';
            });
            Flash.create('danger', errors, 'danger flash');
        });
    }

    function fetchCourse (id) {
        Course
        .list(id-1, 1)
        .success(function (response) {
            $scope.course = response[0];
        })
        .error(function(error) {
            var errors = '';
            var data = $.map(error, function (value, index) {
                return [value];
            })
            data.forEach(function(element, index){
                errors = errors + '<p class="error-p"><strong>' + element + '</strong></p>';
            });
            Flash.create('danger', errors, 'danger flash');
        });
    }

    function fetchCourses () {
        Course
        .list($scope.offset, $scope.limit)
        .success(function (response) {
            $scope.courses = response;
            $scope.offset = $scope.courses[$scope.courses.length - 1].id;
        })
        .error(function(error) {
            var errors = '';
            var data = $.map(error, function (value, index) {
                return [value];
            })
            data.forEach(function(element, index){
                errors = errors + '<p class="error-p"><strong>' + element + '</strong></p>';
            });
            Flash.create('danger', errors, 'danger flash');
        });
    }

    function filterCourses () {
        Course
        .filter(0, 10, $scope.department)
        .success(function (response) {
            $scope.courses = response;
        })
        .error(function(error) {
            var errors = '';
            var data = $.map(error, function (value, index) {
                return [value];
            })
            data.forEach(function(element, index){
                errors = errors + '<p class="error-p"><strong>' + element + '</strong></p>';
            });
            Flash.create('danger', errors, 'danger flash');
        });
    }
}]);