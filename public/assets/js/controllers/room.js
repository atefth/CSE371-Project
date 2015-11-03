'use strict';

var app = angular.module('advising');
app
.controller('RoomCtrl', ['$scope', 'Room', 'Course', '$state', function ($scope, Room, Course, $state) {
    $scope.page = 'rooms';
    if ($scope.rooms === undefined || $scope.rooms === null) {
        $scope.offset = 0;
        $scope.limit = 5;
        $scope.loaded = false;
        fetchRooms();
        fetchCourses();
    };

    if ($state.params.id !== undefined && $state.params.id !== null) {
        fetchRoom($state.params.id);
    };

    $scope.select = function (id) {
        $state.go('room', {id: id});
    };

    $scope.remove = function (room_id, course_id) {
        $scope.rooms.forEach(function(room, index){
            if (room.id === room_id) {
                if (room.courses !== undefined) {
                    room.courses.forEach(function(course, key){
                        if (course.id === course_id) {
                            var oldCourses = room.courses;
                            var course_ids = [];
                            room.courses.splice(key, 1);
                            room.courses.forEach(function(value, count){
                                course_ids.push(value.id);
                            });
                            syncCourses(room, course_ids, oldCourses);
                        };
                    });
                };
            };
        });
    };

    $scope.add = function (room_id, course_id) {
        var courseToAdd = undefined;
        $scope.courses.forEach(function(course, index){
            if (course.id === course_id) {
                courseToAdd = course;
            };
        });
        $scope.rooms.forEach(function(room, index){
            if (room.id === room_id) {
                if (room.courses !== undefined && courseToAdd !== undefined) {
                    var oldCourses = room.courses;
                    var course_ids = [];
                    room.courses.push(courseToAdd);
                    room.courses.forEach(function(value, key){
                        course_ids.push(value.id);
                    });
                    syncCourses(room, course_ids, oldCourses);
                };
            };
        });
    };

    $scope.loadMore = function () {
        var oldCount = $scope.rooms.length;
        Room
        .list($scope.offset, $scope.limit)
        .success(function (response) {
            response.forEach(function(room, index){
                $scope.rooms.push(room);
            });
            $scope.offset = $scope.rooms[$scope.rooms.length - 1].id;
            var newCount = $scope.rooms.length;
            if (newCount === oldCount) {
                $scope.loaded = true;
            };
        })
        .error(function(error) {
            $scope.errors = error;
        });
    }

    function syncCourses (room, course_ids, oldCourses) {
        Room
        .syncCourses(room.id, course_ids)
        .success(function (response) {
            if (response === 'false') {
                room.courses = oldCourses;
                $scope.errors = {'failure': ['The course could not be added!']};
            };
        })
        .error(function(error) {
            $scope.errors = error;
        });
    }

    function fetchRoom (id) {
        Room
        .list(id-1, 1)
        .success(function (response) {
            $scope.room = response[0];
        })
        .error(function(error) {
            $scope.errors = error;
        });
    }

    function fetchRooms () {
        Room
        .list($scope.offset, $scope.limit)
        .success(function (response) {
            $scope.rooms = response;
            $scope.offset = $scope.rooms[$scope.rooms.length - 1].id;
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