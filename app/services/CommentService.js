
/**
 * Created by Le Tuan Anh on 10/9/2016.
 */
angular.module('aiwApp')
.factory('NewsComment', function ($http) {
    // return $resource('http://aiw.local/news/:slug',{slug: '@_slug'},{
    //     'get':    {method:'GET'},
    // });
     return{
     	save:function(commentData){
     		return $http({
     			method: 'POST',
     			url : 'http://aiw.local/newscomment',
     			headers:{'Content-Type' : 'application/json' },
     			data: commentData

     		});
     	}
     }
})
