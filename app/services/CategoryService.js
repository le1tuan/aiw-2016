/**
 * Created by Le Tuan Anh on 10/9/2016.
 */
angular.module('aiwApp').factory('Category', function ($resource) {
    return $resource('http://aiw.local/category',{},{
        'query':  {method:'GET',isArray: false},
    });
});