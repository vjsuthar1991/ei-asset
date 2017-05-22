app.controller('DashboardController', function($scope,$http,$ocLazyLoad) {

  //$scope.pools = [];
         // start: Chart =============

         Chart.defaults.global.pointHitDetectionRadius = 1;
         Chart.defaults.global.customTooltips = function(tooltip) {

          var tooltipEl = $('#chartjs-tooltip');

          if (!tooltip) {
            tooltipEl.css({
              opacity: 0
            });
            return;
          }

          tooltipEl.removeClass('above below');
          tooltipEl.addClass(tooltip.yAlign);

          var innerHtml = '';
          if (undefined !== tooltip.labels && tooltip.labels.length) {
            for (var i = tooltip.labels.length - 1; i >= 0; i--) {
              innerHtml += [
              '<div class="chartjs-tooltip-section">',
              '   <span class="chartjs-tooltip-key" style="background-color:' + tooltip.legendColors[i].fill + '"></span>',
              '   <span class="chartjs-tooltip-value">' + tooltip.labels[i] + '</span>',
              '</div>'
              ].join('');
            }
            tooltipEl.html(innerHtml);
          }

          tooltipEl.css({
            opacity: 1,
            left: tooltip.chart.canvas.offsetLeft + tooltip.x + 'px',
            top: tooltip.chart.canvas.offsetTop + tooltip.y + 'px',
            fontFamily: tooltip.fontFamily,
            fontSize: tooltip.fontSize,
            fontStyle: tooltip.fontStyle
          });
        };
        var randomScalingFactor = function() {
          return Math.round(Math.random() * 100);
        };
        var lineChartData = {
          labels: ["January", "February", "March", "April", "May", "June", "July"],
          datasets: [{
            label: "My First dataset",
            fillColor: "rgba(21,186,103,0.4)",
            strokeColor: "rgba(220,220,220,1)",
            pointColor: "rgba(66,69,67,0.3)",
            pointStrokeColor: "#fff",
            pointHighlightFill: "#fff",
            pointHighlightStroke: "rgba(220,220,220,1)",
            data: [18,9,5,7,4.5,4,5,4.5,6,5.6,7.5]
          }, {
            label: "My Second dataset",
            fillColor: "rgba(21,113,186,0.5)",
            strokeColor: "rgba(151,187,205,1)",
            pointColor: "rgba(151,187,205,1)",
            pointStrokeColor: "#fff",
            pointHighlightFill: "#fff",
            pointHighlightStroke: "rgba(151,187,205,1)",
            data: [4,7,5,7,4.5,4,5,4.5,6,5.6,7.5]
          }]
        };

        var doughnutData = [
        {
          value: 300,
          color:"#129352",
          highlight: "#15BA67",
          label: "Alfa"
        },
        {
          value: 50,
          color: "#1AD576",
          highlight: "#15BA67",
          label: "Beta"
        },
        {
          value: 100,
          color: "#FDB45C",
          highlight: "#15BA67",
          label: "Gamma"
        },
        {
          value: 40,
          color: "#0F5E36",
          highlight: "#15BA67",
          label: "Peta"
        },
        {
          value: 120,
          color: "#15A65D",
          highlight: "#15BA67",
          label: "X"
        }

        ];


        var doughnutData2 = [
        {
          value: 100,
          color:"#129352",
          highlight: "#15BA67",
          label: "Alfa"
        },
        {
          value: 250,
          color: "#FF6656",
          highlight: "#FF6656",
          label: "Beta"
        },
        {
          value: 100,
          color: "#FDB45C",
          highlight: "#15BA67",
          label: "Gamma"
        },
        {
          value: 40,
          color: "#FD786A",
          highlight: "#15BA67",
          label: "Peta"
        },
        {
          value: 120,
          color: "#15A65D",
          highlight: "#15BA67",
          label: "X"
        }

        ];

        var barChartData = {
          labels: ["January", "February", "March", "April", "May", "June", "July"],
          datasets: [
          {
            label: "My First dataset",
            fillColor: "rgba(21,186,103,0.4)",
            strokeColor: "rgba(220,220,220,0.8)",
            highlightFill: "rgba(21,186,103,0.2)",
            highlightStroke: "rgba(21,186,103,0.2)",
            data: [65, 59, 80, 81, 56, 55, 40]
          },
          {
            label: "My Second dataset",
            fillColor: "rgba(21,113,186,0.5)",
            strokeColor: "rgba(151,187,205,0.8)",
            highlightFill: "rgba(21,113,186,0.2)",
            highlightStroke: "rgba(21,113,186,0.2)",
            data: [28, 48, 40, 19, 86, 27, 90]
          }
          ]
        };

        var ctx2 = $(".line-chart")[0].getContext("2d");
        window.myLine = new Chart(ctx2).Line(lineChartData, {
         responsive: true,
         showTooltips: true,
         multiTooltipTemplate: "<%= value %>",
         maintainAspectRatio: false
       });

        var ctx3 = $(".bar-chart")[0].getContext("2d");
        window.myLine = new Chart(ctx3).Bar(barChartData, {
         responsive: true,
         showTooltips: true
       });

        var ctx4 = $(".doughnut-chart2")[0].getContext("2d");
        window.myDoughnut2 = new Chart(ctx4).Doughnut(doughnutData2, {
          responsive : true,
          showTooltips: true
        });


      });

