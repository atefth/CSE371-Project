'use strict';

var app = angular.module('advising');
app
.config(['$stateProvider', '$urlRouterProvider', function ($stateProvider, $urlRouterProvider) {
    $urlRouterProvider.otherwise('/');

    $stateProvider
    .state('login', {
        url: '/login',
        templateUrl: '/views/commons/login.html',
        controller: 'HomeCtrl'
    })
    .state('register', {
        url: '/register',
        templateUrl: '/views/commons/register.html',
        controller: 'HomeCtrl'
    })
    .state('home', {
        url: '/',
        templateUrl: '/views/home/index.html',
        controller: 'HomeCtrl'
    })
    .state('rooms', {
        url: '/rooms',
        templateUrl: '/views/rooms/index.html',
        controller: 'RoomCtrl'
    })
    .state('room', {
        url: '/rooms/:id',
        templateUrl: '/views/rooms/show.html',
        controller: 'RoomCtrl'
    })
    .state('semesters', {
        url: '/semesters',
        templateUrl: '/views/semesters/index.html',
        controller: 'SemesterCtrl'
    })
    .state('semester', {
        url: '/semesters/:id',
        templateUrl: '/views/semesters/show.html',
        controller: 'SemesterCtrl'
    })
    .state('intervals', {
        url: '/intervals',
        templateUrl: '/views/intervals/index.html',
        controller: 'IntervalCtrl'
    })
    .state('interval', {
        url: '/intervals/:id',
        templateUrl: '/views/intervals/show.html',
        controller: 'IntervalCtrl'
    })
    .state('courses', {
        url: '/courses',
        templateUrl: '/views/courses/index.html',
        controller: 'CourseCtrl'
    })
    .state('course', {
        url: '/courses/:id',
        templateUrl: '/views/courses/show.html',
        controller: 'CourseCtrl'
    })
    .state('students', {
        url: '/students',
        templateUrl: '/views/students/index.html',
        controller: 'UserCtrl'
    })
    .state('student', {
        url: '/students/:id',
        templateUrl: '/views/students/show.html',
        controller: 'UserCtrl'
    })
    .state('faculties', {
        url: '/faculties',
        templateUrl: '/views/faculties/index.html',
        controller: 'UserCtrl'
    })
    .state('faculty', {
        url: '/faculties/:id',
        templateUrl: '/views/faculties/show.html',
        controller: 'UserCtrl'
    })
    .state('profile', {
        url: '/profile',
        templateUrl: '/views/commons/profile.html',
        controller: 'UserCtrl'
    })
    .state('studentGrades', {
        url: '/students/:id/grades',
        templateUrl: '/views/students/grades.html',
        controller: 'UserCtrl'
    })
    .state('studentCourses', {
        url: '/students/:id/courses',
        templateUrl: '/views/students/courses.html',
        controller: 'UserCtrl'
    })
    .state('studentSchedules', {
        url: '/students/:id/schedules',
        templateUrl: '/views/students/schedules.html',
        controller: 'UserCtrl'
    })
    .state('studentSemesters', {
        url: '/students/:id/semesters',
        templateUrl: '/views/students/semesters.html',
        controller: 'UserCtrl'
    });
}]);
