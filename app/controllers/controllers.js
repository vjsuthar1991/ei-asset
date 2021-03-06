app.controller('DashboardController', function($scope,$http,$ocLazyLoad) {

});

app.controller('PackingSlipsController', function($scope,$http,DTOptionsBuilder, DTColumnBuilder, DTColumnDefBuilder){

  //script code to list all the schools of current round with rounds and country
  $scope.dtInstance = {};
  $scope.packingslipsschools = [];
  
  $scope.rounds = [];
  $scope.country = [];
  $scope.zones = [];

  var flag = 0;
  var userData = [];
  // var round = $('#roundfilter').val();
  // var data = {round:'V'};
  // data = JSON.stringify(data);

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
                    percentagePaid: val.paid_percentage

                  });
                });

                $scope.roundSelected = response.round_selected;

                $scope.rounds = response.rounds;

                $scope.country = response.country;

                $scope.zones = response.zones;

                $scope.vendors = response.vendors;

                $scope.dtOptions = DTOptionsBuilder.newOptions().withOption('data', $scope.packingslipsschools).withOption('fnRowCallback',function(nRow, aData, iDisplayIndex){
                  $("td:first", nRow).html(iDisplayIndex +1);
                  return nRow;
                }).withOption('paging', false).withOption('scrollY', "500px").withOption('processing', true);   


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
              else 
              {
                  
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

                $scope.zones = response.zones;

                $scope.vendors = response.vendors;



                


                $scope.dtOptions = DTOptionsBuilder.newOptions().withOption('data', $scope.packingslipsschools).withOption('fnRowCallback',function(nRow, aData, iDisplayIndex){
                  $("td:first", nRow).html(iDisplayIndex +1);
                  return nRow;
                }).withOption('paging', false).withOption('scrollY', "500px").withOption('processing', true);   


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
        
        var country = $('#countryfilter').val();

        var zone = $('#zonefilter').val();
        
        var data = {round:round,country:country,zone:zone};
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
                          percentagePaid: val.paid_percentage

                        });
                    });

                $scope.dtOptions = DTOptionsBuilder.newOptions().withOption('data', $scope.filteredPackingslipsschools).withOption('fnRowCallback',function(nRow, aData, iDisplayIndex){
                  $("td:first", nRow).html(iDisplayIndex +1);
                  return nRow;
                }).withOption('paging', false).withOption('scrollY', "500px").withOption('processing', true); 

                $scope.dtInstance.rerender();
                

                }
                else
                {
                  
                $scope.dtOptions = DTOptionsBuilder.newOptions().withOption('data', $scope.filteredPackingslipsschools).withOption('fnRowCallback',function(nRow, aData, iDisplayIndex){
                  $("td:first", nRow).html(iDisplayIndex +1);
                  return nRow;
                }).withOption('paging', false).withOption('scrollY', "500px").withOption('processing', true).withOption('fnPreDrawCallback', function () { $('#packingloader').show(); }).withOption('fnDrawCallback', function () {  }); 

                

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

      var username = $('#loginusername').val();  

      var vendorSelected = $('#vendorSelected').val();

      var round = $('#roundfilter').val();
      
      if(vendorSelected != "" && vendorSelected != "undefined")
      {
      
      $('#vendorSelected').css('box-shadow','0px 0px #FF968B');
      
      if(arrayOfValues.length > 0){

        $('#generatepackingslip').attr('disabled','disabled');
        
        $('.page-loading').show();

        var data = {data:arrayOfValues,vendor:vendorSelected,round:round,username:username};
        
        data = JSON.stringify(data);

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
                  
                  $('.page-loading').hide();
                  
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
                  
                  $('.page-loading').hide();

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
      }
      else {
        alert("Please Select Vendor To Send Packing Slip Ready Schools");
        $('#vendorSelected').css('box-shadow','0px 0px 10px 5px #FF968B');
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

  jQuery.validator.addMethod(
    "multiemail",
    function (value, element) {
        var email = value.split(/[;,]+/); // split element by , and ;
        valid = true;
        for (var i in email) {
            value = email[i];
            valid = valid && jQuery.validator.methods.email.call(this, $.trim(value), element);
        }
        return valid;
    },
    jQuery.validator.messages.multiemail
);

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
      vendor_phone: {required: true},
      vendor_contact_person_1_name: "required",
      vendor_contact_person_1_email: {required: true,multiemail: true},
      vendor_contact_person_1_contact_no: {required: true},
      vendor_coo_name: "required",
      vendor_coo_email: {required: true,multiemail: true},
      vendor_coo_contactno: {required: true},
      vendor_ceo_name: "required",
      vendor_ceo_email: {required: true,multiemail: true},
      vendor_ceo_contact_no: {required: true},

    },
    messages: {
      vendor_contact_person_1_email: {
        multiemail: 'Please Enter Proper Email Address'
      }
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
                    return '<a href="edit_vendor?vendor_id='+full.vendorId+'" style="cursor:pointer;" title="Edit '+full.vendorName+'">Edit</a> | <img style="width: 30px;height: 25px;cursor:pointer;" data-toggle="modal" data-target="#vendordeleteModal" class="vendor-delete" vendor-id="'+full.vendorId+'" src="asset/img/trash-can.png">';
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

                $(document).on('click','.vendor-delete',function(e){
                  
                  var vendor_id = $(this).attr('vendor-id');
                  
                  $scope.vendorlist = [];

                  $scope.deleteVendor = function(e){
                      $.ajax({
                    url: './api/vendor/delete_vendor',
                    type: 'POST',
                    dataType : 'json', // data type
                    async: false,
                    data: vendor_id,
                    cache: false,
                    contentType: false,
                    processData: false,
                    success: function (returndata) {
                      var response = JSON.parse(JSON.stringify(returndata));
                      if(response.status == 'success')
                      {
                        
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
                
                $scope.dtInstance.rerender(); 

                      }

                    }
                  });
                  };
                  
                

                  
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
              
              }
              
            }
          });

  jQuery.validator.addMethod(
    "multiemail",
    function (value, element) {
        var email = value.split(/[;,]+/); // split element by , and ;
        valid = true;
        for (var i in email) {
            value = email[i];
            valid = valid && jQuery.validator.methods.email.call(this, $.trim(value), element);
        }
        return valid;
    },
    jQuery.validator.messages.multiemail
);

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
      vendor_phone: {required: true},
      vendor_contact_person_1_name: "required",
      vendor_contact_person_1_email: {required: true,multiemail: true},
      vendor_contact_person_1_contact_no: {required: true},
      vendor_coo_name: "required",
      vendor_coo_email: {required: true,multiemail: true},
      vendor_coo_contactno: {required: true},
      vendor_ceo_name: "required",
      vendor_ceo_email: {required: true,multiemail: true},
      vendor_ceo_contact_no: {required: true},

    },
    messages: {
      vendor_contact_person_1_email: {
        multiemail: 'Please Enter Proper Email Address'
      }
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

app.controller('PackingSlipsListController', function($scope,$http,DTOptionsBuilder, DTColumnBuilder, DTColumnDefBuilder){
  
  $scope.dtInstance = {};
  $scope.packingsliplist = [];
  
  $.ajax({
    url: './api/packingslip/list_packingslips',
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
                  $scope.packingsliplist.push({
                    packingSlipId: val.packingslip_id,
                    packingSlipLotno: val.packingslip_lotno,
                    packingSlipSentDate: val.packingslip_sentdate,
                    vendorName: val.vendor_name,
                    packingslipSchoolsCSV: val.packingslip_schools_data_csv,
                    packingslipBreakupCSV: val.packingslip_breakup_data_csv,
                    packingslipAcknowledgeDate: val.packingslip_acknowledge_date
                  });
                });
                
                
                $scope.dtOptions = DTOptionsBuilder.newOptions().withOption('data', $scope.packingsliplist).withOption('fnRowCallback',function(nRow, aData, iDisplayIndex){
                  $("td:first", nRow).html(iDisplayIndex +1);
                  return nRow;
                }).withOption('processing', true);   


                $scope.dtColumns = [
                  DTColumnBuilder.newColumn(null).withTitle('S.No.').withOption('title','S.No','defaultContent', ' '),
                  DTColumnBuilder.newColumn('packingSlipSentDate').withTitle('Sent Date').withOption('title','Sent Date'),
                  DTColumnBuilder.newColumn('packingSlipLotno').withTitle('Lot No.').withOption('title','Lot No.'),
                  DTColumnBuilder.newColumn('vendorName').withTitle('Vendor Name').withOption('title','Vendor Name'),
                  DTColumnBuilder.newColumn('null').withTitle('Download Schools CSV').withOption('title','Download Schools CSV').notSortable()
                  .renderWith(function (data, type, full, meta){
                    if(full.packingSlipId){
                      return '<a href="api/packingSlipSchoolsCSVFiles/'+full.packingslipSchoolsCSV+'" download="'+full.packingslipSchoolsCSV+'" target="_blank" title="Download CSV"><img style="width: 30px;height: 30px;" class="packingslip-school-download" src="asset/img/CSV_download.png"></a>';
                    }
                  }).withClass("text-center"),
                  DTColumnBuilder.newColumn('null').withTitle('Download Schools Order CSV').withOption('title','Download Schools Order CSV').notSortable()
                  .renderWith(function (data, type, full, meta){
                    if(full.packingSlipId){
                      return '<a href="api/packingslipbreakupCSVFiles/'+full.packingslipBreakupCSV+'" download="'+full.packingslipBreakupCSV+'" target="_blank" title="Download CSV"><img style="width: 30px;height: 30px;" class="packingslip-breakup-download" src="asset/img/CSV_download.png"></a>';
                    }
                  }).withClass("text-center"),
                  DTColumnBuilder.newColumn('packingslipAcknowledgeDate').withTitle('Acknowledge Date').withOption('title','Acknowledge Date'),
                ];  
                
                $scope.dtColumns[0].visible = true;
                $scope.dtColumns[1].visible = true;
                $scope.dtColumns[2].visible = true;
                $scope.dtColumns[3].visible = true;
                $scope.dtColumns[4].visible = true;
                $scope.dtColumns[5].visible = true;
                
              }
              
            }
          });
});

app.controller('VendorLoginController', function($scope,$http,$routeParams,$location,$window,$route){

  $('#mimin').addClass('form-signin-wrapper');
  
  $("#vendorsigninform").validate({
    errorElement: "em",
    errorPlacement: function(error, element) {
      $(element.parent("div").addClass("form-animate-error"));
      error.appendTo(element.parent("div"));
    },
    success: function(label) {
      $(label.parent("div").removeClass("form-animate-error"));
    },
    rules: {
      vendor_username: "required",
      vendor_password: "required",
    },
    messages: {
    
    }
  });

  $(document).on('submit','#vendorsigninform',function(event){

    // code
          jQuery('#vendor_signin_submitbtn').attr('disabled','disabled');
          event.stopImmediatePropagation();

          //disable the default form submission
          event.preventDefault();
          var jsonData = {};


          //grab all form data  
          var formData = jQuery('form#vendorsigninform').serializeArray();
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
            url: './api/vendor/vendor_login',
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


                if(response.authtoken != ""){

                  $('#vendorloginname').val('Welcome!! '+response.data[0].vendor_name);
                  
                  function setCookie(cname,cvalue,exdays) {
                      var d = new Date();
                      d.setTime(d.getTime() + (exdays*24*60*60*1000));
                      var expires = "expires=" + d.toGMTString();
                      document.cookie = cname + "=" + cvalue + ";" + expires + ";path=/";
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

                  function checkCookie() {
                      var vendor=getCookie("vendor_id");
                      if (vendor != "") {
                          alert("Welcome again " + vendor);
                      } else {
                         $location.path('/vendor-login');$scope.$apply();$route.reload();
                         // user = prompt("Please enter your name:","");
                         // if (user != "" && user != null) {
                             
                         //     //setCookie("username", user, 30);
                         // }
                      }
                  }

                  setCookie("vendor_id", response.data[0].vendor_id,1);
                  setCookie("vendor_authtoken", response.authtoken,1);
                  setCookie("vendor_name", response.data[0].vendor_name,1);

                  $('#mimin').removeClass('form-signin-wrapper');

                  $location.path('/vendor-dashboard');$scope.$apply();


                }
                // if($('#edit_vendor_message_box').hasClass('alert-danger')){
                //   $('#edit_vendor_message_box').removeClass('alert-danger');
                // }
                // $('#edit_vendor_message_box').addClass('alert-success');
                // $('#edit_vendor_message_box').text('');
                // $('#edit_vendor_message_box').append(response.message);
                // $('#edit_vendor_message_box').removeClass('hide');
                // $(window).scrollTop($('#edit_vendor_message_box').offset().top);

                // setTimeout(function(){ $location.search('vendor_id', null);$location.path('/vendor_list');$scope.$apply();$route.reload(); }, 3000);

              }
              else{
                
                  $('#login_error_box').removeClass('hide');

                  jQuery('#vendor_signin_submitbtn').removeAttr('disabled');
              }
              
            }
          });

return false;


  });

});

app.controller('UnauthorisedAccessController', function($scope,$http,$routeParams,$location,$window,$route){

});

app.controller('VendorDashboardController', function($scope,$http,$ocLazyLoad) {

  
});

app.controller('TestMaterialMisController', function($scope,$http,$routeParams,$location,$window,$route){
  
  $("#uploadqbmisform").validate({
    errorElement: "em",
    errorPlacement: function(error, element) {
      $(element.parent("div").addClass("form-animate-error"));
      error.appendTo(element.parent("div"));
    },
    success: function(label) {
      $(label.parent("div").removeClass("form-animate-error"));
    },
    rules: {
      qbmis_csvfile: "required",
    },
    messages: {
    
    }
  });

  $scope.rounds = [];
  
  $.ajax({
    url: './api/vendor/qb_mis',
    type: 'POST',
    dataType : 'json', // data type
    async: false,
    cache: false,
    contentType: false,
    processData: false,
    success: function (returndata) {
      var response = JSON.parse(JSON.stringify(returndata));

      if(response.status == "success"){


          $scope.rounds = response.rounds;
        
      }
      
    }
  });

   $(document).on('submit','#uploadqbmisform',function(event){

    
    event.stopImmediatePropagation();

    $('.page-loading').show();

    $('#uploadqbanalysismisbtn').attr('disabled','disabled');
    
    event.preventDefault();

    var fileUpload = document.getElementById("qbmis_csvfile");
    

    if (fileUpload .value != null) {

      var uploadFile = new FormData();
      var files = $("#qbmis_csvfile").get(0).files;
      $scope.csvdata = [];
        // Add the uploaded file content to the form data collection
        if (files.length > 0) {

          uploadFile.append("QBMISCsv", files[0]);

          $.ajax({
            url: "./api/vendor/upload_qb_mis",
            contentType: false,
            processData: false,
            data: uploadFile,
            type: 'POST',
            success: function (returndata) {

             var response = JSON.parse(returndata);

             if(response.status == "success"){

                $('.page-loading').hide();

                if($('#upload_csv_message_box').hasClass('alert-danger')){
                  $('#upload_csv_message_box').removeClass('alert-danger');
                }
                $('#upload_csv_message_box').addClass('alert-success');
                $('#upload_csv_message_box').text('');
                $('#upload_csv_message_box').append(response.message);
                $('#upload_csv_message_box').removeClass('hide');
                $(window).scrollTop($('#upload_csv_message_box').offset().top);

                setTimeout(function(){ window.location.reload(); }, 3000);   

              }
              else {
                $('.page-loading').hide();
                $('#uploadqbmisform')[0].reset();
                $('#uploadqbanalysismisbtn').removeAttr('disabled');
                
                if($('#upload_csv_message_box').hasClass('alert-success')){
                  $('#upload_csv_message_box').removeClass('alert-success');
                }
                
                $('#upload_csv_message_box').addClass('alert-danger');
                $('#upload_csv_message_box').text('');
                $('#upload_csv_message_box').append(response.message);
                $('#upload_csv_message_box').removeClass('hide');
                $(window).scrollTop($('#upload_csv_message_box').offset().top);

                setTimeout(function(){ $('#upload_csv_message_box').addClass('hide'); }, 4000);
              }

            }
          });
  }
}

});

});

app.controller('VendorPackingSlipListController', function($scope,$http,DTOptionsBuilder, DTColumnBuilder, DTColumnDefBuilder,$routeParams,$location,$window,$route){
  
  $scope.dtInstance = {};
  $scope.vendorpackingsliplist = [];
  
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

  var vendor_id = getCookie('vendor_id');
  var vendor_authtoken = getCookie('vendor_authtoken');                  

  var data = {vendor_id : vendor_id,vendor_authtoken: vendor_authtoken};
  
  data = JSON.stringify(data);
  
  $.ajax({
    url: './api/vendor/list_vendor_packingslips',
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


        jQuery.each( response.data, function( i, val ) {
          $scope.vendorpackingsliplist.push({
            packingSlipId: val.packingslip_id,
            packingSlipLotNo: val.packingslip_lotno,
            packingSlipSentDate: val.packingslip_sentdate,
            packingslipSchoolsCSV: val. packingslip_schools_data_csv,
            packingslipBreakupCSV: val.packingslip_breakup_data_csv,
            packingslipAcknowledgeDate: val.packingslip_acknowledge_date
          });
        });
        
        
        $scope.dtOptions = DTOptionsBuilder.newOptions().withOption('data', $scope.vendorpackingsliplist).withOption('fnRowCallback',function(nRow, aData, iDisplayIndex){
          $("td:first", nRow).html(iDisplayIndex +1);
          return nRow;
        }).withOption('processing', true);   


        $scope.dtColumns = [
          DTColumnBuilder.newColumn(null).withTitle('S.No.').withOption('title','S.No','defaultContent', ' '),
          DTColumnBuilder.newColumn('packingSlipSentDate').withTitle('Sent Date And Time').withOption('title','Sent Date And Time'),
          DTColumnBuilder.newColumn('packingSlipLotNo').withTitle('Lot No.').withOption('title','Lot No.'),
          DTColumnBuilder.newColumn('null').withTitle('Download Schools CSV').withOption('title','Download Schools CSV').notSortable()
          .renderWith(function (data, type, full, meta){
            if(full.packingSlipId){
              return '<a href="api/packingSlipSchoolsCSVFiles/'+full.packingslipSchoolsCSV+'" download="'+full.packingslipSchoolsCSV+'" target="_blank" title="Download CSV"><img style="width: 30px;height: 30px;" class="packingslip-school-download" src="asset/img/CSV_download.png"></a>';
            }
          }).withClass("text-center"),
          DTColumnBuilder.newColumn('null').withTitle('Download Schools Order CSV').withOption('title','Download Schools Order CSV').notSortable()
          .renderWith(function (data, type, full, meta){
            if(full.packingSlipId){
              return '<a href="api/packingslipbreakupCSVFiles/'+full.packingslipBreakupCSV+'" download="'+full.packingslipBreakupCSV+'" title="Download CSV"><img style="width: 30px;height: 30px;" class="packingslip-breakup-download" src="asset/img/CSV_download.png"></a>';
            }
          }).withClass("text-center"),
          DTColumnBuilder.newColumn('packingslipAcknowledgeDate').withTitle('Acknowledge Date And Time').withOption('title','Acknowledge Date And Time'),
          DTColumnBuilder.newColumn('null').withTitle('Acknowledge Status').withOption('title','Acknowledge Status').notSortable()
          .renderWith(function (data, type, full, meta){
            if(full.packingslipAcknowledgeDate == ""){
              return '<button class="btn ripple-infinite btn-raised btn-danger acknowledgePackingslip" packingslip-id="'+full.packingSlipId+'"><div><span>Click Here</span></div></button>';
            }
            else {
              return '<button class="btn btn-raised btn-success" disabled="disabled"><div><span>Done</span></div></button>';
            }
          }).withClass("text-center")
        ];  
        
        $scope.dtColumns[0].visible = true;
        $scope.dtColumns[1].visible = true;
        $scope.dtColumns[2].visible = true;
        $scope.dtColumns[3].visible = true;
        
        
      }
      else {
        jQuery.each( response.data, function( i, val ) {
          $scope.vendorpackingsliplist.push({
            packingSlipId: val.packingslip_id,
            packingSlipLotNo: val.packingslip_lotno,
            packingSlipSentDate: val.packingslip_sentdate,
            packingslipSchoolsCSV: val. packingslip_schools_data_csv,
            packingslipBreakupCSV: val.packingslip_breakup_data_csv,
            packingslipAcknowledgeDate: val.packingslip_acknowledge_date
          });
        });
        
        
        $scope.dtOptions = DTOptionsBuilder.newOptions().withOption('data', $scope.vendorpackingsliplist).withOption('fnRowCallback',function(nRow, aData, iDisplayIndex){
          $("td:first", nRow).html(iDisplayIndex +1);
          return nRow;
        }).withOption('processing', true);   


        $scope.dtColumns = [
          DTColumnBuilder.newColumn(null).withTitle('S.No.').withOption('title','S.No','defaultContent', ' '),
          DTColumnBuilder.newColumn('packingSlipSentDate').withTitle('Sent Date And Time').withOption('title','Sent Date And Time'),
          DTColumnBuilder.newColumn('packingSlipLotNo').withTitle('Lot No.').withOption('title','Lot No.'),
          DTColumnBuilder.newColumn('null').withTitle('Download Schools CSV').withOption('title','Download Schools CSV').notSortable()
          .renderWith(function (data, type, full, meta){
            if(full.packingSlipId){
              return '<a href="api/packingSlipSchoolsCSVFiles/'+full.packingslipSchoolsCSV+'" download="'+full.packingslipSchoolsCSV+'" target="_blank" title="Download CSV"><img style="width: 30px;height: 30px;" class="packingslip-school-download" src="asset/img/CSV_download.png"></a>';
            }
          }).withClass("text-center"),
          DTColumnBuilder.newColumn('null').withTitle('Download Schools Order CSV').withOption('title','Download Schools Order CSV').notSortable()
          .renderWith(function (data, type, full, meta){
            if(full.packingSlipId){
              return '<a href="api/packingslipbreakupCSVFiles/'+full.packingslipBreakupCSV+'" download="'+full.packingslipBreakupCSV+'" title="Download CSV"><img style="width: 30px;height: 30px;" class="packingslip-breakup-download" src="asset/img/CSV_download.png"></a>';
            }
          }).withClass("text-center"),
          DTColumnBuilder.newColumn('packingslipAcknowledgeDate').withTitle('Acknowledge Date And Time').withOption('title','Acknowledge Date And Time'),
          DTColumnBuilder.newColumn('null').withTitle('Acknowledge Status').withOption('title','Acknowledge Status').notSortable()
          .renderWith(function (data, type, full, meta){
            if(full.packingslipAcknowledgeDate == ""){
              return '<button class="btn ripple-infinite btn-raised btn-danger acknowledgePackingslip" packingslip-id="'+full.packingSlipId+'"><div><span>Click Here</span></div></button>';
            }
            else {
              return '<button class="btn btn-raised btn-success" disabled="disabled"><div><span>Done</span></div></button>';
            }
          }).withClass("text-center")
        ];  
        
        $scope.dtColumns[0].visible = true;
        $scope.dtColumns[1].visible = true;
        $scope.dtColumns[2].visible = true;
        $scope.dtColumns[3].visible = true;
      }
      
    }
  });

  $(document).on('click','.acknowledgePackingslip',function(event){
   
    var packingslip = $(this).attr('packingslip-id');
    var vendor_id = getCookie('vendor_id');
    var data = {packingslip_id : packingslip,vendor_id: vendor_id};
    data = JSON.stringify(data);
    $scope.newvendorpackingsliplist = [];
    $.ajax({
    url: './api/vendor/acknowledge_packingslip',
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

        jQuery.each( response.data, function( i, val ) {
          $scope.newvendorpackingsliplist.push({
            packingSlipId: val.packingslip_id,
            packingSlipLotNo: val.packingslip_lotno,
            packingSlipSentDate: val.packingslip_sentdate,
            packingslipSchoolsCSV: val. packingslip_schools_data_csv,
            packingslipBreakupCSV: val.packingslip_breakup_data_csv,
            packingslipAcknowledgeDate: val.packingslip_acknowledge_date
          });
        });

        $scope.dtOptions = DTOptionsBuilder.newOptions().withOption('data', $scope.newvendorpackingsliplist).withOption('fnRowCallback',function(nRow, aData, iDisplayIndex){
          $("td:first", nRow).html(iDisplayIndex +1);
          return nRow;
        }).withOption('processing', true);

        $scope.dtInstance.rerender(); 
      }
      
    }
  });
  });

});

app.controller('QbMisListController', function($scope,$http,DTOptionsBuilder, DTColumnBuilder, DTColumnDefBuilder){

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

  var region = getCookie('loginuserregion');
  var category = getCookie('loginusercategory');
  var username = getCookie('loginuserlogname');

  //script code to list all the schools of current round with rounds and country
  $scope.dtInstance = {};
  
  $scope.rounds = [];
  $scope.lotnos = [];
  $scope.zones = [];
  $scope.qbmisreports = [];

  var flag = 0;
  var userData = [];
  // var round = $('#qbroundfilter').val();
  var data = {region:region,category:category,username:username};
  data = JSON.stringify(data);

    $.ajax({
    url: './api/mis_system/qb_mis_list',
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
        
        $scope.zones = response.zones;
        $scope.rounds = response.rounds;
        $scope.lotnos = response.lotnos;
        $scope.roundSelected = response.round_selected;

        
        jQuery.each( response.schooldata, function( i, val ) {
         
           $scope.schoolCodes.push(val.school_code);
           $scope.schoolNames.push(val.schoolname);
        
        });
        
        
        jQuery.each( response.qb_mis_reports, function( i, val ) {

          //var oneDay = 24*60*60*1000; // hours*minutes*seconds*milliseconds
          
          var diffDays = val.qbtat;

          
          
          
          if(diffDays == null){
            diffDays = 'Not Yet Dispatched';
          }

          var deliverydiffDays = val.analysistat;
          
          if(deliverydiffDays == null){
            deliverydiffDays = 'Not Yet Delivered';
          }

          $scope.qbmisreports.push({

            schoolCode: val.school_code,
            schoolName: val.schoolname,
            schoolCity: val.city,
            schoolRegion: val.region,
            schoolPackLabelDate: val.packlabel_date,
            schoolQbDispatchDate: val.qb_despatch_date,
            schoolCourierCompany: val.courier,
            schoolAwbNo: val.consignmentNo,
            schoolMode: val.mode,
            schoolQty: val.material,
            schoolWeight: val.weight,
            schoolTat: diffDays,
            schoolQbDelivery_status: val.qb_delivery_status,
            schoolQbDeliveryDate:val.qb_delivery_date,
            schoolQbRecieverName: val.qb_reciever_name,
            schoolDeliveryTime: deliverydiffDays

          });
        });

        

        $scope.packingdates = response.packlabel_date;
        $scope.citys = response.school_city;


        $scope.dtOptions = DTOptionsBuilder.newOptions().withOption('data', $scope.qbmisreports).withOption('fnRowCallback',function(nRow, aData, iDisplayIndex){
                  $("td:first", nRow).html(iDisplayIndex +1);
                  return nRow;
                }).withOption('processing', true);   


                $scope.dtColumns = [

                DTColumnBuilder.newColumn(null).withTitle('#').withOption('title','#','defaultContent', ' '),
                DTColumnBuilder.newColumn('schoolCode').withTitle('School Code').withOption('title','School Code'),
                DTColumnBuilder.newColumn('schoolName').withTitle('School Name').withOption('title','School Name'),
                DTColumnBuilder.newColumn('schoolCity').withTitle('City').withOption('title','City'),
                DTColumnBuilder.newColumn('schoolRegion').withTitle('Region').withOption('title','Region'),
                DTColumnBuilder.newColumn('schoolPackLabelDate').withTitle('Pack Label Date').withOption('title','Pack Label Date'),
                DTColumnBuilder.newColumn('schoolQbDispatchDate').withTitle('Dispatch Date').withOption('title','Dispatch Date'),
                DTColumnBuilder.newColumn('schoolCourierCompany').withTitle('Courier Company').withOption('title','Courier Company'),
                DTColumnBuilder.newColumn('schoolAwbNo').withTitle('AWB No.').withOption('title','AWB No.'),
                DTColumnBuilder.newColumn('schoolMode').withTitle('Mode').withOption('title','Mode'),
                DTColumnBuilder.newColumn('schoolQty').withTitle('No. Of Box').withOption('title','No. Of Box'),
                DTColumnBuilder.newColumn('schoolWeight').withTitle('Weight').withOption('title','Weight'),
                DTColumnBuilder.newColumn('schoolQbDelivery_status').withTitle('Delivery Status').withOption('title','Delivery Status'),
                DTColumnBuilder.newColumn('schoolQbDeliveryDate').withTitle('Delivery Date').withOption('title','Delivery Date'),
                DTColumnBuilder.newColumn('schoolQbRecieverName').withTitle('Reciever Name').withOption('title','Reciever Name'),
                DTColumnBuilder.newColumn('schoolTat').withTitle('Days Taken For Dispatch').withOption('title','Days Taken For Dispatch'),
                DTColumnBuilder.newColumn('schoolDeliveryTime').withTitle('Days Taken For Delivery').withOption('title','Days Taken For Delivery'),
                ];  
                
                
                $scope.dtColumns[12].visible = false;
                $scope.dtColumns[13].visible = false;
                $scope.dtColumns[14].visible = false;
                $scope.dtColumns[16].visible = false;
                
                
      }
      
    }
  });

  $scope.filterqbreports = function(e) {
    $scope.filteredqbReports = [];
     
      
        var round = $('#qbroundfilter').val();
        
        var zone = $('#qbzonefilter').val();

        var lotno = $('#packinglotnofilter').val();

        var data = {round:round,lotno:lotno,zone:zone,region:region,category:category,username:username};
        
        data = JSON.stringify(data);

        $.ajax({
            url: "./api/mis_system/getQbMisReportsFilter",
            contentType: false,
            processData: false,
            async: true,
            data: data,
            type: 'POST',
            dataType : 'json',
            success: function (returndata) {
              
             var response = returndata;
             
                if(response.status == "success"){

                  
                    jQuery.each( response.filteredqbreports, function( i, val ) {

                        var diffDays = val.qbtat;

                        if(diffDays == null){
                          diffDays = 'Not Yet Dispatched';
                        }

                        var deliverydiffDays = val.analysistat;
                        
                        if(deliverydiffDays == null){
                          deliverydiffDays = 'Not Yet Delivered';
                        }


                        
                        $scope.filteredqbReports.push({

                          schoolCode: val.school_code,
                          schoolName: val.schoolname,
                          schoolCity: val.city,
                          schoolRegion: val.region,
                          schoolPackLabelDate: val.packlabel_date,
                          schoolQbDispatchDate: val.qb_despatch_date,
                          schoolCourierCompany: val.courier,
                          schoolAwbNo: val.consignmentNo,
                          schoolMode: val.mode,
                          schoolQty: val.material,
                          schoolWeight: val.weight,
                          schoolTat: diffDays,
                          schoolQbDelivery_status: val.qb_delivery_status,
                          schoolQbDeliveryDate:val.qb_delivery_date,
                          schoolQbRecieverName: val.qb_reciever_name,
                          schoolDeliveryTime: deliverydiffDays

                        });


                      });  
            
                $scope.dtOptions = DTOptionsBuilder.newOptions().withOption('data', $scope.filteredqbReports).withOption('fnRowCallback',function(nRow, aData, iDisplayIndex){
                  $("td:first", nRow).html(iDisplayIndex +1);
                  return nRow;
                }).withOption('paging', false).withOption('processing', true); 

                $scope.dtInstance.rerender();
               
                }
                else
                {
                  
                $scope.dtOptions = DTOptionsBuilder.newOptions().withOption('data', $scope.filteredqbReports).withOption('fnRowCallback',function(nRow, aData, iDisplayIndex){
                  $("td:first", nRow).html(iDisplayIndex +1);
                  return nRow;
                }).withOption('paging', false).withOption('scrollY', "500px").withOption('processing', true).withOption('fnPreDrawCallback', function () { $('#packingloader').show(); }).withOption('fnDrawCallback', function () {  }); 

                

                $scope.dtInstance.rerender();
                  

                }

               }
             });
  };

  
});

