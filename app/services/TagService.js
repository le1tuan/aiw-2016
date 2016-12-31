angular.module('aiwApp')
.factory('Tag', function ($http,ApiUrl,$stateParams) {
    // return $resource('http://aiw.local/news/:slug',{slug: '@_slug'},{
    //     'get':    {method:'GET'},
    // });
     return{
     	query:function(){
            
     		return $http({
     			method: 'GET',
     			url : ApiUrl+'tag/'+$stateParams.name+'?page='+($stateParams.page==undefined?1:$stateParams.page),
     			headers:{'Content-Type' : 'application/json' },
     		});
     	}
     }
})
