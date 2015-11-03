'use strict';

var app = angular.module('advising');
app
.service('Auth', ['$http', '$rootScope', function ($http, $rootScope) {
    var urlBase = 'http://dev.advising/api/auth';

    this.attempt = function (credentials) {
        return $http.post(urlBase + '/attempt', credentials);
    }
    this.logout = function () {
        return $http.get(urlBase + '/logout');
    }
    this.check = function () {
        return $http.get(urlBase + '/check');
    }
}]);