app.controller('VendorQbMisListController', function($scope,$http,DTOptionsBuilder, DTColumnBuilder, DTColumnDefBuilder){

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

  var vendor_id = getCookie('vendor_id');  

  //script code to list all the schools of current round with rounds and country
  $scope.dtInstance = {};
  $scope.rounds = [];
  $scope.lotnos = [];
  $scope.zones = [];
  $scope.qbmisreports = [];

  var flag = 0;
  var userData = [];
  
  var data = {vendor_id:vendor_id};
  data = JSON.stringify(data);

    $.ajax({
    url: './api/mis_system/vendor_qb_mis_list',
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
        
        $scope.zones = response.zones;
        $scope.rounds = response.rounds;
        $scope.lotnos = response.lotnos;
        $scope.roundSelected = response.round_selected;

        
        jQuery.each( response.schooldata, function( i, val ) {
         
           $scope.schoolCodes.push(val.school_code);
           $scope.schoolNames.push(val.schoolname);
        
        });

        jQuery.each( response.qb_mis_reports, function( i, val ) {

          var diffDays = val.qbtat;

          if(diffDays == null){
            diffDays = 'Not Yet Dispatched';
          }

          var deliverydiffDays = val.analysistat;
          
          if(deliverydiffDays == null){
            deliverydiffDays = 'Not Yet Delivered';
          }


          
          $scope.qbmisreports.push({

            schoolCode: val.school_code,
            schoolName: val.schoolname,
            schoolCity: val.city,
            schoolRegion: val.region,
            schoolPackLabelDate: val.packlabel_date,
            schoolQbDispatchDate: val.qb_despatch_date,
            schoolCourierCompany: val.courier,
            schoolAwbNo: val.consignmentNo,
            schoolMode: val.mode,
            schoolQty: val.material,
            schoolWeight: val.weight,
            schoolTat: diffDays,
            schoolQbDelivery_status: val.qb_delivery_status,
            schoolQbDeliveryDate:val.qb_delivery_date,
            schoolQbRecieverName: val.qb_reciever_name,
            schoolDeliveryTime: deliverydiffDays

          });
        });

        $scope.packingdates = response.packlabel_date;
        $scope.citys = response.school_city;


        $scope.dtOptions = DTOptionsBuilder.newOptions().withOption('data', $scope.qbmisreports).withOption('fnRowCallback',function(nRow, aData, iDisplayIndex){
                  $("td:first", nRow).html(iDisplayIndex +1);
                  return nRow;
                }).withOption('processing', true);   


                $scope.dtColumns = [

                DTColumnBuilder.newColumn(null).withTitle('#').withOption('title','#','defaultContent', ' '),
                DTColumnBuilder.newColumn('schoolCode').withTitle('School Code').withOption('title','School Code'),
                DTColumnBuilder.newColumn('schoolName').withTitle('School Name').withOption('title','School Name'),
                DTColumnBuilder.newColumn('schoolCity').withTitle('City').withOption('title','City'),
                DTColumnBuilder.newColumn('schoolRegion').withTitle('Region').withOption('title','Region'),
                DTColumnBuilder.newColumn('schoolPackLabelDate').withTitle('Pack Label Date').withOption('title','Pack Label Date'),
                DTColumnBuilder.newColumn('schoolQbDispatchDate').withTitle('Dispatch Date').withOption('title','Dispatch Date'),
                DTColumnBuilder.newColumn('schoolCourierCompany').withTitle('Courier Company').withOption('title','Courier Company'),
                DTColumnBuilder.newColumn('schoolAwbNo').withTitle('AWB No.').withOption('title','AWB No.'),
                DTColumnBuilder.newColumn('schoolMode').withTitle('Mode').withOption('title','Mode'),
                DTColumnBuilder.newColumn('schoolQty').withTitle('No. Of Box').withOption('title','No. Of Box'),
                DTColumnBuilder.newColumn('schoolWeight').withTitle('Weight').withOption('title','Weight'),
                DTColumnBuilder.newColumn('schoolQbDelivery_status').withTitle('Delivery Status').withOption('title','Delivery Status'),
                DTColumnBuilder.newColumn('schoolQbDeliveryDate').withTitle('Delivery Date').withOption('title','Delivery Date'),
                DTColumnBuilder.newColumn('schoolQbRecieverName').withTitle('Reciever Name').withOption('title','Reciever Name'),
                DTColumnBuilder.newColumn('schoolTat').withTitle('Days Taken For Dispatch').withOption('title','Days Taken For Dispatch'),
                DTColumnBuilder.newColumn('schoolDeliveryTime').withTitle('Days Taken For Delivery').withOption('title','Days Taken For Delivery'),
                ];  
                
                
                $scope.dtColumns[12].visible = false;
                $scope.dtColumns[13].visible = false;
                $scope.dtColumns[14].visible = false;
                $scope.dtColumns[16].visible = false;


                
      }
      
    }
  });

  $scope.filtervendorqbreports = function(e) {
    
    $scope.filteredqbReports = [];
     
      
        var round = $('#qbroundfilter').val();
        
        var zone = $('#qbzonefilter').val();

        var lotno = $('#packinglotnofilter').val();

        var vendor_id = getCookie('vendor_id');  

        var data = {round:round,lotno:lotno,zone:zone,vendor_id:vendor_id};
        
        data = JSON.stringify(data);

        $.ajax({
            url: "./api/mis_system/getQbMisVendorReportsFilter",
            contentType: false,
            processData: false,
            async: true,
            data: data,
            type: 'POST',
            dataType : 'json',
            success: function (returndata) {
              
             var response = returndata;
             
                if(response.status == "success"){

                  
                    jQuery.each( response.filteredqbreports, function( i, val ) {

                        var diffDays = val.qbtat;

                        if(diffDays == null){
                          diffDays = 'Not Yet Dispatched';
                        }

                        var deliverydiffDays = val.analysistat;
                        
                        if(deliverydiffDays == null){
                          deliverydiffDays = 'Not Yet Delivered';
                        }


                        
                        $scope.filteredqbReports.push({

                          schoolCode: val.school_code,
                          schoolName: val.schoolname,
                          schoolCity: val.city,
                          schoolRegion: val.region,
                          schoolPackLabelDate: val.packlabel_date,
                          schoolQbDispatchDate: val.qb_despatch_date,
                          schoolCourierCompany: val.courier,
                          schoolAwbNo: val.consignmentNo,
                          schoolMode: val.mode,
                          schoolQty: val.material,
                          schoolWeight: val.weight,
                          schoolTat: diffDays,
                          schoolQbDelivery_status: val.qb_delivery_status,
                          schoolQbDeliveryDate:val.qb_delivery_date,
                          schoolQbRecieverName: val.qb_reciever_name,
                          schoolDeliveryTime: deliverydiffDays

                        });


                      });  
            
                $scope.dtOptions = DTOptionsBuilder.newOptions().withOption('data', $scope.filteredqbReports).withOption('fnRowCallback',function(nRow, aData, iDisplayIndex){
                  $("td:first", nRow).html(iDisplayIndex +1);
                  return nRow;
                }).withOption('paging', false).withOption('processing', true); 

                $scope.dtInstance.rerender();
               
                }
                else
                {
                  
                $scope.dtOptions = DTOptionsBuilder.newOptions().withOption('data', $scope.filteredqbReports).withOption('fnRowCallback',function(nRow, aData, iDisplayIndex){
                  $("td:first", nRow).html(iDisplayIndex +1);
                  return nRow;
                }).withOption('paging', false).withOption('scrollY', "500px").withOption('processing', true).withOption('fnPreDrawCallback', function () { $('#packingloader').show(); }).withOption('fnDrawCallback', function () {  }); 

                $scope.dtInstance.rerender();
              
                }

               }
             });
  };

  
});


app.controller('DashboardPenAndPaperController', function($scope,$http){

  // $scope.openPretestdashboardtable = function(event){
    
  //   document.getElementById("myNav").style.width = "100%";

  // };

  // $scope.closePretestdashboardtable = function(event){
    
  //   document.getElementById("myNav").style.width = "0%";

  // };

});

app.controller('DashboardPenAndPaperPreTestController', function($rootScope,$scope,$http,$routeParams,DTOptionsBuilder, DTColumnBuilder, DTColumnDefBuilder,$location,$window,$route){
  
//$('#overlay').show();

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

  var region = getCookie('loginuserregion');
  var category = getCookie('loginusercategory');
  var username = getCookie('loginuserlogname');

$scope.dtInstance = {};

function destroy() {
    angular.element('#schoollist-table').children('thead').children().remove();
    angular.element('#schoollist-table').children('tbody').children().remove(); 
    angular.element('#schoollist-table').empty();
}

function createGraph(classname,val1,color1,highlightcolor1,label1,val2,color2,highlightcolor2,label2,val3,color3,highlightcolor3,label3){

    var doughnutData = [
      {
          value: val1,
          color: color1,
          highlight: '',
          label: label1
      },
      {
          value: val2,
          color: color2,
          highlight: '',
          label: label2
      },
      {
          value: val3,
          color: color3,
          highlight: '',
          label: label3
      },
    ];

    

    var ctx = $(classname)[0].getContext("2d");
    window.myPie = new Chart(ctx).Pie(doughnutData, {
        responsive : true,
        showTooltips: true
    });
  }

  $scope.schoolRegisteredList = [];

  
  $scope.schoolRegisteredList.push({
    schoolCode: 0,
    schoolName: 0,
    schoolCity: 0,
    schoolRegion: 0,
    schoolSSFDate: 0,
    schoolAmountPayable: 0,
    schoolAmountPaid: 0,
    schoolPercentagePaid: 0,
    schoolAmountDifference: 0,
  });
  

  $scope.dtOptions = DTOptionsBuilder.newOptions().withOption('data', $scope.schoolRegisteredList).withOption('fnRowCallback',function(nRow, aData, iDisplayIndex){
    $("td:first", nRow).html(iDisplayIndex +1);
    return nRow;
  }).withOption('processing', true);

  $scope.dtColumns = [

      DTColumnBuilder.newColumn(null).withTitle('#').withOption('title','#','defaultContent', ' '),
      DTColumnBuilder.newColumn('schoolCode').withTitle('School Code').withOption('title','School Code'),
      DTColumnBuilder.newColumn('schoolName').withTitle('School Name').withOption('title','School Name'),
      DTColumnBuilder.newColumn('schoolCity').withTitle('City').withOption('title','City'),
      DTColumnBuilder.newColumn('schoolRegion').withTitle('Region').withOption('title','Region'),
      DTColumnBuilder.newColumn('schoolSSFDate').withTitle('SSF Date').withOption('title','SSF Date'),
      DTColumnBuilder.newColumn('schoolAmountPayable').withTitle('Amount Payable').withOption('title','Amount Payable'),
      DTColumnBuilder.newColumn('schoolAmountPaid').withTitle('Amount Paid').withOption('title','Amount Paid'),
      DTColumnBuilder.newColumn('schoolPercentagePaid').withTitle('(%) Paid').withOption('title','(%) Paid'),
      DTColumnBuilder.newColumn('schoolAmountDifference').withTitle('Pending Amount').withOption('title','Pending Amount'),
      ];  



  $scope.rounds = [];
  
  $scope.zones = [];

  $scope.ssfCount = '0';

  $scope.ssfRecievedCount = '0';

  $scope.paymentRecieved = '0';

  var round = $('#pppretest_dashboard_round').val();
  var zone = $('#pppretest_dashboard_zone').val();

  var data = {zone: zone,region:region,category:category,username:username};
  data = JSON.stringify(data);

    $.ajax({
    url: './api/dashboard/pppretestDashboard',
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
        
        $scope.roundSelected = response.round_selected;
        $scope.roundDescription = response.round_description;
        $scope.zones = response.zones;
        $scope.rounds = response.rounds;
        $scope.ssfCount = response.school_registered[0]['ssfcount'];
        $scope.ssfRecievedCount = response.ssf_recieved[0]['ssfrecievedcount'];
        $scope.ssfPendingCount = response.ssf_pending[0]['ssfpendingcount'];
        $scope.ssfAlertCount = response.ssf_alert[0]['ssfalertcount'];
        createGraph('.pie-chart1',parseInt(response.ssf_recieved[0]['ssfrecievedcount']),'#27C24C','#03A9F4','Completed',parseInt(response.ssf_pending[0]['ssfpendingcount']),'#FFC107','#03A9F4','Pending',parseInt(response.payment_alert[0]['paymentalertcount']),'#F44336','#03A9F4','Alert');
        $scope.paymentRecieved = response.payment_recieved[0]['paymentrecievedcount'];
        $scope.paymentPending = response.payment_pending[0]['paymentpendingcount'];
        $scope.paymentAlert = response.payment_alert[0]['paymentalertcount'];
        
        $scope.packLabelDateSet = response.packlabeldate_set[0]['packlabelsetcount'];
        $scope.packLabelDateNotSet = response.packlabeldate_notset[0]['packlabelnotsetcount'];
        $scope.packLabelDateAlert = response.packlabeldate_alert[0]['packlabelalertcount'];
        
        $scope.dispatchDateSet = response.dispatchdate_set[0]['dispatchsetcount'];
        $scope.dispatchDateNotSet = response.dispatchdate_notset[0]['dispatchnotsetcount'];
        $scope.dispatchDateAlert = response.dispatchdate_alert[0]['dispatchalertcount'];
        
        $scope.deliveryDateSet = response.deliverydate_set[0]['deliverysetcount'];
        $scope.deliveryDateNotSet = response.deliverydate_notset[0]['deliverynotsetcount'];
        $scope.deliveryDateAlert = response.deliverydate_alert[0]['deliveryalertcount'];

        //setTimeout(function(){ $('#overlay').hide(); },2000);
        

        $(document).on('shown.bs.tab', 'a[data-toggle="tab"]', function (e) {
  
          destroy();

          $('#ppPreTestDynamicTable').addClass('hide');

          var tabtarget = $(this).attr('href');
          
          if(tabtarget == '#tabs-demo6-area1'){
            createGraph('.pie-chart1',parseInt(response.ssf_recieved[0]['ssfrecievedcount']),'#27C24C','#03A9F4','Completed',parseInt(response.ssf_pending[0]['ssfpendingcount']),'#FFC107','#03A9F4','Pending',parseInt(response.payment_alert[0]['paymentalertcount']),'#F44336','#03A9F4','Alert');
          }
          else if(tabtarget == '#tabs-demo6-area2'){
            createGraph('.pie-chart2',parseInt(response.payment_recieved[0]['paymentrecievedcount']),'#27C24C','#03A9F4','Completed',parseInt(response.payment_pending[0]['paymentpendingcount']),'#FFC107','#03A9F4','Pending',parseInt(response.ssf_alert[0]['ssfalertcount']),'#F44336','#03A9F4','Alert');
          }
          else if(tabtarget == '#tabs-demo6-area3'){
            createGraph('.pie-chart3',parseInt(response.packlabeldate_set[0]['packlabelsetcount']),'#27C24C','#03A9F4','Completed',parseInt(response.packlabeldate_notset[0]['packlabelnotsetcount']),'#FFC107','#03A9F4','Pending',parseInt(response.packlabeldate_alert[0]['packlabelalertcount']),'#F44336','#03A9F4','Alert');
          }
          else if(tabtarget == '#tabs-demo6-area4'){
            createGraph('.pie-chart4',parseInt(response.dispatchdate_set[0]['dispatchsetcount']),'#27C24C','#03A9F4','Completed',parseInt(response.dispatchdate_notset[0]['dispatchnotsetcount']),'#FFC107','#03A9F4','Pending',parseInt(response.dispatchdate_alert[0]['dispatchalertcount']),'#F44336','#03A9F4','Alert');
          }
          else if(tabtarget == '#tabs-demo6-area5'){
            createGraph('.pie-chart5',parseInt(response.deliverydate_set[0]['deliverysetcount']),'#27C24C','#03A9F4','Completed',parseInt(response.deliverydate_notset[0]['deliverynotsetcount']),'#FFC107','#03A9F4','Pending',parseInt(response.deliverydate_alert[0]['deliveryalertcount']),'#F44336','#03A9F4','Alert');
          }        
        });
      }
      
    }
  });




$scope.filterPpPretestDashboardData = function(e){

  $('#overlay').show();

  destroy();

  $('#ppPreTestDynamicTable').addClass('hide');

  $scope.ssfCount = '0';

  $scope.ssfRecievedCount = '0';

  $scope.paymentRecieved = '0';

  var round = $('#pppretest_dashboard_round').val();
  var zone = $('#pppretest_dashboard_zone').val();

  var data = {round: round,zone:zone,region:region,category:category,username:username};
  data = JSON.stringify(data);

    $.ajax({
    url: './api/dashboard/pppretestDashboardFilter',
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

        $scope.roundDescription = response.round_description;
        $scope.ssfCount = response.school_registered[0]['ssfcount'];
        $scope.ssfRecievedCount = response.ssf_recieved[0]['ssfrecievedcount'];
        $scope.ssfPendingCount = response.ssf_pending[0]['ssfpendingcount'];
        $scope.ssfAlertCount = response.ssf_alert[0]['ssfalertcount'];

        $('.nav-tabs a[href="#tabs-demo6-area1"]').tab('show');

         setTimeout(function(){ createGraph('.pie-chart1',parseInt(response.ssf_recieved[0]['ssfrecievedcount']),'#27C24C','#03A9F4','Completed',parseInt(response.ssf_pending[0]['ssfpendingcount']),'#FFC107','#03A9F4','Pending',parseInt(response.payment_alert[0]['paymentalertcount']),'#F44336','#03A9F4','Alert'); }, 2000);
        
        $scope.paymentRecieved = response.payment_recieved[0]['paymentrecievedcount'];
        $scope.paymentPending = response.payment_pending[0]['paymentpendingcount'];
        $scope.paymentAlert = response.payment_alert[0]['paymentalertcount'];
        
        $scope.packLabelDateSet = response.packlabeldate_set[0]['packlabelsetcount'];
        $scope.packLabelDateNotSet = response.packlabeldate_notset[0]['packlabelnotsetcount'];
        $scope.packLabelDateAlert = response.packlabeldate_alert[0]['packlabelalertcount'];
        
        $scope.dispatchDateSet = response.dispatchdate_set[0]['dispatchsetcount'];
        $scope.dispatchDateNotSet = response.dispatchdate_notset[0]['dispatchnotsetcount'];
        $scope.dispatchDateAlert = response.dispatchdate_alert[0]['dispatchalertcount'];
        
        $scope.deliveryDateSet = response.deliverydate_set[0]['deliverysetcount'];
        $scope.deliveryDateNotSet = response.deliverydate_notset[0]['deliverynotsetcount'];
        $scope.deliveryDateAlert = response.deliverydate_alert[0]['deliveryalertcount'];
        
        $location.path('/dashboard-pppretest');
        
        
        $(document).on('shown.bs.tab', 'a[data-toggle="tab"]', function (e) {
  
          destroy();

          $('#ppPreTestDynamicTable').addClass('hide');

          var tabtarget = $(this).attr('href');
          
          if(tabtarget == '#tabs-demo6-area1'){
            createGraph('.pie-chart1',parseInt(response.ssf_recieved[0]['ssfrecievedcount']),'#27C24C','#03A9F4','Completed',parseInt(response.ssf_pending[0]['ssfpendingcount']),'#FFC107','#03A9F4','Pending',parseInt(response.payment_alert[0]['paymentalertcount']),'#F44336','#03A9F4','Alert');
          }
          else if(tabtarget == '#tabs-demo6-area2'){
            createGraph('.pie-chart2',parseInt(response.payment_recieved[0]['paymentrecievedcount']),'#27C24C','#03A9F4','Completed',parseInt(response.payment_pending[0]['paymentpendingcount']),'#FFC107','#03A9F4','Pending',parseInt(response.ssf_alert[0]['ssfalertcount']),'#F44336','#03A9F4','Alert');
          }
          else if(tabtarget == '#tabs-demo6-area3'){
            createGraph('.pie-chart3',parseInt(response.packlabeldate_set[0]['packlabelsetcount']),'#27C24C','#03A9F4','Completed',parseInt(response.packlabeldate_notset[0]['packlabelnotsetcount']),'#FFC107','#03A9F4','Pending',parseInt(response.packlabeldate_alert[0]['packlabelalertcount']),'#F44336','#03A9F4','Alert');
          }
          else if(tabtarget == '#tabs-demo6-area4'){
            createGraph('.pie-chart4',parseInt(response.dispatchdate_set[0]['dispatchsetcount']),'#27C24C','#03A9F4','Completed',parseInt(response.dispatchdate_notset[0]['dispatchnotsetcount']),'#FFC107','#03A9F4','Pending',parseInt(response.dispatchdate_alert[0]['dispatchalertcount']),'#F44336','#03A9F4','Alert');
          }
          else if(tabtarget == '#tabs-demo6-area5'){
            createGraph('.pie-chart5',parseInt(response.deliverydate_set[0]['deliverysetcount']),'#27C24C','#03A9F4','Completed',parseInt(response.deliverydate_notset[0]['deliverynotsetcount']),'#FFC107','#03A9F4','Pending',parseInt(response.deliverydate_alert[0]['deliveryalertcount']),'#F44336','#03A9F4','Alert');
          }        
        });

        setTimeout(function(){ $('#overlay').hide(); },2000);
        


      }
      
    }
  });
};

$(".nav-tabs a").click(function (e) {
      e.preventDefault();  
      $(this).tab('show');
    });

$scope.showSchoolRegistered = function(e){

  destroy();

  $scope.schoolRegisteredList = [];

  var round = $('#pppretest_dashboard_round').val();
  var zone = $('#pppretest_dashboard_zone').val();

  var data = {round: round,zone:zone,region:region,category:category,username:username};
  data = JSON.stringify(data);

    $.ajax({
    url: './api/dashboard/pppretestDashboardSchoolRegistered',
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

        
        jQuery.each( response.school_registered, function( i, val ) {
          $scope.schoolRegisteredList.push({
            schoolCode: val.school_code,
            schoolName: val.schoolname,
            schoolCity: val.city,
            schoolRegion: val.region,
            schoolSSFNumber: val.ssf_number,
            schoolSSFDate: val.SSF_date,
            schoolAmountPayable: val.amount_payable,
            schoolAmountPaid: val.paid,
            schoolPercentagePaid: val.percentage_paid,
            schoolAmountDifference: val.difference,
          });
        });

        $scope.dtOptions = DTOptionsBuilder.newOptions().withOption('data', $scope.schoolRegisteredList).withOption('fnRowCallback',function(nRow, aData, iDisplayIndex){
          $("td:first", nRow).html(iDisplayIndex +1);
          return nRow;
        }).withOption('processing', true);

        $scope.dtColumns = [

            DTColumnBuilder.newColumn(null).withTitle('#').withOption('title','#','defaultContent', ' '),
            DTColumnBuilder.newColumn(null).withTitle('School Code').withOption('title','School Code').renderWith(function (data, type, full, meta){ return '<a target="_blank" href="school-order-tracking?round='+round+'&school='+full.schoolCode+'">'+full.schoolCode+'</a>';}),
            //DTColumnBuilder.newColumn('schoolCode').withTitle('School Code').withOption('title','School Code'),
            DTColumnBuilder.newColumn('schoolName').withTitle('School Name').withOption('title','School Name'),
            DTColumnBuilder.newColumn('schoolCity').withTitle('City').withOption('title','City'),
            DTColumnBuilder.newColumn('schoolRegion').withTitle('Region').withOption('title','Region'),
            DTColumnBuilder.newColumn('schoolSSFNumber').withTitle('SSF Number').withOption('title','SSF Number'),
            DTColumnBuilder.newColumn('schoolSSFDate').withTitle('SSF Date').withOption('title','SSF Date'),
            DTColumnBuilder.newColumn('schoolAmountPayable').withTitle('Amount Payable').withOption('title','Amount Payable'),
            DTColumnBuilder.newColumn('schoolAmountPaid').withTitle('Amount Paid').withOption('title','Amount Paid'),
            DTColumnBuilder.newColumn('schoolPercentagePaid').withTitle('(%) Paid').withOption('title','(%) Paid'),
            DTColumnBuilder.newColumn('schoolAmountDifference').withTitle('Pending Amount').withOption('title','Pending Amount'),
            ];  


            $('#ppPreTestDynamicTable').removeClass('hide');

            $(window).scrollTop($('#ppPreTestDynamicTable').offset().top);

      }
      
    }
  });

};


$scope.showSchoolSSFReceived = function(e){

  destroy();

  $scope.schoolSSFReceivedList = [];

  var round = $('#pppretest_dashboard_round').val();
  var zone = $('#pppretest_dashboard_zone').val();

  var data = {round: round,zone:zone,region:region,category:category,username:username};
  data = JSON.stringify(data);

    $.ajax({
    url: './api/dashboard/pppretestDashboardSchoolSSFReceived',
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

        
        jQuery.each( response.ssf_recieved, function( i, val ) {
          $scope.schoolSSFReceivedList.push({
            schoolCode: val.school_code,
            schoolName: val.schoolname,
            schoolCity: val.city,
            schoolRegion: val.region,
            schoolSSFNumber: val.ssf_number,
            schoolSSFDate: val.SSF_date,
            schoolAmountPayable: val.amount_payable,
            schoolAmountPaid: val.paid,
            schoolPercentagePaid: val.percentage_paid,
            schoolAmountDifference: val.difference,
          });
        });

        $scope.dtOptions = DTOptionsBuilder.newOptions().withOption('data', $scope.schoolSSFReceivedList).withOption('fnRowCallback',function(nRow, aData, iDisplayIndex){
          $("td:first", nRow).html(iDisplayIndex +1);
          return nRow;
        }).withOption('processing', true);

        $scope.dtColumns = [

            DTColumnBuilder.newColumn(null).withTitle('#').withOption('title','#','defaultContent', ' '),
            DTColumnBuilder.newColumn(null).withTitle('School Code').withOption('title','School Code').renderWith(function (data, type, full, meta){ return '<a target="_blank" href="school-order-tracking?round='+round+'&school='+full.schoolCode+'">'+full.schoolCode+'</a>';}),
            DTColumnBuilder.newColumn('schoolName').withTitle('School Name').withOption('title','School Name'),
            DTColumnBuilder.newColumn('schoolCity').withTitle('City').withOption('title','City'),
            DTColumnBuilder.newColumn('schoolRegion').withTitle('Region').withOption('title','Region'),
            DTColumnBuilder.newColumn('schoolSSFNumber').withTitle('SSF Number').withOption('title','SSF Number'),
            DTColumnBuilder.newColumn('schoolSSFDate').withTitle('SSF Date').withOption('title','SSF Date'),
            DTColumnBuilder.newColumn('schoolAmountPayable').withTitle('Amount Payable').withOption('title','Amount Payable'),
            DTColumnBuilder.newColumn('schoolAmountPaid').withTitle('Amount Paid').withOption('title','Amount Paid'),
            DTColumnBuilder.newColumn('schoolPercentagePaid').withTitle('(%) Paid').withOption('title','(%) Paid'),
            DTColumnBuilder.newColumn('schoolAmountDifference').withTitle('Pending Amount').withOption('title','Pending Amount'),
            ];  


            $('#ppPreTestDynamicTable').removeClass('hide');

            $(window).scrollTop($('#ppPreTestDynamicTable').offset().top);
      }
      
    }
  });

};

$scope.showSchoolSSFPending = function(e){

  destroy();

  $scope.schoolSSFPendingList = [];

  var round = $('#pppretest_dashboard_round').val();
  var zone = $('#pppretest_dashboard_zone').val();

  var data = {round: round,zone:zone,region:region,category:category,username:username};
  data = JSON.stringify(data);

    $.ajax({
    url: './api/dashboard/pppretestDashboardSchoolSSFPending',
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

        
        jQuery.each( response.ssf_pending, function( i, val ) {
          $scope.schoolSSFPendingList.push({
            schoolCode: val.school_code,
            schoolName: val.schoolname,
            schoolCity: val.city,
            schoolRegion: val.region,
            schoolAmountPayable: val.amount_payable,
            schoolAmountPaid: val.paid,
            schoolPercentagePaid: val.percentage_paid,
            schoolAmountDifference: val.difference,
          });
        });



        $scope.dtOptions = DTOptionsBuilder.newOptions().withOption('data', $scope.schoolSSFPendingList).withOption('fnRowCallback',function(nRow, aData, iDisplayIndex){
          $("td:first", nRow).html(iDisplayIndex +1);
          return nRow;
        }).withOption('processing', true);

        $scope.dtColumns = [

            DTColumnBuilder.newColumn(null).withTitle('#').withOption('title','#','defaultContent', ' '),
            DTColumnBuilder.newColumn(null).withTitle('School Code').withOption('title','School Code').renderWith(function (data, type, full, meta){ return '<a target="_blank" href="school-order-tracking?round='+round+'&school='+full.schoolCode+'">'+full.schoolCode+'</a>';}),
            DTColumnBuilder.newColumn('schoolName').withTitle('School Name').withOption('title','School Name'),
            DTColumnBuilder.newColumn('schoolCity').withTitle('City').withOption('title','City'),
            DTColumnBuilder.newColumn('schoolRegion').withTitle('Region').withOption('title','Region'),
            DTColumnBuilder.newColumn('schoolAmountPayable').withTitle('Amount Payable').withOption('title','Amount Payable'),
            DTColumnBuilder.newColumn('schoolAmountPaid').withTitle('Amount Paid').withOption('title','Amount Paid'),
            DTColumnBuilder.newColumn('schoolPercentagePaid').withTitle('(%) Paid').withOption('title','(%) Paid'),
            DTColumnBuilder.newColumn('schoolAmountDifference').withTitle('Pending Amount').withOption('title','Pending Amount')
            ];  


            $('#ppPreTestDynamicTable').removeClass('hide');

            $(window).scrollTop($('#ppPreTestDynamicTable').offset().top);


      }
      
    }
  });

};

