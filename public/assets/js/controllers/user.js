'use strict';

var app = angular.module('advising');
app
.controller('UserCtrl', ['$scope', 'User', '$state', 'Flash', function ($scope, User, $state, Flash) {
    switch($state.current.name){
        case 'students':
        $scope.page = 'students';
        if ($scope.students === undefined || $scope.students === null) {
            $scope.offset = 0;
            $scope.limit = 5;
            $scope.loaded = false;
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
        case 'newStudent':
        $scope.page = 'students';
        if ($scope.newUser === undefined || $scope.newUser === null) {
            $scope.newUser = {};
        };
        if ($scope.newStudent === undefined || $scope.newStudent === null) {
            $scope.newStudent = {};
        };
        break;
        case 'newFaculty':
        $scope.page = 'students';
        if ($scope.newUser === undefined || $scope.newUser === null) {
            $scope.newUser = {};
        };
        if ($scope.newFaculty === undefined || $scope.newFaculty === null) {
            $scope.newFaculty = {};
        };
        break;
        // default:
        // $scope.page = 'profile';
        // break;
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

    $scope.addUser = function (role) {
        var user = $scope.newUser;
        var student = {};
        var faculty = {};
        var admin = {};
        switch(role){
            case 'student':
            student = $scope.newStudent;
            break;
            case 'faculty':
            faculty = $scope.newFaculty;
            break;
            case 'admin':
            admin = $scope.newAdmin;
            break;
        }
        User
        .create(user, student, faculty, admin)
        .success(function (response) {
            if (response.id !== undefined && response.id !== null) {
                var message = '<strong>Success!</strong>';
                Flash.create('success', errors, 'success flash');
                $state.go('student', {id: response.id});
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

    $scope.loadMore = function (role) {
        var oldCount;
        switch(role){
            case 'student':
            oldCount = $scope.students.length;
            break;
            case 'faculty':
            oldCount = $scope.faculties.length;
            break;
            case 'admin':
            oldCount = $scope.admins.length;
            break;
        }
        var filters = {role: role};
        User
        .filter($scope.offset, $scope.limit, filters)
        .success(function (response) {
            switch(role){
                case 'student':
                append(response, $scope.students, oldCount);
                break;
                case 'faculty':
                append(response, $scope.faculties, oldCount);
                break;
                case 'admin':
                append(response, $scope.admins, oldCount);
                break;
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
        function append (response, array, oldCount) {
            response.forEach(function(user, index){
                array.push(user);
            });
            $scope.offset = array[array.length - 1].id;
            var newCount = array.length;
            if (newCount === oldCount) {
                $scope.loaded = true;
            };
        }
    }

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

    function fetchUserWithRole (role) {
        var filters = {role: role};
        User
        .filter($scope.offset, $scope.limit, filters)
        .success(function (response) {
            switch(role){
                case 'student':
                $scope.students = response;
                $scope.offset = $scope.students[$scope.students.length - 1].id;
                break;
                case 'faculty':
                $scope.faculties = response;
                $scope.offset = $scope.faculties[$scope.faculties.length - 1].id;
                break;
                case 'admin':
                $scope.admins = response;
                $scope.offset = $scope.admins[$scope.admins.length - 1].id;
                break;
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

    function fetchGrades () {

    }

    function fetchCourses () {

    }

    function fetchSchedules () {

    }

    function fetchSemesters () {

    }

}]);