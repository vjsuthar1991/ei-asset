'use strict';
var app =  angular.module('main-App',['ngRoute','angularUtils.directives.dirPagination','oc.lazyLoad','datatables']);

app.config(['$routeProvider','$locationProvider','$controllerProvider',

    function($routeProvider,$locationProvider,$controllerProvider,$location,) {
        app.registerCtrl = $controllerProvider.register;
        
        $routeProvider.

            when('/', {

                templateUrl: 'views/dashboard.html',

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

                templateUrl: 'views/add_student_target.html',

                controller: 'AddStudentTargetController'

            }).

            when('/listing_table', {
                templateUrl: 'views/listing_table.html',

                controller: 'ListingTableController',

                
            }).
            when('/add_user',{
                 templateUrl: 'views/add_user.html',
                 controller: 'AddUserController',  
                 
            }).
            when('/view_user',{
                 templateUrl: 'views/view_user.html',
                 controller: 'ViewUserController',  
                 
            }).
            when('/edit_user',{
                 templateUrl: 'views/edit_user.html',
                 controller: 'EditUserController',  
                 
            })
            .when('/upload_csv',{
                 templateUrl: 'views/upload_csv.html',
                 controller: 'UploadCSVController',  
                 
            }).when('/packing_slips',{
                 templateUrl: 'views/packing_slips.html',
                 controller: 'PackingSlipsController',  
                 
            });



            // use the HTML5 History API
        $locationProvider.html5Mode(true);

}]);