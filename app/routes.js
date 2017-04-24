var app =  angular.module('main-App',['ngRoute','angularUtils.directives.dirPagination','oc.lazyLoad']);

app.config(['$routeProvider','$locationProvider','$controllerProvider',

    function($routeProvider,$locationProvider,$controllerProvider) {
        app.registerCtrl = $controllerProvider.register;
        $routeProvider.

            when('/', {


                templateUrl: 'templates/dashboard.html',

                controller: 'DashboardController'
        

            }).

            when('/add_student_target', {

                templateUrl: 'templates/add_student_target.html',

                controller: 'AddStudentTargetController'

            });

            // use the HTML5 History API
        $locationProvider.html5Mode(true);

}]);