/**
 * Created by Le Tuan Anh on 10/9/2016.
 */
angular.module('aiwApp').factory('News', function ($resource) {
    return $resource('http://aiw.local/news/:slug',{page: '@_slug'},{
        'get':    {method:'GET'},
    });
});