angular.module('aiwApp')
.factory('Search', function ($http,ApiUrl,$stateParams) {
    // return $resource('http://aiw.local/news/:slug',{slug: '@_slug'},{
    //     'get':    {method:'GET'},
    // });
     return{
     	query:function(commentData){
     		return $http({
     			method: 'GET',
     			url : ApiUrl+'search/'+$stateParams.title,
     			headers:{'Content-Type' : 'application/json' },
     		});
     	}
     }
})
