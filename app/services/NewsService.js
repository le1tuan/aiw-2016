/**
 * Created by Le Tuan Anh on 10/9/2016.
 */
angular.module('aiwApp')
.factory('News', function ($resource,ApiUrl) {
    // return $resource('http://aiw.local/news/:slug',{slug: '@_slug'},{
    //     'get':    {method:'GET'},
    // });
     return $resource(ApiUrl+'news?page=:page',{page: '@_page'},{
        'get':    {method:'GET'},
    })
})
.factory('NewsDetail',function($resource){
	return $resource(ApiUrl+'news/:slug',{slug: '@_slug'},{
        'get':    {method:'GET'},
    })
});