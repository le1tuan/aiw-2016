/**
 * Created by Le Tuan Anh on 10/9/2016.
 */
angular.module('aiwApp').factory('Category', function ($resource,ApiUrl) {
    return $resource(ApiUrl+'category',{},{
        'query':  {method:'GET',isArray: false},
    });
});