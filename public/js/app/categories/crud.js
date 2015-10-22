/**
 * Created by felipeneuhauss on 30/07/14.
 */
app.controller('CategoryController', ['$http', '$scope', '$compile', function($http, $scope, $compile) {

    console.log('CategoryCtrl');
    // Da paginacao
    $scope.currentPage = 1;
    $scope.pageSize = 10;
    $scope.result = [];
    $scope.categories = [];
    $('#form-category').validate();

    $scope.list = function() {
        $http.get('/categories/list').success(function(data){
            $scope.result = data;
            $scope.getCategories();
        });

    }

    $scope.getCategories = function() {
        return $scope.result;
    }

    $scope.list();

    $scope.edit = function(category) {
        $scope.categoryForm = category;
    }

    $scope.remove = function(category) {
        if (confirm('Deseja remover a categoria?')) {
            $.get("/categories/remove/"+category.id, {}, function( data ) {
                //messageAlertAdmin(data.message, data.type);
                $scope.list();
            });
        }
    }

    $scope.add = function(item) {
        item._token = $('#_token').val();
        if (item.category != undefined) {
            item.category_id = item.category.id;
        }
        console.log(item);
        if ($('#form-category').valid()) {
            $.post("/categories/form", item, function( data ) {
                //messageAlertAdmin(data.message, data.type);
                $scope.list();
            });
        }
        $scope.categoryForm = {};
    }

}]);



