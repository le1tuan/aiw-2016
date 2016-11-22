/**
 * Created by Le Tuan Anh on 10/4/2016.
 */
var aiw = angular.module('aiwApp', ['ui.router', 'ngResource','ngSanitize','ngAnimate','ngTouch','ui.bootstrap']);
aiw.config(function ($stateProvider, $urlRouterProvider) {
    $stateProvider
        .state('homepage', {
            url: '/',
            views: {
                "main": {
                    templateUrl: '../homepage.html',
                    controller: "NewsController"
                },
                "category@homepage":{
                    templateUrl:'../category.html',
                    controller: 'CategoryController'
                }
            }
            
            
        })
        // .state('homepage.pagination',{
        //     url:':page',
        //     templateUrl:'../index.html',
        //     controller: function ($scope,News,Category,$stateParams,$state,$rootScope) {
        //         $scope.currentPage=(parseInt($stateParams.page)+1);
        //         $scope.news=News.get({page:$scope.currentPage});
        //         $scope.news.$promise.then(function(data){
        //             currentPage=data.meta.pagination.current_page;
        //             // $rootScope.totalItems=data.meta.pagination.total_pages;
        //         });
        //         $scope.categories=Category.query();
        //         $scope.goToPage=function(){
        //             $state.go('homepage.pagination',{page:$rootScope.currentPage});
        //         }
        //     }
        // })
        .state('news', {
            url: '/news',
            views: {
                "main": {
                    templateUrl: '../news.html',
                    controller: "NewsController"
                },
                "category@news":{
                    templateUrl:'../category.html',
                    controller: 'CategoryController'
                },
                "search@news":{
                    templateUrl:'../search.html',
                    controller: 'SearchFormController'
                }
            }
            
            
                // News.get().then(function(rs){
                //     $scope.news = rs.data.data;
                //     $scope.itemsPerPage = rs.data.meta.pagination.per_page;
                //     $scope.totalItems = rs.data.meta.pagination.total;
                //     $scope.currentPage = rs.data.meta.pagination.current_page;
                //     $scope.selectPage($scope.currentPage);

                // });
            
        })
        .state('news.pagination',{
            url: '/{page}',
            views: {
                "main@": {
                    templateUrl: '../news.html',
                    controller: "NewsController"
                },
                "category@news.pagination":{
                    templateUrl:'../category.html',
                    controller: 'CategoryController'
                },
                "search@news.pagination":{
                    templateUrl:'../search.html',
                    controller: 'SearchFormController'
                }
            }
        })
        .state('newsDetail',{
            url:'/article/:slug',
            views: {
               "main": {
                    templateUrl:'../post.html',
                    controller:function($scope,$stateParams,NewsComment,$state,$http,$interval,ApiUrl){
                        $scope.commentData={};
                        $http.get(ApiUrl+"news/"+$stateParams.slug)
                                .then(function(response) {
                                    $scope.news=response.data;
                                    if(typeof(EventSource) !== "undefined") {
                                        var source = new EventSource(ApiUrl+"newscomment/"+$stateParams.slug+"/update");
                                        source.onmessage = function(event) {
                                            var x = JSON.parse(event.data);
                                            $scope.news.data[0].comments=x;
                                            $scope.$digest();
                                            // console.log($scope.news.data[0].comments);
                                        };
                                    } else {
                                        console.log("error");
                                    }                       
                                }); 
                        
                        // $scope.updateComment = function(){
                        //     var x = $stateParams.slug;
                        //     $http.get("http://aiw.local/news/"+x)
                        //         .then(function(response) {
                        //             console.log(response.data.data[0].comments);
                        //             $scope.news.data[0].comments=response.data.data[0].comments;
                        //         }); 

                        // }
                        $scope.submitContent = function(){
                           NewsComment.save($scope.commentData).success(function(data){
                                $scope.commentData.content="";
                                var x = $stateParams.slug;
                                $http.get(ApiUrl+"news/"+x)
                                .then(function(response) {
                                    $scope.news=response.data;
                                    console.log($scope.news.data);
                                }); 
                           })
                           .error(function(){
                                console.log("error");
                           });
                            
                        }
                        // $interval($scope.updateComment,5000);

                    }
                },
                "category@newsDetail":{
                    templateUrl:'../category.html',
                    controller: 'CategoryController'
                }
            }
            
            
        })
        .state('multimedia', {
            url: '/multimedia',
            templateUrl: '../index.html',
            controller: function($scope,Multimedia){
                $scope.news=Multimedia.query();
            }
        })
        .state('searchResult',{
            url:'/search/:title',
            views: {
                "main@": {
                    templateUrl: '../result-search.html',
                    controller: "SearchController"
                },
                "category@searchResult":{
                    templateUrl:'../category.html',
                    controller: 'CategoryController'
                },
                "search@searchResult":{
                    templateUrl:'../search.html',
                    controller: 'SearchFormController'
                }
            }
        })
    $urlRouterProvider.otherwise('/');
}).constant('ApiUrl', 'https://aiw.herokuapp.com/public/');
aiw.config(function ($sceDelegateProvider) {
    $sceDelegateProvider.resourceUrlWhitelist(['**']);
});