$scope.showSchoolSSFAlert = function(e){

  destroy();

  $scope.schoolSSFAlertList = [];

  var round = $('#pppretest_dashboard_round').val();
  var zone = $('#pppretest_dashboard_zone').val();

  var data = {round: round,zone:zone,region:region,category:category,username:username};
  data = JSON.stringify(data);

    $.ajax({
    url: './api/dashboard/pppretestDashboardSchoolSSFAlert',
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

        
        jQuery.each( response.ssf_alert, function( i, val ) {
          $scope.schoolSSFAlertList.push({
            schoolCode: val.school_code,
            schoolName: val.schoolname,
            schoolCity: val.city,
            schoolRegion: val.region,
            schoolAmountPayable: val.amount_payable,
            schoolAmountPaid: val.paid,
            schoolPercentagePaid: val.percentage_paid,
            schoolAmountDifference: val.difference,
          });
        });

        $scope.dtOptions = DTOptionsBuilder.newOptions().withOption('data', $scope.schoolSSFAlertList).withOption('fnRowCallback',function(nRow, aData, iDisplayIndex){
          $("td:first", nRow).html(iDisplayIndex +1);
          return nRow;
        }).withOption('processing', true);

        $scope.dtColumns = [

            DTColumnBuilder.newColumn(null).withTitle('#').withOption('title','#','defaultContent', ' '),
            DTColumnBuilder.newColumn(null).withTitle('School Code').withOption('title','School Code').renderWith(function (data, type, full, meta){ return '<a target="_blank" href="school-order-tracking?round='+round+'&school='+full.schoolCode+'">'+full.schoolCode+'</a>';}),
            DTColumnBuilder.newColumn('schoolName').withTitle('School Name').withOption('title','School Name'),
            DTColumnBuilder.newColumn('schoolCity').withTitle('City').withOption('title','City'),
            DTColumnBuilder.newColumn('schoolRegion').withTitle('Region').withOption('title','Region'),
            DTColumnBuilder.newColumn('schoolAmountPayable').withTitle('Amount Payable').withOption('title','Amount Payable'),
            DTColumnBuilder.newColumn('schoolAmountPaid').withTitle('Amount Paid').withOption('title','Amount Paid'),
            DTColumnBuilder.newColumn('schoolPercentagePaid').withTitle('(%) Paid').withOption('title','(%) Paid'),
            DTColumnBuilder.newColumn('schoolAmountDifference').withTitle('Pending Amount').withOption('title','Pending Amount')
            ];  


            $('#ppPreTestDynamicTable').removeClass('hide');

            $(window).scrollTop($('#ppPreTestDynamicTable').offset().top);

      }
      
    }
  });

};



$scope.showSchoolPaymentReceived = function(e){

  destroy();  

  $scope.schoolPaymentReceivedList = [];

  var round = $('#pppretest_dashboard_round').val();
  var zone = $('#pppretest_dashboard_zone').val();

  var data = {round: round,zone:zone,region:region,category:category,username:username};
  data = JSON.stringify(data);

    $.ajax({
    url: './api/dashboard/pppretestDashboardSchoolPaymentReceived',
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

        
        jQuery.each( response.payment_recieved, function( i, val ) {
          $scope.schoolPaymentReceivedList.push({
            schoolCode: val.school_code,
            schoolName: val.schoolname,
            schoolCity: val.city,
            schoolRegion: val.region,
            schoolAmountPayable: val.amount_payable,
            schoolAmountPaid: val.paid,
            schoolPercentagePaid: val.percentage_paid,
            schoolAmountDifference: val.difference,
          });
        });

        $scope.dtOptions = DTOptionsBuilder.newOptions().withOption('data', $scope.schoolPaymentReceivedList).withOption('fnRowCallback',function(nRow, aData, iDisplayIndex){
          $("td:first", nRow).html(iDisplayIndex +1);
          return nRow;
        }).withOption('processing', true);

       
        $scope.dtColumns = [];

        $scope.dtColumns = [

            DTColumnBuilder.newColumn(null).withTitle('#').withOption('title','#','defaultContent', ' '),
            DTColumnBuilder.newColumn(null).withTitle('School Code').withOption('title','School Code').renderWith(function (data, type, full, meta){ return '<a target="_blank" href="school-order-tracking?round='+round+'&school='+full.schoolCode+'">'+full.schoolCode+'</a>';}),
            DTColumnBuilder.newColumn('schoolName').withTitle('School Name').withOption('title','School Name'),
            DTColumnBuilder.newColumn('schoolCity').withTitle('City').withOption('title','City'),
            DTColumnBuilder.newColumn('schoolRegion').withTitle('Region').withOption('title','Region'),
            DTColumnBuilder.newColumn('schoolAmountPayable').withTitle('Amount Payable').withOption('title','Amount Payable'),
            DTColumnBuilder.newColumn('schoolAmountPaid').withTitle('Amount Paid').withOption('title','Amount Paid'),
            DTColumnBuilder.newColumn('schoolPercentagePaid').withTitle('(%) Paid').withOption('title','(%) Paid'),
            DTColumnBuilder.newColumn('schoolAmountDifference').withTitle('Pending Amount').withOption('title','Pending Amount')
            ];  


            $('#ppPreTestDynamicTable').removeClass('hide');

            //$scope.dtInstance.rerender();

            $location.path('/dashboard-pppretest');

            $(window).scrollTop($('#ppPreTestDynamicTable').offset().top);

      }
      
    }
  });

};

$scope.showSchoolPaymentPending = function(e){

  destroy();  

  $scope.schoolPaymentPendingList = [];

  var round = $('#pppretest_dashboard_round').val();
  var zone = $('#pppretest_dashboard_zone').val();

  var data = {round: round,zone:zone,region:region,category:category,username:username};
  data = JSON.stringify(data);

    $.ajax({
    url: './api/dashboard/pppretestDashboardSchoolPaymentPending',
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

        
        jQuery.each( response.payment_pending, function( i, val ) {
          $scope.schoolPaymentPendingList.push({
            schoolCode: val.school_code,
            schoolName: val.schoolname,
            schoolCity: val.city,
            schoolRegion: val.region,
            schoolAmountPayable: val.amount_payable,
            schoolAmountPaid: val.paid,
            schoolPercentagePaid: val.percentage_paid,
            schoolAmountDifference: val.difference,
          });
        });

        $scope.dtOptions = DTOptionsBuilder.newOptions().withOption('data', $scope.schoolPaymentPendingList).withOption('fnRowCallback',function(nRow, aData, iDisplayIndex){
          $("td:first", nRow).html(iDisplayIndex +1);
          return nRow;
        }).withOption('processing', true);

       
        $scope.dtColumns = [];

        $scope.dtColumns = [

            DTColumnBuilder.newColumn(null).withTitle('#').withOption('title','#','defaultContent', ' '),
            DTColumnBuilder.newColumn(null).withTitle('School Code').withOption('title','School Code').renderWith(function (data, type, full, meta){ return '<a target="_blank" href="school-order-tracking?round='+round+'&school='+full.schoolCode+'">'+full.schoolCode+'</a>';}),
            DTColumnBuilder.newColumn('schoolName').withTitle('School Name').withOption('title','School Name'),
            DTColumnBuilder.newColumn('schoolCity').withTitle('City').withOption('title','City'),
            DTColumnBuilder.newColumn('schoolRegion').withTitle('Region').withOption('title','Region'),
            DTColumnBuilder.newColumn('schoolAmountPayable').withTitle('Amount Payable').withOption('title','Amount Payable'),
            DTColumnBuilder.newColumn('schoolAmountPaid').withTitle('Amount Paid').withOption('title','Amount Paid'),
            DTColumnBuilder.newColumn('schoolPercentagePaid').withTitle('(%) Paid').withOption('title','(%) Paid'),
            DTColumnBuilder.newColumn('schoolAmountDifference').withTitle('Pending Amount').withOption('title','Pending Amount')
            ];  


            $('#ppPreTestDynamicTable').removeClass('hide');

            //$scope.dtInstance.rerender();

            $location.path('/dashboard-pppretest');

            $(window).scrollTop($('#ppPreTestDynamicTable').offset().top);

      }
      
    }
  });

};

$scope.showSchoolPaymentAlert = function(e){

  destroy();  

  $scope.schoolPaymentAlertList = [];

  var round = $('#pppretest_dashboard_round').val();
  var zone = $('#pppretest_dashboard_zone').val();

  var data = {round: round,zone:zone,region:region,category:category,username:username};
  data = JSON.stringify(data);

    $.ajax({
    url: './api/dashboard/pppretestDashboardSchoolPaymentAlert',
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

        
        jQuery.each( response.payment_alert, function( i, val ) {
          $scope.schoolPaymentAlertList.push({
            schoolCode: val.school_code,
            schoolName: val.schoolname,
            schoolCity: val.city,
            schoolRegion: val.region,
            schoolAmountPayable: val.amount_payable,
            schoolAmountPaid: val.paid,
            schoolPercentagePaid: val.percentage_paid,
            schoolAmountDifference: val.difference,
          });
        });

        $scope.dtOptions = DTOptionsBuilder.newOptions().withOption('data', $scope.schoolPaymentAlertList).withOption('fnRowCallback',function(nRow, aData, iDisplayIndex){
          $("td:first", nRow).html(iDisplayIndex +1);
          return nRow;
        }).withOption('processing', true);

       
        $scope.dtColumns = [];

        $scope.dtColumns = [

            DTColumnBuilder.newColumn(null).withTitle('#').withOption('title','#','defaultContent', ' '),
            DTColumnBuilder.newColumn(null).withTitle('School Code').withOption('title','School Code').renderWith(function (data, type, full, meta){ return '<a target="_blank" href="school-order-tracking?round='+round+'&school='+full.schoolCode+'">'+full.schoolCode+'</a>';}),
            DTColumnBuilder.newColumn('schoolName').withTitle('School Name').withOption('title','School Name'),
            DTColumnBuilder.newColumn('schoolCity').withTitle('City').withOption('title','City'),
            DTColumnBuilder.newColumn('schoolRegion').withTitle('Region').withOption('title','Region'),
            DTColumnBuilder.newColumn('schoolAmountPayable').withTitle('Amount Payable').withOption('title','Amount Payable'),
            DTColumnBuilder.newColumn('schoolAmountPaid').withTitle('Amount Paid').withOption('title','Amount Paid'),
            DTColumnBuilder.newColumn('schoolPercentagePaid').withTitle('(%) Paid').withOption('title','(%) Paid'),
            DTColumnBuilder.newColumn('schoolAmountDifference').withTitle('Pending Amount').withOption('title','Pending Amount')
            ];  


            $('#ppPreTestDynamicTable').removeClass('hide');

            //$scope.dtInstance.rerender();

            $location.path('/dashboard-pppretest');

            $(window).scrollTop($('#ppPreTestDynamicTable').offset().top);

      }
      
    }
  });  

};

$scope.showSchoolPackLabelDateSet = function(e){

  destroy();  

  $scope.schoolPackLabelDateSetList = [];

  var round = $('#pppretest_dashboard_round').val();
  var zone = $('#pppretest_dashboard_zone').val();

  var data = {round: round,zone:zone,region:region,category:category,username:username};
  data = JSON.stringify(data);

    $.ajax({
    url: './api/dashboard/pppretestDashboardSchoolPackLabelDateSet',
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

        
        jQuery.each( response.packlabeldate_set, function( i, val ) {
          $scope.schoolPackLabelDateSetList.push({
            schoolCode: val.school_code,
            schoolName: val.schoolname,
            schoolCity: val.city,
            schoolRegion: val.region,
            schoolSSFDate: val.SSF_date,
            schoolPacklabelDate: val.pack_label_date,
            schoolPercentagePaid: val.percentage_paid,
          });
        });

        $scope.dtOptions = DTOptionsBuilder.newOptions().withOption('data', $scope.schoolPackLabelDateSetList).withOption('fnRowCallback',function(nRow, aData, iDisplayIndex){
          $("td:first", nRow).html(iDisplayIndex +1);
          return nRow;
        }).withOption('processing', true);

       
        $scope.dtColumns = [];

        $scope.dtColumns = [

            DTColumnBuilder.newColumn(null).withTitle('#').withOption('title','#','defaultContent', ' '),
            DTColumnBuilder.newColumn(null).withTitle('School Code').withOption('title','School Code').renderWith(function (data, type, full, meta){ return '<a target="_blank" href="school-order-tracking?round='+round+'&school='+full.schoolCode+'">'+full.schoolCode+'</a>';}),
            DTColumnBuilder.newColumn('schoolName').withTitle('School Name').withOption('title','School Name'),
            DTColumnBuilder.newColumn('schoolCity').withTitle('City').withOption('title','City'),
            DTColumnBuilder.newColumn('schoolRegion').withTitle('Region').withOption('title','Region'),
            DTColumnBuilder.newColumn('schoolSSFDate').withTitle('SSF Date').withOption('title','SSF Date'),
            DTColumnBuilder.newColumn('schoolPacklabelDate').withTitle('Pack Label Date').withOption('title','Pack Label Date'),
            DTColumnBuilder.newColumn('schoolPercentagePaid').withTitle('(%) Paid').withOption('title','(%) Paid'),
            ];  


            $('#ppPreTestDynamicTable').removeClass('hide');

            //$scope.dtInstance.rerender();

            $location.path('/dashboard-pppretest');

            $(window).scrollTop($('#ppPreTestDynamicTable').offset().top);

      }
      
    }
  });

};

$scope.showSchoolPackLabelDateNotSet = function(e){

  destroy();  

  $scope.schoolPackLabelDateNotSetList = [];

  var round = $('#pppretest_dashboard_round').val();
  var zone = $('#pppretest_dashboard_zone').val();

  var data = {round: round,zone:zone,region:region,category:category,username:username};
  data = JSON.stringify(data);

    $.ajax({
    url: './api/dashboard/pppretestDashboardSchoolPackLabelDateNotSet',
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

        
        jQuery.each( response.packlabeldate_notset, function( i, val ) {
          $scope.schoolPackLabelDateNotSetList.push({
            schoolCode: val.school_code,
            schoolName: val.schoolname,
            schoolCity: val.city,
            schoolRegion: val.region,
            schoolSSFDate: val.SSF_date,
            schoolPacklabelDate: val.pack_label_date,
            schoolPercentagePaid: val.percentage_paid,
          });
        });

        $scope.dtOptions = DTOptionsBuilder.newOptions().withOption('data', $scope.schoolPackLabelDateNotSetList).withOption('fnRowCallback',function(nRow, aData, iDisplayIndex){
          $("td:first", nRow).html(iDisplayIndex +1);
          return nRow;
        }).withOption('processing', true);

       
        $scope.dtColumns = [];

        $scope.dtColumns = [

            DTColumnBuilder.newColumn(null).withTitle('#').withOption('title','#','defaultContent', ' '),
            DTColumnBuilder.newColumn(null).withTitle('School Code').withOption('title','School Code').renderWith(function (data, type, full, meta){ return '<a target="_blank" href="school-order-tracking?round='+round+'&school='+full.schoolCode+'">'+full.schoolCode+'</a>';}),
            DTColumnBuilder.newColumn('schoolName').withTitle('School Name').withOption('title','School Name'),
            DTColumnBuilder.newColumn('schoolCity').withTitle('City').withOption('title','City'),
            DTColumnBuilder.newColumn('schoolRegion').withTitle('Region').withOption('title','Region'),
            DTColumnBuilder.newColumn('schoolSSFDate').withTitle('SSF Date').withOption('title','SSF Date'),
            DTColumnBuilder.newColumn('schoolPacklabelDate').withTitle('Pack Label Date').withOption('title','Pack Label Date'),
            DTColumnBuilder.newColumn('schoolPercentagePaid').withTitle('(%) Paid').withOption('title','(%) Paid'),
            ];  


            $('#ppPreTestDynamicTable').removeClass('hide');

            //$scope.dtInstance.rerender();

            $location.path('/dashboard-pppretest');

            $(window).scrollTop($('#ppPreTestDynamicTable').offset().top);

      }
      
    }
  });

};

$scope.showSchoolPackLabelDateAlert = function(e){

  destroy();  

  $scope.schoolPackLabelDateAlertList = [];

  var round = $('#pppretest_dashboard_round').val();
  var zone = $('#pppretest_dashboard_zone').val();

  var data = {round: round,zone:zone,region:region,category:category,username:username};
  data = JSON.stringify(data);

    $.ajax({
    url: './api/dashboard/pppretestDashboardSchoolPackLabelDateAlert',
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

        
        jQuery.each( response.packlabeldate_alert, function( i, val ) {
          $scope.schoolPackLabelDateAlertList.push({
            schoolCode: val.school_code,
            schoolName: val.schoolname,
            schoolCity: val.city,
            schoolRegion: val.region,
            schoolSSFDate: val.SSF_date,
            schoolPacklabelDate: val.pack_label_date,
            schoolPercentagePaid: val.percentage_paid,
          });
        });

        $scope.dtOptions = DTOptionsBuilder.newOptions().withOption('data', $scope.schoolPackLabelDateAlertList).withOption('fnRowCallback',function(nRow, aData, iDisplayIndex){
          $("td:first", nRow).html(iDisplayIndex +1);
          return nRow;
        }).withOption('processing', true);

       
        $scope.dtColumns = [];

        $scope.dtColumns = [

            DTColumnBuilder.newColumn(null).withTitle('#').withOption('title','#','defaultContent', ' '),
            DTColumnBuilder.newColumn(null).withTitle('School Code').withOption('title','School Code').renderWith(function (data, type, full, meta){ return '<a target="_blank" href="school-order-tracking?round='+round+'&school='+full.schoolCode+'">'+full.schoolCode+'</a>';}),
            DTColumnBuilder.newColumn('schoolName').withTitle('School Name').withOption('title','School Name'),
            DTColumnBuilder.newColumn('schoolCity').withTitle('City').withOption('title','City'),
            DTColumnBuilder.newColumn('schoolRegion').withTitle('Region').withOption('title','Region'),
            DTColumnBuilder.newColumn('schoolSSFDate').withTitle('SSF Date').withOption('title','SSF Date'),
            DTColumnBuilder.newColumn('schoolPacklabelDate').withTitle('Pack Label Date').withOption('title','Pack Label Date'),
            DTColumnBuilder.newColumn('schoolPercentagePaid').withTitle('(%) Paid').withOption('title','(%) Paid'),
            ];  


            $('#ppPreTestDynamicTable').removeClass('hide');

            //$scope.dtInstance.rerender();

            $location.path('/dashboard-pppretest');

            $(window).scrollTop($('#ppPreTestDynamicTable').offset().top);

      }
      
    }
  });

};

$scope.showSchoolDispatchDateSet = function(e){

  destroy();  

  $scope.schoolDispatchDateSetList = [];

  var round = $('#pppretest_dashboard_round').val();
  var zone = $('#pppretest_dashboard_zone').val();

  var data = {round: round,zone:zone,region:region,category:category,username:username};
  data = JSON.stringify(data);

    $.ajax({
    url: './api/dashboard/pppretestDashboardSchoolDispatchDateSet',
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

        
        jQuery.each( response.dispatchdate_set_list, function( i, val ) {
          $scope.schoolDispatchDateSetList.push({
            schoolCode: val.school_code,
            schoolName: val.schoolname,
            schoolCity: val.city,
            schoolRegion: val.region,
            schoolSSFDate: val.SSF_date,
            schoolPacklabelDate: val.pack_label_date,
            schoolDispatchDate: val.qb_despatch_date,
            schoolAWBNo: val.consignmentNo,
            schoolCourierCompany: val.courier,
          });
        });

        $scope.dtOptions = DTOptionsBuilder.newOptions().withOption('data', $scope.schoolDispatchDateSetList).withOption('fnRowCallback',function(nRow, aData, iDisplayIndex){
          $("td:first", nRow).html(iDisplayIndex +1);
          return nRow;
        }).withOption('processing', true);

       
        $scope.dtColumns = [];

        $scope.dtColumns = [

            DTColumnBuilder.newColumn(null).withTitle('#').withOption('title','#','defaultContent', ' '),
            DTColumnBuilder.newColumn(null).withTitle('School Code').withOption('title','School Code').renderWith(function (data, type, full, meta){ return '<a target="_blank" href="school-order-tracking?round='+round+'&school='+full.schoolCode+'">'+full.schoolCode+'</a>';}),
            DTColumnBuilder.newColumn('schoolName').withTitle('School Name').withOption('title','School Name'),
            DTColumnBuilder.newColumn('schoolCity').withTitle('City').withOption('title','City'),
            DTColumnBuilder.newColumn('schoolRegion').withTitle('Region').withOption('title','Region'),
            DTColumnBuilder.newColumn('schoolSSFDate').withTitle('SSF Date').withOption('title','SSF Date'),
            DTColumnBuilder.newColumn('schoolPacklabelDate').withTitle('Pack Label Date').withOption('title','Pack Label Date'),
            DTColumnBuilder.newColumn('schoolDispatchDate').withTitle('Dispatch Date').withOption('title','Dispatch Date'),
            DTColumnBuilder.newColumn('schoolAWBNo').withTitle('AWB No.').withOption('title','AWB No.'),
            DTColumnBuilder.newColumn('schoolCourierCompany').withTitle('Courier Company').withOption('title','Courier Company'),
            ];  


            $('#ppPreTestDynamicTable').removeClass('hide');

            //$scope.dtInstance.rerender();

            $location.path('/dashboard-pppretest');

            $(window).scrollTop($('#ppPreTestDynamicTable').offset().top);

      }
      
    }
  });

};

$scope.showSchoolDispatchDateNotSet = function(e){

  destroy();  

  $scope.schoolDispatchDateNotSetList = [];

  var round = $('#pppretest_dashboard_round').val();
  var zone = $('#pppretest_dashboard_zone').val();

  var data = {round: round,zone:zone,region:region,category:category,username:username};
  data = JSON.stringify(data);

    $.ajax({
    url: './api/dashboard/pppretestDashboardSchoolDispatchDateNotSet',
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

        
        jQuery.each( response.dispatchdate_notset_list, function( i, val ) {
          $scope.schoolDispatchDateNotSetList.push({
            schoolCode: val.school_code,
            schoolName: val.schoolname,
            schoolCity: val.city,
            schoolRegion: val.region,
            schoolpacklabelDate: val.packlabel_date,
          });
        });

        $scope.dtOptions = DTOptionsBuilder.newOptions().withOption('data', $scope.schoolDispatchDateNotSetList).withOption('fnRowCallback',function(nRow, aData, iDisplayIndex){
          $("td:first", nRow).html(iDisplayIndex +1);
          return nRow;
        }).withOption('processing', true);

       
        $scope.dtColumns = [];

        $scope.dtColumns = [

            DTColumnBuilder.newColumn(null).withTitle('#').withOption('title','#','defaultContent', ' '),
            DTColumnBuilder.newColumn(null).withTitle('School Code').withOption('title','School Code').renderWith(function (data, type, full, meta){ return '<a target="_blank" href="school-order-tracking?round='+round+'&school='+full.schoolCode+'">'+full.schoolCode+'</a>';}),
            DTColumnBuilder.newColumn('schoolName').withTitle('School Name').withOption('title','School Name'),
            DTColumnBuilder.newColumn('schoolCity').withTitle('City').withOption('title','City'),
            DTColumnBuilder.newColumn('schoolRegion').withTitle('Region').withOption('title','Region'),
            DTColumnBuilder.newColumn('schoolpacklabelDate').withTitle('Pack Label Date').withOption('title','Pack Label Date'),
            ];  


            $('#ppPreTestDynamicTable').removeClass('hide');

            //$scope.dtInstance.rerender();

            $location.path('/dashboard-pppretest');

            $(window).scrollTop($('#ppPreTestDynamicTable').offset().top);

      }
      
    }
  });

};

$scope.showSchoolDispatchDateAlert = function(e){

  destroy();  

  $scope.schoolDispatchDateAlertList = [];

  var round = $('#pppretest_dashboard_round').val();
  var zone = $('#pppretest_dashboard_zone').val();

  var data = {round: round,zone:zone,region:region,category:category,username:username};
  data = JSON.stringify(data);

    $.ajax({
    url: './api/dashboard/pppretestDashboardSchoolDispatchDateAlert',
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

        
        jQuery.each( response.dispatchdate_alert_list, function( i, val ) {
          $scope.schoolDispatchDateAlertList.push({
            schoolCode: val.school_code,
            schoolName: val.schoolname,
            schoolCity: val.city,
            schoolRegion: val.region,
            schoolpacklabelDate: val.packlabel_date,
          });
        });

        $scope.dtOptions = DTOptionsBuilder.newOptions().withOption('data', $scope.schoolDispatchDateAlertList).withOption('fnRowCallback',function(nRow, aData, iDisplayIndex){
          $("td:first", nRow).html(iDisplayIndex +1);
          return nRow;
        }).withOption('processing', true);

       
        $scope.dtColumns = [];

        $scope.dtColumns = [

            DTColumnBuilder.newColumn(null).withTitle('#').withOption('title','#','defaultContent', ' '),
            DTColumnBuilder.newColumn(null).withTitle('School Code').withOption('title','School Code').renderWith(function (data, type, full, meta){ return '<a target="_blank" href="school-order-tracking?round='+round+'&school='+full.schoolCode+'">'+full.schoolCode+'</a>';}),
            DTColumnBuilder.newColumn('schoolName').withTitle('School Name').withOption('title','School Name'),
            DTColumnBuilder.newColumn('schoolCity').withTitle('City').withOption('title','City'),
            DTColumnBuilder.newColumn('schoolRegion').withTitle('Region').withOption('title','Region'),
            DTColumnBuilder.newColumn('schoolpacklabelDate').withTitle('Pack Label Date').withOption('title','Pack Label Date'),
            ];  


            $('#ppPreTestDynamicTable').removeClass('hide');

            //$scope.dtInstance.rerender();

            $location.path('/dashboard-pppretest');

            $(window).scrollTop($('#ppPreTestDynamicTable').offset().top);

      }
      
    }
  });

};

$scope.showSchoolDeilveryDateSet = function(e){

  destroy();  

  $scope.schoolDeliveryDateSetList = [];

  var round = $('#pppretest_dashboard_round').val();
  var zone = $('#pppretest_dashboard_zone').val();

  var data = {round: round,zone:zone,region:region,category:category,username:username};
  data = JSON.stringify(data);

    $.ajax({
    url: './api/dashboard/pppretestDashboardSchoolDeliveryDateSet',
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

        
        jQuery.each( response.deliverydate_set_list, function( i, val ) {
          $scope.schoolDeliveryDateSetList.push({
            schoolCode: val.school_code,
            schoolName: val.schoolname,
            schoolCity: val.city,
            schoolRegion: val.region,
            schoolDeliveryDate: val.qb_delivery_date,
            schoolDeliveryStatus: val.qb_delivery_status,
          });
        });

        $scope.dtOptions = DTOptionsBuilder.newOptions().withOption('data', $scope.schoolDeliveryDateSetList).withOption('fnRowCallback',function(nRow, aData, iDisplayIndex){
          $("td:first", nRow).html(iDisplayIndex +1);
          return nRow;
        }).withOption('processing', true);

       
        $scope.dtColumns = [];

        $scope.dtColumns = [

            DTColumnBuilder.newColumn(null).withTitle('#').withOption('title','#','defaultContent', ' '),
            DTColumnBuilder.newColumn(null).withTitle('School Code').withOption('title','School Code').renderWith(function (data, type, full, meta){ return '<a target="_blank" href="school-order-tracking?round='+round+'&school='+full.schoolCode+'">'+full.schoolCode+'</a>';}),
            DTColumnBuilder.newColumn('schoolName').withTitle('School Name').withOption('title','School Name'),
            DTColumnBuilder.newColumn('schoolCity').withTitle('City').withOption('title','City'),
            DTColumnBuilder.newColumn('schoolRegion').withTitle('Region').withOption('title','Region'),
            DTColumnBuilder.newColumn('schoolDeliveryDate').withTitle('Delivery Date').withOption('title','Delivery Date'),
            DTColumnBuilder.newColumn('schoolDeliveryStatus').withTitle('Delivery Status').withOption('title','Delivery Status'),
            ];  


            $('#ppPreTestDynamicTable').removeClass('hide');

            //$scope.dtInstance.rerender();

            $location.path('/dashboard-pppretest');

            $(window).scrollTop($('#ppPreTestDynamicTable').offset().top);

      }
      
    }
  });

};


$scope.showSchoolDeilveryDateNotSet = function(e){

  destroy();  

  $scope.schoolDeliveryDateNotSetList = [];

  var round = $('#pppretest_dashboard_round').val();
  var zone = $('#pppretest_dashboard_zone').val();

  var data = {round: round,zone:zone,region:region,category:category,username:username};
  data = JSON.stringify(data);

    $.ajax({
    url: './api/dashboard/pppretestDashboardSchoolDeliveryDateNotSet',
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

        
        jQuery.each( response.deliverydate_notset_list, function( i, val ) {
          $scope.schoolDeliveryDateNotSetList.push({
            schoolCode: val.school_code,
            schoolName: val.schoolname,
            schoolCity: val.city,
            schoolRegion: val.region,
            schoolDispatchDate: val.qb_despatch_date,
          });
        });

        $scope.dtOptions = DTOptionsBuilder.newOptions().withOption('data', $scope.schoolDeliveryDateNotSetList).withOption('fnRowCallback',function(nRow, aData, iDisplayIndex){
          $("td:first", nRow).html(iDisplayIndex +1);
          return nRow;
        }).withOption('processing', true);

       
        $scope.dtColumns = [];

        $scope.dtColumns = [

            DTColumnBuilder.newColumn(null).withTitle('#').withOption('title','#','defaultContent', ' '),
            DTColumnBuilder.newColumn(null).withTitle('School Code').withOption('title','School Code').renderWith(function (data, type, full, meta){ return '<a target="_blank" href="school-order-tracking?round='+round+'&school='+full.schoolCode+'">'+full.schoolCode+'</a>';}),
            DTColumnBuilder.newColumn('schoolName').withTitle('School Name').withOption('title','School Name'),
            DTColumnBuilder.newColumn('schoolCity').withTitle('City').withOption('title','City'),
            DTColumnBuilder.newColumn('schoolRegion').withTitle('Region').withOption('title','Region'),
            DTColumnBuilder.newColumn('schoolDispatchDate').withTitle('Dispatch Date').withOption('title','Dispatch Date'),
            ];  


            $('#ppPreTestDynamicTable').removeClass('hide');

            //$scope.dtInstance.rerender();

            $location.path('/dashboard-pppretest');

            $(window).scrollTop($('#ppPreTestDynamicTable').offset().top);

      }
      
    }
  });

};


$scope.showSchoolDeilveryDateAlert = function(e){

  destroy();  

  $scope.schoolDeliveryDateAlertList = [];

  var round = $('#pppretest_dashboard_round').val();
  var zone = $('#pppretest_dashboard_zone').val();

  var data = {round: round,zone:zone,region:region,category:category,username:username};
  data = JSON.stringify(data);

    $.ajax({
    url: './api/dashboard/pppretestDashboardSchoolDeliveryDateAlert',
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

        
        jQuery.each( response.deliverydate_alert_list, function( i, val ) {
          $scope.schoolDeliveryDateAlertList.push({
            schoolCode: val.school_code,
            schoolName: val.schoolname,
            schoolCity: val.city,
            schoolRegion: val.region,
            schoolDispatchDate: val.qb_despatch_date,
          });
        });

        $scope.dtOptions = DTOptionsBuilder.newOptions().withOption('data', $scope.schoolDeliveryDateAlertList).withOption('fnRowCallback',function(nRow, aData, iDisplayIndex){
          $("td:first", nRow).html(iDisplayIndex +1);
          return nRow;
        }).withOption('processing', true);

       
        $scope.dtColumns = [];

        $scope.dtColumns = [

            DTColumnBuilder.newColumn(null).withTitle('#').withOption('title','#','defaultContent', ' '),
            DTColumnBuilder.newColumn(null).withTitle('School Code').withOption('title','School Code').renderWith(function (data, type, full, meta){ return '<a target="_blank" href="school-order-tracking?round='+round+'&school='+full.schoolCode+'">'+full.schoolCode+'</a>';}),
            DTColumnBuilder.newColumn('schoolName').withTitle('School Name').withOption('title','School Name'),
            DTColumnBuilder.newColumn('schoolCity').withTitle('City').withOption('title','City'),
            DTColumnBuilder.newColumn('schoolRegion').withTitle('Region').withOption('title','Region'),
            DTColumnBuilder.newColumn('schoolDispatchDate').withTitle('Dispatch Date').withOption('title','Dispatch Date'),
            ];  


            $('#ppPreTestDynamicTable').removeClass('hide');

            //$scope.dtInstance.rerender();

            $location.path('/dashboard-pppretest');

            $(window).scrollTop($('#ppPreTestDynamicTable').offset().top);

      }
      
    }
  });

};



});