app.controller('AddStudentTargetController', function($scope,$http){

});

app.controller('ListingTableController', function($scope,$http){

  var employees = [];

  for(var i = 0; i < 100000; i++)
    employees.push({
      firstName: "John " + i,
      lastName: "Doe " + i,
      classname: "Class " + i
    });

  $scope.grid = {
    data: employees,
    columnDefs: [
    {
      field: "firstName",
      displayName: "First Name"
    },
    {
      field: "lastName",
      displayName: "Last Name"
    },
    {
      field: "classname",
      displayName: "Class Name"
    }
    ]
  };
  
});


app.controller('AddUserController', function($scope,$http){

  $("#adduserform").validate({
    errorElement: "em",
    errorPlacement: function(error, element) {
      $(element.parent("div").addClass("form-animate-error"));
      error.appendTo(element.parent("div"));
    },
    success: function(label) {
      $(label.parent("div").removeClass("form-animate-error"));
    },
    rules: {
      user_firstname: "required",
      user_lastname: "required",
      user_password: {
        required: true,
        minlength: 5
      },
      user_email: {
        required: true,
        email: true
      }
    },
    messages: {
      user_firstname: "Please enter your firstname",
      user_lastname: "Please enter your lastname",
      user_password: {
        required: "Please provide a password",
        minlength: "Your password must be at least 5 characters long"
      },
      user_email: "Please enter a valid email address"

    }
  });

  $(document).on('submit','#adduserform',function(event){
            // code
            jQuery('#adduserbtn').attr('disabled','disabled');
            event.stopImmediatePropagation();

          //disable the default form submission
          event.preventDefault();
          var jsonData = {};


          //grab all form data  
          var formData = jQuery('form#adduserform').serializeArray();
          jQuery.each(formData, function() {

           if (jsonData[this.name]) {

             if (!jsonData[this.name].push) {

               jsonData[this.name] = [jsonData[this.name]];

             }

             jsonData[this.name].push(this.value || '');
           } else {

             jsonData[this.name] = this.value || '';

           }


         });

          jsonData = JSON.stringify(jsonData);

          //console.log(JSON.parse(JSON.stringify(jsonData)));  
          $.ajax({
            url: './api/user/add_user',
            type: 'POST',
            dataType : 'json', // data type
            data: jsonData,
            async: true,
            cache: false,
            contentType: false,
            processData: false,
            success: function (returndata) {
              var response = JSON.parse(JSON.stringify(returndata));

              if(response.status == "success"){

                if($('#add_user_message_box').hasClass('alert-danger')){
                  $('#add_user_message_box').removeClass('alert-danger');
                }
                $('#add_user_message_box').addClass('alert-success');
                $('#add_user_message_box').text('');
                $('#add_user_message_box').append(response.message);
                $('#add_user_message_box').removeClass('hide');
                $(window).scrollTop($('#add_user_message_box').offset().top);

                setTimeout(function(){ window.location.reload(); }, 3000);

              }
              //window.location="#/portfolio/view-portfolio-cat"
              
            }
          });

return false;

});

});

