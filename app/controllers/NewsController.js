/**
 * Created by Le Tuan Anh on 10/9/2016.
 */
angular.module('aiwApp').controller('NewsController', function ($scope,News,$stateParams,$state) {

    $scope.selectPage= function(pageNo){
        $scope.currentPage= pageNo;
    };
    $scope.goToPage = function(){
        $state.go('news.pagination',{page: $scope.currentPage});
        $scope.selectPage($scope.currentPage);
    };
    var news=News.get({page:$state.params.page});
    news.$promise.then(function(data){
         $scope.news= data;
         $scope.itemsPerPage = data.meta.pagination.per_page;
         $scope.totalItems = data.meta.pagination.total;
         $scope.currentPage = data.meta.pagination.current_page;
         $scope.selectPage($scope.currentPage);
     });
});