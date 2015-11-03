'use strict';

var app = angular.module('advising');
app
.controller('UserCtrl', ['$scope', 'User', '$state', function ($scope, User, $state) {
    switch($state.current.name){
        case 'students':
        $scope.page = 'students';
        if ($scope.students === undefined || $scope.students === null) {
            fetchUserWithRole('student');
        };
        break;
        case 'student':
        $scope.page = 'students';
        findUser($state.params.id);
        break;
        case 'faculties':
        $scope.page = 'faculties';
        if ($scope.faculties === undefined || $scope.faculties === null) {
            fetchUserWithRole('faculty');
        };
        break;
        case 'faculty':
        $scope.page = 'faculties';
        findUser($state.params.id);
        break;
        case 'admins':
        $scope.page = 'admins';
        if ($scope.admins === undefined || $scope.admins === null) {
            fetchUserWithRole('admin');
        };
        break;
        case 'profile':
        $scope.page = 'profile';
        break;
        case 'studentGrades':
        $scope.page = 'studentGrades';
        if ($scope.grades === undefined || $scope.grades === null) {
            fetchGrades();
        };
        break;
        case 'studentCourses':
        $scope.page = 'studentCourses';
        if ($scope.courses === undefined || $scope.courses === null) {
            fetchCourses();
        };
        break;
        case 'studentSchedules':
        $scope.page = 'studentSchedules';
        if ($scope.schedules === undefined || $scope.schedules === null) {
            fetchSchedules();
        };
        break;
        default:
        $scope.page = 'profile';
        break;
    }

    $scope.select = function (id) {
        switch($state.current.name){
            case 'students':
            $state.go('student', {id: id});
            break;
            case 'faculties':
            $state.go('faculty', {id: id});
            break;
        }
    };

    function findUser (id) {
        User
        .list(id-1, 1)
        .success(function (response) {
            var user = response[0];
            switch(user.role){
                case 'student':
                $scope.student = user;
                break;
                case 'faculty':
                $scope.faculty = user;
                break;
                case 'admin':
                $scope.admin = user;
                break;
            }
        })
        .error(function(error) {
            $scope.errors = error;
        });
    }

    function fetchUserWithRole (role) {
        var filters = {role: role};
        User
        .filter(0, 10, filters)
        .success(function (response) {
            switch(role){
                case 'student':
                $scope.students = response;
                break;
                case 'faculty':
                $scope.faculties = response;
                break;
            }
        })
        .error(function(error) {
            $scope.errors = error;
        });
    }

    function fetchGrades () {

    }

    function fetchCourses () {

    }

    function fetchSchedules () {

    }

    function fetchSemesters () {

    }

}]);