/**
 * Created by Le Tuan Anh on 10/9/2016.
 */
angular.module('aiwApp').controller('SearchController', function ($scope,Search,ApiUrl,$stateParams,$state) {
    	Search.query().then(function(response){
    		$scope.results=response.data;
    		if($scope.results.data.length==0){
    			$scope.noti="Not Found";
    		}else{
    			$scope.noti="";
    		}
    	});
});