app.controller('ViewUserController', function($scope,$http,DTOptionsBuilder, DTColumnBuilder){

  $scope.users = [];
  var flag = 0;
  var userData = [];
  $.ajax({
    url: './api/user/list_users',
    type: 'POST',
            dataType : 'json', // data type
            async: false,
            cache: false,
            contentType: false,
            processData: false,
            success: function (returndata) {
              var response = JSON.parse(JSON.stringify(returndata));

              if(response.status == "success"){


                jQuery.each( response.data, function( i, val ) {
                  $scope.users.push({
                    userId: val.user_id,
                    userFirstName: val.user_name,
                    userLastName: val.user_lastname,
                    userEmail: val.user_email

                  });
                });

                $scope.dtColumns = [
                DTColumnBuilder.newColumn('userFirstName').withTitle('First Name').withOption('title','First Name'),
                DTColumnBuilder.newColumn('userLastName').withTitle('Last Name').withOption('title','Last Name'),
                DTColumnBuilder.newColumn('userEmail').withTitle('Email').withOption('title','Email'),
                DTColumnBuilder.newColumn(null).withTitle('Action').notSortable().withOption('title','Action').renderWith(function (data, type, full, meta){
                  return '<button class="btn btn-warning" ng-click="edit(' + data.id + ')">' +
                  '   <i class="fa fa-edit"></i>' +
                  '</button>&nbsp;' +
                  '<button class="btn btn-danger" ng-click="delete(' + data.id + ')">' +
                  '   <i class="fa fa-trash-o"></i>' +
                  '</button>';

                })
                ];  
                $scope.dtColumns[0].visible = true;
                $scope.dtColumns[1].visible = true;
                $scope.dtColumns[2].visible = true;
                $scope.dtColumns[3].visible = false;

       //console.log($scope.dtColumns['userFirstName'].);


         // $scope.dtColumns = [{
         //                id: "column1",
         //                title: "First Name",
         //                field: 'userFirstName',
         //                visible: true
         //              }, {
         //                id: "column2",
         //                title: "Last Name",
         //                field: 'userFirstName',
         //                visible: true
         //              }, {
         //                id: "column3",
         //                title: "Email",
         //                field: 'userFirstName',
         //                visible: true
         //              },{
         //                id: "column4",
         //                title: "Action",
         //                template: '<a href="">Edit</a>',
         //                visible: true
         //              }, ];


         $scope.dtOptions = DTOptionsBuilder.newOptions().withOption('data', $scope.users).withOption('processing',true);         

                    // $scope.grid = {
                    //         data: users,
                    //         columnDefs: [
                    //         {
                    //             field: "userFirstName",
                    //             displayName: "First Name"
                    //         },
                    //         {
                    //             field: "userLastName",
                    //             displayName: "Last Name"
                    //         },
                    //         {
                    //             displayName: "Edit",
                    //             cellTemplate: '<button id="editBtn" type="button">Edit</button> ',

                    //         }
                    //         ]
                    // };

                  }

                }
              });

 //setTimeout(function() {



 //},500);


});

app.controller('EditUserController', function($scope,$http,$routeParams,$location,$window,$route){

  var data = {user_id : $routeParams.user_id};
  $scope.userDetails = [];

  data = JSON.stringify(data);
  $.ajax({
    url: './api/user/get_user',
    type: 'POST',
    data: data,
            dataType : 'json', // data type
            async: false,
            cache: false,
            contentType: false,
            processData: false,
            success: function (returndata) {
              var response = JSON.parse(JSON.stringify(returndata));

              if(response.status == "success"){

                userDetails = response.data[0];
                jQuery('#user_id').val(userDetails.user_id);
                jQuery('#user_firstname').val(userDetails.user_name);
                jQuery('#user_lastname').val(userDetails.user_lastname);
                jQuery('#user_email').val(userDetails.user_email);
                jQuery('#user_password').val(userDetails.user_password);

              }
              
            }
          });

  $("#edituserform").validate({
    errorElement: "em",
    errorPlacement: function(error, element) {
      $(element.parent("div").addClass("form-animate-error"));
      error.appendTo(element.parent("div"));
    },
    success: function(label) {
      $(label.parent("div").removeClass("form-animate-error"));
    },
    rules: {
      user_firstname: "required",
      user_lastname: "required",
      user_password: {
        required: true,
        minlength: 5
      },
      user_email: {
        required: true,
        email: true
      }
    },
    messages: {
      user_firstname: "Please enter your firstname",
      user_lastname: "Please enter your lastname",
      user_password: {
        required: "Please provide a password",
        minlength: "Your password must be at least 5 characters long"
      },
      user_email: "Please enter a valid email address"

    }
  });

  $(document).on('submit','#edituserform',function(event){
            // code
          //event.preventDefault();
          jQuery('#edituserbtn').attr('disabled','disabled');
          var jsonData = {};


          //grab all form data  
          var formData = jQuery('form#edituserform').serializeArray();
          jQuery.each(formData, function() {

           if (jsonData[this.name]) {

             if (!jsonData[this.name].push) {

               jsonData[this.name] = [jsonData[this.name]];

             }

             jsonData[this.name].push(this.value || '');
           } else {

             jsonData[this.name] = this.value || '';

           }


         });

          jsonData = JSON.stringify(jsonData);

          //console.log(JSON.parse(JSON.stringify(jsonData)));  
          $.ajax({
            url: './api/user/edit_user',
            type: 'POST',
            dataType : 'json', // data type
            data: jsonData,
            async: true,
            cache: false,
            contentType: false,
            processData: false,
            success: function (returndata) {
              var response = JSON.parse(JSON.stringify(returndata));

              if(response.status == "success"){

                if($('#edit_user_message_box').hasClass('alert-danger')){
                  $('#edit_user_message_box').removeClass('alert-danger');
                }
                $('#edit_user_message_box').addClass('alert-success');
                $('#edit_user_message_box').text('');
                $('#edit_user_message_box').append(response.message);
                $('#edit_user_message_box').removeClass('hide');
                $(window).scrollTop($('#edit_user_message_box').offset().top);

                setTimeout(function(){ $location.search('user_id', null);$location.path('/view_user');$scope.$apply();$route.reload(); }, 3000);


              }
              //window.location="#/portfolio/view-portfolio-cat"
              
            }
          });

return false;

});

 //setTimeout(function() {



 //},500);


});

