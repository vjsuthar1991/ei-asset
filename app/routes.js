'use strict';
var app =  angular.module('main-App',['ngRoute','angularUtils.directives.dirPagination','oc.lazyLoad','datatables']);

app.run(function($rootScope, $templateCache, $routeParams,$location,$window,$route) {
  
  var username = $('#loginusername').val();
  var data = {username:username};
  data = JSON.stringify(data);

  $.ajax({
    url: './api/dashboard/loginuser_details',
    type: 'POST',
            dataType : 'json', // data type
            data: data,
            async: false,
            cache: false,
            contentType: false,
            processData: false,
            success: function (returndata) {
              var response = JSON.parse(JSON.stringify(returndata));

              if(response.status == "success"){
                var d = new Date();
                d.setTime(d.getTime() + (1*24*60*60*1000));
                var expires = "expires=" + d.toGMTString();
                if(response.fullname[0]['region'] == null || response.fullname[0]['region'] == 'NULL'){
                  
                  response.fullname[0]['region'] = 'NULL';
                
                }
                
                document.cookie = "loginusername=" + response.fullname[0]['fullname'] + ";" + expires + ";path=/";
                document.cookie = "loginuserregion=" + response.fullname[0]['region'] + ";" + expires + ";path=/";
                document.cookie = "loginusercategory=" + response.fullname[0]['category'] + ";" + expires + ";path=/";
                document.cookie = "loginuserlogname=" + response.fullname[0]['name'] + ";" + expires + ";path=/";
              }
              
            }
          });
    

   $rootScope.$on('$viewContentLoaded', function() {
      $templateCache.removeAll();
   });

   $rootScope.$on('$locationChangeStart', function (event, next, current) {

            $('.page-loading').show();
            

            $('#vendor_userdescname span').html($('#vendorloginname').val());
            
            //document.cookie = "vendor_id=; expires=Thu, 01 Jan 1970 00:00:00 UTC; path=/;";
            checkCookie();

            function checkCookie() {
                      var vendor = getCookie("vendor_id");
                      var vendor_auth = getCookie("vendor_authtoken");

                      if (vendor != "") {

                          // redirect to login page if not logged in and trying to access a restricted page
                          
                          var restrictedPage = $.inArray($location.path(), ['/dashboard','/create_vendor','/vendor_list','/edit_vendor','/packing_slips_list','/generate_packing_slips']) !== -1;
                          
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
                                window.location = './vendor-login';

                            }


                          }

                      } else {

                         var loginuseradmin = getCookie("loginusername");

                         if(loginuseradmin == ''){

                            $location.path('/vendor-login');$route.reload();

                          }

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

                  

            if($location.path() == '/admin-logout'){
              

              $.ajax({
                    url: "./api/dashboard/adminLogout",
                    contentType: false,
                    processData: false,
                    async: true,
                    type: 'POST',
                    success: function (returndata) {
                
                    var response = JSON.parse(returndata);
                    
                    if(response.status == "success"){

                      // return false;
                      document.cookie = "loginusername=; expires=Thu, 01 Jan 1970 00:00:00 UTC; path=/;";
                      document.cookie = "loginuserregion=; expires=Thu, 01 Jan 1970 00:00:00 UTC; path=/;";
                      document.cookie = "loginusercategory=; expires=Thu, 01 Jan 1970 00:00:00 UTC; path=/;";
                      document.cookie = "loginuserlogname=; expires=Thu, 01 Jan 1970 00:00:00 UTC; path=/;";
                      window.location = './';
                      
                    }

                 }
                });
            }      
      

            // redirect to login page if not logged in and trying to access a restricted page
            // var restrictedPage = $.inArray($location.path(), ['/login', '/register']) === -1;
            // var loggedIn = $rootScope.globals.currentUser;
            // if (restrictedPage && !loggedIn) {
            //     $location.path('/login');
            // }
        });

      $rootScope.$on('$locationChangeSuccess', function(event, next, current) { 
    
        setTimeout(function(){ $('.page-loading').hide(); },1000);

      });

});

app.config(['$routeProvider','$locationProvider','$controllerProvider',

    function($routeProvider,$locationProvider,$controllerProvider,$location) {
        app.registerCtrl = $controllerProvider.register;
        
        $routeProvider.

            when('/', {
                templateUrl: 'views/dashboard.html',
                controller: 'DashboardController',
            })
            .when('/generate_packing_slips',{
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
                 resolve: {
                    deps: ['$ocLazyLoad', function($ocLazyLoad) {
                        return $ocLazyLoad.load([{
                            name: 'ui.select',
                            // add UI select css / js for this state
                            files: [
                                
                                'https://cdn.datatables.net/buttons/1.2.2/js/dataTables.buttons.min.js',
                                'https://cdn.datatables.net/buttons/1.2.2/js/buttons.colVis.min.js',
                                'https://cdn.datatables.net/buttons/1.2.2/js/buttons.flash.min.js',
                                'https://cdn.datatables.net/buttons/1.2.2/js/buttons.html5.min.js',
                                'https://cdn.datatables.net/buttons/1.2.2/js/buttons.print.min.js',

                            ] 
                        }]);
                    }]
                }
                 
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
            })
            .when('/dashboard-penpaper',{
              templateUrl: 'views/dashboard-penpaper.html',
              controller: 'DashboardPenAndPaperController',
            })
            .when('/dashboard-pppretest',{
              cache: false,
              templateUrl: 'views/dashboard-pppretest.html',
              controller: 'DashboardPenAndPaperPreTestController',
              resolve: {
                    deps: ['$ocLazyLoad', function($ocLazyLoad) {
                        return $ocLazyLoad.load([{
                            name: 'ui.select',
                            // add UI select css / js for this state
                            files: [
                                'asset/js/plugins/chart.min.js',
                            ] 
                        }]);
                    }]
                }
            })
            .when('/school-order-tracking',{
              cache: false,
              templateUrl: 'views/school-order-tracking.html',
              controller: 'SchoolOrderTrackingController',
            })
            .when('/change-password',{
              cache: false,
              templateUrl: 'views/vendor-portal/change-password.html',
              controller: 'VendorChangePasswordController',
            })
            .when('/vendor_qb_mis_list',{
              cache: false,
              templateUrl: 'views/vendor-portal/vendor-qb-mis-list.html',
              controller: 'VendorQbMisListController',
            });



            // use the HTML5 History API
        $locationProvider.html5Mode(true);

}]);