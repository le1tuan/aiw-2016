/**
 * Created by Le Tuan Anh on 10/9/2016.
 */
angular.module('aiwApp').controller('SearchCategoryController', function ($scope,SearchCategory,ApiUrl,$stateParams,$state) {
    $scope.selectPage= function(pageNo){
        	$scope.currentPage= pageNo;
	};
	$scope.goToPage = function(){
	        $state.go('searchCategory.pagination',{page: $scope.currentPage});
            console.log($scope.currentPage);
	        $scope.selectPage($scope.currentPage);
	};
    SearchCategory.query().then(function(response){
    		$scope.results=response.data;
            $scope.header=$stateParams.name;
            if($scope.results.data.length==0){
                $scope.noti="Not Found";
            }else{
                $scope.noti="";
            }
    		var meta=response.data.meta.pagination;
    		$scope.itemsPerPage = meta.per_page;
    		$scope.totalItems = meta.total;
    		$scope.currentPage =meta.current_page;
	        $scope.selectPage($scope.currentPage);
    		
    });

});