angular.module('aiwApp')
.factory('Search', function ($http,ApiUrl,$stateParams) {
    // return $resource('http://aiw.local/news/:slug',{slug: '@_slug'},{
    //     'get':    {method:'GET'},
    // });
     return{
     	query:function(){
     		return $http({
     			method: 'GET',
     			url : ApiUrl+'search/'+$stateParams.title+'?page='+($stateParams.page==undefined?1:$stateParams),
     			headers:{'Content-Type' : 'application/json' },
     		});
     	}
     }
})
