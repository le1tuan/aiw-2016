/**
 * Created by Le Tuan Anh on 10/9/2016.
 */
angular.module('aiwApp')
.factory('News', function ($resource) {
    // return $resource('http://aiw.local/news/:slug',{slug: '@_slug'},{
    //     'get':    {method:'GET'},
    // });
     return $resource('http://aiw.local/news?page=:page',{page: '@_page'},{
        'get':    {method:'GET'},
    })
})
.factory('NewsDetail',function($resource){
	return $resource('http://aiw.local/news/:slug',{slug: '@_slug'},{
        'get':    {method:'GET'},
    })
});