/**
 * Created by Le Tuan Anh on 10/9/2016.
 */
angular.module('aiwApp').controller('HomePageController', function ($scope,Category,$stateParams,$state,SearchCategory,$q) {
    $scope.news ={};
    // Category.query().$promise.
    // then(function(data){
    //     	$scope.category=data.data;
         
    // }).
    // then(function(){
    //  		var category= $scope.category;
    //  		$scope.name="";
    //  		var len=category.length;
    //  		for(var i=0;i<len;i++){

	   //          var x = SearchCategory.query(category[i].name);
	   //          $scope.name=category[i].name;
	   //          x.then(function(response){
	   //          	var data= response.data.data;
	   //          	var len = data.length;
	   //          	for (var i=0;i<len;i++) {
	   //          		if(i!=3){
	   //          			$scope.news[data[i]["category"]]=data;
	   //          		}else{
	   //          			break;
	   //          		}
	   //          	}
	            	
	   //          });
    //     	}
    //     	console.log($scope.news);
    
    // };
    Category.query().$promise.then(function(response){
    	var length = response.data.length
    	$scope.nameCat= response.data;
    	var promises =[];
    	var i=0;
    	for(i;i<length;i++){
    		var cat = response.data[i].name;
    		promises.push(SearchCategory.query(cat));
    	}
    	return $q.all(promises);
    }).then(function(results){
    	
    	var length = $scope.nameCat.length;
    	var i=0;
    	for(i;i<length;i++){
    		var nameCat = $scope.nameCat[i].name;
    		if(results[i].data.data.length!=0){
    			$scope.news[nameCat]=results[i].data.data;
    		}	
    	}
    	// console.log(results);
    });
});