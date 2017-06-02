'use strict';
var app =  angular.module('main-App',['ngRoute','angularUtils.directives.dirPagination','oc.lazyLoad','datatables']);

app.run(function($rootScope, $templateCache, $routeParams,$location,$window,$route) {

   $rootScope.$on('$viewContentLoaded', function() {
      $templateCache.removeAll();
   });

   $rootScope.$on('$locationChangeStart', function (event, next, current) {
            
            //document.cookie = "vendor_id=; expires=Thu, 01 Jan 1970 00:00:00 UTC; path=/;";
            //checkCookie();

            function checkCookie() {
                      var vendor = getCookie("vendor_id");
                      var vendor_auth = getCookie("vendor_authtoken");

                      if (vendor != "") {
                          // redirect to login page if not logged in and trying to access a restricted page
                          
                          var restrictedPage = $.inArray($location.path(), ['/dashboard','/create_vendor','/vendor_list','/edit_vendor','/packing_slips_list','/generate_packing_slips']) !== -1;
                          console.log(restrictedPage);
                          if (restrictedPage) {

                            $location.path('/unauthorised-access');
                          
                          }
                          else{
                            if($location.path() == '/logout'){
                                
                                var data = {vendor_authtoken:vendor_auth};
                                data = JSON.stringify(data);

                                $.ajax({
                                    url: "./api/vendor/unregisterVendor",
                                    contentType: false,
                                    processData: false,
                                    async: true,
                                    data: data,
                                    type: 'POST',
                                    dataType : 'json',
                                    success: function (returndata) {
                                    
                                     }
                                    });

                                document.cookie = "vendor_id=; expires=Thu, 01 Jan 1970 00:00:00 UTC; path=/;";
                                document.cookie = "vendor_authtoken=; expires=Thu, 01 Jan 1970 00:00:00 UTC; path=/;";
                                $location.path('/vendor-login');
                                $route.reload();


                            }


                           
                            //$location.path('/vendor_list');
                          
                          }

                      } else {
                         $location.path('/vendor-login');$route.reload();
                         // user = prompt("Please enter your name:","");
                         // if (user != "" && user != null) {
                             
                         //     //setCookie("username", user, 30);
                         // }
                      }
                  }

            function getCookie(cname) {
                      var name = cname + "=";
                      var decodedCookie = decodeURIComponent(document.cookie);
                      var ca = decodedCookie.split(';');
                      for(var i = 0; i < ca.length; i++) {
                          var c = ca[i];
                          while (c.charAt(0) == ' ') {
                              c = c.substring(1);
                          }
                          if (c.indexOf(name) == 0) {
                              return c.substring(name.length, c.length);
                          }
                      }
                      return "";
                  }
      

            // redirect to login page if not logged in and trying to access a restricted page
            // var restrictedPage = $.inArray($location.path(), ['/login', '/register']) === -1;
            // var loggedIn = $rootScope.globals.currentUser;
            // if (restrictedPage && !loggedIn) {
            //     $location.path('/login');
            // }
        });

});

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
                 
            }).when('/generate_packing_slips',{
                 templateUrl: 'views/packing_slips.html',
                 controller: 'PackingSlipsController',  
                 
            }).when('/packing_slips_list',{
                 templateUrl: 'views/packing_slips_list.html',
                 controller: 'PackingSlipsListController',  
                 
            }).when('/create_vendor',{
                 templateUrl: 'views/create_vendor.html',
                 controller: 'CreateVendorController',  
                 
            }).when('/vendor_list',{
                 templateUrl: 'views/vendor_list.html',
                 controller: 'VendorListController',  
                 
            })
            .when('/edit_vendor',{
                 templateUrl: 'views/edit_vendor.html',
                 controller: 'EditVendorController',  
                 
            })
            .when('/vendor-login',{
                templateUrl: 'views/vendor-portal/login.html',
                controller: 'VendorLoginController',
            })
            .when('/unauthorised-access',{
                templateUrl: 'views/vendor-portal/unauthorised-access.html',
                controller: 'UnauthorisedAccessController',
            })
            .when('/vendor-dashboard',{
                templateUrl: 'views/vendor-portal/vendor-dashboard.html',
                controller: 'VendorDashboardController',
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
            })
            .when('/testmaterial_mis',{
                templateUrl: 'views/vendor-portal/testmaterial_mis.html',
                controller: 'TestMaterialMisController',
            })
            .when('/vendor-packingslip-list',{
                templateUrl: 'views/vendor-portal/vendor-packingslip-list.html',
                controller: 'VendorPackingSlipListController',
            })
            .when('/qb_mis_list',{
              templateUrl: 'views/qb_mis_list.html',
              controller: 'QbMisListController',
            });



            // use the HTML5 History API
        $locationProvider.html5Mode(true);

}]);