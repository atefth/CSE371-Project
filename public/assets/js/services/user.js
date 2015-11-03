'use strict';

var app = angular.module('advising');
app
.service('User', ['$http', function ($http) {
    var urlBase = 'http://dev.advising/api/users';

    this.list = function (offset, limit) {
        return $http.get(urlBase + '/' + offset + '/' + limit);
    }
    this.filter = function (offset, limit, filters) {
        return $http.post(urlBase + '/' + offset + '/' + limit, {role: filters.role});
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
}]);