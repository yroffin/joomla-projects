'use strict';

/* App Modules */

var myModule = angular.module('swapClient', ['swapServices', 'ngRoute']);

myModule.
        config(['$routeProvider', function($routeProvider) {
                console.info('Define routes');
                $routeProvider.
                        when('/swaps', {templateUrl: 'components/com_swap/client/views/swaps.html', controller: SwapsCtrl}).
                        when('/main/book/:swapId', {templateUrl: 'components/com_swap/client/views/book.html', controller: SwapCtrl}).
                        when('/main', {templateUrl: 'components/com_swap/client/views/main.html', controller: MainCtrl}).
                        otherwise({redirectTo: '/main'});
            }]);
