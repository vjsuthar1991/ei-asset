var app =  angular.module('main-App',['ngRoute','angularUtils.directives.dirPagination','oc.lazyLoad','datatables']);

// app.directive('user', function($compile) {
//                       function createTDElement(directive) {
//                         var table = angular.element('<table><tr><td ' + directive + '></td></tr></table>');
//                         return table.find('td');
//                       }

//                       function render(element, scope) {
//                         var column, html, i,head;
//                         for (i = 0; i < scope.columns.length; i++) {
//                           column = scope.columns[i];
//                           if (column.visible) {
//                             html = $compile(createTDElement(column.directive))(scope);
//                             element.append(html);
//                           }
//                         }

//                       }

//                       return {
//                         restrict: 'A',
//                         scope: {
//                           user: "=",
//                           columns: "="
//                         },
//                         controller: function($scope, $element) {
//                           $scope.$watch(function() {
//                             return $scope.columns;
//                           }, function(newvalue, oldvalue) {
//                             if (newvalue !== oldvalue) {
//                               $element.children().remove();
//                               render($element, $scope);
//                               $compile($element.contents())($scope);
//                             }
//                           }, true);
//                         },
//                         compile: function() {
//                           return function(scope, element) {
//                             render(element, scope);
//                           }

//                         }
//                       };

//                     });

//                     app.directive("firstcolumn", function() {
//                       return {
//                         restrict: 'A',
//                         template: '{{user.userFirstName}}'
//                       }
//                     });

//                     app.directive("secondcolumn", function() {
//                       return {
//                         restrict: 'A',
//                         template: '{{user.userLastName}}'
//                       }
//                     });

//                     app.directive("thirdcolumn", function() {
//                       return {
//                         restrict: 'A',
//                         template: '{{user.userEmail}}'
//                       }
//                     });
//                     app.directive("fourthcolumn", function() {
//                       return {
//                         restrict: 'A',
//                         template: '<a href="">EDIT</a> | <a href="">Delete</a>'
//                       }
//                     });

                    

app.config(['$routeProvider','$locationProvider','$controllerProvider',

    function($routeProvider,$locationProvider,$controllerProvider,$location) {
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
                 
            });



            // use the HTML5 History API
        $locationProvider.html5Mode(true);

}]);