app.controller('DashboardPenAndPaperPostTestController', function($rootScope,$scope,$http,$routeParams,DTOptionsBuilder, DTColumnBuilder, DTColumnDefBuilder,$location,$window,$route){

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

  var region = getCookie('loginuserregion');
  var category = getCookie('loginusercategory');
  var username = getCookie('loginuserlogname');

$scope.dtInstance = {};

function destroy() {
    angular.element('#schoollist-table').children('thead').children().remove();
    angular.element('#schoollist-table').children('tbody').children().remove(); 
    angular.element('#schoollist-table').empty();
}

  $scope.schoolRegisteredList = [];

  $scope.schoolRegisteredList.push({
    schoolCode: 0,
    schoolName: 0,
    schoolCity: 0,
    schoolRegion: 0,
    schoolSSFDate: 0,
    schoolAmountPayable: 0,
    schoolAmountPaid: 0,
    schoolPercentagePaid: 0,
    schoolAmountDifference: 0,
  });
  

  $scope.dtOptions = DTOptionsBuilder.newOptions().withOption('data', $scope.schoolRegisteredList).withOption('fnRowCallback',function(nRow, aData, iDisplayIndex){
    $("td:first", nRow).html(iDisplayIndex +1);
    return nRow;
  }).withOption('processing', true);

  $scope.dtColumns = [

      DTColumnBuilder.newColumn(null).withTitle('#').withOption('title','#','defaultContent', ' '),
      DTColumnBuilder.newColumn('schoolCode').withTitle('School Code').withOption('title','School Code'),
      DTColumnBuilder.newColumn('schoolName').withTitle('School Name').withOption('title','School Name'),
      DTColumnBuilder.newColumn('schoolCity').withTitle('City').withOption('title','City'),
      DTColumnBuilder.newColumn('schoolRegion').withTitle('Region').withOption('title','Region'),
      DTColumnBuilder.newColumn('schoolSSFDate').withTitle('SSF Date').withOption('title','SSF Date'),
      DTColumnBuilder.newColumn('schoolAmountPayable').withTitle('Amount Payable').withOption('title','Amount Payable'),
      DTColumnBuilder.newColumn('schoolAmountPaid').withTitle('Amount Paid').withOption('title','Amount Paid'),
      DTColumnBuilder.newColumn('schoolPercentagePaid').withTitle('(%) Paid').withOption('title','(%) Paid'),
      DTColumnBuilder.newColumn('schoolAmountDifference').withTitle('Pending Amount').withOption('title','Pending Amount'),
      ];  



  $scope.rounds = [];
  
  $scope.zones = [];

  $scope.ssfCount = '0';

  $scope.ssfRecievedCount = '0';

  $scope.paymentRecieved = '0';

  var round = $('#ppposttest_dashboard_round').val();
  var zone = $('#ppposttest_dashboard_zone').val();

  var data = {zone: zone,region:region,category:category,username:username};
  data = JSON.stringify(data);

    $.ajax({
    url: './api/dashboard/ppposttestDashboard',
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
        
        $scope.roundSelected = response.round_selected;
        $scope.roundDescription = response.round_description;
        $scope.zones = response.zones;
        $scope.rounds = response.rounds;
        $scope.ssfCount = response.school_registered[0]['ssfcount'];
        $scope.qbDeliveryCompletedCount = response.qb_delivered_completed_schools[0]['deliverysetcount'];
        $scope.qbDeliveryPendingCount = response.qb_delivered_pending_schools[0]['deliverynotsetcount'];
        $scope.qbDeliveryAlertCount = response.qb_delivered_alert_schools[0]['deliveryalertcount'];
        $scope.omrReceivedCount = response.omr_recieved_count[0]['omrrecievedcount'];
        $scope.omrPendingCount = response.omr_pending_count[0]['omrpendingcount'];
        $scope.omrAlertCount = response.omr_alert_count[0]['omralertcount'];
        $scope.omrGotfromscanningReceivedCount = response.omr_gotfromscanning_recieved_count[0]['omrgotfromscanningrecievedcount'];
        $scope.omrGotfromscanningPendingCount = response.omr_gotfromscanning_pending_count[0]['omrgotfromscanningpendingcount'];
        $scope.omrGotfromscanningAlertCount = response.omr_gotfromscanning_alert_count[0]['omrgotfromscanningalertcount'];
        $scope.omrNamecheckCompletedCount = response.omr_namecheckstatus_completed_count[0]['omrgotfromnamecheckcompletedcount'];
        $scope.omrNamecheckPendingCount = response.omr_namecheckstatus_pending_count[0]['omrgotfromnamecheckpendingcount'];
        $scope.omrNamecheckAlertCount = response.omr_namecheckstatus_alert_count[0]['omrgotfromnamecheckalertcount'];
        $scope.omrScoreingCompletedCount = response.omr_scoreing_completed_count[0]['omrscoreingcompletedcount'];
        $scope.omrScoreingPendingCount = response.omr_scoreing_pending_count[0]['omrscoreingpendingcount'];
        $scope.omrScoreingAlertCount = response.omr_scoreing_alert_count[0]['omrscoreingalertcount'];
        $scope.omrReportGeneratedCompletedCount = response.omr_reportgenerated_completed_count[0]['omrreportgeneratedcompletedcount'];
        $scope.omrReportGeneratedPendingCount = response.omr_reportgenerated_pending_count[0]['omrreportgeneratedpendingcount'];
        $scope.omrReportGeneratedAlertCount = response.omr_reportgenerated_alert_count[0]['omrreportgeneratedalertcount'];
        $scope.omrReportDispatchEiCompletedCount = response.omr_report_dispatch_ei_completed_count[0]['omrreportdisptcheicompletedcount'];
        $scope.omrReportDispatchEiPendingCount = response.omr_report_dispatch_ei_pending_count[0]['omrreportdisptcheipendingcount'];
        $scope.omrReportDispatchEiAlertCount = response.omr_report_dispatch_ei_alert_count[0]['omrreportdisptcheialertcount'];
        $scope.omrReportDispatchCompletedCount = response.omr_report_dispatch_completed_count[0]['omrreportdisptchcompletedcount'];
        $scope.omrReportDispatchPendingCount = response.omr_report_dispatch_pending_count[0]['omrreportdisptchpendingcount'];
        $scope.omrReportDispatchAlertCount = response.omr_report_dispatch_alert_count[0]['omrreportdisptchalertcount'];
        $scope.omrReportDeliveryCompletedCount = response.omr_report_delivery_completed_count[0]['omrreportdeliverycompletedcount'];
        $scope.omrReportDeliveryPendingCount = response.omr_report_delivery_pending_count[0]['omrreportdeliverypendingcount'];
        $scope.omrReportDeliveryAlertCount = response.omr_report_delivery_alert_count[0]['omrreportdeliveryalertcount'];
     
      }
      
    }
  });

  $scope.filterPpPosttestDashboardData = function(e){

    $('#overlay').show();

    destroy();

    $('#ppPostTestDynamicTable').addClass('hide');

    $scope.ssfCount = '0';

    $scope.ssfRecievedCount = '0';

    $scope.paymentRecieved = '0';

    var round = $('#ppposttest_dashboard_round').val();
    var zone = $('#ppposttest_dashboard_zone').val();

    var data = {round: round,zone:zone,region:region,category:category,username:username};
    data = JSON.stringify(data);

      $.ajax({
      url: './api/dashboard/ppposttestDashboardFilter',
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
          
          $scope.roundDescription = response.round_description;
          $scope.ssfCount = response.school_registered[0]['ssfcount'];
          $scope.qbDeliveryCompletedCount = response.qb_delivered_completed_schools[0]['deliverysetcount'];
          $scope.qbDeliveryPendingCount = response.qb_delivered_pending_schools[0]['deliverynotsetcount'];
          $scope.qbDeliveryAlertCount = response.qb_delivered_alert_schools[0]['deliveryalertcount'];
          $scope.omrReceivedCount = response.omr_recieved_count[0]['omrrecievedcount'];
          $scope.omrPendingCount = response.omr_pending_count[0]['omrpendingcount'];
          $scope.omrAlertCount = response.omr_alert_count[0]['omralertcount'];
          $scope.omrGotfromscanningReceivedCount = response.omr_gotfromscanning_recieved_count[0]['omrgotfromscanningrecievedcount'];
          $scope.omrGotfromscanningPendingCount = response.omr_gotfromscanning_pending_count[0]['omrgotfromscanningpendingcount'];
          $scope.omrGotfromscanningAlertCount = response.omr_gotfromscanning_alert_count[0]['omrgotfromscanningalertcount'];
          $scope.omrNamecheckCompletedCount = response.omr_namecheckstatus_completed_count[0]['omrgotfromnamecheckcompletedcount'];
          $scope.omrNamecheckPendingCount = response.omr_namecheckstatus_pending_count[0]['omrgotfromnamecheckpendingcount'];
          $scope.omrNamecheckAlertCount = response.omr_namecheckstatus_alert_count[0]['omrgotfromnamecheckalertcount'];
          $scope.omrScoreingCompletedCount = response.omr_scoreing_completed_count[0]['omrscoreingcompletedcount'];
          $scope.omrScoreingPendingCount = response.omr_scoreing_pending_count[0]['omrscoreingpendingcount'];
          $scope.omrScoreingAlertCount = response.omr_scoreing_alert_count[0]['omrscoreingalertcount'];
          $scope.omrReportGeneratedCompletedCount = response.omr_reportgenerated_completed_count[0]['omrreportgeneratedcompletedcount'];
          $scope.omrReportGeneratedPendingCount = response.omr_reportgenerated_pending_count[0]['omrreportgeneratedpendingcount'];
          $scope.omrReportGeneratedAlertCount = response.omr_reportgenerated_alert_count[0]['omrreportgeneratedalertcount'];
          $scope.omrReportDispatchEiCompletedCount = response.omr_report_dispatch_ei_completed_count[0]['omrreportdisptcheicompletedcount'];
          $scope.omrReportDispatchEiPendingCount = response.omr_report_dispatch_ei_pending_count[0]['omrreportdisptcheipendingcount'];
          $scope.omrReportDispatchEiAlertCount = response.omr_report_dispatch_ei_alert_count[0]['omrreportdisptcheialertcount'];
          $scope.omrReportDispatchCompletedCount = response.omr_report_dispatch_completed_count[0]['omrreportdisptchcompletedcount'];
          $scope.omrReportDispatchPendingCount = response.omr_report_dispatch_pending_count[0]['omrreportdisptchpendingcount'];
          $scope.omrReportDispatchAlertCount = response.omr_report_dispatch_alert_count[0]['omrreportdisptchalertcount'];
          $scope.omrReportDeliveryCompletedCount = response.omr_report_delivery_completed_count[0]['omrreportdeliverycompletedcount'];
          $scope.omrReportDeliveryPendingCount = response.omr_report_delivery_pending_count[0]['omrreportdeliverypendingcount'];
          $scope.omrReportDeliveryAlertCount = response.omr_report_delivery_alert_count[0]['omrreportdeliveryalertcount'];

          $location.path('/dashboard-ppposttest');

          setTimeout(function(){ $('#overlay').hide(); },2000);
          
        }
        
      }
    });
  };

  $scope.showSchoolRegistered = function(e){

  destroy();

  $scope.schoolRegisteredList = [];

  var round = $('#ppposttest_dashboard_round').val();
  var zone = $('#ppposttest_dashboard_zone').val();

  var data = {round: round,zone:zone,region:region,category:category,username:username};
  data = JSON.stringify(data);

    $.ajax({
    url: './api/dashboard/pppretestDashboardSchoolRegistered',
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

        
        jQuery.each( response.school_registered, function( i, val ) {
          $scope.schoolRegisteredList.push({
            schoolCode: val.school_code,
            schoolName: val.schoolname,
            schoolCity: val.city,
            schoolRegion: val.region,
            schoolSSFNumber: val.ssf_number,
            schoolSSFDate: val.SSF_date,
            schoolAmountPayable: val.amount_payable,
            schoolAmountPaid: val.paid,
            schoolPercentagePaid: val.percentage_paid,
            schoolAmountDifference: val.difference,
          });
        });

        $scope.dtOptions = DTOptionsBuilder.newOptions().withOption('data', $scope.schoolRegisteredList).withOption('fnRowCallback',function(nRow, aData, iDisplayIndex){
          $("td:first", nRow).html(iDisplayIndex +1);
          return nRow;
        }).withOption('processing', true);

        $scope.dtColumns = [

            DTColumnBuilder.newColumn(null).withTitle('#').withOption('title','#','defaultContent', ' '),
            DTColumnBuilder.newColumn(null).withTitle('School Code').withOption('title','School Code').renderWith(function (data, type, full, meta){ return '<a target="_blank" href="school-order-tracking?round='+round+'&school='+full.schoolCode+'">'+full.schoolCode+'</a>';}),
            //DTColumnBuilder.newColumn('schoolCode').withTitle('School Code').withOption('title','School Code'),
            DTColumnBuilder.newColumn('schoolName').withTitle('School Name').withOption('title','School Name'),
            DTColumnBuilder.newColumn('schoolCity').withTitle('City').withOption('title','City'),
            DTColumnBuilder.newColumn('schoolRegion').withTitle('Region').withOption('title','Region'),
            DTColumnBuilder.newColumn('schoolSSFNumber').withTitle('SSF Number').withOption('title','SSF Number'),
            DTColumnBuilder.newColumn('schoolSSFDate').withTitle('SSF Date').withOption('title','SSF Date'),
            DTColumnBuilder.newColumn('schoolAmountPayable').withTitle('Amount Payable').withOption('title','Amount Payable'),
            DTColumnBuilder.newColumn('schoolAmountPaid').withTitle('Amount Paid').withOption('title','Amount Paid'),
            DTColumnBuilder.newColumn('schoolPercentagePaid').withTitle('(%) Paid').withOption('title','(%) Paid'),
            DTColumnBuilder.newColumn('schoolAmountDifference').withTitle('Pending Amount').withOption('title','Pending Amount'),
            ];  


            $('#ppPostTestDynamicTable').removeClass('hide');

            $(window).scrollTop($('#ppPostTestDynamicTable').offset().top);

      }
      
    }
  });

};

$scope.showSchoolDeilveryDateSet = function(e){

  destroy();  

  $scope.schoolDeliveryDateSetList = [];

  var round = $('#ppposttest_dashboard_round').val();
  var zone = $('#ppposttest_dashboard_zone').val();

  var data = {round: round,zone:zone,region:region,category:category,username:username};
  data = JSON.stringify(data);

    $.ajax({
    url: './api/dashboard/pppretestDashboardSchoolDeliveryDateSet',
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

        
        jQuery.each( response.deliverydate_set_list, function( i, val ) {
          $scope.schoolDeliveryDateSetList.push({
            schoolCode: val.school_code,
            schoolName: val.schoolname,
            schoolCity: val.city,
            schoolRegion: val.region,
            schoolDeliveryDate: val.qb_delivery_date,
            schoolDeliveryStatus: val.qb_delivery_status,
          });
        });

        $scope.dtOptions = DTOptionsBuilder.newOptions().withOption('data', $scope.schoolDeliveryDateSetList).withOption('fnRowCallback',function(nRow, aData, iDisplayIndex){
          $("td:first", nRow).html(iDisplayIndex +1);
          return nRow;
        }).withOption('processing', true);

       
        $scope.dtColumns = [];

        $scope.dtColumns = [

            DTColumnBuilder.newColumn(null).withTitle('#').withOption('title','#','defaultContent', ' '),
            DTColumnBuilder.newColumn(null).withTitle('School Code').withOption('title','School Code').renderWith(function (data, type, full, meta){ return '<a target="_blank" href="school-order-tracking?round='+round+'&school='+full.schoolCode+'">'+full.schoolCode+'</a>';}),
            DTColumnBuilder.newColumn('schoolName').withTitle('School Name').withOption('title','School Name'),
            DTColumnBuilder.newColumn('schoolCity').withTitle('City').withOption('title','City'),
            DTColumnBuilder.newColumn('schoolRegion').withTitle('Region').withOption('title','Region'),
            DTColumnBuilder.newColumn('schoolDeliveryDate').withTitle('Delivery Date').withOption('title','Delivery Date'),
            DTColumnBuilder.newColumn('schoolDeliveryStatus').withTitle('Delivery Status').withOption('title','Delivery Status'),
            ];  


            $('#ppPostTestDynamicTable').removeClass('hide');

            //$scope.dtInstance.rerender();

            $location.path('/dashboard-ppposttest');

            $(window).scrollTop($('#ppPostTestDynamicTable').offset().top);

      }
      
    }
  });

};


$scope.showSchoolDeilveryDateNotSet = function(e){

  destroy();  

  $scope.schoolDeliveryDateNotSetList = [];

  var round = $('#ppposttest_dashboard_round').val();
  var zone = $('#ppposttest_dashboard_zone').val();

  var data = {round: round,zone:zone,region:region,category:category,username:username};
  data = JSON.stringify(data);

    $.ajax({
    url: './api/dashboard/pppretestDashboardSchoolDeliveryDateNotSet',
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

        
        jQuery.each( response.deliverydate_notset_list, function( i, val ) {
          $scope.schoolDeliveryDateNotSetList.push({
            schoolCode: val.school_code,
            schoolName: val.schoolname,
            schoolCity: val.city,
            schoolRegion: val.region,
            schoolDispatchDate: val.qb_despatch_date,
          });
        });

        $scope.dtOptions = DTOptionsBuilder.newOptions().withOption('data', $scope.schoolDeliveryDateNotSetList).withOption('fnRowCallback',function(nRow, aData, iDisplayIndex){
          $("td:first", nRow).html(iDisplayIndex +1);
          return nRow;
        }).withOption('processing', true);

       
        $scope.dtColumns = [];

        $scope.dtColumns = [

            DTColumnBuilder.newColumn(null).withTitle('#').withOption('title','#','defaultContent', ' '),
            DTColumnBuilder.newColumn(null).withTitle('School Code').withOption('title','School Code').renderWith(function (data, type, full, meta){ return '<a target="_blank" href="school-order-tracking?round='+round+'&school='+full.schoolCode+'">'+full.schoolCode+'</a>';}),
            DTColumnBuilder.newColumn('schoolName').withTitle('School Name').withOption('title','School Name'),
            DTColumnBuilder.newColumn('schoolCity').withTitle('City').withOption('title','City'),
            DTColumnBuilder.newColumn('schoolRegion').withTitle('Region').withOption('title','Region'),
            DTColumnBuilder.newColumn('schoolDispatchDate').withTitle('Dispatch Date').withOption('title','Dispatch Date'),
            ];  


            $('#ppPostTestDynamicTable').removeClass('hide');

            //$scope.dtInstance.rerender();

            $location.path('/dashboard-ppposttest');

            $(window).scrollTop($('#ppPostTestDynamicTable').offset().top);

      }
      
    }
  });

};


$scope.showSchoolDeilveryDateAlert = function(e){

  destroy();  

  $scope.schoolDeliveryDateAlertList = [];

  var round = $('#ppposttest_dashboard_round').val();
  var zone = $('#ppposttest_dashboard_zone').val();

  var data = {round: round,zone:zone,region:region,category:category,username:username};
  data = JSON.stringify(data);

    $.ajax({
    url: './api/dashboard/pppretestDashboardSchoolDeliveryDateAlert',
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

        
        jQuery.each( response.deliverydate_alert_list, function( i, val ) {
          $scope.schoolDeliveryDateAlertList.push({
            schoolCode: val.school_code,
            schoolName: val.schoolname,
            schoolCity: val.city,
            schoolRegion: val.region,
            schoolDispatchDate: val.qb_despatch_date,
          });
        });

        $scope.dtOptions = DTOptionsBuilder.newOptions().withOption('data', $scope.schoolDeliveryDateAlertList).withOption('fnRowCallback',function(nRow, aData, iDisplayIndex){
          $("td:first", nRow).html(iDisplayIndex +1);
          return nRow;
        }).withOption('processing', true);

       
        $scope.dtColumns = [];

        $scope.dtColumns = [

            DTColumnBuilder.newColumn(null).withTitle('#').withOption('title','#','defaultContent', ' '),
            DTColumnBuilder.newColumn(null).withTitle('School Code').withOption('title','School Code').renderWith(function (data, type, full, meta){ return '<a target="_blank" href="school-order-tracking?round='+round+'&school='+full.schoolCode+'">'+full.schoolCode+'</a>';}),
            DTColumnBuilder.newColumn('schoolName').withTitle('School Name').withOption('title','School Name'),
            DTColumnBuilder.newColumn('schoolCity').withTitle('City').withOption('title','City'),
            DTColumnBuilder.newColumn('schoolRegion').withTitle('Region').withOption('title','Region'),
            DTColumnBuilder.newColumn('schoolDispatchDate').withTitle('Dispatch Date').withOption('title','Dispatch Date'),
            ];  


            $('#ppPostTestDynamicTable').removeClass('hide');

            //$scope.dtInstance.rerender();

            $location.path('/dashboard-ppposttest');

            $(window).scrollTop($('#ppPostTestDynamicTable').offset().top);

      }
      
    }
  });

};

$scope.showSchoolOMRReceived = function(e){

  destroy();

  $scope.schoolOMRReceivedList = [];

  var round = $('#ppposttest_dashboard_round').val();
  var zone = $('#ppposttest_dashboard_zone').val();

  var data = {round: round,zone:zone,region:region,category:category,username:username,type:'completed'};
  data = JSON.stringify(data);

    $.ajax({
    url: './api/dashboard/ppPostTestDashboardSchoolOmrList',
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

        
        jQuery.each( response.omr_list, function( i, val ) {
          $scope.schoolOMRReceivedList.push({
            schoolCode: val.school_code,
            schoolName: val.schoolname,
            schoolCity: val.city,
            schoolRegion: val.region,
            schoolOmrReceived: val.omr_received,
            schoolTotalOmr: val.totalPapers,
            schoolOmrReceiptDate: val.answers_date,
          });
        });

        $scope.dtOptions = DTOptionsBuilder.newOptions().withOption('data', $scope.schoolOMRReceivedList).withOption('fnRowCallback',function(nRow, aData, iDisplayIndex){
          $("td:first", nRow).html(iDisplayIndex +1);
          return nRow;
        }).withOption('processing', true);

        $scope.dtColumns = [

            DTColumnBuilder.newColumn(null).withTitle('#').withOption('title','#','defaultContent', ' '),
            DTColumnBuilder.newColumn(null).withTitle('School Code').withOption('title','School Code').renderWith(function (data, type, full, meta){ return '<a target="_blank" href="school-order-tracking?round='+round+'&school='+full.schoolCode+'">'+full.schoolCode+'</a>';}),
            DTColumnBuilder.newColumn('schoolName').withTitle('School Name').withOption('title','School Name'),
            DTColumnBuilder.newColumn('schoolCity').withTitle('City').withOption('title','City'),
            DTColumnBuilder.newColumn('schoolRegion').withTitle('Region').withOption('title','Region'),
            DTColumnBuilder.newColumn('schoolTotalOmr').withTitle('Total OMR').withOption('title','Total OMR'),
            DTColumnBuilder.newColumn('schoolOmrReceived').withTitle('OMR Received').withOption('title','OMR Received'),
            DTColumnBuilder.newColumn('schoolOmrReceiptDate').withTitle('OMR Receipt Date').withOption('title','OMR Receipt Date'),
            ];  


            $('#ppPostTestDynamicTable').removeClass('hide');

            $(window).scrollTop($('#ppPostTestDynamicTable').offset().top);

      }
      
    }
  });

};

$scope.showSchoolOMRPending = function(e){

  destroy();

  $scope.schoolOMRPendingList = [];

  var round = $('#ppposttest_dashboard_round').val();
  var zone = $('#ppposttest_dashboard_zone').val();

  var data = {round: round,zone:zone,region:region,category:category,username:username,type:'pending'};
  data = JSON.stringify(data);

    $.ajax({
    url: './api/dashboard/ppPostTestDashboardSchoolOmrList',
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

        jQuery.each( response.omr_list, function( i, val ) {
          $scope.schoolOMRPendingList.push({
            schoolCode: val.school_code,
            schoolName: val.schoolname,
            schoolCity: val.city,
            schoolRegion: val.region,
            schoolOmrReceived: val.omr_received,
            schoolTotalOmr: val.totalPapers,
            schoolOmrReceiptDate: val.answers_date,
          });
        });

        $scope.dtOptions = DTOptionsBuilder.newOptions().withOption('data', $scope.schoolOMRPendingList).withOption('fnRowCallback',function(nRow, aData, iDisplayIndex){
          $("td:first", nRow).html(iDisplayIndex +1);
          return nRow;
        }).withOption('processing', true);

        $scope.dtColumns = [

            DTColumnBuilder.newColumn(null).withTitle('#').withOption('title','#','defaultContent', ' '),
            DTColumnBuilder.newColumn(null).withTitle('School Code').withOption('title','School Code').renderWith(function (data, type, full, meta){ return '<a target="_blank" href="school-order-tracking?round='+round+'&school='+full.schoolCode+'">'+full.schoolCode+'</a>';}),
            DTColumnBuilder.newColumn('schoolName').withTitle('School Name').withOption('title','School Name'),
            DTColumnBuilder.newColumn('schoolCity').withTitle('City').withOption('title','City'),
            DTColumnBuilder.newColumn('schoolRegion').withTitle('Region').withOption('title','Region'),
            DTColumnBuilder.newColumn('schoolTotalOmr').withTitle('Total OMR').withOption('title','Total OMR'),
            DTColumnBuilder.newColumn('schoolOmrReceived').withTitle('OMR Received').withOption('title','OMR Received'),
            DTColumnBuilder.newColumn('schoolOmrReceiptDate').withTitle('OMR Receipt Date').withOption('title','OMR Receipt Date'),
            ];  


            $('#ppPostTestDynamicTable').removeClass('hide');

            $(window).scrollTop($('#ppPostTestDynamicTable').offset().top);

      }
      
    }
  });

};

$scope.showSchoolOMRAlert = function(e){

  destroy();

  $scope.schoolOMRAlertList = [];

  var round = $('#ppposttest_dashboard_round').val();
  var zone = $('#ppposttest_dashboard_zone').val();

  var data = {round: round,zone:zone,region:region,category:category,username:username,type:'alert'};
  data = JSON.stringify(data);

    $.ajax({
    url: './api/dashboard/ppPostTestDashboardSchoolOmrList',
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

        jQuery.each( response.omr_list, function( i, val ) {
          $scope.schoolOMRAlertList.push({
            schoolCode: val.school_code,
            schoolName: val.schoolname,
            schoolCity: val.city,
            schoolRegion: val.region,
            schoolQbDeliveryDate: val.qb_delivery_date,
          });
        });

        $scope.dtOptions = DTOptionsBuilder.newOptions().withOption('data', $scope.schoolOMRAlertList).withOption('fnRowCallback',function(nRow, aData, iDisplayIndex){
          $("td:first", nRow).html(iDisplayIndex +1);
          return nRow;
        }).withOption('processing', true);

        $scope.dtColumns = [

            DTColumnBuilder.newColumn(null).withTitle('#').withOption('title','#','defaultContent', ' '),
            DTColumnBuilder.newColumn(null).withTitle('School Code').withOption('title','School Code').renderWith(function (data, type, full, meta){ return '<a target="_blank" href="school-order-tracking?round='+round+'&school='+full.schoolCode+'">'+full.schoolCode+'</a>';}),
            DTColumnBuilder.newColumn('schoolName').withTitle('School Name').withOption('title','School Name'),
            DTColumnBuilder.newColumn('schoolCity').withTitle('City').withOption('title','City'),
            DTColumnBuilder.newColumn('schoolRegion').withTitle('Region').withOption('title','Region'),
            DTColumnBuilder.newColumn('schoolQbDeliveryDate').withTitle('QB Delivery Date').withOption('title','QB Delivery Date'),
            ];  


            $('#ppPostTestDynamicTable').removeClass('hide');

            $(window).scrollTop($('#ppPostTestDynamicTable').offset().top);

      }
      
    }
  });

};

$scope.showSchoolOMRGotFromScanningCompleted = function(e){

  destroy();

  $scope.schoolOMRGotFromScanningReceivedList = [];

  var round = $('#ppposttest_dashboard_round').val();
  var zone = $('#ppposttest_dashboard_zone').val();

  var data = {round: round,zone:zone,region:region,category:category,username:username,type:'completed'};
  data = JSON.stringify(data);

    $.ajax({
    url: './api/dashboard/ppPostTestDashboardSchoolOMRGotFromScanning',
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

        
        jQuery.each( response.omr_gotfromscanning_list, function( i, val ) {
          $scope.schoolOMRGotFromScanningReceivedList.push({
            schoolCode: val.school_code,
            schoolName: val.schoolname,
            schoolCity: val.city,
            schoolRegion: val.region,
            schoolOmrReceiptDate: val.answers_date,
            schoolOmrScanGotDate: val.scan_got_date,
          });
        });

        $scope.dtOptions = DTOptionsBuilder.newOptions().withOption('data', $scope.schoolOMRGotFromScanningReceivedList).withOption('fnRowCallback',function(nRow, aData, iDisplayIndex){
          $("td:first", nRow).html(iDisplayIndex +1);
          return nRow;
        }).withOption('processing', true);

        $scope.dtColumns = [

            DTColumnBuilder.newColumn(null).withTitle('#').withOption('title','#','defaultContent', ' '),
            DTColumnBuilder.newColumn(null).withTitle('School Code').withOption('title','School Code').renderWith(function (data, type, full, meta){ return '<a target="_blank" href="school-order-tracking?round='+round+'&school='+full.schoolCode+'">'+full.schoolCode+'</a>';}),
            DTColumnBuilder.newColumn('schoolName').withTitle('School Name').withOption('title','School Name'),
            DTColumnBuilder.newColumn('schoolCity').withTitle('City').withOption('title','City'),
            DTColumnBuilder.newColumn('schoolRegion').withTitle('Region').withOption('title','Region'),
            DTColumnBuilder.newColumn('schoolOmrReceiptDate').withTitle('OMR Receipt Date').withOption('title','OMR Receipt Date'),
            DTColumnBuilder.newColumn('schoolOmrScanGotDate').withTitle('OMR Scan Got Date').withOption('title','OMR Scan Got Date'),
            ];  


            $('#ppPostTestDynamicTable').removeClass('hide');

            $(window).scrollTop($('#ppPostTestDynamicTable').offset().top);

      }
      
    }
  });

};

