/**
 * Created by Le Tuan Anh on 10/9/2016.
 */
angular.module('aiwApp').controller('SearchFormController', function ($scope,Search,ApiUrl,$stateParams,$state) {
    $("#btn").click(function(){
    	$state.go('searchResult',{title: $scope.title});
    });
});