app.controller('UploadCSVController', function($scope,$http,DTOptionsBuilder, DTColumnBuilder){
  $(document).on('submit','#uploadcsvform',function(event){
    var fileUpload = document.getElementById("user_csvfile");
    event.preventDefault();

    if (fileUpload .value != null) {

      var uploadFile = new FormData();
      var files = $("#user_csvfile").get(0).files;
      $scope.csvdata = [];
        // Add the uploaded file content to the form data collection
        if (files.length > 0) {

          uploadFile.append("CsvDoc", files[0]);

          $.ajax({
            url: "./api/user/upload_csv",
            contentType: false,
            processData: false,
            data: uploadFile,
            type: 'POST',
            success: function (returndata) {
             var response = JSON.parse(returndata);
             
             if(response.status == "success"){

              jQuery.each( response.data, function( i, val ) {
                $scope.csvdata.push({
                  taskId: val.age,
                  Category: val.Category,
                  Age: val.Age,
                  Product: val.Product

                });
              });



                   // jQuery('#uploadedcsvdata').append('<table id="datatables-example1" datatable="" dt-options="dtOptions" dt-columns="dtColumns" class="table table-striped table-bordered" width="100%" cellspacing="0" ></table></div><div ng-repeat="column in dtColumns">{{column.title}} visible: <input type="checkbox" ng-model="column.visible" /></div>');
                   //                     $scope.dtColumns = [
                   //     DTColumnBuilder.newColumn('taskId').withTitle('Task Id').withOption('title','Task Id'),
                   //     DTColumnBuilder.newColumn('Category').withTitle('Category').withOption('title','Category'),
                   //     DTColumnBuilder.newColumn('Age').withTitle('Age').withOption('title','Age'),
                   //     DTColumnBuilder.newColumn('Product').withTitle('Product').withOption('title','Product')
                   // ];

                   // $scope.dtColumns[0].visible = true;
                   // $scope.dtColumns[1].visible = true;
                   // $scope.dtColumns[2].visible = true;
                   // $scope.dtColumns[3].visible = false;

                   // $scope.dtOptions = DTOptionsBuilder.newOptions().withOption('data', $scope.csvdata);
                 }

               }
             });
}
}

});

});

