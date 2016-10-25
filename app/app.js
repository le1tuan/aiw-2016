/**
 * Created by Le Tuan Anh on 10/4/2016.
 */
var aiw = angular.module('aiwApp', ['ui.router', 'ngResource','ngSanitize']);
aiw.config(function ($stateProvider, $urlRouterProvider) {
    $stateProvider
        .state('/', {
            url: '/',
            templateUrl: '../index.html',
            controller: function ($scope,News,Category) {
            	$scope.news=News.query();
                $scope.categories=Category.query();
            }
        })
        .state('news', {
            url: '/news',
            templateUrl: '../index.html',
            controller: function($scope,News){
                $scope.news=News.query();
            }
        })
        .state('newsDetail',{
            url:'/news/:slug',
            templateUrl:'../post.html',
            controller:function($scope,$stateParams,News){
                $scope.news=News.get({slug:$stateParams.slug});
            }
        })
        .state('multimedia', {
             url: '/multimedia',
            templateUrl: '../index.html',
            controller: function($scope,Multimedia){
                $scope.news=Multimedia.query();
            }
        })
    $urlRouterProvider.otherwise('/');
}).constant('ApiUrl', 'http://aiw.local/');

aiw.filter('htmlToPlaintext', function() {
    return function(text) {
      return  text ? String(text).replace(/<[^>]+>/gm, '') : '';
    };
  }
);
