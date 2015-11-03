'use strict';

var app = angular.module('advising');
app
.service('Grade', ['$http', function ($http) {
    var urlBase = 'http://dev.advising/api/grades';

    this.list = function (offset, limit) {
        return $http.get(urlBase + '/' + offset + '/' + limit);
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