app.controller('PackingSlipsController', function($scope,$http,DTOptionsBuilder, DTColumnBuilder, DTColumnDefBuilder){

  //script code to list all the schools of current round with rounds and country
  $scope.dtInstance = {};
  $scope.packingslipsschools = [];
  
  $scope.rounds = [];
  $scope.country = [];
  var flag = 0;
  var userData = [];
  $.ajax({
    url: './api/packingslip/list_schools',
    type: 'POST',
            dataType : 'json', // data type
            async: false,
            cache: false,
            contentType: false,
            processData: false,
            success: function (returndata) {
              var response = JSON.parse(JSON.stringify(returndata));

              if(response.status == "success"){


                jQuery.each( response.data, function( i, val ) {
                  $scope.packingslipsschools.push({

                    schoolCode: val.school_code,
                    schoolName: val.schoolname,
                    city: val.city,
                    region: val.region,
                    numberofStudents: val.no_of_students,
                    amountPayable: val.amount_payable,
                    amountPaid: val.paid,
                    percentagePaid: val.advance_per_paid

                  });
                });


                $scope.rounds = response.rounds;

                $scope.country = response.country;

                


                $scope.dtOptions = DTOptionsBuilder.newOptions().withOption('data', $scope.packingslipsschools).withOption('fnRowCallback',function(nRow, aData, iDisplayIndex){
                  $("td:first", nRow).html(iDisplayIndex +1);
                  return nRow;
                }).withOption('paging', false).withOption('scrollY', "200px").withOption('processing', true);   


                $scope.dtColumns = [

                DTColumnBuilder.newColumn(null).withTitle('S.No.').withOption('title','S.No','defaultContent', ' '),
                DTColumnBuilder.newColumn("Selected")
                .withTitle('Select All <input type="checkbox" id="example-select-all"/>')
                .notSortable().withOption('title','Checkbox',"searchable", false)
                .renderWith(function (data, type, full, meta) {
                  
                  if (full.schoolCode) {
                    return '<input type="checkbox" class="checkboxes"  value="'+full.schoolCode+'"/>';
                  } 
                }).withClass("text-center"),

                DTColumnBuilder.newColumn('schoolCode').withTitle('School Code').withOption('title','School Code').withOption(''),
                DTColumnBuilder.newColumn('schoolName').withTitle('School Name').withOption('title','School Name'),
                DTColumnBuilder.newColumn('city').withTitle('City').withOption('title','City'),
                DTColumnBuilder.newColumn('region').withTitle('Region').withOption('title','Region'),
                DTColumnBuilder.newColumn('numberofStudents').withTitle('No. Of Students').withOption('title','No. Of Students'),
                DTColumnBuilder.newColumn('amountPayable').withTitle('Amount Payable').withOption('title','Amount Payable'),
                DTColumnBuilder.newColumn('amountPaid').withTitle('Amount Paid').withOption('title','Amount Paid'),
                DTColumnBuilder.newColumn('percentagePaid').withTitle('(%) Paid').withOption('title','(%) Paid')

                ];  
                
                $scope.dtColumns[0].visible = true;
                $scope.dtColumns[1].visible = true;
                $scope.dtColumns[2].visible = true;
                $scope.dtColumns[3].visible = true;
                $scope.dtColumns[4].visible = true;
                $scope.dtColumns[5].visible = true;
                $scope.dtColumns[6].visible = true;
                $scope.dtColumns[7].visible = true;
                $scope.dtColumns[8].visible = true;
                $scope.dtColumns[9].visible = true;



                $(document).on('click','#example-select-all',function(e){

                  // Check/uncheck all checkboxes in the table
                  $('tbody tr td input[type="checkbox"]').prop('checked', $(this).prop('checked'));
                
                });

              }
              
            }
          });

    
    /*
      Function Name: filterschools
      Description: this function is used to filter the school list according to the filter parameters
      Date Modified: 17-5-2017
    */

    $scope.filterschools = function(e) {
      $scope.filteredPackingslipsschools = [];
     
      
        var round = $('#roundfilter').val();
        var paidPercentage = $('#paidpercentagefilter').val();
        var country = $('#countryfilter').val();
        var vendor = $('#vendorfilter').val();
        var data = {round:round,paidPercentage:paidPercentage,country:country,vendor:vendor};
        data = JSON.stringify(data);

        $.ajax({
            url: "./api/packingslip/schoolfilter",
            contentType: false,
            processData: false,
            async: true,
            data: data,
            type: 'POST',
            dataType : 'json',
            success: function (returndata) {
              
             var response = returndata;
             
                if(response.status == "success"){

                    jQuery.each( response.data, function( i, val ) {
                        $scope.filteredPackingslipsschools.push({

                          schoolCode: val.school_code,
                          schoolName: val.schoolname,
                          city: val.city,
                          region: val.region,
                          numberofStudents: val.no_of_students,
                          amountPayable: val.amount_payable,
                          amountPaid: val.paid,
                          percentagePaid: val.advance_per_paid

                        });
                    });

                   
                   
                    
                $scope.dtOptions = DTOptionsBuilder.newOptions().withOption('data', $scope.filteredPackingslipsschools).withOption('fnRowCallback',function(nRow, aData, iDisplayIndex){
                  $("td:first", nRow).html(iDisplayIndex +1);
                  return nRow;
                }).withOption('paging', false).withOption('scrollY', "200px").withOption('processing', true); 

                $scope.dtInstance.rerender();
                

                }
                else
                {
                  
                $scope.dtOptions = DTOptionsBuilder.newOptions().withOption('data', $scope.filteredPackingslipsschools).withOption('fnRowCallback',function(nRow, aData, iDisplayIndex){
                  $("td:first", nRow).html(iDisplayIndex +1);
                  return nRow;
                }).withOption('paging', false).withOption('scrollY', "200px").withOption('processing', true).withOption('fnPreDrawCallback', function () { $('#packingloader').show(); }).withOption('fnDrawCallback', function () {  }); 

                

                $scope.dtInstance.rerender();
                

                }

               }
             });

    };

    /*
      Function Name: generate_packing_slip
      Description: this function is used to generate packing slip CSV file for the schools selected
      Date Modified: 18-5-2017
    */

    $scope.generate_packing_slip = function(e) { 

      var arrayOfValues = [];
      var tableControl= document.getElementById('school_packingslip_list');
        $('input:checkbox:checked', tableControl).map(function() {
            
            arrayOfValues.push($(this).attr('value'));
        });

        if(arrayOfValues.length > 0){

        data = JSON.stringify(arrayOfValues);

        $.ajax({
            url: "./api/packingslip/generatepackingslip",
            contentType: false,
            processData: false,
            async: true,
            data: data,
            type: 'POST',
            dataType : 'json',
            success: function (returndata) {
              
             var response = returndata;
             
                if(response.status == "success"){

                  if($('#add_packingslip_message_box').hasClass('alert-danger')){
                    $('#add_packingslip_message_box').removeClass('alert-danger');
                  }
                  $('#add_packingslip_message_box').addClass('alert-success');
                  $('#add_packingslip_message_box').text('');
                  $('#add_packingslip_message_box').append(response.message);
                  $('#add_packingslip_message_box').removeClass('hide');
                  $(window).scrollTop($('#add_packingslip_message_box').offset().top);
                  setTimeout(function(){ window.location.reload(); }, 3000);
                                      
                }
                else {
                  if($('#add_packingslip_message_box').hasClass('alert-success')){
                    $('#add_packingslip_message_box').removeClass('alert-success');
                  }
                  $('#add_packingslip_message_box').addClass('alert-danger');
                  $('#add_packingslip_message_box').text('');
                  $('#add_packingslip_message_box').append(response.message);
                  $('#add_packingslip_message_box').removeClass('hide');
                  $(window).scrollTop($('#add_packingslip_message_box').offset().top);
                  setTimeout(function(){ window.location.reload(); }, 3000);
                }

               }
             });

        }
        else {
          alert("Please Select At Least One School To Proceed Ahead");
          return false;
        }


    };

});

