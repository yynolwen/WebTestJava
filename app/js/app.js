var testApp = angular.module('testApp', ['ngRoute', 'testControllers']);

testApp.config(function($routeProvider) {
  $routeProvider.
    when('/', {
      templateUrl: 'accueil_francais.html'
    }).
    when('/index_francais', {
      templateUrl: 'accueil_francais.html'
    }).
    when('/index_chinois',{
      templateUrl: 'accueil_chinois.html'
    }).
    when('/questions_francais', {
      templateUrl: 'questions_francais.html',
      controller: 'testCtrl'
    }).
    when('/questions_chinois',{
      templateUrl: 'questions_chinois.html',
      controller: 'testCtrl'
    }).
    when('/fin_francais',{
      templateUrl: 'fin_francais.html'
    }).
    otherwise({
      redirectTo: '/'
    });
});
/*
testApp.factory('countries', function($http){
  return {
    list: function (callback){
      $http({
        method: 'GET',
        url: 'countries.json',
        cache: true
      }).success(callback);
    },
    find: function(id, callback){
      $http({
        method: 'GET',
        url: 'country_' + id + '.json',
        cache: true
      }).success(callback);
    }
  };
});

testApp.directive('country', function(){
  return {
    scope: {
      country: '='
    },
    restrict: 'A',
    templateUrl: 'country.html',
    controller: function($scope, countries){
      countries.find($scope.country.id, function(country) {
        $scope.flagURL = country.flagURL;
      });
    }
  };
});

    */