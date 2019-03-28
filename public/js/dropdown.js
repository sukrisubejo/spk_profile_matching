(function(){
	var app = angular.module('dropdown', [ ]);
 
	app.controller('DropDownCtrl', [ '$scope', '$http', function($scope, $http) {
		$http.get('api/author').success(function(data) {
        	$scope.authorlists = data;
    	});
      
		$scope.changeMe = function (author_id) {
      $http.get('api/book/' + author_id).success(function(data) {
          	$scope.booklists = data;
      	});
		};
 
    }]);
 
})();