$scope.showSchoolOMRGotFromScanningPending = function(e){

  destroy();

  $scope.schoolOMRGotFromScanningPendingList = [];

  var round = $('#ppposttest_dashboard_round').val();
  var zone = $('#ppposttest_dashboard_zone').val();

  var data = {round: round,zone:zone,region:region,category:category,username:username,type:'pending'};
  data = JSON.stringify(data);

    $.ajax({
    url: './api/dashboard/ppPostTestDashboardSchoolOMRGotFromScanning',
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

        
        jQuery.each( response.omr_gotfromscanning_list, function( i, val ) {
          $scope.schoolOMRGotFromScanningPendingList.push({
            schoolCode: val.school_code,
            schoolName: val.schoolname,
            schoolCity: val.city,
            schoolRegion: val.region,
            schoolOmrReceiptDate: val.answers_date,
          });
        });

        $scope.dtOptions = DTOptionsBuilder.newOptions().withOption('data', $scope.schoolOMRGotFromScanningPendingList).withOption('fnRowCallback',function(nRow, aData, iDisplayIndex){
          $("td:first", nRow).html(iDisplayIndex +1);
          return nRow;
        }).withOption('processing', true);

        $scope.dtColumns = [

            DTColumnBuilder.newColumn(null).withTitle('#').withOption('title','#','defaultContent', ' '),
            DTColumnBuilder.newColumn(null).withTitle('School Code').withOption('title','School Code').renderWith(function (data, type, full, meta){ return '<a target="_blank" href="school-order-tracking?round='+round+'&school='+full.schoolCode+'">'+full.schoolCode+'</a>';}),
            DTColumnBuilder.newColumn('schoolName').withTitle('School Name').withOption('title','School Name'),
            DTColumnBuilder.newColumn('schoolCity').withTitle('City').withOption('title','City'),
            DTColumnBuilder.newColumn('schoolRegion').withTitle('Region').withOption('title','Region'),
            DTColumnBuilder.newColumn('schoolOmrReceiptDate').withTitle('OMR Receipt Date').withOption('title','OMR Receipt Date'),
            ];  


            $('#ppPostTestDynamicTable').removeClass('hide');

            $(window).scrollTop($('#ppPostTestDynamicTable').offset().top);

      }
      
    }
  });

};

$scope.showSchoolOMRGotFromScanningAlert = function(e){

  destroy();

  $scope.schoolOMRGotFromScanningAlertList = [];

  var round = $('#ppposttest_dashboard_round').val();
  var zone = $('#ppposttest_dashboard_zone').val();

  var data = {round: round,zone:zone,region:region,category:category,username:username,type:'alert'};
  data = JSON.stringify(data);

    $.ajax({
    url: './api/dashboard/ppPostTestDashboardSchoolOMRGotFromScanning',
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

        
        jQuery.each( response.omr_gotfromscanning_list, function( i, val ) {
          $scope.schoolOMRGotFromScanningAlertList.push({
            schoolCode: val.school_code,
            schoolName: val.schoolname,
            schoolCity: val.city,
            schoolRegion: val.region,
            schoolOmrReceiptDate: val.answers_date,
          });
        });

        $scope.dtOptions = DTOptionsBuilder.newOptions().withOption('data', $scope.schoolOMRGotFromScanningAlertList).withOption('fnRowCallback',function(nRow, aData, iDisplayIndex){
          $("td:first", nRow).html(iDisplayIndex +1);
          return nRow;
        }).withOption('processing', true);

        $scope.dtColumns = [

            DTColumnBuilder.newColumn(null).withTitle('#').withOption('title','#','defaultContent', ' '),
            DTColumnBuilder.newColumn(null).withTitle('School Code').withOption('title','School Code').renderWith(function (data, type, full, meta){ return '<a target="_blank" href="school-order-tracking?round='+round+'&school='+full.schoolCode+'">'+full.schoolCode+'</a>';}),
            DTColumnBuilder.newColumn('schoolName').withTitle('School Name').withOption('title','School Name'),
            DTColumnBuilder.newColumn('schoolCity').withTitle('City').withOption('title','City'),
            DTColumnBuilder.newColumn('schoolRegion').withTitle('Region').withOption('title','Region'),
            DTColumnBuilder.newColumn('schoolOmrReceiptDate').withTitle('OMR Receipt Date').withOption('title','OMR Receipt Date'),
            ];  

            $('#ppPostTestDynamicTable').removeClass('hide');

            $(window).scrollTop($('#ppPostTestDynamicTable').offset().top);

      }
      
    }
  });

};

$scope.showSchoolOMRNameCheckStatusCompleted = function(e){

  destroy();

  $scope.schoolOMRNameCheckStatusReceivedList = [];

  var round = $('#ppposttest_dashboard_round').val();
  var zone = $('#ppposttest_dashboard_zone').val();

  var data = {round: round,zone:zone,region:region,category:category,username:username,type:'completed'};
  data = JSON.stringify(data);

    $.ajax({
    url: './api/dashboard/ppPostTestDashboardSchoolOMRNameCheckStatus',
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

        jQuery.each( response.omr_namecheckstatus_list, function( i, val ) {
          $scope.schoolOMRNameCheckStatusReceivedList.push({
            schoolCode: val.school_code,
            schoolName: val.schoolname,
            schoolCity: val.city,
            schoolRegion: val.region,
            schoolOmrReceiptDate: val.answers_date,
            schoolOmrScanGotDate: val.scan_got_date,
            schoolOmrNameCheckDate: val.namecheck_date,
          });
        });

        $scope.dtOptions = DTOptionsBuilder.newOptions().withOption('data', $scope.schoolOMRNameCheckStatusReceivedList).withOption('fnRowCallback',function(nRow, aData, iDisplayIndex){
          $("td:first", nRow).html(iDisplayIndex +1);
          return nRow;
        }).withOption('processing', true);

        $scope.dtColumns = [

            DTColumnBuilder.newColumn(null).withTitle('#').withOption('title','#','defaultContent', ' '),
            DTColumnBuilder.newColumn(null).withTitle('School Code').withOption('title','School Code').renderWith(function (data, type, full, meta){ return '<a target="_blank" href="school-order-tracking?round='+round+'&school='+full.schoolCode+'">'+full.schoolCode+'</a>';}),
            DTColumnBuilder.newColumn('schoolName').withTitle('School Name').withOption('title','School Name'),
            DTColumnBuilder.newColumn('schoolCity').withTitle('City').withOption('title','City'),
            DTColumnBuilder.newColumn('schoolRegion').withTitle('Region').withOption('title','Region'),
            DTColumnBuilder.newColumn('schoolOmrReceiptDate').withTitle('OMR Receipt Date').withOption('title','OMR Receipt Date'),
            DTColumnBuilder.newColumn('schoolOmrScanGotDate').withTitle('OMR Scan Got Date').withOption('title','OMR Scan Got Date'),
            DTColumnBuilder.newColumn('schoolOmrNameCheckDate').withTitle('OMR Name Check Date').withOption('title','OMR Name Check Date'),
            ];  

            $('#ppPostTestDynamicTable').removeClass('hide');

            $(window).scrollTop($('#ppPostTestDynamicTable').offset().top);

      }
      
    }
  });

};

$scope.showSchoolOMRNameCheckStatusPending = function(e){

  destroy();

  $scope.schoolOMRNameCheckStatusPendingList = [];

  var round = $('#ppposttest_dashboard_round').val();
  var zone = $('#ppposttest_dashboard_zone').val();

  var data = {round: round,zone:zone,region:region,category:category,username:username,type:'pending'};
  data = JSON.stringify(data);

    $.ajax({
    url: './api/dashboard/ppPostTestDashboardSchoolOMRNameCheckStatus',
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

        jQuery.each( response.omr_namecheckstatus_list, function( i, val ) {
          $scope.schoolOMRNameCheckStatusPendingList.push({
            schoolCode: val.school_code,
            schoolName: val.schoolname,
            schoolCity: val.city,
            schoolRegion: val.region,
            schoolOmrReceiptDate: val.answers_date,
            schoolOmrScanGotDate: val.scan_got_date,
          });
        });

        $scope.dtOptions = DTOptionsBuilder.newOptions().withOption('data', $scope.schoolOMRNameCheckStatusPendingList).withOption('fnRowCallback',function(nRow, aData, iDisplayIndex){
          $("td:first", nRow).html(iDisplayIndex +1);
          return nRow;
        }).withOption('processing', true);

        $scope.dtColumns = [

            DTColumnBuilder.newColumn(null).withTitle('#').withOption('title','#','defaultContent', ' '),
            DTColumnBuilder.newColumn(null).withTitle('School Code').withOption('title','School Code').renderWith(function (data, type, full, meta){ return '<a target="_blank" href="school-order-tracking?round='+round+'&school='+full.schoolCode+'">'+full.schoolCode+'</a>';}),
            DTColumnBuilder.newColumn('schoolName').withTitle('School Name').withOption('title','School Name'),
            DTColumnBuilder.newColumn('schoolCity').withTitle('City').withOption('title','City'),
            DTColumnBuilder.newColumn('schoolRegion').withTitle('Region').withOption('title','Region'),
            DTColumnBuilder.newColumn('schoolOmrReceiptDate').withTitle('OMR Receipt Date').withOption('title','OMR Receipt Date'),
            DTColumnBuilder.newColumn('schoolOmrScanGotDate').withTitle('OMR Scan Got Date').withOption('title','OMR Scan Got Date'),
            ];  

            $('#ppPostTestDynamicTable').removeClass('hide');

            $(window).scrollTop($('#ppPostTestDynamicTable').offset().top);

      }
      
    }
  });

};

$scope.showSchoolOMRNameCheckStatusAlert = function(e){

  destroy();

  $scope.schoolOMRNameCheckStatusAlertList = [];

  var round = $('#ppposttest_dashboard_round').val();
  var zone = $('#ppposttest_dashboard_zone').val();

  var data = {round: round,zone:zone,region:region,category:category,username:username,type:'alert'};
  data = JSON.stringify(data);

    $.ajax({
    url: './api/dashboard/ppPostTestDashboardSchoolOMRNameCheckStatus',
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

        jQuery.each( response.omr_namecheckstatus_list, function( i, val ) {
          $scope.schoolOMRNameCheckStatusReceivedList.push({
            schoolCode: val.school_code,
            schoolName: val.schoolname,
            schoolCity: val.city,
            schoolRegion: val.region,
            schoolOmrReceiptDate: val.answers_date,
            schoolOmrScanGotDate: val.scan_got_date,
          });
        });

        $scope.dtOptions = DTOptionsBuilder.newOptions().withOption('data', $scope.schoolOMRNameCheckStatusAlertList).withOption('fnRowCallback',function(nRow, aData, iDisplayIndex){
          $("td:first", nRow).html(iDisplayIndex +1);
          return nRow;
        }).withOption('processing', true);

        $scope.dtColumns = [

            DTColumnBuilder.newColumn(null).withTitle('#').withOption('title','#','defaultContent', ' '),
            DTColumnBuilder.newColumn(null).withTitle('School Code').withOption('title','School Code').renderWith(function (data, type, full, meta){ return '<a target="_blank" href="school-order-tracking?round='+round+'&school='+full.schoolCode+'">'+full.schoolCode+'</a>';}),
            DTColumnBuilder.newColumn('schoolName').withTitle('School Name').withOption('title','School Name'),
            DTColumnBuilder.newColumn('schoolCity').withTitle('City').withOption('title','City'),
            DTColumnBuilder.newColumn('schoolRegion').withTitle('Region').withOption('title','Region'),
            DTColumnBuilder.newColumn('schoolOmrReceiptDate').withTitle('OMR Receipt Date').withOption('title','OMR Receipt Date'),
            DTColumnBuilder.newColumn('schoolOmrScanGotDate').withTitle('OMR Scan Got Date').withOption('title','OMR Scan Got Date'),
            ];  

            $('#ppPostTestDynamicTable').removeClass('hide');

            $(window).scrollTop($('#ppPostTestDynamicTable').offset().top);

      }
      
    }
  });

};

$scope.showSchoolOMRScoreingStatusCompleted = function(e){

  destroy();

  $scope.schoolOMRScoreingStatusReceivedList = [];

  var round = $('#ppposttest_dashboard_round').val();
  var zone = $('#ppposttest_dashboard_zone').val();

  var data = {round: round,zone:zone,region:region,category:category,username:username,type:'completed'};
  data = JSON.stringify(data);

    $.ajax({
    url: './api/dashboard/ppPostTestDashboardSchoolOMRScoreingStatus',
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

        jQuery.each( response.omr_scoreingstatus_list, function( i, val ) {
          $scope.schoolOMRScoreingStatusReceivedList.push({
            schoolCode: val.school_code,
            schoolName: val.schoolname,
            schoolCity: val.city,
            schoolRegion: val.region,
            schoolOmrNameCheckDate: val.namecheck_date,
            schoolOmrScoreingDate: val.scoreing_date,
          });
        });

        $scope.dtOptions = DTOptionsBuilder.newOptions().withOption('data', $scope.schoolOMRScoreingStatusReceivedList).withOption('fnRowCallback',function(nRow, aData, iDisplayIndex){
          $("td:first", nRow).html(iDisplayIndex +1);
          return nRow;
        }).withOption('processing', true);

        $scope.dtColumns = [

            DTColumnBuilder.newColumn(null).withTitle('#').withOption('title','#','defaultContent', ' '),
            DTColumnBuilder.newColumn(null).withTitle('School Code').withOption('title','School Code').renderWith(function (data, type, full, meta){ return '<a target="_blank" href="school-order-tracking?round='+round+'&school='+full.schoolCode+'">'+full.schoolCode+'</a>';}),
            DTColumnBuilder.newColumn('schoolName').withTitle('School Name').withOption('title','School Name'),
            DTColumnBuilder.newColumn('schoolCity').withTitle('City').withOption('title','City'),
            DTColumnBuilder.newColumn('schoolRegion').withTitle('Region').withOption('title','Region'),
            DTColumnBuilder.newColumn('schoolOmrNameCheckDate').withTitle('OMR Name Check Date').withOption('title','OMR Name Check Date'),
            DTColumnBuilder.newColumn('schoolOmrScoreingDate').withTitle('OMR Scoreing Date').withOption('title','OMR Scoreing Date'),
            ];  

            $('#ppPostTestDynamicTable').removeClass('hide');

            $(window).scrollTop($('#ppPostTestDynamicTable').offset().top);

      }
      
    }
  });

};

$scope.showSchoolOMRScoreingStatusPending = function(e){

  destroy();

  $scope.schoolOMRScoreingStatusPendingList = [];

  var round = $('#ppposttest_dashboard_round').val();
  var zone = $('#ppposttest_dashboard_zone').val();

  var data = {round: round,zone:zone,region:region,category:category,username:username,type:'pending'};
  data = JSON.stringify(data);

    $.ajax({
    url: './api/dashboard/ppPostTestDashboardSchoolOMRScoreingStatus',
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

        jQuery.each( response.omr_scoreingstatus_list, function( i, val ) {
          $scope.schoolOMRScoreingStatusPendingList.push({
            schoolCode: val.school_code,
            schoolName: val.schoolname,
            schoolCity: val.city,
            schoolRegion: val.region,
            schoolOmrNameCheckDate: val.namecheck_date,
          });
        });

        $scope.dtOptions = DTOptionsBuilder.newOptions().withOption('data', $scope.schoolOMRScoreingStatusPendingList).withOption('fnRowCallback',function(nRow, aData, iDisplayIndex){
          $("td:first", nRow).html(iDisplayIndex +1);
          return nRow;
        }).withOption('processing', true);

        $scope.dtColumns = [

            DTColumnBuilder.newColumn(null).withTitle('#').withOption('title','#','defaultContent', ' '),
            DTColumnBuilder.newColumn(null).withTitle('School Code').withOption('title','School Code').renderWith(function (data, type, full, meta){ return '<a target="_blank" href="school-order-tracking?round='+round+'&school='+full.schoolCode+'">'+full.schoolCode+'</a>';}),
            DTColumnBuilder.newColumn('schoolName').withTitle('School Name').withOption('title','School Name'),
            DTColumnBuilder.newColumn('schoolCity').withTitle('City').withOption('title','City'),
            DTColumnBuilder.newColumn('schoolRegion').withTitle('Region').withOption('title','Region'),
            DTColumnBuilder.newColumn('schoolOmrNameCheckDate').withTitle('OMR Name Check Date').withOption('title','OMR Name Check Date'),
            ];  

            $('#ppPostTestDynamicTable').removeClass('hide');

            $(window).scrollTop($('#ppPostTestDynamicTable').offset().top);

      }
      
    }
  });

};

$scope.showSchoolOMRScoreingStatusAlert = function(e){

  destroy();

  $scope.schoolOMRScoreingStatusAlertList = [];

  var round = $('#ppposttest_dashboard_round').val();
  var zone = $('#ppposttest_dashboard_zone').val();

  var data = {round: round,zone:zone,region:region,category:category,username:username,type:'alert'};
  data = JSON.stringify(data);

    $.ajax({
    url: './api/dashboard/ppPostTestDashboardSchoolOMRScoreingStatus',
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

        jQuery.each( response.omr_scoreingstatus_list, function( i, val ) {
          $scope.schoolOMRScoreingStatusAlertList.push({
            schoolCode: val.school_code,
            schoolName: val.schoolname,
            schoolCity: val.city,
            schoolRegion: val.region,
            schoolOmrNameCheckDate: val.namecheck_date,
          });
        });

        $scope.dtOptions = DTOptionsBuilder.newOptions().withOption('data', $scope.schoolOMRScoreingStatusAlertList).withOption('fnRowCallback',function(nRow, aData, iDisplayIndex){
          $("td:first", nRow).html(iDisplayIndex +1);
          return nRow;
        }).withOption('processing', true);

        $scope.dtColumns = [

            DTColumnBuilder.newColumn(null).withTitle('#').withOption('title','#','defaultContent', ' '),
            DTColumnBuilder.newColumn(null).withTitle('School Code').withOption('title','School Code').renderWith(function (data, type, full, meta){ return '<a target="_blank" href="school-order-tracking?round='+round+'&school='+full.schoolCode+'">'+full.schoolCode+'</a>';}),
            DTColumnBuilder.newColumn('schoolName').withTitle('School Name').withOption('title','School Name'),
            DTColumnBuilder.newColumn('schoolCity').withTitle('City').withOption('title','City'),
            DTColumnBuilder.newColumn('schoolRegion').withTitle('Region').withOption('title','Region'),
            DTColumnBuilder.newColumn('schoolOmrNameCheckDate').withTitle('OMR Name Check Date').withOption('title','OMR Name Check Date'),
            ];  

            $('#ppPostTestDynamicTable').removeClass('hide');

            $(window).scrollTop($('#ppPostTestDynamicTable').offset().top);

      }
      
    }
  });

};

$scope.showSchoolOMRReportGeneratedStatusCompleted = function(e){

  destroy();

  $scope.schoolOMRReportGeneratedStatusReceivedList = [];

  var round = $('#ppposttest_dashboard_round').val();
  var zone = $('#ppposttest_dashboard_zone').val();

  var data = {round: round,zone:zone,region:region,category:category,username:username,type:'completed'};
  data = JSON.stringify(data);

    $.ajax({
    url: './api/dashboard/ppPostTestDashboardSchoolOMRReportGeneratedStatus',
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

        jQuery.each( response.omr_reportgenerated_status_list, function( i, val ) {
          $scope.schoolOMRReportGeneratedStatusReceivedList.push({
            schoolCode: val.school_code,
            schoolName: val.schoolname,
            schoolCity: val.city,
            schoolRegion: val.region,
            schoolOmrScoreingDate: val.scoreing_date,
            schoolOmrSchoolReportsDate: val.school_reports_date,
          });
        });

        $scope.dtOptions = DTOptionsBuilder.newOptions().withOption('data', $scope.schoolOMRReportGeneratedStatusReceivedList).withOption('fnRowCallback',function(nRow, aData, iDisplayIndex){
          $("td:first", nRow).html(iDisplayIndex +1);
          return nRow;
        }).withOption('processing', true);

        $scope.dtColumns = [

            DTColumnBuilder.newColumn(null).withTitle('#').withOption('title','#','defaultContent', ' '),
            DTColumnBuilder.newColumn(null).withTitle('School Code').withOption('title','School Code').renderWith(function (data, type, full, meta){ return '<a target="_blank" href="school-order-tracking?round='+round+'&school='+full.schoolCode+'">'+full.schoolCode+'</a>';}),
            DTColumnBuilder.newColumn('schoolName').withTitle('School Name').withOption('title','School Name'),
            DTColumnBuilder.newColumn('schoolCity').withTitle('City').withOption('title','City'),
            DTColumnBuilder.newColumn('schoolRegion').withTitle('Region').withOption('title','Region'),
            DTColumnBuilder.newColumn('schoolOmrScoreingDate').withTitle('OMR Scoreing Date').withOption('title','OMR Scoreing Date'),
            DTColumnBuilder.newColumn('schoolOmrSchoolReportsDate').withTitle('OMR Report Generated Date').withOption('title','OMR Report Generated Date'),
            ];  

            $('#ppPostTestDynamicTable').removeClass('hide');

            $(window).scrollTop($('#ppPostTestDynamicTable').offset().top);

      }
      
    }
  });

};

$scope.showSchoolOMRReportGeneratedStatusPending = function(e){

  destroy();

  $scope.schoolOMRReportGeneratedStatusPendingList = [];

  var round = $('#ppposttest_dashboard_round').val();
  var zone = $('#ppposttest_dashboard_zone').val();

  var data = {round: round,zone:zone,region:region,category:category,username:username,type:'pending'};
  data = JSON.stringify(data);

    $.ajax({
    url: './api/dashboard/ppPostTestDashboardSchoolOMRReportGeneratedStatus',
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

        jQuery.each( response.omr_reportgenerated_status_list, function( i, val ) {
          $scope.schoolOMRReportGeneratedStatusPendingList.push({
            schoolCode: val.school_code,
            schoolName: val.schoolname,
            schoolCity: val.city,
            schoolRegion: val.region,
            schoolOmrScoreingDate: val.scoreing_date,
          });
        });

        $scope.dtOptions = DTOptionsBuilder.newOptions().withOption('data', $scope.schoolOMRReportGeneratedStatusPendingList).withOption('fnRowCallback',function(nRow, aData, iDisplayIndex){
          $("td:first", nRow).html(iDisplayIndex +1);
          return nRow;
        }).withOption('processing', true);

        $scope.dtColumns = [

            DTColumnBuilder.newColumn(null).withTitle('#').withOption('title','#','defaultContent', ' '),
            DTColumnBuilder.newColumn(null).withTitle('School Code').withOption('title','School Code').renderWith(function (data, type, full, meta){ return '<a target="_blank" href="school-order-tracking?round='+round+'&school='+full.schoolCode+'">'+full.schoolCode+'</a>';}),
            DTColumnBuilder.newColumn('schoolName').withTitle('School Name').withOption('title','School Name'),
            DTColumnBuilder.newColumn('schoolCity').withTitle('City').withOption('title','City'),
            DTColumnBuilder.newColumn('schoolRegion').withTitle('Region').withOption('title','Region'),
            DTColumnBuilder.newColumn('schoolOmrScoreingDate').withTitle('OMR Scoreing Date').withOption('title','OMR Scoreing Date'),
            ];  

            $('#ppPostTestDynamicTable').removeClass('hide');

            $(window).scrollTop($('#ppPostTestDynamicTable').offset().top);

      }
      
    }
  });

};

$scope.showSchoolOMRReportGeneratedStatusAlert = function(e){

  destroy();

  $scope.schoolOMRReportGeneratedStatusAlertList = [];

  var round = $('#ppposttest_dashboard_round').val();
  var zone = $('#ppposttest_dashboard_zone').val();

  var data = {round: round,zone:zone,region:region,category:category,username:username,type:'alert'};
  data = JSON.stringify(data);

    $.ajax({
    url: './api/dashboard/ppPostTestDashboardSchoolOMRReportGeneratedStatus',
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

        jQuery.each( response.omr_reportgenerated_status_list, function( i, val ) {
          $scope.schoolOMRReportGeneratedStatusAlertList.push({
            schoolCode: val.school_code,
            schoolName: val.schoolname,
            schoolCity: val.city,
            schoolRegion: val.region,
            schoolOmrScoreingDate: val.scoreing_date,
          });
        });

        $scope.dtOptions = DTOptionsBuilder.newOptions().withOption('data', $scope.schoolOMRReportGeneratedStatusAlertList).withOption('fnRowCallback',function(nRow, aData, iDisplayIndex){
          $("td:first", nRow).html(iDisplayIndex +1);
          return nRow;
        }).withOption('processing', true);

        $scope.dtColumns = [

            DTColumnBuilder.newColumn(null).withTitle('#').withOption('title','#','defaultContent', ' '),
            DTColumnBuilder.newColumn(null).withTitle('School Code').withOption('title','School Code').renderWith(function (data, type, full, meta){ return '<a target="_blank" href="school-order-tracking?round='+round+'&school='+full.schoolCode+'">'+full.schoolCode+'</a>';}),
            DTColumnBuilder.newColumn('schoolName').withTitle('School Name').withOption('title','School Name'),
            DTColumnBuilder.newColumn('schoolCity').withTitle('City').withOption('title','City'),
            DTColumnBuilder.newColumn('schoolRegion').withTitle('Region').withOption('title','Region'),
            DTColumnBuilder.newColumn('schoolOmrScoreingDate').withTitle('OMR Scoreing Date').withOption('title','OMR Scoreing Date'),
            ];  

            $('#ppPostTestDynamicTable').removeClass('hide');

            $(window).scrollTop($('#ppPostTestDynamicTable').offset().top);

      }
      
    }
  });

};

$scope.showSchoolOMRReportDispatchEiCompleted = function(e){

  destroy();

  $scope.schoolOMRReportDispatchEiCompletedList = [];

  var round = $('#ppposttest_dashboard_round').val();
  var zone = $('#ppposttest_dashboard_zone').val();

  var data = {round: round,zone:zone,region:region,category:category,username:username,type:'completed'};
  data = JSON.stringify(data);

    $.ajax({
    url: './api/dashboard/ppPostTestDashboardSchoolOMRReportDispatchEiStatus',
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

        jQuery.each( response.omr_reportdispatchei_status_list, function( i, val ) {
          $scope.schoolOMRReportDispatchEiCompletedList.push({
            schoolCode: val.school_code,
            schoolName: val.schoolname,
            schoolCity: val.city,
            schoolRegion: val.region,
            schoolOmrSchoolReportsDate: val.school_reports_date,
            schoolOmrAnalysisSentDate: val.analysis_sentdate,
          });
        });

        $scope.dtOptions = DTOptionsBuilder.newOptions().withOption('data', $scope.schoolOMRReportDispatchEiCompletedList).withOption('fnRowCallback',function(nRow, aData, iDisplayIndex){
          $("td:first", nRow).html(iDisplayIndex +1);
          return nRow;
        }).withOption('processing', true);

        $scope.dtColumns = [

            DTColumnBuilder.newColumn(null).withTitle('#').withOption('title','#','defaultContent', ' '),
            DTColumnBuilder.newColumn(null).withTitle('School Code').withOption('title','School Code').renderWith(function (data, type, full, meta){ return '<a target="_blank" href="school-order-tracking?round='+round+'&school='+full.schoolCode+'">'+full.schoolCode+'</a>';}),
            DTColumnBuilder.newColumn('schoolName').withTitle('School Name').withOption('title','School Name'),
            DTColumnBuilder.newColumn('schoolCity').withTitle('City').withOption('title','City'),
            DTColumnBuilder.newColumn('schoolRegion').withTitle('Region').withOption('title','Region'),
            DTColumnBuilder.newColumn('schoolOmrSchoolReportsDate').withTitle('OMR Report Generated Date').withOption('title','OMR Report Generated Date'),
            DTColumnBuilder.newColumn('schoolOmrAnalysisSentDate').withTitle('OMR Analysis Sent Date').withOption('title','OMR Analysis Sent Date'),
            ];  

            $('#ppPostTestDynamicTable').removeClass('hide');

            $(window).scrollTop($('#ppPostTestDynamicTable').offset().top);

      }
      
    }
  });

};

$scope.showSchoolOMRReportDispatchEiPending = function(e){

  destroy();

  $scope.schoolOMRReportDispatchEiPendingList = [];

  var round = $('#ppposttest_dashboard_round').val();
  var zone = $('#ppposttest_dashboard_zone').val();

  var data = {round: round,zone:zone,region:region,category:category,username:username,type:'pending'};
  data = JSON.stringify(data);

    $.ajax({
    url: './api/dashboard/ppPostTestDashboardSchoolOMRReportDispatchEiStatus',
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

        jQuery.each( response.omr_reportdispatchei_status_list, function( i, val ) {
          $scope.schoolOMRReportDispatchEiPendingList.push({
            schoolCode: val.school_code,
            schoolName: val.schoolname,
            schoolCity: val.city,
            schoolRegion: val.region,
            schoolOmrSchoolReportsDate: val.school_reports_date,
          });
        });

        $scope.dtOptions = DTOptionsBuilder.newOptions().withOption('data', $scope.schoolOMRReportDispatchEiPendingList).withOption('fnRowCallback',function(nRow, aData, iDisplayIndex){
          $("td:first", nRow).html(iDisplayIndex +1);
          return nRow;
        }).withOption('processing', true);

        $scope.dtColumns = [

            DTColumnBuilder.newColumn(null).withTitle('#').withOption('title','#','defaultContent', ' '),
            DTColumnBuilder.newColumn(null).withTitle('School Code').withOption('title','School Code').renderWith(function (data, type, full, meta){ return '<a target="_blank" href="school-order-tracking?round='+round+'&school='+full.schoolCode+'">'+full.schoolCode+'</a>';}),
            DTColumnBuilder.newColumn('schoolName').withTitle('School Name').withOption('title','School Name'),
            DTColumnBuilder.newColumn('schoolCity').withTitle('City').withOption('title','City'),
            DTColumnBuilder.newColumn('schoolRegion').withTitle('Region').withOption('title','Region'),
            DTColumnBuilder.newColumn('schoolOmrSchoolReportsDate').withTitle('OMR Report Generated Date').withOption('title','OMR Report Generated Date'),
            ];  

            $('#ppPostTestDynamicTable').removeClass('hide');

            $(window).scrollTop($('#ppPostTestDynamicTable').offset().top);

      }
      
    }
  });

};

$scope.showSchoolOMRReportDispatchEiAlert = function(e){

  destroy();

  $scope.schoolOMRReportDispatchEiAlertList = [];

  var round = $('#ppposttest_dashboard_round').val();
  var zone = $('#ppposttest_dashboard_zone').val();

  var data = {round: round,zone:zone,region:region,category:category,username:username,type:'alert'};
  data = JSON.stringify(data);

    $.ajax({
    url: './api/dashboard/ppPostTestDashboardSchoolOMRReportDispatchEiStatus',
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

        jQuery.each( response.omr_reportdispatchei_status_list, function( i, val ) {
          $scope.schoolOMRReportDispatchEiAlertList.push({
            schoolCode: val.school_code,
            schoolName: val.schoolname,
            schoolCity: val.city,
            schoolRegion: val.region,
            schoolOmrSchoolReportsDate: val.school_reports_date,
          });
        });

        $scope.dtOptions = DTOptionsBuilder.newOptions().withOption('data', $scope.schoolOMRReportDispatchEiAlertList).withOption('fnRowCallback',function(nRow, aData, iDisplayIndex){
          $("td:first", nRow).html(iDisplayIndex +1);
          return nRow;
        }).withOption('processing', true);

        $scope.dtColumns = [

            DTColumnBuilder.newColumn(null).withTitle('#').withOption('title','#','defaultContent', ' '),
            DTColumnBuilder.newColumn(null).withTitle('School Code').withOption('title','School Code').renderWith(function (data, type, full, meta){ return '<a target="_blank" href="school-order-tracking?round='+round+'&school='+full.schoolCode+'">'+full.schoolCode+'</a>';}),
            DTColumnBuilder.newColumn('schoolName').withTitle('School Name').withOption('title','School Name'),
            DTColumnBuilder.newColumn('schoolCity').withTitle('City').withOption('title','City'),
            DTColumnBuilder.newColumn('schoolRegion').withTitle('Region').withOption('title','Region'),
            DTColumnBuilder.newColumn('schoolOmrSchoolReportsDate').withTitle('OMR Report Generated Date').withOption('title','OMR Report Generated Date'),
            ];  

            $('#ppPostTestDynamicTable').removeClass('hide');

            $(window).scrollTop($('#ppPostTestDynamicTable').offset().top);

      }
      
    }
  });

};

