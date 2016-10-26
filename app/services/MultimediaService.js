angular.module('aiwApp').factory('Multimedia', function ($resource) {
    return $resource('http://aiw.local/multimedia?page=:page',{page: '@_page'},{
        'get':    {method:'GET'},
    });
});