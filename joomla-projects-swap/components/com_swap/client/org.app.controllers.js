'use strict';

/* App Controllers Module */

/**
 * stories controller
 * applied on /stories context
 */
function SwapsCtrl($scope, Swap) {
    /**
     * load swap
     */
    $scope.loadSwap = function(item) {
    }

    /**
     * save swap in editor
     */
    $scope.saveSwap = function() {
    }
}

function SwapCtrl($scope, $routeParams, Swap) {
    /**
     * use service to retrieve swap
     */
    $scope.swap = Swap.swap($routeParams.swapId);
}

function MainCtrl($scope, $location, Swap) {
    Swap.swaps({},
            function(data) {
                $scope.swaps = data;
            });

    /**
     * setup test data
     */
    $scope.setup = function() {
        Swap.setup();
    }

    /**
     * load swap
     */
    $scope.book = function(swap) {
        console.info('Book: ' + '/main/book/' + swap.id);
        console.info(swap);
        $location.path('/main/book/' + swap.id);
    }
}