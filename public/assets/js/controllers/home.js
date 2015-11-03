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
                $rootScope.user = response;
                $scope.errors = [];
                $scope.messages = [['Login Successful!']];
                $state.go('profile');
            }else{
                $scope.errors = response;
            }
        })
        .error(function(error) {
            $scope.errors = error;
        });
    }

    $scope.register = function () {
        User
        .create($scope.newUser)
        .success(function (response) {
            if (response.id !== undefined && response.id !== null) {
                $scope.errors = [];
                $scope.messages = [['Registration Successful!']];
                $state.go('login');
            }else{
                $scope.errors = response;
            }
        })
        .error(function(error) {
            $scope.errors = error;
        });
    }
}]);