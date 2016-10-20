/**
 * Created by Le Tuan Anh on 10/9/2016.
 */
angular.module('aiwApp').controller('NewsController', function ($scope, News) {
    $scope.news = News.query();
    console.log($scope);
});