$scope.showSchoolOMRReportDispatchCompleted = function(e){

  destroy();

  $scope.schoolOMRReportDispatchCompletedList = [];

  var round = $('#ppposttest_dashboard_round').val();
  var zone = $('#ppposttest_dashboard_zone').val();

  var data = {round: round,zone:zone,region:region,category:category,username:username,type:'completed'};
  data = JSON.stringify(data);

    $.ajax({
    url: './api/dashboard/ppPostTestDashboardSchoolOMRReportDispatchStatus',
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

        jQuery.each( response.omr_reportdispatch_status_list, function( i, val ) {
          $scope.schoolOMRReportDispatchCompletedList.push({
            schoolCode: val.school_code,
            schoolName: val.schoolname,
            schoolCity: val.city,
            schoolRegion: val.region,
            schoolOmrAnalysisSentDate: val.analysis_sentdate,
            schoolOmrAnalysisDispatchDate: val.analysis_despatch_date,
          });
        });

        $scope.dtOptions = DTOptionsBuilder.newOptions().withOption('data', $scope.schoolOMRReportDispatchCompletedList).withOption('fnRowCallback',function(nRow, aData, iDisplayIndex){
          $("td:first", nRow).html(iDisplayIndex +1);
          return nRow;
        }).withOption('processing', true);

        $scope.dtColumns = [

            DTColumnBuilder.newColumn(null).withTitle('#').withOption('title','#','defaultContent', ' '),
            DTColumnBuilder.newColumn(null).withTitle('School Code').withOption('title','School Code').renderWith(function (data, type, full, meta){ return '<a target="_blank" href="school-order-tracking?round='+round+'&school='+full.schoolCode+'">'+full.schoolCode+'</a>';}),
            DTColumnBuilder.newColumn('schoolName').withTitle('School Name').withOption('title','School Name'),
            DTColumnBuilder.newColumn('schoolCity').withTitle('City').withOption('title','City'),
            DTColumnBuilder.newColumn('schoolRegion').withTitle('Region').withOption('title','Region'),
            DTColumnBuilder.newColumn('schoolOmrAnalysisSentDate').withTitle('OMR Analysis Sent Date').withOption('title','OMR Analysis Sent Date'),
            DTColumnBuilder.newColumn('schoolOmrAnalysisDispatchDate').withTitle('OMR Analysis Dispatch Date').withOption('title','OMR Analysis Dispatch Date'),
            ];  

            $('#ppPostTestDynamicTable').removeClass('hide');

            $(window).scrollTop($('#ppPostTestDynamicTable').offset().top);

      }
      
    }
  });

};

$scope.showSchoolOMRReportDispatchPending = function(e){

  destroy();

  $scope.schoolOMRReportDispatchPendingList = [];

  var round = $('#ppposttest_dashboard_round').val();
  var zone = $('#ppposttest_dashboard_zone').val();

  var data = {round: round,zone:zone,region:region,category:category,username:username,type:'pending'};
  data = JSON.stringify(data);

    $.ajax({
    url: './api/dashboard/ppPostTestDashboardSchoolOMRReportDispatchStatus',
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

        jQuery.each( response.omr_reportdispatch_status_list, function( i, val ) {
          $scope.schoolOMRReportDispatchPendingList.push({
            schoolCode: val.school_code,
            schoolName: val.schoolname,
            schoolCity: val.city,
            schoolRegion: val.region,
            schoolOmrAnalysisSentDate: val.analysis_sentdate,
          });
        });

        $scope.dtOptions = DTOptionsBuilder.newOptions().withOption('data', $scope.schoolOMRReportDispatchPendingList).withOption('fnRowCallback',function(nRow, aData, iDisplayIndex){
          $("td:first", nRow).html(iDisplayIndex +1);
          return nRow;
        }).withOption('processing', true);

        $scope.dtColumns = [

            DTColumnBuilder.newColumn(null).withTitle('#').withOption('title','#','defaultContent', ' '),
            DTColumnBuilder.newColumn(null).withTitle('School Code').withOption('title','School Code').renderWith(function (data, type, full, meta){ return '<a target="_blank" href="school-order-tracking?round='+round+'&school='+full.schoolCode+'">'+full.schoolCode+'</a>';}),
            DTColumnBuilder.newColumn('schoolName').withTitle('School Name').withOption('title','School Name'),
            DTColumnBuilder.newColumn('schoolCity').withTitle('City').withOption('title','City'),
            DTColumnBuilder.newColumn('schoolRegion').withTitle('Region').withOption('title','Region'),
            DTColumnBuilder.newColumn('schoolOmrAnalysisSentDate').withTitle('OMR Analysis Sent Date').withOption('title','OMR Analysis Sent Date'),
            ];  

            $('#ppPostTestDynamicTable').removeClass('hide');

            $(window).scrollTop($('#ppPostTestDynamicTable').offset().top);

      }
      
    }
  });

};

$scope.showSchoolOMRReportDispatchAlert = function(e){

  destroy();

  $scope.schoolOMRReportDispatchAlertList = [];

  var round = $('#ppposttest_dashboard_round').val();
  var zone = $('#ppposttest_dashboard_zone').val();

  var data = {round: round,zone:zone,region:region,category:category,username:username,type:'alert'};
  data = JSON.stringify(data);

    $.ajax({
    url: './api/dashboard/ppPostTestDashboardSchoolOMRReportDispatchStatus',
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

        jQuery.each( response.omr_reportdispatch_status_list, function( i, val ) {
          $scope.schoolOMRReportDispatchAlertList.push({
            schoolCode: val.school_code,
            schoolName: val.schoolname,
            schoolCity: val.city,
            schoolRegion: val.region,
            schoolOmrAnalysisSentDate: val.analysis_sentdate,
          });
        });

        $scope.dtOptions = DTOptionsBuilder.newOptions().withOption('data', $scope.schoolOMRReportDispatchAlertList).withOption('fnRowCallback',function(nRow, aData, iDisplayIndex){
          $("td:first", nRow).html(iDisplayIndex +1);
          return nRow;
        }).withOption('processing', true);

        $scope.dtColumns = [

            DTColumnBuilder.newColumn(null).withTitle('#').withOption('title','#','defaultContent', ' '),
            DTColumnBuilder.newColumn(null).withTitle('School Code').withOption('title','School Code').renderWith(function (data, type, full, meta){ return '<a target="_blank" href="school-order-tracking?round='+round+'&school='+full.schoolCode+'">'+full.schoolCode+'</a>';}),
            DTColumnBuilder.newColumn('schoolName').withTitle('School Name').withOption('title','School Name'),
            DTColumnBuilder.newColumn('schoolCity').withTitle('City').withOption('title','City'),
            DTColumnBuilder.newColumn('schoolRegion').withTitle('Region').withOption('title','Region'),
            DTColumnBuilder.newColumn('schoolOmrAnalysisSentDate').withTitle('OMR Analysis Sent Date').withOption('title','OMR Analysis Sent Date'),
            ];  

            $('#ppPostTestDynamicTable').removeClass('hide');

            $(window).scrollTop($('#ppPostTestDynamicTable').offset().top);

      }
      
    }
  });

};

$scope.showSchoolOMRReportDeliveryCompleted = function(e){

  destroy();

  $scope.schoolOMRReportDeliveryCompletedList = [];

  var round = $('#ppposttest_dashboard_round').val();
  var zone = $('#ppposttest_dashboard_zone').val();

  var data = {round: round,zone:zone,region:region,category:category,username:username,type:'completed'};
  data = JSON.stringify(data);

    $.ajax({
    url: './api/dashboard/ppPostTestDashboardSchoolOMRReportDeliveryStatus',
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

        jQuery.each( response.omr_reportdelivery_status_list, function( i, val ) {
          $scope.schoolOMRReportDeliveryCompletedList.push({
            schoolCode: val.school_code,
            schoolName: val.schoolname,
            schoolCity: val.city,
            schoolRegion: val.region,
            schoolOmrAnalysisDispatchDate: val.analysis_despatch_date,
            schoolOmrAnalysisDeliveryDate: val.analysis_delivery_date,
          });
        });

        $scope.dtOptions = DTOptionsBuilder.newOptions().withOption('data', $scope.schoolOMRReportDeliveryCompletedList).withOption('fnRowCallback',function(nRow, aData, iDisplayIndex){
          $("td:first", nRow).html(iDisplayIndex +1);
          return nRow;
        }).withOption('processing', true);

        $scope.dtColumns = [

            DTColumnBuilder.newColumn(null).withTitle('#').withOption('title','#','defaultContent', ' '),
            DTColumnBuilder.newColumn(null).withTitle('School Code').withOption('title','School Code').renderWith(function (data, type, full, meta){ return '<a target="_blank" href="school-order-tracking?round='+round+'&school='+full.schoolCode+'">'+full.schoolCode+'</a>';}),
            DTColumnBuilder.newColumn('schoolName').withTitle('School Name').withOption('title','School Name'),
            DTColumnBuilder.newColumn('schoolCity').withTitle('City').withOption('title','City'),
            DTColumnBuilder.newColumn('schoolRegion').withTitle('Region').withOption('title','Region'),
            DTColumnBuilder.newColumn('schoolOmrAnalysisDispatchDate').withTitle('OMR Analysis Dispatch Date').withOption('title','OMR Analysis Dispatch Date'),
            DTColumnBuilder.newColumn('schoolOmrAnalysisDeliveryDate').withTitle('OMR Analysis Delivery Date').withOption('title','OMR Analysis Delivery Date'),
            ];  

            $('#ppPostTestDynamicTable').removeClass('hide');

            $(window).scrollTop($('#ppPostTestDynamicTable').offset().top);

      }
      
    }
  });

};

$scope.showSchoolOMRReportDeliveryPending = function(e){

  destroy();

  $scope.schoolOMRReportDeliveryPendingList = [];

  var round = $('#ppposttest_dashboard_round').val();
  var zone = $('#ppposttest_dashboard_zone').val();

  var data = {round: round,zone:zone,region:region,category:category,username:username,type:'pending'};
  data = JSON.stringify(data);

    $.ajax({
    url: './api/dashboard/ppPostTestDashboardSchoolOMRReportDeliveryStatus',
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

        jQuery.each( response.omr_reportdelivery_status_list, function( i, val ) {
          $scope.schoolOMRReportDeliveryPendingList.push({
            schoolCode: val.school_code,
            schoolName: val.schoolname,
            schoolCity: val.city,
            schoolRegion: val.region,
            schoolOmrAnalysisDispatchDate: val.analysis_despatch_date,
          });
        });

        $scope.dtOptions = DTOptionsBuilder.newOptions().withOption('data', $scope.schoolOMRReportDeliveryPendingList).withOption('fnRowCallback',function(nRow, aData, iDisplayIndex){
          $("td:first", nRow).html(iDisplayIndex +1);
          return nRow;
        }).withOption('processing', true);

        $scope.dtColumns = [

            DTColumnBuilder.newColumn(null).withTitle('#').withOption('title','#','defaultContent', ' '),
            DTColumnBuilder.newColumn(null).withTitle('School Code').withOption('title','School Code').renderWith(function (data, type, full, meta){ return '<a target="_blank" href="school-order-tracking?round='+round+'&school='+full.schoolCode+'">'+full.schoolCode+'</a>';}),
            DTColumnBuilder.newColumn('schoolName').withTitle('School Name').withOption('title','School Name'),
            DTColumnBuilder.newColumn('schoolCity').withTitle('City').withOption('title','City'),
            DTColumnBuilder.newColumn('schoolRegion').withTitle('Region').withOption('title','Region'),
            DTColumnBuilder.newColumn('schoolOmrAnalysisDispatchDate').withTitle('OMR Analysis Dispatch Date').withOption('title','OMR Analysis Dispatch Date'),
            ];  

            $('#ppPostTestDynamicTable').removeClass('hide');

            $(window).scrollTop($('#ppPostTestDynamicTable').offset().top);

      }
      
    }
  });

};

$scope.showSchoolOMRReportDeliveryAlert = function(e){

  destroy();

  $scope.schoolOMRReportDeliveryAlertList = [];

  var round = $('#ppposttest_dashboard_round').val();
  var zone = $('#ppposttest_dashboard_zone').val();

  var data = {round: round,zone:zone,region:region,category:category,username:username,type:'alert'};
  data = JSON.stringify(data);

    $.ajax({
    url: './api/dashboard/ppPostTestDashboardSchoolOMRReportDeliveryStatus',
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

        jQuery.each( response.omr_reportdelivery_status_list, function( i, val ) {
          $scope.schoolOMRReportDeliveryAlertList.push({
            schoolCode: val.school_code,
            schoolName: val.schoolname,
            schoolCity: val.city,
            schoolRegion: val.region,
            schoolOmrAnalysisDispatchDate: val.analysis_despatch_date,
          });
        });

        $scope.dtOptions = DTOptionsBuilder.newOptions().withOption('data', $scope.schoolOMRReportDeliveryAlertList).withOption('fnRowCallback',function(nRow, aData, iDisplayIndex){
          $("td:first", nRow).html(iDisplayIndex +1);
          return nRow;
        }).withOption('processing', true);

        $scope.dtColumns = [

            DTColumnBuilder.newColumn(null).withTitle('#').withOption('title','#','defaultContent', ' '),
            DTColumnBuilder.newColumn(null).withTitle('School Code').withOption('title','School Code').renderWith(function (data, type, full, meta){ return '<a target="_blank" href="school-order-tracking?round='+round+'&school='+full.schoolCode+'">'+full.schoolCode+'</a>';}),
            DTColumnBuilder.newColumn('schoolName').withTitle('School Name').withOption('title','School Name'),
            DTColumnBuilder.newColumn('schoolCity').withTitle('City').withOption('title','City'),
            DTColumnBuilder.newColumn('schoolRegion').withTitle('Region').withOption('title','Region'),
            DTColumnBuilder.newColumn('schoolOmrAnalysisDispatchDate').withTitle('OMR Analysis Dispatch Date').withOption('title','OMR Analysis Dispatch Date'),
            ];  

            $('#ppPostTestDynamicTable').removeClass('hide');

            $(window).scrollTop($('#ppPostTestDynamicTable').offset().top);

      }
      
    }
  });

};

});

app.controller('SchoolOrderTrackingController', function($scope,$http,$ocLazyLoad,$location,$window,$route,$routeParams) {

  if($routeParams.round != '' && $routeParams.school != ''){

    $scope.schoolName = '';
    $scope.paymentDetails = [];
    $scope.processTracking = [];
    $scope.courierDetails = [];


    var schoolCode = $routeParams.school;   
    var round = $routeParams.round;

    var data = {round: round,school:schoolCode};
    data = JSON.stringify(data);

    $.ajax({
    url: './api/schoolTracking/loadSchoolTrackingSchoolDetails',
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

        $scope.schoolCode = schoolCode;

        $scope.testEdition = round;

        $scope.schoolName = response.schoolName;

        $scope.paymentDetails = response.paymentDetails[0];

        $scope.processTracking = response.processTracking[0];

        $scope.courierDetails = response.courierDetails[0];

        $scope.courierDetailsLength = response.courierDetails.length;

        $scope.finalBreakupFlag = response.finalbreakupflag;

        $scope.fileExtension = response.fileExtension;

        $scope.omrStatus = response.omr_status_data[0];

        $scope.omrDispatchStatus = response.omr_dispatch_data[0];

        $scope.analysis_courier_details = response.analysis_courier_details[0];

        if($scope.finalBreakupFlag == 1){
          $scope.finalBreakupColor = 'rgb(34, 194, 34)';
        }
        else{
          $scope.finalBreakupColor = '#f1685e';
        }

        $scope.paymentflag = response.paymentflag;

        if($scope.paymentflag == 1){
          $scope.paymentColor = 'rgb(34, 194, 34)';
        }
        else{
          $scope.paymentColor = '#f1685e';
        }

        if(response.processTracking.length > 0)
        {

          if(response.processTracking[0].packlabel_date != '00-00-0000' && response.processTracking[0].packlabel_date != ''){
            $scope.packLabelColor = 'rgb(34, 194, 34)';
          }
          else{
            $scope.packLabelColor = '#f1685e';
          }

        }
        else{
          $scope.packLabelColor = '#f1685e';
        }

        if(response.processTracking.length > 0)
        {

        if(response.processTracking[0].qb_despatch_date != '00-00-0000' && response.processTracking[0].qb_despatch_date != ''){
          $scope.qbDispatchColor = 'rgb(34, 194, 34)';
        }
        else{
          $scope.qbDispatchColor = '#f1685e';
        }
        }
        else {
          $scope.qbDispatchColor = '#f1685e';
        }

        if(response.processTracking.length > 0)
        {

        if(response.processTracking[0].qb_delivery_date != '00-00-0000' && response.processTracking[0].qb_delivery_date != ''){
          $scope.qbDeliveryColor = 'rgb(34, 194, 34)';
        }
        else{
          $scope.qbDeliveryColor = '#f1685e';
        }
      }
      else{
        $scope.qbDeliveryColor = '#f1685e';
      }

      if(response.omr_status_data.length > 0){
        if(response.omr_status_data[0]['status_flag'] != '1' && response.omr_status_data[0]['status_flag'] != ''){
          $scope.omrReceiptColor = 'rgb(34, 194, 34)';
        }
        else {
          $scope.omrReceiptColor = '#f1685e';
        }

        if(response.omr_status_data[0]['scan_got_date'] != '0000-00-00' && response.omr_status_data[0]['scan_got_date'] != ''){
          $scope.omrScannedColor = 'rgb(34, 194, 34)';
        }
        else{
          $scope.omrScannedColor = '#f1685e';
        }

        if(response.omr_status_data[0]['namecheck_date'] != '0000-00-00' && response.omr_status_data[0]['namecheck_date'] != ''){
          $scope.omrNameCheckColor = 'rgb(34, 194, 34)';
        }
        else {
         $scope.omrNameCheckColor = '#f1685e'; 
        }

        if(response.omr_status_data[0]['scoreing_date'] != '0000-00-00' && response.omr_status_data[0]['scoreing_date'] != ''){
          $scope.omrScoreingColor = 'rgb(34, 194, 34)';
        }
        else {
         $scope.omrScoreingColor = '#f1685e'; 
        }

        if(response.omr_status_data[0]['school_reports_date'] != '0000-00-00' && response.omr_status_data[0]['school_reports_date'] != ''){
          $scope.omrReportsGeneratedColor = 'rgb(34, 194, 34)';
        }
        else {
         $scope.omrReportsGeneratedColor = '#f1685e'; 
        }

      }
      else {
        $scope.omrReceiptColor = '#f1685e';
        $scope.omrScannedColor = '#f1685e';
        $scope.omrNameCheckColor = '#f1685e';
        $scope.omrScoreingColor = '#f1685e';
        $scope.omrReportsGeneratedColor = '#f1685e';
      }

      if(response.omr_dispatch_data.length > 0){
        if(response.omr_dispatch_data[0]['analysis_sentdate'] != '0000-00-00' && response.omr_dispatch_data[0]['analysis_sentdate'] != ''){
          $scope.omrAnalysisSentColor = 'rgb(34, 194, 34)';
        }
        else {
          $scope.omrAnalysisSentColor = '#f1685e';
        }

        if(response.omr_dispatch_data[0]['analysis_despatch_date'] != '0000-00-00' && response.omr_dispatch_data[0]['analysis_despatch_date'] != ''){
          $scope.omrAnalysisDispatchColor = 'rgb(34, 194, 34)';
        }
        else {
          $scope.omrAnalysisDispatchColor = '#f1685e';
        }

        if(response.omr_dispatch_data[0]['analysis_delivery_date'] != '0000-00-00' && response.omr_dispatch_data[0]['analysis_delivery_date'] != ''){
          $scope.omrAnalysisDeliveryColor = 'rgb(34, 194, 34)';
        }
        else {
          $scope.omrAnalysisDeliveryColor = '#f1685e';
        }

      }
      else {
        $scope.omrAnalysisSentColor = '#f1685e';
        $scope.omrAnalysisDispatchColor = '#f1685e';
        $scope.omrAnalysisDeliveryColor = '#f1685e';
      }

        setTimeout(function(){ $('#overlay').hide(); }, 3000); 
        
          $('.panel-body').removeAttr( 'style' );

          $('.tabtitlecustom').each(function(i, obj) {
        
        var window_w = document.body.clientWidth;
        
        if(window_w <= 768 && window_w > 585 ){

          $(obj).css('font-size','11px');
        }
        else if(window_w < 1024){
          
          $(obj).css('font-size','13px');
        }
        else {
         $(obj).css('font-size','15px'); 
        }
        
      });

      setTimeout(function(){

        $('.line').each(function(i, obj) {

        var linewidth = Math.abs($('#foo').offset().left - $('#bar').offset().left); 

            if(i == 4 || i == 5){

               linewidth = 0;

               $(obj).css('width',linewidth);
               //$('.vertical-line').css('left',linewidth - 6);
            }
            else{

               $(obj).css('width',linewidth);

            
            }
        });

      },1);

      setTimeout(function(){

      $('.line2').each(function(i, obj) {

      var linewidth = Math.abs($('#foo2').offset().left - $('#bar2').offset().left); 
      
      if(i == 4 || i == 5){

             linewidth = 0;

             $(obj).css('width',linewidth);
             //$('.vertical-line').css('left',linewidth - 6);
          }
          else{

             $(obj).css('width',linewidth);

          
          }
      });

    },1);



      }
      
    }
  });
  }

  $(window).resize(function() {

  $('.line').each(function(i, obj) {

      var linewidth = Math.abs($('#foo').offset().left - $('#bar').offset().left); 
      
          if(i == 4 || i == 5){

             linewidth = 0;

             $(obj).css('width',linewidth);
             //$('.vertical-line').css('left',linewidth - 6);
          }
          else{

             $(obj).css('width',linewidth);
          
          }
    });

    

    $('.tabtitlecustom').each(function(i, obj) {
      
      var window_w = document.body.clientWidth;
      if(window_w <= 768 && window_w > 585 ){

        $(obj).css('font-size','11px');
      }
      else if(window_w < 1024){
        
        $(obj).css('font-size','13px');
      }
      else {
       $(obj).css('font-size','15px'); 
      }
      
    });




  });

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

  $scope.schoolList = [];
  $scope.rounds = [];
  $scope.roundSelected = '';
  $scope.roundDescription = '';

  var region = getCookie('loginuserregion');
  var category = getCookie('loginusercategory');
  var username = getCookie('loginuserlogname');

  var data = {region:region,category:category,username:username};
  data = JSON.stringify(data);

  $('#overlay').show();
    $.ajax({
    url: './api/schoolTracking/loadSchoolTrackingFilters',
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

        $('#overlay').hide();

        $scope.schoolList = response.school_registered;

        $scope.rounds = response.rounds;

        $scope.roundSelected = response.round_selected;

        $scope.roundDescription = response.round_description;

        var schoolname = [];

        jQuery.each( response.school_registered, function( i, val ) {
          schoolname.push(val.schoolname+'-'+val.school_code);
        });

        
        $( "#school_tracking_schoolname" ).autocomplete({
          source: schoolname
        });

        
      }
      
    }
  });

  $scope.filterschooltracking = function(e){

    $('#overlay').show();

    $scope.schoolName = '';
    $scope.paymentDetails = [];
    $scope.processTracking = [];
    $scope.courierDetails = [];


    var round =  $('#school_tracking_round').val();
    var school = $('#school_tracking_schoolname').val();
    var arr = school.split('-');
    var stringLength = arr.length - 1;
    var schoolCode = arr[stringLength];

    var data = {round: round,school:schoolCode};
    data = JSON.stringify(data);

    $.ajax({
    url: './api/schoolTracking/loadSchoolTrackingSchoolDetails',
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

        $scope.schoolCode = schoolCode;

        $scope.testEdition = round;

        $scope.schoolName = response.schoolName;

        $scope.paymentDetails = response.paymentDetails[0];

        $scope.processTracking = response.processTracking[0];

        $scope.courierDetails = response.courierDetails[0];

        $scope.courierDetailsLength = response.courierDetails.length;

        $scope.finalBreakupFlag = response.finalbreakupflag;

        $scope.fileExtension = response.fileExtension;

        $scope.omrStatus = response.omr_status_data[0];

        $scope.omrDispatchStatus = response.omr_dispatch_data[0];

        $scope.analysis_courier_details = response.analysis_courier_details[0];

        if($scope.finalBreakupFlag == 1){
          $scope.finalBreakupColor = 'rgb(34, 194, 34)';
        }
        else{
          $scope.finalBreakupColor = '#f1685e';
        }

        $scope.paymentflag = response.paymentflag;

        if($scope.paymentflag == 1){
          $scope.paymentColor = 'rgb(34, 194, 34)';
        }
        else{
          $scope.paymentColor = '#f1685e';
        }

        if(response.processTracking.length > 0)
        {

          if(response.processTracking[0].packlabel_date != '00-00-0000' && response.processTracking[0].packlabel_date != ''){
            $scope.packLabelColor = 'rgb(34, 194, 34)';
          }
          else{
            $scope.packLabelColor = '#f1685e';
          }

        }
        else{
          $scope.packLabelColor = '#f1685e';
        }

        if(response.processTracking.length > 0)
        {

        if(response.processTracking[0].qb_despatch_date != '00-00-0000' && response.processTracking[0].qb_despatch_date != ''){
          $scope.qbDispatchColor = 'rgb(34, 194, 34)';
        }
        else{
          $scope.qbDispatchColor = '#f1685e';
        }
        }
        else {
          $scope.qbDispatchColor = '#f1685e';
        }

        if(response.processTracking.length > 0)
        {

        if(response.processTracking[0].qb_delivery_date != '00-00-0000' && response.processTracking[0].qb_delivery_date != ''){
          $scope.qbDeliveryColor = 'rgb(34, 194, 34)';
        }
        else{
          $scope.qbDeliveryColor = '#f1685e';
        }
      }
      else{
        $scope.qbDeliveryColor = '#f1685e';
      }

      if(response.omr_status_data.length > 0){
        if(response.omr_status_data[0]['status_flag'] != '1' && response.omr_status_data[0]['status_flag'] != ''){
          $scope.omrReceiptColor = 'rgb(34, 194, 34)';
        }
        else {
          $scope.omrReceiptColor = '#f1685e';
        }

        if(response.omr_status_data[0]['scan_got_date'] != '0000-00-00' && response.omr_status_data[0]['scan_got_date'] != ''){
          $scope.omrScannedColor = 'rgb(34, 194, 34)';
        }
        else{
          $scope.omrScannedColor = '#f1685e';
        }

        if(response.omr_status_data[0]['namecheck_date'] != '0000-00-00' && response.omr_status_data[0]['namecheck_date'] != ''){
          $scope.omrNameCheckColor = 'rgb(34, 194, 34)';
        }
        else {
         $scope.omrNameCheckColor = '#f1685e'; 
        }

        if(response.omr_status_data[0]['scoreing_date'] != '0000-00-00' && response.omr_status_data[0]['scoreing_date'] != ''){
          $scope.omrScoreingColor = 'rgb(34, 194, 34)';
        }
        else {
         $scope.omrScoreingColor = '#f1685e'; 
        }

        if(response.omr_status_data[0]['school_reports_date'] != '0000-00-00' && response.omr_status_data[0]['school_reports_date'] != ''){
          $scope.omrReportsGeneratedColor = 'rgb(34, 194, 34)';
        }
        else {
         $scope.omrReportsGeneratedColor = '#f1685e'; 
        }

      }
      else {
        $scope.omrReceiptColor = '#f1685e';
        $scope.omrScannedColor = '#f1685e';
        $scope.omrNameCheckColor = '#f1685e';
        $scope.omrScoreingColor = '#f1685e';
        $scope.omrReportsGeneratedColor = '#f1685e';
      }

      if(response.omr_dispatch_data.length > 0){
        if(response.omr_dispatch_data[0]['analysis_sentdate'] != '0000-00-00' && response.omr_dispatch_data[0]['analysis_sentdate'] != ''){
          $scope.omrAnalysisSentColor = 'rgb(34, 194, 34)';
        }
        else {
          $scope.omrAnalysisSentColor = '#f1685e';
        }

        if(response.omr_dispatch_data[0]['analysis_despatch_date'] != '0000-00-00' && response.omr_dispatch_data[0]['analysis_despatch_date'] != ''){
          $scope.omrAnalysisDispatchColor = 'rgb(34, 194, 34)';
        }
        else {
          $scope.omrAnalysisDispatchColor = '#f1685e';
        }

        if(response.omr_dispatch_data[0]['analysis_delivery_date'] != '0000-00-00' && response.omr_dispatch_data[0]['analysis_delivery_date'] != ''){
          $scope.omrAnalysisDeliveryColor = 'rgb(34, 194, 34)';
        }
        else {
          $scope.omrAnalysisDeliveryColor = '#f1685e';
        }

      }
      else {
        $scope.omrAnalysisSentColor = '#f1685e';
        $scope.omrAnalysisDispatchColor = '#f1685e';
        $scope.omrAnalysisDeliveryColor = '#f1685e';
      }

      setTimeout(function(){ $('#overlay').hide(); }, 3000); 

        $('.panel-body').removeAttr( 'style' );

        $('.tabtitlecustom').each(function(i, obj) {
      
      var window_w = document.body.clientWidth;
      
      if(window_w <= 768 && window_w > 585 ){

        $(obj).css('font-size','11px');
      }
      else if(window_w < 1024){
        
        $(obj).css('font-size','13px');
      }
      else {
       $(obj).css('font-size','15px'); 
      }
      
    });

    setTimeout(function(){

      $('.line').each(function(i, obj) {

      var linewidth = Math.abs($('#foo').offset().left - $('#bar').offset().left); 

          if(i == 4 || i == 5){

             linewidth = 0;

             $(obj).css('width',linewidth);
             //$('.vertical-line').css('left',linewidth - 6);
          }
          else{

             $(obj).css('width',linewidth);

          
          }
      });

    },1);

    setTimeout(function(){

      $('.line2').each(function(i, obj) {

      var linewidth = Math.abs($('#foo2').offset().left - $('#bar2').offset().left); 
      
      if(i == 4 || i == 5){

             linewidth = 0;

             $(obj).css('width',linewidth);
             //$('.vertical-line').css('left',linewidth - 6);
          }
          else{

             $(obj).css('width',linewidth);

          
          }
      });

    },1);

      

        
      }
      
    }
  });
  };  

  
});

app.controller('VendorChangePasswordController', function($scope,$http,$ocLazyLoad) {

  $("#vendorchangepasswordform").validate({
    errorElement: "em",
    errorPlacement: function(error, element) {
    $(element.parent("div").addClass("form-animate-error"));
    error.appendTo(element.parent("div"));
    },
    success: function(label) {
    $(label.parent("div").removeClass("form-animate-error"));
    },
    rules: {
      
      vendor_old_password: { required: true },
      vendor_new_password: { required: true,minlength: 5,equalTo: "#vendor_confirm_password" },
      
    },
    messages: {
    }
    });

  $(document).on('submit','#vendorchangepasswordform',function(event){

    // code
          jQuery('#changepasswordbtn').attr('disabled','disabled');
          event.stopImmediatePropagation();

          //disable the default form submission
          event.preventDefault();
          var jsonData = {};


          //grab all form data  
          var formData = jQuery('form#vendorchangepasswordform').serializeArray();
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
            url: './api/vendor/vendor_changepassword',
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


                  if($('#change_password_message_box').hasClass('alert-danger')){
                    $('#change_password_message_box').removeClass('alert-danger');
                  }
                  $('#change_password_message_box').addClass('alert-success');
                  $('#change_password_message_box').text('');
                  $('#change_password_message_box').append(response.message);
                  $('#change_password_message_box').removeClass('hide');
                  $(window).scrollTop($('#change_password_message_box').offset().top);
                  $('#vendorchangepasswordform')[0].reset();
                  setTimeout(function(){ $('#change_password_message_box').addClass('hide');jQuery('#changepasswordbtn').removeAttr('disabled'); }, 3000);


              }
              else{

                  $('#vendorchangepasswordform')[0].reset();

                  if($('#change_password_message_box').hasClass('alert-success')){
                    $('#change_password_message_box').removeClass('alert-success');
                  }
                  $('#change_password_message_box').addClass('alert-danger');
                  $('#change_password_message_box').text('');
                  $('#change_password_message_box').append(response.message);
                  $('#change_password_message_box').removeClass('hide');
                  $(window).scrollTop($('#change_password_message_box').offset().top);
                  setTimeout(function(){ $('#change_password_message_box').addClass('hide'); jQuery('#changepasswordbtn').removeAttr('disabled');}, 3000);

              }
          }

      });

      return false;

    });

});