app.controller('CreateVendorController', function($scope,$http){

  $.ajax({
    url: './api/vendor/get_zones',
    type: 'POST',
    dataType : 'json', // data type
    async: false,
    cache: false,
    contentType: false,
    processData: false,
    success: function (returndata) {
      var response = JSON.parse(JSON.stringify(returndata));

      if(response.status == "success"){

        $scope.zones = response.zones;

      }
      
    
    }
  });

  $("#addvendorform").validate({
    errorElement: "em",
    errorPlacement: function(error, element) {
      $(element.parent("div").addClass("form-animate-error"));
      error.appendTo(element.parent("div"));
    },
    success: function(label) {
      $(label.parent("div").removeClass("form-animate-error"));
    },
    rules: {
      vendor_name: "required",
      vendor_address: "required",
      vendor_zone: "required",
      vendor_username: "required",
      vendor_password: {
        required: true,
        minlength: 5
      },
      vendor_phone: {required: true,number: true},
      vendor_contact_person_1_name: "required",
      vendor_contact_person_1_email: {required: true,email: true},
      vendor_contact_person_1_contact_no: {required: true,number: true},
      vendor_coo_name: "required",
      vendor_coo_email: {required: true,email:true},
      vendor_coo_contactno: {required: true,number: true},
      vendor_ceo_name: "required",
      vendor_ceo_email: {required: true,email: true},
      vendor_ceo_contact_no: {required: true,number: true},

    },
    messages: {
    
    }
  });

$(document).on('submit','#addvendorform',function(event){
            // code
          jQuery('#addvendorbtn').attr('disabled','disabled');
          event.stopImmediatePropagation();

          //disable the default form submission
          event.preventDefault();
          var jsonData = {};


          //grab all form data  
          var formData = jQuery('form#addvendorform').serializeArray();
          jQuery.each(formData, function() {

           if (jsonData[this.name]) {

             if (!jsonData[this.name].push) {

               jsonData[this.name] = [jsonData[this.name]];

             }

             jsonData[this.name].push(this.value || '');
           } else {

             jsonData[this.name] = this.value || '';

           }


         });

          jsonData = JSON.stringify(jsonData);

          //console.log(JSON.parse(JSON.stringify(jsonData)));  
          $.ajax({
            url: './api/vendor/add_vendor',
            type: 'POST',
            dataType : 'json', // data type
            data: jsonData,
            async: true,
            cache: false,
            contentType: false,
            processData: false,
            success: function (returndata) {
              var response = JSON.parse(JSON.stringify(returndata));

              if(response.status == "success"){

                if($('#add_vendor_message_box').hasClass('alert-danger')){
                  $('#add_vendor_message_box').removeClass('alert-danger');
                }
                $('#add_vendor_message_box').addClass('alert-success');
                $('#add_vendor_message_box').text('');
                $('#add_vendor_message_box').append(response.message);
                $('#add_vendor_message_box').removeClass('hide');
                $(window).scrollTop($('#add_vendor_message_box').offset().top);

                setTimeout(function(){ window.location.reload(); }, 3000);

              }
              
            }
          });

return false;

});

});

