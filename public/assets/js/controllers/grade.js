'use strict';

var app = angular.module('advising');
app
.controller('GradeCtrl', ['$scope', 'Grade', '$state', function ($scope, Grade, $state) {
    $scope.page = 'grades';
    if ($scope.grades === undefined || $scope.grades === null) {
        fetchGrades();
    };

    if ($state.params.id !== undefined && $state.params.id !== null) {
        fetchGrade($state.params.id);
    };

    $scope.select = function (id) {
        $state.go('grade', {id: id});
    };

    function fetchGrade (id) {
        Grade
        .list(id-1, 1)
        .success(function (response) {
            $scope.grade = response[0];
        })
        .error(function(error) {
            $scope.errors = error;
        });
    }

    function fetchGrades () {
        Grade
        .list(0, 10)
        .success(function (response) {
            $scope.grades = response;
        })
        .error(function(error) {
            $scope.errors = error;
        });
    }

    function filterGrades () {
        Grade
        .filter(0, 10, $scope.department)
        .success(function (response) {
            $scope.grades = response;
        })
        .error(function(error) {
            $scope.errors = error;
        });
    }
}]);