var app =  angular.module('main-App',['ngRoute','angularUtils.directives.dirPagination','oc.lazyLoad','ngReactGrid']);

app.config(['$routeProvider','$locationProvider','$controllerProvider',

    function($routeProvider,$locationProvider,$controllerProvider) {
        app.registerCtrl = $controllerProvider.register;
        $routeProvider.

            when('/', {

                templateUrl: 'templates/dashboard.html',

                controller: 'DashboardController',

                resolve: {
                    deps: ['$ocLazyLoad', function($ocLazyLoad) {
                        return $ocLazyLoad.load([{
                            name: 'ui.select',
         // add UI select css / js for this state
                            files: [
                                
                                'asset/js/plugins/jquery.vmap.min.js',
                                'asset/js/plugins/jquery.vmap.world.js',
                                'asset/js/plugins/jquery.vmap.sampledata.js',
                                'asset/js/plugins/chart.min.js',
                            ] 
                        }]);
                    }]
                }
            }).

            when('/add_student_target', {

                templateUrl: 'templates/add_student_target.html',

                controller: 'AddStudentTargetController'

            }).

            when('/listing_table', {
                templateUrl: 'templates/listing_table.html',

                controller: 'ListingTableController',

                
            }).
            when('/add_user',{
                 templateUrl: 'templates/add_user.html',
                 controller: 'AddUserController',  
            });


            // use the HTML5 History API
        $locationProvider.html5Mode(true);

}]);