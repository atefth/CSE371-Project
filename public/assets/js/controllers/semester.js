'use strict';

var app = angular.module('advising');
app
.controller('SemesterCtrl', ['$scope', 'Semester', function ($scope, Semester) {
    $scope.page = 'semesters';
    if ($scope.semesters === undefined || $scope.semesters === null) {
        fetchSemesters();
    };

    function fetchSemesters () {
        Semester
        .list(0, 10)
        .success(function (response) {
            $scope.semesters = response;
        })
        .error(function(error) {
            $scope.errors = error;
        });
    }

    function filterSemesters () {
        var filters = {name: $scope.name, division: $scope.division, year: $scope.year};
        Semester
        .filter(0, 10, filters)
        .success(function (response) {
            $scope.semesters = response;
        })
        .error(function(error) {
            $scope.errors = error;
        });
    }
}]);