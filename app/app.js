/**
 * Created by Le Tuan Anh on 10/4/2016.
 */
var aiw = angular.module('aiwApp', ['ui.router', 'ngResource']);
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
            templateUrl: '../post.html'
        })
        .state('multimedia', {
            url: '/multimedia',
            templateUrl: '../post.html'
        })
    $urlRouterProvider.otherwise('/');
}).constant('ApiUrl', 'http://aiw.local/');
