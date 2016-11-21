/**
 * Created by Le Tuan Anh on 10/9/2016.
 */
angular.module('aiwApp').controller('CategoryController', function ($scope, Category,ApiUrl) {
    $scope.categories=Category.query();
});