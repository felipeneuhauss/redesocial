
angular.module('app.money.mask', []).directive('appMoneyMask', function() {
    return {
        restrict: 'C',
        require : 'ngModel',
        link : function (scope, element, attrs, ngModelCtrl) {
            $(function(){
                element.maskMoney({symbol:"R$",decimal:",",thousands:".",precision:2}).keyup(function(){
                    ngModelCtrl.$setViewValue($(this).val());
                    scope.$apply();
                });
            });
        }
    }
});

angular.module('app.cpf.mask', []).directive('appCpfMask', function() {
    return {
        restrict: 'C',
        require : 'ngModel',
        link : function (scope, element, attrs, ngModelCtrl) {
            $(function(){
                element.mask("999.999.999-99").keyup(function(){
                    ngModelCtrl.$setViewValue($(this).val());
                    scope.$apply();
                });
            });
        }
    }
});

angular.module('app.phone.mask', []).directive('appPhoneMask', function() {
    return {
        restrict: 'C',
        require : 'ngModel',
        link : function (scope, element, attrs, ngModelCtrl) {
            $(function(){
                element.mask("(99)9999-9999?9").keyup(function(){
                    ngModelCtrl.$setViewValue($(this).val());
                    scope.$apply();
                });
            });
        }
    }
});

angular.module('app.cep.mask', []).directive('appCepMask', function() {
    return {
        restrict: 'C',
        require : 'ngModel',
        link : function (scope, element, attrs, ngModelCtrl) {
            $(function(){
                element.mask("99999-999").keyup(function(){
                    ngModelCtrl.$setViewValue($(this).val());
                    scope.$apply();
                });
            });
        }
    }
});

var app = angular.module('app', ['app.phone.mask', 'app.money.mask',
    'app.cpf.mask','app.cep.mask', 'ngSanitize', 'angularUtils.directives.dirPagination'], function($interpolateProvider) {
    $interpolateProvider.startSymbol('{!');
    $interpolateProvider.endSymbol('!}');
//var app = angular.module('app', ['app.phone.mask', 'app.money.mask', 'app.cpf.mask','app.cep.mask', 'ngSanitize']).
//factory('mySharedService', ['$rootScope', '$http', function($rootScope, $http) {
//    var mySharedService = {};
//
//    mySharedService.wishResult = [];
//
//    mySharedService.getWishResult = function(msg) {
//        $http.get( baseUrl +  "/default/search/result")
//            .success(function( data ) {
//                mySharedService.wishResult = data;
//                mySharedService.broadcastItem('wishResult');
//            });
//    };
//
//    mySharedService.broadcastItem = function(name) {
//        $rootScope.$broadcast(name);
//    };
//
//    return mySharedService;
});
var underscore = _.noConflict();



