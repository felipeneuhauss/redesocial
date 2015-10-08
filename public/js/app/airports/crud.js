/**
 * Created by felipeneuhauss on 30/07/14.
 */
app.controller('AirportController', ['$http', '$scope', '$compile', function($http, $scope, $compile) {

    console.log('AirportCtrl');
    // Da paginacao
    $scope.currentPage = 1;
    $scope.pageSize = 10;
    $scope.result = [];
    $('#form-airport').validate();

    $scope.list = function() {
        $http.get('/airports/list').success(function(data){
            console.log(data.data);
            $scope.result = data.data;
        });
    }

    $scope.list();

    $scope.edit = function(airport) {
        $scope.airportForm = airport;
    }

    $scope.remove = function(airport) {
        if (confirm('Deseja remover o aeroporto?')) {
            $.post("/airports/remove", {id: airport.id}, function( data ) {
                //messageAlertAdmin(data.message, data.type);
                $scope.list();
            });
        }
    }

    $scope.add = function(item) {
        if ($('#form-airport').valid()) {
            $.post("/airports/form", item, function( data ) {
                //messageAlertAdmin(data.message, data.type);
                $scope.list();
            });
        }
        $scope.airportForm = {};
    }

}]);



