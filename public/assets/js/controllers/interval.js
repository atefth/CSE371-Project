'use strict';

var app = angular.module('advising');
app
.controller('IntervalCtrl', ['$scope', 'Interval', 'Course', '$state', function ($scope, Interval, Course, $state) {
    $scope.page = 'intervals';
    if ($scope.intervals === undefined || $scope.intervals === null) {
        $scope.offset = 0;
        $scope.limit = 5;
        $scope.loaded = false;
        fetchIntervals();
        fetchCourses();
    };

    if ($state.current.name === 'interval') {
        fetchInterval($state.params.id);
    };

    $scope.select = function (id) {
        $state.go('interval', {id: id});
    };

    $scope.remove = function (interval_id, course_id) {
        $scope.intervals.forEach(function(interval, index){
            if (interval.id === interval_id) {
                if (interval.courses !== undefined) {
                    interval.courses.forEach(function(course, key){
                        if (course.id === course_id) {
                            var oldCourses = interval.courses;
                            var course_ids = [];
                            interval.courses.splice(key, 1);
                            interval.courses.forEach(function(value, count){
                                course_ids.push(value.id);
                            });
                            syncCourses(interval, course_ids, oldCourses);
                        };
                    });
                };
            };
        });
    };

    $scope.loadMore = function () {
        var oldCount = $scope.intervals.length;
        Interval
        .list($scope.offset, $scope.limit)
        .success(function (response) {
            response.forEach(function(interval, index){
                $scope.intervals.push(interval);
            });
            $scope.offset = $scope.intervals[$scope.intervals.length - 1].id;
            var newCount = $scope.intervals.length;
            if (newCount === oldCount) {
                $scope.loaded = true;
            };
        })
        .error(function(error) {
            $scope.errors = error;
        });
    };

    $scope.add = function (interval_id, course_id) {
        var courseToAdd = undefined;
        $scope.courses.forEach(function(course, index){
            if (course.id === course_id) {
                courseToAdd = course;
            };
        });
        $scope.intervals.forEach(function(interval, index){
            if (interval.id === interval_id) {
                if (interval.courses !== undefined && courseToAdd !== undefined) {
                    var oldCourses = interval.courses;
                    var course_ids = [];
                    interval.courses.push(courseToAdd);
                    interval.courses.forEach(function(value, key){
                        course_ids.push(value.id);
                    });
                    syncCourses(interval, course_ids, oldCourses);
                };
            };
        });
    };

    function syncCourses (interval, course_ids, oldCourses) {
        Interval
        .syncCourses(interval.id, course_ids)
        .success(function (response) {
            if (response === 'false') {
                interval.courses = oldCourses;
                $scope.errors = {'failure': ['The course could not be added!']};
            };
        })
        .error(function(error) {
            $scope.errors = error;
        });
    }

    function fetchInterval (id) {
        Interval
        .list(id-1, 1)
        .success(function (response) {
            $scope.interval = response[0];
        })
        .error(function(error) {
            $scope.errors = error;
        });
    }

    function fetchIntervals () {
        Interval
        .list($scope.offset, $scope.limit)
        .success(function (response) {
            $scope.intervals = response;
            $scope.offset = $scope.intervals[$scope.intervals.length - 1].id;
        })
        .error(function(error) {
            $scope.errors = error;
        });
    }

    function fetchCourses () {
        Course
        .list(0, 0)
        .success(function (response) {
            $scope.courses = response;
        })
        .error(function(error) {
            $scope.errors = error;
        });
    }

}]);