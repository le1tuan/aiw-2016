/**
 * Created by Le Tuan Anh on 10/9/2016.
 */
angular.module('aiwApp').controller('SearchController', function ($scope,Search,ApiUrl,$stateParams,$state) {
		
    	
    	//Handle Show Pagination Result 
    	$scope.selectPage= function(pageNo){
        	$scope.currentPage= pageNo;
	    };
	    $scope.goToPage = function(){
	        $state.go('news.pagination',{page: $scope.currentPage});
	        $scope.selectPage($scope.currentPage);
	    };
	    Search.query().then(function(response){
    		$scope.results=response.data;
    		var meta=response.data.meta.pagination;
    		$scope.itemsPerPage = meta.per_page;
    		$scope.totalItems = meta.total;
    		$scope.currentPage =meta.current_page;
	        $scope.selectPage($scope.currentPage);
    		if($scope.results.data.length==0){
    			$scope.noti="Not Found";
    		}else{
    			$scope.noti="";
    		}
    	});
});	