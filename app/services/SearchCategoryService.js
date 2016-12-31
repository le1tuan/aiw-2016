angular.module('aiwApp')
.factory('SearchCategory', function ($http,ApiUrl,$stateParams) {
    // return $resource('http://aiw.local/news/:slug',{slug: '@_slug'},{
    //     'get':    {method:'GET'},
    // });
     return{
     	query:function(name){
            if(name==undefined){
                name= $stateParams.name;
            }
     		return $http({
     			method: 'GET',
     			url : ApiUrl+'category/'+name+'?page='+($stateParams.page==undefined?1:$stateParams.page),
     			headers:{'Content-Type' : 'application/json' },
     		});
     	}
     }
})