app.controller('EscalationPreTestLogController', function($scope,$http,$ocLazyLoad,DTOptionsBuilder, DTColumnBuilder, DTColumnDefBuilder) {

   

  //script code to list all the schools of current round with rounds and country
  $scope.dtInstance = {};
  
  $scope.qbescalationloglist = [];

  var flag = 0;
  var userData = [];
  // var round = $('#qbroundfilter').val();
  
    $.ajax({
    url: './api/escalationlog/pretest_escalation_log_list',
    type: 'POST',
    dataType : 'json', // data type
    async: false,
    cache: false,
    contentType: false,
    processData: false,
    success: function (returndata) {
      var response = JSON.parse(JSON.stringify(returndata));

      if(response.status == "success"){
        
        jQuery.each( response.pre_test_escalation_log, function( i, val ) {

          
          $scope.qbescalationloglist.push({

            schoolCode: val.school_code,
            schoolName: val.schoolname,
            escalationTestEdition: val.test_edition,
            escalationMailTo: val.mail_to,
            escalationType: val.escalation_type,
            escalationPriorityFlag: val.priority_flag,
            escalationMailSentDate: val.mail_sent_date
          
          });
        
        });

        

        $scope.dtOptions = DTOptionsBuilder.newOptions().withOption('data', $scope.qbescalationloglist).withOption('fnRowCallback',function(nRow, aData, iDisplayIndex){
                  $("td:first", nRow).html(iDisplayIndex +1);
                  return nRow;
                }).withOption('processing', true);   


                $scope.dtColumns = [

                DTColumnBuilder.newColumn(null).withTitle('#').withOption('title','#','defaultContent', ' '),
                DTColumnBuilder.newColumn('schoolCode').withTitle('School Code').withOption('title','School Code'),
                DTColumnBuilder.newColumn('schoolName').withTitle('School Name').withOption('title','School Name'),
                DTColumnBuilder.newColumn('escalationTestEdition').withTitle('Test Edition').withOption('title','Test Edition'),
                DTColumnBuilder.newColumn('escalationMailTo').withTitle('Mail Sent To').withOption('title','Mail Sent To'),
                DTColumnBuilder.newColumn('escalationType').withTitle('Escalation Type').withOption('title','Escalation Type'),
                DTColumnBuilder.newColumn('escalationPriorityFlag').withTitle('Escalation Level').withOption('title','Escalation Level'),
                DTColumnBuilder.newColumn('escalationMailSentDate').withTitle('Mail Sent Date').withOption('title','Mail Sent Date'),
                 ];  
                
                
      }
      
    }
  });

});

app.controller('VendorUploadOMRMISController', function($scope,$http,$routeParams,$location,$window,$route){

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

  var vendor_id = getCookie('vendor_id');

    $("#uploadomrreceiptmisform").validate({
      errorElement: "em",
      errorPlacement: function(error, element) {
        $(element.parent("div").addClass("form-animate-error"));
        error.appendTo(element.parent("div"));
      },
      success: function(label) {
        $(label.parent("div").removeClass("form-animate-error"));
      },
      rules: {
        omr_receiptmis_csvfile: "required",
        omr_receipt_round: "required",
      },
      messages: {
      
      }
    });

    $scope.rounds = [];
    
    $.ajax({
      url: './api/vendor/qb_mis',
      type: 'POST',
      dataType : 'json', // data type
      async: false,
      cache: false,
      contentType: false,
      processData: false,
      success: function (returndata) {
        var response = JSON.parse(JSON.stringify(returndata));

        if(response.status == "success"){


            $scope.rounds = response.rounds;
          
        }
        
      }
    });

     $(document).on('submit','#uploadomrreceiptmisform',function(event){

      
      event.stopImmediatePropagation();

      $('.page-loading').show();

      $('#uploadomrreceiptmisbtn').attr('disabled','disabled');
      
      event.preventDefault();

      var fileUpload = document.getElementById("omr_receiptmis_csvfile");
      
      if (fileUpload.value != null) {

        var uploadFile = new FormData();
        var files = $("#omr_receiptmis_csvfile").get(0).files;
        var round = $('#omr_receipt_round').val();

        $scope.csvdata = [];
          // Add the uploaded file content to the form data collection
          if (files.length > 0) {

            uploadFile.append("OMRRECEIPTMISCsv", files[0]);
            uploadFile.append("round", round);
            uploadFile.append("vendor_id", vendor_id);

            $.ajax({
              url: "./api/vendor/upload_omr_receipt_mis",
              contentType: false,
              processData: false,
              data: uploadFile,
              type: 'POST',
              success: function (returndata) {

               var response = JSON.parse(returndata);

               if(response.status == "success"){

                  $('.page-loading').hide();

                  if($('#upload_csv_message_box').hasClass('alert-danger')){
                    $('#upload_csv_message_box').removeClass('alert-danger');
                  }
                  $('#upload_csv_message_box').addClass('alert-success');
                  $('#upload_csv_message_box').text('');
                  $('#upload_csv_message_box').append(response.message);
                  $('#upload_csv_message_box').removeClass('hide');
                  $(window).scrollTop($('#upload_csv_message_box').offset().top);

                  setTimeout(function(){ window.location.reload(); }, 3000);   

                }
                else {

                  $('.page-loading').hide();

                  $('#uploadqbmisform')[0].reset();
                  $('#uploadqbanalysismisbtn').removeAttr('disabled');
                  
                  if($('#upload_csv_message_box').hasClass('alert-success')){
                    $('#upload_csv_message_box').removeClass('alert-success');
                  }
                  
                  $('#upload_csv_message_box').addClass('alert-danger');
                  $('#upload_csv_message_box').text('');
                  $('#upload_csv_message_box').append(response.message);
                  $('#upload_csv_message_box').removeClass('hide');
                  $(window).scrollTop($('#upload_csv_message_box').offset().top);
  
                  setTimeout(function(){ $('#upload_csv_message_box').addClass('hide'); }, 4000);
                }

              }
            });
    }
  }

  });

});

app.controller('OmrReceiptStatusController', function($scope,$http,DTOptionsBuilder, DTColumnBuilder, DTColumnDefBuilder){

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

  var region = getCookie('loginuserregion');
  var category = getCookie('loginusercategory');
  var username = getCookie('loginuserlogname');

  //script code to list all the schools of current round with rounds and country
  $scope.dtInstance = {};
  
  $scope.rounds = [];
  $scope.lotnos = [];
  $scope.zones = [];
  $scope.omr_receipt_list = [];

  var flag = 0;
  var userData = [];
  // var round = $('#qbroundfilter').val();
  var data = {region:region,category:category,username:username};
  data = JSON.stringify(data);

    $.ajax({
    url: './api/mis_system/omr_receipt_status_list',
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

        $scope.zones = response.zones;
        $scope.rounds = response.rounds;
        $scope.roundSelected = response.round_selected;

        jQuery.each( response.omr_receipt_list, function( i, val ) {

          
          $scope.omr_receipt_list.push({

            schoolCode: val.school_code,
            schoolName: val.schoolname,
            schoolCity: val.city,
            schoolRegion: val.region,
            schoolTestDate: val.test_date,
            schoolTotalPapers: val.totalPapers,
            schoolTotalPaperReceived: val.sum,
            schoolOMRReceivedDate: val.inward_date,
            schoolOMRScanningDate: val.scan_date,
            schoolOMRDifference: val.difference,
            schoolOMRPercentage: val.percentage,
            schoolOMRStatus: val.status_flag,
            schoolOMRCountid: val.id 

          });
        });

        $scope.dtOptions = DTOptionsBuilder.newOptions().withOption('data', $scope.omr_receipt_list).withOption('fnRowCallback',function(nRow, aData, iDisplayIndex){
          
                  var el = $(nRow).find("td").eq(7);
                  
                  if(aData.schoolOMRPercentage < 85 && aData.schoolOMRStatus == 1){
                    $(el).addClass('red-alert');  
                  }
                  
                  $("td:first", nRow).html(iDisplayIndex +1);
                  return nRow;
                }).withOption('processing', true);   


                $scope.dtColumns = [

                DTColumnBuilder.newColumn(null).withTitle('#').withOption('title','#','defaultContent', ' '),
                DTColumnBuilder.newColumn('schoolCode').withTitle('School Code').withOption('title','School Code'),
                DTColumnBuilder.newColumn('schoolName').withTitle('School Name').withOption('title','School Name'),
                DTColumnBuilder.newColumn('schoolCity').withTitle('City').withOption('title','City'),
                DTColumnBuilder.newColumn('schoolRegion').withTitle('Region').withOption('title','Region'),
                DTColumnBuilder.newColumn('schoolTestDate').withTitle('Test Date').withOption('title','Test Date'),
                DTColumnBuilder.newColumn('schoolTotalPapers').withTitle('No. Of Papers').withOption('title','No. Of Papers'),
                DTColumnBuilder.newColumn('schoolTotalPaperReceived').withTitle('No. Of OMR Received').withOption('title','No. Of OMR Received'),
                DTColumnBuilder.newColumn('schoolOMRDifference').withTitle('OMR Pending').withOption('title','OMR Pending'),
                DTColumnBuilder.newColumn('schoolOMRReceivedDate').withTitle('OMR Received Date').withOption('title','OMR Received Date'),
                DTColumnBuilder.newColumn('schoolOMRScanningDate').withTitle('OMR Scanning Date').withOption('title','OMR Scanning Date'),
                DTColumnBuilder.newColumn('null').withTitle('Approve Status').withOption('title','Approve Status').notSortable()
                .renderWith(function (data, type, full, meta){
                  if(full.schoolOMRStatus == 1){

                    return '<img src="asset/img/accept.png" style="width: 25px;cursor: pointer;" class="approveOmrCount" analysisomr-id="'+full.schoolOMRCountid+'" status="0" />';
                  
                  }
                  else {

                   return '<button class="btn btn-raised btn-success" disabled="disabled"><div><span>Approved</span></div></button>'; 
                  
                  }
                  
                }).withClass("text-center")
                ];  

                
      }
      
    }
  });

  $(document).on('click','.approveOmrCount',function(event){ 

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

  var region = getCookie('loginuserregion');
  var category = getCookie('loginusercategory');
  var username = getCookie('loginuserlogname');

    var omrcountid = $(this).attr('analysisomr-id');

    var data = {omrcountid : omrcountid,region:region,category:category,username:username};
    
    data = JSON.stringify(data);
    
    $scope.newomr_receipt_list = [];

      $.ajax({
      url: './api/lotgeneration/approve_analysisomrcount',
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

          jQuery.each( response.omr_receipt_list, function( i, val ) {
          
          $scope.newomr_receipt_list.push({
           schoolCode: val.school_code,
            schoolName: val.schoolname,
            schoolCity: val.city,
            schoolRegion: val.region,
            schoolTestDate: val.test_date,
            schoolTotalPapers: val.totalPapers,
            schoolTotalPaperReceived: val.sum,
            schoolOMRReceivedDate: val.inward_date,
            schoolOMRScanningDate: val.scan_date,
            schoolOMRDifference: val.difference,
            schoolOMRPercentage: val.percentage,
            schoolOMRStatus: val.status_flag,
            schoolOMRCountid: val.id
          });

        });

          $scope.dtOptions = DTOptionsBuilder.newOptions().withOption('data', $scope.newomr_receipt_list).withOption('fnRowCallback',function(nRow, aData, iDisplayIndex){
            $("td:first", nRow).html(iDisplayIndex +1);
            return nRow;
          }).withOption('processing', true);

          $scope.dtInstance.rerender();

        }
        
      }
    });

  });

  $scope.filteromrReceiptStatusList = function(e) {
    
    $scope.filteromrReceiptList = [];
     
      
        var round = $('#omrreceiptroundfilter').val();
        
        var zone = $('#omrreceiptzonefilter').val();

        var data = {round:round,zone:zone,region:region,category:category,username:username};
        
        data = JSON.stringify(data);

        $.ajax({
            url: "./api/mis_system/omr_receipt_status_listFilter",
            contentType: false,
            processData: false,
            async: true,
            data: data,
            type: 'POST',
            dataType : 'json',
            success: function (returndata) {
              
             var response = returndata;
             
                if(response.status == "success"){

                  
                    jQuery.each( response.filteredomrreceiptreports, function( i, val ) {

                        $scope.filteromrReceiptList.push({

                          schoolCode: val.school_code,
                          schoolName: val.schoolname,
                          schoolCity: val.city,
                          schoolRegion: val.region,
                          schoolTestDate: val.test_date,
                          schoolTotalPapers: val.totalPapers,
                          schoolTotalPaperReceived: val.sum,
                          schoolOMRReceivedDate: val.inward_date,
                          schoolOMRScanningDate: val.scan_date,
                          schoolOMRDifference: val.difference,
                          schoolOMRPercentage: val.percentage 

                        });

                    });
            
                $scope.dtOptions = DTOptionsBuilder.newOptions().withOption('data', $scope.filteromrReceiptList).withOption('fnRowCallback',function(nRow, aData, iDisplayIndex){
                  
                  var el = $(nRow).find("td").eq(7);
                  
                  if(aData.schoolOMRPercentage < 85){
                    $(el).addClass('red-alert');  
                  }

                  $("td:first", nRow).html(iDisplayIndex +1);
                  return nRow;
                }).withOption('paging', false).withOption('processing', true); 

                $scope.dtInstance.rerender();
               
                }
                else
                {
                  
                $scope.dtOptions = DTOptionsBuilder.newOptions().withOption('data', $scope.filteromrReceiptList).withOption('fnRowCallback',function(nRow, aData, iDisplayIndex){
                  $("td:first", nRow).html(iDisplayIndex +1);
                  return nRow;
                }).withOption('paging', false).withOption('scrollY', "500px").withOption('processing', true).withOption('fnPreDrawCallback', function () { $('#packingloader').show(); }).withOption('fnDrawCallback', function () {  }); 

                $scope.dtInstance.rerender();

                }

               }
             });
  };



  
});

app.controller('LotGenerationController', function($scope,$http,$routeParams,$location,$window,$route) {

  $('.dateAnimate').bootstrapMaterialDatePicker({ weekStart : 0, time: false,animation:true,format: 'DD-MM-YYYY' });

  var username = $('#loginusername').val();    

  $("#analysislotgenerationform").validate({
      errorElement: "em",
      errorPlacement: function(error, element) {
        $(element.parent("div").addClass("form-animate-error"));
        error.appendTo(element.parent("div"));
      },
      success: function(label) {
        $(label.parent("div").removeClass("form-animate-error"));
      },
      rules: {
        analysislot_generation_round: "required",
        analysislot_generation_vendor: "required",
        lot_pendrive_sent_date: "required",
        lot_generation_excelfile: "required",
        lot_generation_htmlfile: "required",
      },
      messages: {
        
      }
    });

  $scope.rounds = [];
  $scope.vendors = [];

    $.ajax({
      url: './api/lotgeneration/getRoundAndVendorList',
      type: 'POST',
      dataType : 'json', // data type
      async: false,
      cache: false,
      contentType: false,
      processData: false,
      success: function (returndata) {
        var response = JSON.parse(JSON.stringify(returndata));

        if(response.status == "success"){

            $scope.rounds = response.rounds;

            $scope.vendors = response.vendors;

        }
        
      }
    });

    

    $(document).on('submit','#analysislotgenerationform',function(event){
      
      event.stopImmediatePropagation();

      $('.page-loading').show();

      $('#lotgenerationbtn').attr('disabled','disabled');
      
      event.preventDefault();

      var excelfileUpload = document.getElementById("lot_generation_excelfile");

      var htmlfileUpload = document.getElementById("lot_generation_htmlfile");
      
      if (excelfileUpload.value != null) {

        var uploadFile = new FormData();
        var files = $("#lot_generation_excelfile").get(0).files;
        var filesCsv = $("#lot_generation_htmlfile").get(0).files;
        var round = $('#analysislot_generation_round').val();
        var vendor = $('#analysislot_generation_vendor').val();
        var lot_pendrive_sent_date = $('#lot_pendrive_sent_date').val();

        $scope.csvdata = [];
          // Add the uploaded files content to the form data collection
          if (files.length > 0) {

            uploadFile.append("LOTGENERATIONEXCELFile", files[0]);
            uploadFile.append("LOTGENERATIONCSVFile", filesCsv[0]);
            uploadFile.append("round", round);
            uploadFile.append("vendor_id", vendor);
            uploadFile.append("lot_pendrive_sent_date", lot_pendrive_sent_date);
            uploadFile.append("username", username);

            $.ajax({
              url: "./api/lotgeneration/upload_lot_generation_files",
              contentType: false,
              processData: false,
              data: uploadFile,
              type: 'POST',
              success: function (returndata) {

               var response = JSON.parse(returndata);

               if(response.status == "success"){

                  $('.page-loading').hide();

                  if($('#upload_analysisqc_html_message_box').hasClass('alert-danger')){
                    $('#upload_analysisqc_html_message_box').removeClass('alert-danger');
                  }
                  $('#upload_analysisqc_html_message_box').addClass('alert-success');
                  $('#upload_analysisqc_html_message_box').text('');
                  $('#upload_analysisqc_html_message_box').append(response.message);
                  $('#upload_analysisqc_html_message_box').removeClass('hide');
                  $(window).scrollTop($('#upload_analysisqc_html_message_box').offset().top);

                  setTimeout(function(){ window.location.reload(); }, 3000);   

                }
                else {
                  $('.page-loading').hide();
                  $('#analysislotgenerationform')[0].reset();
                  $('#lotgenerationbtn').removeAttr('disabled');
                  
                  if($('#upload_analysisqc_html_message_box').hasClass('alert-success')){
                    $('#upload_analysisqc_html_message_box').removeClass('alert-success');
                  }
                  
                  $('#upload_analysisqc_html_message_box').addClass('alert-danger');
                  $('#upload_analysisqc_html_message_box').text('');
                  $('#upload_analysisqc_html_message_box').append(response.message);
                  $('#upload_analysisqc_html_message_box').removeClass('hide');
                  $(window).scrollTop($('#upload_analysisqc_html_message_box').offset().top);

                  setTimeout(function(){ $('#upload_analysisqc_html_message_box').addClass('hide'); }, 4000);

                }

              }
            });
    }
  }

  });

});

app.controller('VendorAnalysisLotListController', function($scope,$http,DTOptionsBuilder, DTColumnBuilder, DTColumnDefBuilder){

  $scope.dtInstance = {};
  $scope.vendoranalysislotlist = [];

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
  
  var vendor_id = getCookie('vendor_id');
  var vendor_authtoken = getCookie('vendor_authtoken');  
                

  var data = {vendor_id : vendor_id,vendor_authtoken: vendor_authtoken};
  
  data = JSON.stringify(data);
  
  $.ajax({
    url: './api/vendor/list_vendor_analysislot',
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

        jQuery.each( response.analysis_lot_list, function( i, val ) {
          
          $scope.vendoranalysislotlist.push({
            lotId: val.id,
            analysisLotNo: val.lotno,
            analysisTestEdition: val.test_edition,
            analysisLotSentDate: val.lot_sent_date,
            analysisLotPendriveSentDate: val.lot_pendrive_sent_date,
            analysisLotQcFilePath: val.lot_qc_file_path,
            analysislotQcHtmlFilePath: val.lot_qc_html_file_path,
            analysisLotAcknowledgeDate: val.lot_acknowledge_date,
            analysisLotPrintingDate: val.lot_printing_date,
            analysisLotKittingPackingDate : val.lot_kittingpacking_date,
            analysisLotExpectedDispatchDate: val.lot_expected_dispatch_date,
            analysisLotLotApproveStatus: val.lot_approve_status,
          });

        });
        
        
        $scope.dtOptions = DTOptionsBuilder.newOptions().withOption('data', $scope.vendoranalysislotlist).withOption('fnRowCallback',function(nRow, aData, iDisplayIndex){
          $("td:first", nRow).html(iDisplayIndex +1);
          return nRow;
        }).withOption('processing', true);   


        $scope.dtColumns = [
          DTColumnBuilder.newColumn(null).withTitle('S.No.').withOption('title','S.No','defaultContent', ' '),
          DTColumnBuilder.newColumn('analysisLotSentDate').withTitle('Sent Date').withOption('title','Sent Date'),
          DTColumnBuilder.newColumn('analysisLotNo').withTitle('Lot No.').withOption('title','Lot No.'),
          DTColumnBuilder.newColumn('analysisTestEdition').withTitle('Test Edition').withOption('title','Test Edition'),
          DTColumnBuilder.newColumn('analysisLotPendriveSentDate').withTitle('Pen Drive Sent Date').withOption('title','Pen Drive Sent Date'),
          DTColumnBuilder.newColumn('null').withTitle('Download QC Excel File').withOption('title','Download QC Excel File').notSortable()
          .renderWith(function (data, type, full, meta){
            if(full.lotId){
              return '<a href="api/MIS Reports/Analysis Lot Files/'+full.analysisLotQcFilePath+'" download="'+full.analysisLotQcFilePath+'" target="_blank" title="Download Excel"><img style="width: 30px;height: 30px;" class="packingslip-school-download" src="asset/img/CSV_download.png"></a>';
            }
          }).withClass("text-center"),
          DTColumnBuilder.newColumn('null').withTitle('Download QC Html File').withOption('title','Download QC Html File').notSortable()
          .renderWith(function (data, type, full, meta){
            if(full.lotId){
              return '<a href="api/MIS Reports/Analysis Lot Files/'+full.analysislotQcHtmlFilePath+'" download="'+full.analysislotQcHtmlFilePath+'" title="Download HTML"><img style="width: 30px;height: 30px;" class="packingslip-breakup-download" src="asset/img/CSV_download.png"></a>';
            }
          }).withClass("text-center"),
          DTColumnBuilder.newColumn('null').withTitle('Printing Date').withOption('title','Printing Date')
          .renderWith(function (data, type, full, meta){
            if(full.analysisLotPrintingDate == "0000-00-00"){
              
              return '<div class="form-group form-animate-text" style="margin-bottom:0px;"><input type="date" id="lot_printing_date'+full.lotId+'" name="lot_printing_date'+full.lotId+'" class="form-text dateAnimate"></div>';
     
            }
            else {
          
              return full.analysisLotPrintingDate;
          
            }
          }).withClass("text-center"),
          DTColumnBuilder.newColumn('null').withTitle('Kitting And Packing Date').withOption('title','Kitting And Packing Date')
          .renderWith(function (data, type, full, meta){
            if(full.analysisLotKittingPackingDate == "0000-00-00"){
              
              return '<div class="form-group form-animate-text" style="margin-bottom:0px;"><input type="date" id="lot_kittingpacking_date'+full.lotId+'" name="lot_kittingpacking_date'+full.lotId+'" class="form-text dateAnimate"></div>';
     
            }
            else {
          
              return full.analysisLotKittingPackingDate;
          
            }
          }).withClass("text-center"),
          DTColumnBuilder.newColumn('null').withTitle('Expected Dispatch Date').withOption('title','Expected Dispatch Date')
          .renderWith(function (data, type, full, meta){
            if(full.analysisLotExpectedDispatchDate == "0000-00-00"){
              
              return '<div class="form-group form-animate-text" style="margin-bottom:0px;"><input type="date" id="lot_expected_dispatch_date'+full.lotId+'" name="lot_expected_dispatch_date'+full.lotId+'" class="form-text dateAnimate"></div>';
     
            }
            else {
          
              return full.analysisLotExpectedDispatchDate;
          
            }
          }).withClass("text-center"),
          DTColumnBuilder.newColumn('analysisLotAcknowledgeDate').withTitle('Acknowledge Date And Time').withOption('title','Acknowledge Date And Time'),
          DTColumnBuilder.newColumn('null').withTitle('Acknowledge Status').withOption('title','Acknowledge Status').notSortable()
          .renderWith(function (data, type, full, meta){
            if(full.analysisLotLotApproveStatus == 0){

              return '<button class="btn ripple-infinite btn-raised btn-danger acknowledgeAnalysisLot" analysislot-id="'+full.lotId+'"><div><span>SAVE</span></div></button>';
            
            }
            else if(full.analysisLotLotApproveStatus == 1) {

              return '<button class="btn btn-raised btn-warning" disabled="disabled"><div><span>Pending</span></div></button>';
            
            }
            else{

             return '<button class="btn btn-raised btn-success" disabled="disabled"><div><span>Done</span></div></button>'; 
            
            }
          }).withClass("text-center")
        ];  
        
        $scope.dtColumns[0].visible = true;
        $scope.dtColumns[1].visible = true;
        $scope.dtColumns[2].visible = true;
        $scope.dtColumns[3].visible = true;
        $scope.dtColumns[4].visible = false;
        $scope.dtColumns[5].visible = false;
        $scope.dtColumns[6].visible = false;
        $scope.dtColumns[7].visible = true;
        $scope.dtColumns[8].visible = true;
        $scope.dtColumns[9].visible = true;
        $scope.dtColumns[10].visible = false;
        $scope.dtColumns[11].visible = true;
        
        
      }
      else {
        jQuery.each( response.analysis_lot_list, function( i, val ) {
          
          $scope.vendoranalysislotlist.push({
            lotId: val.id,
            analysisLotNo: val.lotno,
            analysisTestEdition: val.test_edition,
            analysisLotSentDate: val.lot_sent_date,
            analysisLotPendriveSentDate: val.lot_pendrive_sent_date,
            analysisLotQcFilePath: val.lot_qc_file_path,
            analysislotQcHtmlFilePath: val.lot_qc_html_file_path,
            analysisLotAcknowledgeDate: val.lot_acknowledge_date,
            analysisLotPrintingDate: val.lot_printing_date,
            analysisLotKittingPackingDate : val.lot_kittingpacking_date,
            analysisLotExpectedDispatchDate: val.lot_expected_dispatch_date,
            analysisLotLotApproveStatus: val.lot_approve_status,
          });

        });
        
        
        $scope.dtOptions = DTOptionsBuilder.newOptions().withOption('data', $scope.vendoranalysislotlist).withOption('fnRowCallback',function(nRow, aData, iDisplayIndex){
          $("td:first", nRow).html(iDisplayIndex +1);
          return nRow;
        }).withOption('processing', true);   


        $scope.dtColumns = [
          DTColumnBuilder.newColumn(null).withTitle('S.No.').withOption('title','S.No','defaultContent', ' '),
          DTColumnBuilder.newColumn('analysisLotSentDate').withTitle('Sent Date').withOption('title','Sent Date'),
          DTColumnBuilder.newColumn('analysisLotNo').withTitle('Lot No.').withOption('title','Lot No.'),
          DTColumnBuilder.newColumn('analysisTestEdition').withTitle('Test Edition').withOption('title','Test Edition'),
          DTColumnBuilder.newColumn('analysisLotPendriveSentDate').withTitle('Pen Drive Sent Date').withOption('title','Pen Drive Sent Date'),
          DTColumnBuilder.newColumn('null').withTitle('Download QC Excel File').withOption('title','Download QC Excel File').notSortable()
          .renderWith(function (data, type, full, meta){
            if(full.lotId){
              return '<a href="api/MIS Reports/Analysis Lot Files/'+full.analysisLotQcFilePath+'" download="'+full.analysisLotQcFilePath+'" target="_blank" title="Download Excel"><img style="width: 30px;height: 30px;" class="packingslip-school-download" src="asset/img/CSV_download.png"></a>';
            }
          }).withClass("text-center"),
          DTColumnBuilder.newColumn('null').withTitle('Download QC Html File').withOption('title','Download QC Html File').notSortable()
          .renderWith(function (data, type, full, meta){
            if(full.lotId){
              return '<a href="api/MIS Reports/Analysis Lot Files/'+full.analysislotQcHtmlFilePath+'" download="'+full.analysislotQcHtmlFilePath+'" title="Download HTML"><img style="width: 30px;height: 30px;" class="packingslip-breakup-download" src="asset/img/CSV_download.png"></a>';
            }
          }).withClass("text-center"),
          DTColumnBuilder.newColumn('null').withTitle('Printing Date').withOption('title','Printing Date')
          .renderWith(function (data, type, full, meta){
            if(full.analysisLotPrintingDate == "0000-00-00"){
              
              return '<div class="form-group form-animate-text" style="margin-bottom:0px;"><input type="date" id="lot_printing_date'+full.lotId+'" name="lot_printing_date'+full.lotId+'" class="form-text dateAnimate"></div>';
     
            }
            else {
          
              return full.analysisLotPrintingDate;
          
            }
          }).withClass("text-center"),
          DTColumnBuilder.newColumn('null').withTitle('Kitting And Packing Date').withOption('title','Kitting And Packing Date')
          .renderWith(function (data, type, full, meta){
            if(full.analysisLotKittingPackingDate == "0000-00-00"){
              
              return '<div class="form-group form-animate-text" style="margin-bottom:0px;"><input type="date" id="lot_kittingpacking_date'+full.lotId+'" name="lot_kittingpacking_date'+full.lotId+'" class="form-text dateAnimate"></div>';
     
            }
            else {
          
              return full.analysisLotKittingPackingDate;
          
            }
          }).withClass("text-center"),
          DTColumnBuilder.newColumn('null').withTitle('Expected Dispatch Date').withOption('title','Expected Dispatch Date')
          .renderWith(function (data, type, full, meta){
            if(full.analysisLotExpectedDispatchDate == "0000-00-00"){
              
              return '<div class="form-group form-animate-text" style="margin-bottom:0px;"><input type="date" id="lot_expected_dispatch_date'+full.lotId+'" name="lot_expected_dispatch_date'+full.lotId+'" class="form-text dateAnimate"></div>';
     
            }
            else {
          
              return full.analysisLotExpectedDispatchDate;
          
            }
          }).withClass("text-center"),
          DTColumnBuilder.newColumn('analysisLotAcknowledgeDate').withTitle('Acknowledge Date And Time').withOption('title','Acknowledge Date And Time'),
          DTColumnBuilder.newColumn('null').withTitle('Acknowledge Status').withOption('title','Acknowledge Status').notSortable()
          .renderWith(function (data, type, full, meta){
            if(full.analysisLotLotApproveStatus == 0){

              return '<button class="btn ripple-infinite btn-raised btn-danger acknowledgeAnalysisLot" analysislot-id="'+full.lotId+'"><div><span>SAVE</span></div></button>';
            
            }
            else if(full.analysisLotLotApproveStatus == 1) {

              return '<button class="btn btn-raised btn-warning" disabled="disabled"><div><span>Pending</span></div></button>';
            
            }
            else{

             return '<button class="btn btn-raised btn-success" disabled="disabled"><div><span>Done</span></div></button>'; 
            
            }
          }).withClass("text-center")
        ];  
        
        $scope.dtColumns[0].visible = true;
        $scope.dtColumns[1].visible = true;
        $scope.dtColumns[2].visible = true;
        $scope.dtColumns[3].visible = true;
        $scope.dtColumns[4].visible = false;
        $scope.dtColumns[5].visible = false;
        $scope.dtColumns[6].visible = false;
        $scope.dtColumns[7].visible = true;
        $scope.dtColumns[8].visible = true;
        $scope.dtColumns[9].visible = true;
        $scope.dtColumns[10].visible = false;
        $scope.dtColumns[11].visible = true;
      }
      
    }
  });

  $(document).on('click','.acknowledgeAnalysisLot',function(event){
   
    var analysislotid = $(this).attr('analysislot-id');
    var vendor_id = getCookie('vendor_id');
    var printingDate = $("#lot_printing_date"+analysislotid).val();
    var kittingDate = $("#lot_kittingpacking_date"+analysislotid).val();
    var estimatedDisptachDate = $("#lot_expected_dispatch_date"+analysislotid).val();
    var data = {analysislotid : analysislotid,vendor_id: vendor_id,printingDate:printingDate,kittingDate:kittingDate,estimatedDisptachDate:estimatedDisptachDate};
    
    if(printingDate == ''){
      $("#lot_printing_date"+analysislotid).attr('style','box-shadow:0px 0px 3px 2px #FF968B !important');
      return false;
    }
    else{
      $("#lot_printing_date"+analysislotid).removeAttr('style');
    }

    if(kittingDate == ''){
      $("#lot_kittingpacking_date"+analysislotid).attr('style','box-shadow:0px 0px 3px 2px #FF968B !important');
      return false;
    }
    else{
      $("#lot_kittingpacking_date"+analysislotid).removeAttr('style');
    }

    if(estimatedDisptachDate == ''){
      $("#lot_expected_dispatch_date"+analysislotid).attr('style','box-shadow:0px 0px 3px 2px #FF968B !important');
      return false;
    }
    else{
      $("#lot_expected_dispatch_date"+analysislotid).removeAttr('style');
    }



    data = JSON.stringify(data);
    
    $scope.newvendoranalysislotlist = [];

      $.ajax({
      url: './api/vendor/acknowledge_analysislot',
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

          jQuery.each( response.analysis_lot_list, function( i, val ) {
          
          $scope.newvendoranalysislotlist.push({
            lotId: val.id,
            analysisLotNo: val.lotno,
            analysisTestEdition: val.test_edition,
            analysisLotSentDate: val.lot_sent_date,
            analysisLotPendriveSentDate: val.lot_pendrive_sent_date,
            analysisLotQcFilePath: val.lot_qc_file_path,
            analysislotQcHtmlFilePath: val.lot_qc_html_file_path,
            analysisLotAcknowledgeDate: val.lot_acknowledge_date,
            analysisLotPrintingDate: val.lot_printing_date,
            analysisLotKittingPackingDate : val.lot_kittingpacking_date,
            analysisLotExpectedDispatchDate: val.lot_expected_dispatch_date,
            analysisLotLotApproveStatus: val.lot_approve_status,
          });

        });

          $scope.dtOptions = DTOptionsBuilder.newOptions().withOption('data', $scope.newvendoranalysislotlist).withOption('fnRowCallback',function(nRow, aData, iDisplayIndex){
            $("td:first", nRow).html(iDisplayIndex +1);
            return nRow;
          }).withOption('processing', true);

          $scope.dtInstance.rerender();

        }
        
      }
    });
  });

});

