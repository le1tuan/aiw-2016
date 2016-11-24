/**
 * Created by Le Tuan Anh on 10/9/2016.
 */
angular.module('aiwApp').controller('SearchFormController', function ($scope,Search,ApiUrl,$stateParams,$state) {
    $("#btn").click(function(){	
    	if($scope.title==undefined){
    		alert("input data");
    	}else{
    		$state.go('searchResult',{title: $scope.title});
    	}	
    });
});