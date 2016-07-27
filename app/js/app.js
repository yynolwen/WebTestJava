var testApp = angular.module('testApp', ['ngRoute', 'app']);

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
    when('/questions_chinois',{
      templateUrl: 'questions_chinois.html',
      controller:'QuestionController as qCtrl'
    }).
    when('/fin_francais',{
      templateUrl: 'fin_francais.html'
    }).
    when('/fin_chinois',{
      templateUrl: 'fin_chinois.html'
    }).
    when('/question',{
      templateUrl: 'question.html',
      controller:'QuestionController as qCtrl'
    }).
    when('/persoInfo',{
      templateUrl: 'perso-info-form.html',
      controller:'PersoInfoFormController as pform'
    }).
    when('/ChinesepersoInfo',{
      templateUrl: 'perso-info-form-chinois.html',
      controller:'PersoInfoFormController as pform'
    }).
    otherwise({
      redirectTo: '/'
    });
});