app.controller('AnalysisLotListController', function($scope,$http,DTOptionsBuilder, DTColumnBuilder, DTColumnDefBuilder){

  $scope.dtInstance = {};
  $scope.vendoranalysislotlist = [];

  
  
  $.ajax({
    url: './api/lotgeneration/list_analysislot',
    type: 'POST',
    dataType : 'json', // data type
    async: false,
    cache: false,
    contentType: false,
    processData: false,
    success: function (returndata) {
      var response = JSON.parse(JSON.stringify(returndata));

      if(response.status == "success"){

        jQuery.each( response.analysis_lot_list, function( i, val ) {
          
          $scope.vendoranalysislotlist.push({
            lotId: val.id,
            analysisLotNo: val.lotno,
            analysisTestEdition: val.test_edition,
            analysisLotSentDate: val.lot_sent_date,
            analysisLotVendor: val.vendor_name,
            analysisLotPendriveSentDate: val.lot_pendrive_sent_date,
            analysisLotQcFilePath: val.lot_qc_file_path,
            analysislotQcHtmlFilePath: val.lot_qc_html_file_path,
            analysisLotAcknowledgeDate: val.lot_acknowledge_date,
            analysisLotPrintingDate: val.lot_printing_date,
            analysisLotKittingPackingDate : val.lot_kittingpacking_date,
            analysisLotExpectedDispatchDate: val.lot_expected_dispatch_date,
            analysisLotLotApproveStatus: val.lot_approve_status,
          });

        });
        
        
        $scope.dtOptions = DTOptionsBuilder.newOptions().withOption('data', $scope.vendoranalysislotlist).withOption('fnRowCallback',function(nRow, aData, iDisplayIndex){
          $("td:first", nRow).html(iDisplayIndex +1);
          return nRow;
        }).withOption('processing', true);   


        $scope.dtColumns = [
          DTColumnBuilder.newColumn(null).withTitle('S.No.').withOption('title','S.No','defaultContent', ' '),
          DTColumnBuilder.newColumn('analysisLotSentDate').withTitle('Sent Date').withOption('title','Sent Date'),
          DTColumnBuilder.newColumn('analysisLotNo').withTitle('Lot No.').withOption('title','Lot No.'),
          DTColumnBuilder.newColumn('analysisTestEdition').withTitle('Test Edition').withOption('title','Test Edition'),
          DTColumnBuilder.newColumn('analysisLotVendor').withTitle('Vendor Name').withOption('title','Vendor Name'),
          DTColumnBuilder.newColumn('analysisLotPendriveSentDate').withTitle('Pen Drive Sent Date').withOption('title','Pen Drive Sent Date'),
          DTColumnBuilder.newColumn('null').withTitle('Download QC Excel File').withOption('title','Download QC Excel File').notSortable()
          .renderWith(function (data, type, full, meta){
            if(full.lotId){
              return '<a href="api/MIS Reports/Analysis Lot Files/'+full.analysisLotQcFilePath+'" download="'+full.analysisLotQcFilePath+'" target="_blank" title="Download Excel"><img style="width: 30px;height: 30px;" class="packingslip-school-download" src="asset/img/CSV_download.png"></a>';
            }
          }).withClass("text-center"),
          DTColumnBuilder.newColumn('null').withTitle('Download QC Html File').withOption('title','Download QC Html File').notSortable()
          .renderWith(function (data, type, full, meta){
            if(full.lotId){
              return '<a href="api/MIS Reports/Analysis Lot Files/'+full.analysislotQcHtmlFilePath+'" download="'+full.analysislotQcHtmlFilePath+'" title="Download HTML"><img style="width: 30px;height: 30px;" class="packingslip-breakup-download" src="asset/img/CSV_download.png"></a>';
            }
          }).withClass("text-center"),
          DTColumnBuilder.newColumn('analysisLotPrintingDate').withTitle('Printing Date').withOption('title','Printing Date'),
          DTColumnBuilder.newColumn('analysisLotKittingPackingDate').withTitle('Kitting And Packing Date').withOption('title','Kitting And Packing Date'),
          DTColumnBuilder.newColumn('analysisLotExpectedDispatchDate').withTitle('Expected Dispatch Date').withOption('title','Expected Dispatch Date'),
          DTColumnBuilder.newColumn('analysisLotAcknowledgeDate').withTitle('Acknowledge Date And Time').withOption('title','Acknowledge Date And Time'),
         DTColumnBuilder.newColumn('null').withTitle('Acknowledge Status').withOption('title','Acknowledge Status').notSortable()
          .renderWith(function (data, type, full, meta){
            if(full.analysisLotLotApproveStatus == 1){

              return '<img src="asset/img/accept.png" class="approveAnalysisLot" analysislot-id="'+full.lotId+'" style="width: 30px;cursor:pointer;" title="Approve" status="2" /> | <img title="Reject" src="asset/img/reject.png" class="approveAnalysisLot" analysislot-id="'+full.lotId+'" status="0" style="width: 21px;margin-left: 3px;cursor:pointer;"/>';
            
            }
            else if(full.analysisLotLotApproveStatus == 2){

             return '<button class="btn btn-raised btn-success" disabled="disabled"><div><span>Done</span></div></button>'; 
            
            }
            else{
              return '<button class="btn btn-raised btn-warning" disabled="disabled"><div><span>Pending</span></div></button>'; 
            }
          }).withClass("text-center")
        ];  
        
        $scope.dtColumns[0].visible = true;
        $scope.dtColumns[1].visible = true;
        $scope.dtColumns[2].visible = true;
        $scope.dtColumns[3].visible = true;
        $scope.dtColumns[4].visible = false;
        $scope.dtColumns[5].visible = false;
        $scope.dtColumns[6].visible = true;
        $scope.dtColumns[7].visible = true;
        $scope.dtColumns[8].visible = true;
        $scope.dtColumns[9].visible = true;
        $scope.dtColumns[10].visible = false;
        $scope.dtColumns[11].visible = true;
        
        
      }
      else {
        
        jQuery.each( response.analysis_lot_list, function( i, val ) {
          
          $scope.vendoranalysislotlist.push({
            lotId: val.id,
            analysisLotNo: val.lotno,
            analysisTestEdition: val.test_edition,
            analysisLotSentDate: val.lot_sent_date,
            analysisLotVendor: val.vendor_name,
            analysisLotPendriveSentDate: val.lot_pendrive_sent_date,
            analysisLotQcFilePath: val.lot_qc_file_path,
            analysislotQcHtmlFilePath: val.lot_qc_html_file_path,
            analysisLotAcknowledgeDate: val.lot_acknowledge_date,
            analysisLotPrintingDate: val.lot_printing_date,
            analysisLotKittingPackingDate : val.lot_kittingpacking_date,
            analysisLotExpectedDispatchDate: val.lot_expected_dispatch_date,
            analysisLotLotApproveStatus: val.lot_approve_status,
          });

        });
        
        
        $scope.dtOptions = DTOptionsBuilder.newOptions().withOption('data', $scope.vendoranalysislotlist).withOption('fnRowCallback',function(nRow, aData, iDisplayIndex){
          $("td:first", nRow).html(iDisplayIndex +1);
          return nRow;
        }).withOption('processing', true);   


        $scope.dtColumns = [
          DTColumnBuilder.newColumn(null).withTitle('S.No.').withOption('title','S.No','defaultContent', ' '),
          DTColumnBuilder.newColumn('analysisLotSentDate').withTitle('Sent Date').withOption('title','Sent Date'),
          DTColumnBuilder.newColumn('analysisLotNo').withTitle('Lot No.').withOption('title','Lot No.'),
          DTColumnBuilder.newColumn('analysisTestEdition').withTitle('Test Edition').withOption('title','Test Edition'),
          DTColumnBuilder.newColumn('analysisLotVendor').withTitle('Vendor Name').withOption('title','Vendor Name'),
          DTColumnBuilder.newColumn('analysisLotPendriveSentDate').withTitle('Pen Drive Sent Date').withOption('title','Pen Drive Sent Date'),
          DTColumnBuilder.newColumn('null').withTitle('Download QC Excel File').withOption('title','Download QC Excel File').notSortable()
          .renderWith(function (data, type, full, meta){
            if(full.lotId){
              return '<a href="api/MIS Reports/Analysis Lot Files/'+full.analysisLotQcFilePath+'" download="'+full.analysisLotQcFilePath+'" target="_blank" title="Download Excel"><img style="width: 30px;height: 30px;" class="packingslip-school-download" src="asset/img/CSV_download.png"></a>';
            }
          }).withClass("text-center"),
          DTColumnBuilder.newColumn('null').withTitle('Download QC Html File').withOption('title','Download QC Html File').notSortable()
          .renderWith(function (data, type, full, meta){
            if(full.lotId){
              return '<a href="api/MIS Reports/Analysis Lot Files/'+full.analysislotQcHtmlFilePath+'" download="'+full.analysislotQcHtmlFilePath+'" title="Download HTML"><img style="width: 30px;height: 30px;" class="packingslip-breakup-download" src="asset/img/CSV_download.png"></a>';
            }
          }).withClass("text-center"),
          DTColumnBuilder.newColumn('analysisLotPrintingDate').withTitle('Printing Date').withOption('title','Printing Date'),
          DTColumnBuilder.newColumn('analysisLotKittingPackingDate').withTitle('Kitting And Packing Date').withOption('title','Kitting And Packing Date'),
          DTColumnBuilder.newColumn('analysisLotExpectedDispatchDate').withTitle('Expected Dispatch Date').withOption('title','Expected Dispatch Date'),
          DTColumnBuilder.newColumn('analysisLotAcknowledgeDate').withTitle('Acknowledge Date And Time').withOption('title','Acknowledge Date And Time'),
          DTColumnBuilder.newColumn('null').withTitle('Acknowledge Status').withOption('title','Acknowledge Status').notSortable()
          .renderWith(function (data, type, full, meta){
            if(full.analysisLotLotApproveStatus == 1){

              return '<img src="asset/img/accept.png" class="approveAnalysisLot" analysislot-id="'+full.lotId+'" status="2" /> | <img class="approveAnalysisLot" analysislot-id="'+full.lotId+'" status="0" />';
            
            }
            else if(full.analysisLotLotApproveStatus == 2){

             return '<button class="btn btn-raised btn-success" disabled="disabled"><div><span>Done</span></div></button>'; 
            
            }
            else{
             return '<button class="btn btn-raised btn-warning" disabled="disabled"><div><span>Pending</span></div></button>';  
            }
          }).withClass("text-center")
        ];  
        
        $scope.dtColumns[0].visible = true;
        $scope.dtColumns[1].visible = true;
        $scope.dtColumns[2].visible = true;
        $scope.dtColumns[3].visible = true;
        $scope.dtColumns[4].visible = false;
        $scope.dtColumns[5].visible = false;
        $scope.dtColumns[6].visible = false;
        $scope.dtColumns[7].visible = true;
        $scope.dtColumns[8].visible = true;
        $scope.dtColumns[9].visible = true;
        $scope.dtColumns[10].visible = false;
        $scope.dtColumns[11].visible = false;
        $scope.dtColumns[12].visible = true;
      }
      
    }
  });

$(document).on('click','.approveAnalysisLot',function(event){
   
    var analysislotid = $(this).attr('analysislot-id');

    var status = $(this).attr('status');
    
    var data = {analysislotid : analysislotid,status:status};
    
    data = JSON.stringify(data);
    
    $scope.newvendoranalysislotlist = [];

      $.ajax({
      url: './api/lotgeneration/approve_analysislot',
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

          jQuery.each( response.analysis_lot_list, function( i, val ) {
          
          $scope.newvendoranalysislotlist.push({
            lotId: val.id,
            analysisLotNo: val.lotno,
            analysisTestEdition: val.test_edition,
            analysisLotSentDate: val.lot_sent_date,
            analysisLotVendor: val.vendor_name,
            analysisLotPendriveSentDate: val.lot_pendrive_sent_date,
            analysisLotQcFilePath: val.lot_qc_file_path,
            analysislotQcHtmlFilePath: val.lot_qc_html_file_path,
            analysisLotAcknowledgeDate: val.lot_acknowledge_date,
            analysisLotPrintingDate: val.lot_printing_date,
            analysisLotKittingPackingDate : val.lot_kittingpacking_date,
            analysisLotExpectedDispatchDate: val.lot_expected_dispatch_date,
            analysisLotLotApproveStatus: val.lot_approve_status,
          });

        });

          $scope.dtOptions = DTOptionsBuilder.newOptions().withOption('data', $scope.newvendoranalysislotlist).withOption('fnRowCallback',function(nRow, aData, iDisplayIndex){
            $("td:first", nRow).html(iDisplayIndex +1);
            return nRow;
          }).withOption('processing', true);

          $scope.dtInstance.rerender();

        }
        
      }
    });
  });
  

});

app.controller('AnalysisStatusListController', function($scope,$http,DTOptionsBuilder, DTColumnBuilder, DTColumnDefBuilder){

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

  var region = getCookie('loginuserregion');
  var category = getCookie('loginusercategory');
  var username = getCookie('loginuserlogname');

  //script code to list all the schools of current round with rounds and country
  $scope.dtInstance = {};
  
  $scope.rounds = [];
  $scope.lotnos = [];
  $scope.zones = [];
  $scope.analysismisreports = [];

  var flag = 0;
  var userData = [];
  // var round = $('#qbroundfilter').val();
  var data = {region:region,category:category,username:username};
  data = JSON.stringify(data);

    $.ajax({
    url: './api/lotgeneration/analysis_mis_list',
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
        
        $scope.zones = response.zones;
        $scope.rounds = response.rounds;
        $scope.lotnos = response.lotnos;
        $scope.roundSelected = response.round_selected;

        
        jQuery.each( response.schooldata, function( i, val ) {
         
           $scope.schoolCodes.push(val.school_code);
           $scope.schoolNames.push(val.schoolname);
        
        });
        
        
        jQuery.each( response.analysis_mis_reports, function( i, val ) {

          //var oneDay = 24*60*60*1000; // hours*minutes*seconds*milliseconds
          
          var diffDays = val.processingtat;

          
          
          
          if(diffDays == null){
            diffDays = 'Not Yet Dispatched';
          }

          var deliverydiffDays = val.analysistat;
          
          if(deliverydiffDays == null){
            deliverydiffDays = 'Not Yet Delivered';
          }

          $scope.analysismisreports.push({

            schoolCode: val.school_code,
            schoolName: val.schoolname,
            schoolCity: val.city,
            schoolRegion: val.region,
            schoolPackLabelDate: val.analysis_sentdate,
            schoolQbDispatchDate: val.analysis_despatch_date,
            schoolCourierCompany: val.courier,
            schoolAwbNo: val.consignmentNo,
            schoolMode: val.mode,
            schoolQty: val.material,
            schoolWeight: val.weight,
            schoolTat: diffDays,
            schoolQbDelivery_status: val.analysis_delivery_status,
            schoolQbDeliveryDate:val.analysis_delivery_date,
            schoolQbRecieverName: val.analysis_reciever_name,
            schoolDeliveryTime: deliverydiffDays

          });
        });

        

        $scope.packingdates = response.packlabel_date;
        $scope.citys = response.school_city;


        $scope.dtOptions = DTOptionsBuilder.newOptions().withOption('data', $scope.analysismisreports).withOption('fnRowCallback',function(nRow, aData, iDisplayIndex){
                  $("td:first", nRow).html(iDisplayIndex +1);
                  return nRow;
                }).withOption('processing', true);   


                $scope.dtColumns = [

                DTColumnBuilder.newColumn(null).withTitle('#').withOption('title','#','defaultContent', ' '),
                DTColumnBuilder.newColumn('schoolCode').withTitle('School Code').withOption('title','School Code'),
                DTColumnBuilder.newColumn('schoolName').withTitle('School Name').withOption('title','School Name'),
                DTColumnBuilder.newColumn('schoolCity').withTitle('City').withOption('title','City'),
                DTColumnBuilder.newColumn('schoolRegion').withTitle('Region').withOption('title','Region'),
                DTColumnBuilder.newColumn('schoolPackLabelDate').withTitle('Pack Label Date').withOption('title','Pack Label Date'),
                DTColumnBuilder.newColumn('schoolQbDispatchDate').withTitle('Dispatch Date').withOption('title','Dispatch Date'),
                DTColumnBuilder.newColumn('schoolCourierCompany').withTitle('Courier Company').withOption('title','Courier Company'),
                DTColumnBuilder.newColumn('schoolAwbNo').withTitle('AWB No.').withOption('title','AWB No.'),
                DTColumnBuilder.newColumn('schoolMode').withTitle('Mode').withOption('title','Mode'),
                DTColumnBuilder.newColumn('schoolQty').withTitle('No. Of Box').withOption('title','No. Of Box'),
                DTColumnBuilder.newColumn('schoolWeight').withTitle('Weight').withOption('title','Weight'),
                DTColumnBuilder.newColumn('schoolQbDelivery_status').withTitle('Delivery Status').withOption('title','Delivery Status'),
                DTColumnBuilder.newColumn('schoolQbDeliveryDate').withTitle('Delivery Date').withOption('title','Delivery Date'),
                DTColumnBuilder.newColumn('schoolQbRecieverName').withTitle('Reciever Name').withOption('title','Reciever Name'),
                DTColumnBuilder.newColumn('schoolTat').withTitle('Days Taken For Dispatch').withOption('title','Days Taken For Dispatch'),
                DTColumnBuilder.newColumn('schoolDeliveryTime').withTitle('Days Taken For Delivery').withOption('title','Days Taken For Delivery'),
                ];  
                
                
                $scope.dtColumns[12].visible = false;
                $scope.dtColumns[13].visible = false;
                $scope.dtColumns[14].visible = false;
                $scope.dtColumns[16].visible = false;
                
                
      }
      
    }
  });

  $scope.filteranalysisreports = function(e) {
    $scope.filteredanalysisReports = [];
     
      
        var round = $('#qbroundfilter').val();
        
        var zone = $('#qbzonefilter').val();

        var lotno = $('#packinglotnofilter').val();

        var data = {round:round,lotno:lotno,zone:zone,region:region,category:category,username:username};
        
        data = JSON.stringify(data);

        $.ajax({
            url: "./api/lotgeneration/getAnalysisMisReportsFilter",
            contentType: false,
            processData: false,
            async: true,
            data: data,
            type: 'POST',
            dataType : 'json',
            success: function (returndata) {
              
             var response = returndata;
             
                if(response.status == "success"){

                  
                    jQuery.each( response.filteredanalysisreports, function( i, val ) {

                        var diffDays = val.processingtat;

                        if(diffDays == null){
                          diffDays = 'Not Yet Dispatched';
                        }

                        var deliverydiffDays = val.analysistat;
                        
                        if(deliverydiffDays == null){
                          deliverydiffDays = 'Not Yet Delivered';
                        }


                        
                        $scope.filteredanalysisReports.push({

                          schoolCode: val.school_code,
                          schoolName: val.schoolname,
                          schoolCity: val.city,
                          schoolRegion: val.region,
                          schoolPackLabelDate: val.analysis_sentdate,
                          schoolQbDispatchDate: val.analysis_despatch_date,
                          schoolCourierCompany: val.courier,
                          schoolAwbNo: val.consignmentNo,
                          schoolMode: val.mode,
                          schoolQty: val.material,
                          schoolWeight: val.weight,
                          schoolTat: diffDays,
                          schoolQbDelivery_status: val.analysis_delivery_status,
                          schoolQbDeliveryDate:val.analysis_delivery_date,
                          schoolQbRecieverName: val.analysis_reciever_name,
                          schoolDeliveryTime: deliverydiffDays

                        });


                      });  
            
                $scope.dtOptions = DTOptionsBuilder.newOptions().withOption('data', $scope.filteredanalysisReports).withOption('fnRowCallback',function(nRow, aData, iDisplayIndex){
                  $("td:first", nRow).html(iDisplayIndex +1);
                  return nRow;
                }).withOption('paging', false).withOption('processing', true); 

                $scope.dtInstance.rerender();
               
                }
                else
                {
                  
                $scope.dtOptions = DTOptionsBuilder.newOptions().withOption('data', $scope.filteredanalysisReports).withOption('fnRowCallback',function(nRow, aData, iDisplayIndex){
                  $("td:first", nRow).html(iDisplayIndex +1);
                  return nRow;
                }).withOption('paging', false).withOption('scrollY', "500px").withOption('processing', true).withOption('fnPreDrawCallback', function () { $('#packingloader').show(); }).withOption('fnDrawCallback', function () {  }); 

                

                $scope.dtInstance.rerender();
                  

                }

               }
             });
  };

  
});

app.controller('VendorAnalysisStatusListController', function($scope,$http,DTOptionsBuilder, DTColumnBuilder, DTColumnDefBuilder){

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

  var vendor_id = getCookie('vendor_id');  

  //script code to list all the schools of current round with rounds and country
  $scope.dtInstance = {};
  $scope.rounds = [];
  $scope.lotnos = [];
  $scope.zones = [];
  $scope.analysismisreports = [];

  var flag = 0;
  var userData = [];
  
  var data = {vendor_id:vendor_id};
  data = JSON.stringify(data);

    $.ajax({
    url: './api/lotgeneration/vendor_analysis_mis_list',
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
        
        $scope.zones = response.zones;
        $scope.rounds = response.rounds;
        $scope.lotnos = response.lotnos;
        $scope.roundSelected = response.round_selected;

        
        jQuery.each( response.schooldata, function( i, val ) {
         
           $scope.schoolCodes.push(val.school_code);
           $scope.schoolNames.push(val.schoolname);
        
        });

        jQuery.each( response.analysis_mis_reports, function( i, val ) {

          var diffDays = val.processingtat;

          if(diffDays == null){
            diffDays = 'Not Yet Dispatched';
          }

          var deliverydiffDays = val.analysistat;
          
          if(deliverydiffDays == null){
            deliverydiffDays = 'Not Yet Delivered';
          }


          
          $scope.analysismisreports.push({

            schoolCode: val.school_code,
            schoolName: val.schoolname,
            schoolCity: val.city,
            schoolRegion: val.region,
            schoolPackLabelDate: val.analysis_sentdate,
            schoolQbDispatchDate: val.analysis_despatch_date,
            schoolCourierCompany: val.courier,
            schoolAwbNo: val.consignmentNo,
            schoolMode: val.mode,
            schoolQty: val.material,
            schoolWeight: val.weight,
            schoolTat: diffDays,
            schoolQbDelivery_status: val.analysis_delivery_status,
            schoolQbDeliveryDate:val.analysis_delivery_date,
            schoolQbRecieverName: val.analysis_reciever_name,
            schoolDeliveryTime: deliverydiffDays

          });
        });

        $scope.packingdates = response.packlabel_date;
        $scope.citys = response.school_city;


        $scope.dtOptions = DTOptionsBuilder.newOptions().withOption('data', $scope.analysismisreports).withOption('fnRowCallback',function(nRow, aData, iDisplayIndex){
                  $("td:first", nRow).html(iDisplayIndex +1);
                  return nRow;
                }).withOption('processing', true);   


                $scope.dtColumns = [

                DTColumnBuilder.newColumn(null).withTitle('#').withOption('title','#','defaultContent', ' '),
                DTColumnBuilder.newColumn('schoolCode').withTitle('School Code').withOption('title','School Code'),
                DTColumnBuilder.newColumn('schoolName').withTitle('School Name').withOption('title','School Name'),
                DTColumnBuilder.newColumn('schoolCity').withTitle('City').withOption('title','City'),
                DTColumnBuilder.newColumn('schoolRegion').withTitle('Region').withOption('title','Region'),
                DTColumnBuilder.newColumn('schoolPackLabelDate').withTitle('Pack Label Date').withOption('title','Pack Label Date'),
                DTColumnBuilder.newColumn('schoolQbDispatchDate').withTitle('Dispatch Date').withOption('title','Dispatch Date'),
                DTColumnBuilder.newColumn('schoolCourierCompany').withTitle('Courier Company').withOption('title','Courier Company'),
                DTColumnBuilder.newColumn('schoolAwbNo').withTitle('AWB No.').withOption('title','AWB No.'),
                DTColumnBuilder.newColumn('schoolMode').withTitle('Mode').withOption('title','Mode'),
                DTColumnBuilder.newColumn('schoolQty').withTitle('No. Of Box').withOption('title','No. Of Box'),
                DTColumnBuilder.newColumn('schoolWeight').withTitle('Weight').withOption('title','Weight'),
                DTColumnBuilder.newColumn('schoolQbDelivery_status').withTitle('Delivery Status').withOption('title','Delivery Status'),
                DTColumnBuilder.newColumn('schoolQbDeliveryDate').withTitle('Delivery Date').withOption('title','Delivery Date'),
                DTColumnBuilder.newColumn('schoolQbRecieverName').withTitle('Reciever Name').withOption('title','Reciever Name'),
                DTColumnBuilder.newColumn('schoolTat').withTitle('Days Taken For Dispatch').withOption('title','Days Taken For Dispatch'),
                DTColumnBuilder.newColumn('schoolDeliveryTime').withTitle('Days Taken For Delivery').withOption('title','Days Taken For Delivery'),
                ];  
                
                
                $scope.dtColumns[12].visible = false;
                $scope.dtColumns[13].visible = false;
                $scope.dtColumns[14].visible = false;
                $scope.dtColumns[16].visible = false;


                
      }
      
    }
  });

  $scope.filtervendorqbreports = function(e) {
    
    $scope.filteredqbReports = [];
     
      
        var round = $('#qbroundfilter').val();
        
        var zone = $('#qbzonefilter').val();

        var lotno = $('#packinglotnofilter').val();

        var vendor_id = getCookie('vendor_id');  

        var data = {round:round,lotno:lotno,zone:zone,vendor_id:vendor_id};
        
        data = JSON.stringify(data);

        $.ajax({
            url: "./api/mis_system/getQbMisVendorReportsFilter",
            contentType: false,
            processData: false,
            async: true,
            data: data,
            type: 'POST',
            dataType : 'json',
            success: function (returndata) {
              
             var response = returndata;
             
                if(response.status == "success"){

                  
                    jQuery.each( response.filteredqbreports, function( i, val ) {

                        var diffDays = val.qbtat;

                        if(diffDays == null){
                          diffDays = 'Not Yet Dispatched';
                        }

                        var deliverydiffDays = val.analysistat;
                        
                        if(deliverydiffDays == null){
                          deliverydiffDays = 'Not Yet Delivered';
                        }


                        
                        $scope.filteredqbReports.push({

                          schoolCode: val.school_code,
                          schoolName: val.schoolname,
                          schoolCity: val.city,
                          schoolRegion: val.region,
                          schoolPackLabelDate: val.packlabel_date,
                          schoolQbDispatchDate: val.qb_despatch_date,
                          schoolCourierCompany: val.courier,
                          schoolAwbNo: val.consignmentNo,
                          schoolMode: val.mode,
                          schoolQty: val.material,
                          schoolWeight: val.weight,
                          schoolTat: diffDays,
                          schoolQbDelivery_status: val.qb_delivery_status,
                          schoolQbDeliveryDate:val.qb_delivery_date,
                          schoolQbRecieverName: val.qb_reciever_name,
                          schoolDeliveryTime: deliverydiffDays

                        });


                      });  
            
                $scope.dtOptions = DTOptionsBuilder.newOptions().withOption('data', $scope.filteredqbReports).withOption('fnRowCallback',function(nRow, aData, iDisplayIndex){
                  $("td:first", nRow).html(iDisplayIndex +1);
                  return nRow;
                }).withOption('paging', false).withOption('processing', true); 

                $scope.dtInstance.rerender();
               
                }
                else
                {
                  
                $scope.dtOptions = DTOptionsBuilder.newOptions().withOption('data', $scope.filteredqbReports).withOption('fnRowCallback',function(nRow, aData, iDisplayIndex){
                  $("td:first", nRow).html(iDisplayIndex +1);
                  return nRow;
                }).withOption('paging', false).withOption('scrollY', "500px").withOption('processing', true).withOption('fnPreDrawCallback', function () { $('#packingloader').show(); }).withOption('fnDrawCallback', function () {  }); 

                $scope.dtInstance.rerender();
              
                }

               }
             });
  };

  
});