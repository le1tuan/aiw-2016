/**
 * Created by Le Tuan Anh on 10/4/2016.
 */
var aiw = angular.module('aiwApp', ['ui.router', 'ngResource','ngSanitize']);
aiw.config(function ($stateProvider, $urlRouterProvider) {
    $stateProvider
        .state('homepage', {
            url: '/',
            templateUrl: '../index.html',
            controller: function ($scope,News,Category,$stateParams,$state,Multimedia) {
                $scope.news=News.get({page:$scope.page});
                $scope.nextPage=1;
                $scope.categories=Category.query();
                $scope.muls= Multimedia.get();
            
            }
        })
        .state('homepage.pagination',{
            url:':page',
            templateUrl:'../index.html',
            controller: function ($scope,News,Category,$stateParams,$state) {
                $scope.currentPage=(parseInt($stateParams.page)+1);
                $scope.news=News.get({page:$scope.currentPage});
                $scope.news.$promise.then(function(data){
                    $scope.currentPage=data.meta.pagination.current_page;
                });
                $scope.categories=Category.query();
                $scope.goToPage=function(){
                    $state.go('homepage.pagination',{page:$scope.currentPage});
                }
            }
        })
        .state('news', {
            url: '/news',
            templateUrl: '../index.html',
            controller: function($scope,News,$stateParams){
                $scope.news=News.get();
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
aiw.config(function ($sceDelegateProvider) {
    $sceDelegateProvider.resourceUrlWhitelist(['**']);
});

