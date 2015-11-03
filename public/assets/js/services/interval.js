'use strict';

var app = angular.module('advising');
app
.service('Interval', ['$http', function ($http) {
    var urlBase = 'http://dev.advising/api/intervals';

    this.list = function (offset, limit) {
        return $http.get(urlBase + '/' + offset + '/' + limit);
    }
    this.filter = function (offset, limit, filters) {
        return $http.post(urlBase + '/' + offset + '/' + limit, {start: filters.start, end: filters.end});
    }
    this.show = function (id) {
        return $http.get(urlBase + '/' + id);
    }
    this.update = function (id, attributes) {
        return $http.post(urlBase + '/' + id, attributes);
    }
    this.create = function (attributes) {
        return $http.post(urlBase, attributes);
    }
    this.delete = function (id) {
        return $http.delete(urlBase + '/' + id);
    }
    this.syncCourses = function (id, courses) {
        return $http.post(urlBase + '/' + id + '/allocate', {courses: courses});
    }
}]);