app.controller('VendorListController', function($scope,$http,DTOptionsBuilder, DTColumnBuilder, DTColumnDefBuilder){
    //script code to list all the schools of current round with rounds and country
  $scope.dtInstance = {};
  $scope.vendorlist = [];
  
  $.ajax({
    url: './api/vendor/list_vendors',
    type: 'POST',
            dataType : 'json', // data type
            async: false,
            cache: false,
            contentType: false,
            processData: false,
            success: function (returndata) {
              var response = JSON.parse(JSON.stringify(returndata));

              if(response.status == "success"){


                jQuery.each( response.vendors, function( i, val ) {
                  $scope.vendorlist.push({
                    vendorId: val.vendor_id,
                    vendorName: val.vendor_name,
                    vendorAddress: val.vendor_address,
                    vendorZone: val.vendor_zone,
                    vendorUsername: val.vendor_username,
                    vendorPassword: val.vendor_password,
                    vendorPhone: val.vendor_phone,
                    vendorContactPerson_1_Name: val.vendor_contact_person_1_name,
                    vendorContactPerson_1_Email: val.vendor_contact_person_1_email,
                    vendorContactPerson_1_Contactno: val.vendor_contact_person_1_contactno,
                    vendorCooName: val.vendor_coo_name,
                    vendorCooEmail: val.vendor_coo_email,
                    vendorCooContactno: val.vendor_coo_contactno,
                    vendorCeoName: val.vendor_ceo_name,
                    vendorCeoEmail: val.vendor_ceo_email,
                    vendorCeoContactno: val.vendor_ceo_contactno,
                    vendorDateCreated: val.vendor_added_date

                  });
                });
                
                $scope.dtOptions = DTOptionsBuilder.newOptions().withOption('data', $scope.vendorlist).withOption('fnRowCallback',function(nRow, aData, iDisplayIndex){
                  $("td:first", nRow).html(iDisplayIndex +1);
                  return nRow;
                }).withOption('processing', true);   


                $scope.dtColumns = [

                DTColumnBuilder.newColumn(null).withTitle('S.No.').withOption('title','S.No','defaultContent', ' '),
                DTColumnBuilder.newColumn("Selected")
                .withTitle('Select All <br><input type="checkbox" id="example-select-all"/>')
                .notSortable().withOption('title','Checkbox',"searchable", false)
                .renderWith(function (data, type, full, meta) {
                  
                  if (full.vendorId) {
                    return '<input type="checkbox" class="checkboxes"  value="'+full.vendorId+'"/>';
                  } 
                }).withClass("text-center"),

                DTColumnBuilder.newColumn('vendorName').withTitle('Vendor Name').withOption('title','Vendor Name'),
                DTColumnBuilder.newColumn('vendorZone').withTitle('Zone').withOption('title','Zone'),
                DTColumnBuilder.newColumn('vendorDateCreated').withTitle('Date Created').withOption('title','Date Created'),
                DTColumnBuilder.newColumn('vendorAddress').withTitle('Address').withOption('title','Address'),
                DTColumnBuilder.newColumn('vendorUsername').withTitle('Username').withOption('title','Username'),
                DTColumnBuilder.newColumn('vendorPhone').withTitle('Phone').withOption('title','Phone'),
                DTColumnBuilder.newColumn('vendorContactPerson_1_Name').withTitle('Contact Person 1 Name').withOption('title','Contact Person 1 Name'),
                DTColumnBuilder.newColumn('vendorContactPerson_1_Email').withTitle('Contact Person 1 Email').withOption('title','Contact Person 1 Email'),
                DTColumnBuilder.newColumn('vendorContactPerson_1_Contactno').withTitle('Contact Person 1 Contact No.').withOption('title','Contact Person 1 Contact No.'),
                DTColumnBuilder.newColumn('vendorCooName').withTitle('COO Name').withOption('title','COO Name'),
                DTColumnBuilder.newColumn('vendorCooEmail').withTitle('COO Email').withOption('title','COO Email'),
                DTColumnBuilder.newColumn('vendorCooContactno').withTitle('COO Contact No.').withOption('title','COO Contact No.'),
                DTColumnBuilder.newColumn('vendorCeoName').withTitle('CEO Name').withOption('title','CEO Name'),
                DTColumnBuilder.newColumn('vendorCeoEmail').withTitle('CEO Email').withOption('title','CEO Email'),
                DTColumnBuilder.newColumn('vendorCeoContactno').withTitle('CEO Contact No.').withOption('title','CEO Contact No.'),
                DTColumnBuilder.newColumn('null').withTitle('Action').withOption('title','Action').notSortable()
                .renderWith(function (data, type, full, meta){
                  if(full.vendorId){
                    return '<a href="edit_vendor?vendor_id='+full.vendorId+'" style="cursor:pointer;" title="Edit '+full.vendorName+'">Edit</a> | <a href="" style="cursor:pointer;" title="Delete '+full.vendorName+'">Delete</a>';
                  }
                })
                ];  
                
                $scope.dtColumns[0].visible = true;
                $scope.dtColumns[1].visible = true;
                $scope.dtColumns[2].visible = true;
                $scope.dtColumns[3].visible = true;
                $scope.dtColumns[4].visible = true;
                $scope.dtColumns[5].visible = false;
                $scope.dtColumns[6].visible = false;
                $scope.dtColumns[7].visible = false;
                $scope.dtColumns[8].visible = false;
                $scope.dtColumns[9].visible = false;
                $scope.dtColumns[10].visible = false;
                $scope.dtColumns[11].visible = false;
                $scope.dtColumns[12].visible = false;
                $scope.dtColumns[13].visible = false;
                $scope.dtColumns[14].visible = false;
                $scope.dtColumns[15].visible = false;
                $scope.dtColumns[16].visible = false;
                $scope.dtColumns[17].visible = true;



                $(document).on('click','#example-select-all',function(e){

                  // Check/uncheck all checkboxes in the table
                  $('tbody tr td input[type="checkbox"]').prop('checked', $(this).prop('checked'));
                
                });

              }
              
            }
          });
}); 

