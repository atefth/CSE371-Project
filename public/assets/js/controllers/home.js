'use strict';

var app = angular.module('advising');
app
.controller('HomeCtrl', ['$scope', 'Auth', '$state', '$rootScope', function ($scope, Auth, $state, $rootScope) {
    switch($state.current.name){
        case 'home':
        $scope.page = 'home';
        break;
        case 'login':
        $scope.page = 'login';
        $scope.credentials = {email: '', password: '', remember: false};
        break;
        case 'register':
        $scope.page = 'register';
        break;
        default:
        $scope.page = 'home';
        break;
    }

    $scope.login = function () {
        Auth
        .attempt($scope.credentials)
        .success(function (response) {
            if (response.id !== undefined && response.id !== null) {
                var message = '<strong>Success!</strong>';
                Flash.create('success', errors, 'success flash');
                $state.go('profile');
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

    $scope.register = function () {
        User
        .create($scope.newUser)
        .success(function (response) {
            if (response.id !== undefined && response.id !== null) {
                var message = '<strong>Success!</strong>';
                Flash.create('success', errors, 'success flash');
                $state.go('profile');
                $state.go('login');
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
}]);