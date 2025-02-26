'use strict';

angular.module('ImageEditor').factory('settings', ['$rootScope', '$http', function($rootScope, $http) {

	var settings = {
        all: {},

        get: function(name) {
            return this.all[name];
        }
	}

    $http.get('/pixie/config.json').success(function(data) {
        settings.all = data;

        $rootScope.$emit('settings.ready');
    });

	return settings;
}]);