app.controller('EditVendorController', function($scope,$http,$routeParams,$location,$window,$route){
  
  $.ajax({
    url: './api/vendor/get_zones',
    type: 'POST',
    dataType : 'json', // data type
    async: false,
    cache: false,
    contentType: false,
    processData: false,
    success: function (returndata) {
      var response = JSON.parse(JSON.stringify(returndata));

      if(response.status == "success"){

        $scope.zones = response.zones;


      }
      
    
    }
  });

  var data = {vendor_id : $routeParams.vendor_id};
  $scope.vendorDetails = [];

  data = JSON.stringify(data);
  $.ajax({
    url: './api/vendor/get_vendor',
    type: 'POST',
    data: data,
            dataType : 'json', // data type
            async: false,
            cache: false,
            contentType: false,
            processData: false,
            success: function (returndata) {
              var response = JSON.parse(JSON.stringify(returndata));

              if(response.status == "success"){

                $scope.vendorDetails = response.data[0];
                // jQuery('#vendor_id').val(vendorDetails.vendor_id);
                // //jQuery('#vendor_name').val(vendorDetails.vendor_name);
                // jQuery('#vendor_zone option[value='+vendorDetails.vendor_zone+']').attr('selected','selected');
                // jQuery('#vendor_password').val(vendorDetails.vendor_password);
                // jQuery('#vendor_contact_person_1_name').val(vendorDetails.vendor_contact_person_1_name);
                // jQuery('#vendor_contact_person_1_contact_no').val(vendorDetails.vendor_contact_person_1_contactno);
                // jQuery('#vendor_coo_email').val(vendorDetails.vendor_coo_email);
                // jQuery('#vendor_ceo_name').val(vendorDetails.vendor_ceo_name);
                // jQuery('#vendor_ceo_contact_no').val(vendorDetails.vendor_ceo_contactno);
                // jQuery('#vendor_address').val(vendorDetails.vendor_address);
                // jQuery('#vendor_username').val(vendorDetails.vendor_username);
                // jQuery('#vendor_phone').val(vendorDetails.vendor_phone);
                // jQuery('#vendor_contact_person_1_email').val(vendorDetails.vendor_contact_person_1_email);
                // jQuery('#vendor_coo_name').val(vendorDetails.vendor_coo_name);
                // jQuery('#vendor_coo_contactno').val(vendorDetails.vendor_coo_contactno);
                // jQuery('#vendor_ceo_email').val(vendorDetails.vendor_ceo_email);

              }
              
            }
          });

$("#editvendorform").validate({
    errorElement: "em",
    errorPlacement: function(error, element) {
      $(element.parent("div").addClass("form-animate-error"));
      error.appendTo(element.parent("div"));
    },
    success: function(label) {
      $(label.parent("div").removeClass("form-animate-error"));
    },
    rules: {
      vendor_name: "required",
      vendor_address: "required",
      vendor_zone: "required",
      vendor_username: "required",
      vendor_password: {
        required: true,
        minlength: 5
      },
      vendor_phone: {required: true,number: true},
      vendor_contact_person_1_name: "required",
      vendor_contact_person_1_email: {required: true,email: true},
      vendor_contact_person_1_contact_no: {required: true,number: true},
      vendor_coo_name: "required",
      vendor_coo_email: {required: true,email:true},
      vendor_coo_contactno: {required: true,number: true},
      vendor_ceo_name: "required",
      vendor_ceo_email: {required: true,email: true},
      vendor_ceo_contact_no: {required: true,number: true},

    },
    messages: {
    
    }
  });

$(document).on('submit','#editvendorform',function(event){

          // code
          jQuery('#editvendorbtn').attr('disabled','disabled');
          event.stopImmediatePropagation();

          //disable the default form submission
          event.preventDefault();
          var jsonData = {};


          //grab all form data  
          var formData = jQuery('form#editvendorform').serializeArray();
          jQuery.each(formData, function() {

           if (jsonData[this.name]) {

             if (!jsonData[this.name].push) {

               jsonData[this.name] = [jsonData[this.name]];

             }

             jsonData[this.name].push(this.value || '');
           } else {

             jsonData[this.name] = this.value || '';

           }


         });

          jsonData = JSON.stringify(jsonData);

          //console.log(JSON.parse(JSON.stringify(jsonData)));  
          $.ajax({
            url: './api/vendor/edit_vendor',
            type: 'POST',
            dataType : 'json', // data type
            data: jsonData,
            async: true,
            cache: false,
            contentType: false,
            processData: false,
            success: function (returndata) {
              var response = JSON.parse(JSON.stringify(returndata));

              if(response.status == "success"){

                if($('#edit_vendor_message_box').hasClass('alert-danger')){
                  $('#edit_vendor_message_box').removeClass('alert-danger');
                }
                $('#edit_vendor_message_box').addClass('alert-success');
                $('#edit_vendor_message_box').text('');
                $('#edit_vendor_message_box').append(response.message);
                $('#edit_vendor_message_box').removeClass('hide');
                $(window).scrollTop($('#edit_vendor_message_box').offset().top);

                setTimeout(function(){ $location.search('vendor_id', null);$location.path('/vendor_list');$scope.$apply();$route.reload(); }, 3000);

              }
              
            }
          });

return false;

});


});