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
    $('#uploadqbanalysismisbtn').attr('disabled','disabled');
    var fileUpload = document.getElementById("qbmis_csvfile");
    event.preventDefault();

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

          var oneDay = 24*60*60*1000; // hours*minutes*seconds*milliseconds
          var firstDate = new Date(val.qb_despatch_date);
          var secondDate = new Date(val.packlabel_date);

          var diffDays = Math.round((firstDate.getTime() - secondDate.getTime())/(oneDay));
          
          if(isNaN(diffDays)){
            diffDays = 'Not Yet Dispatched';
          }

          var dispatchDate = new Date(val.qb_despatch_date);
          var deliveryDate = new Date(val.qb_delivery_date);

          var deliverydiffDays = Math.round((deliveryDate.getTime() - dispatchDate.getTime())/(oneDay));
          
          if(isNaN(deliverydiffDays)){
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

                        var oneDay = 24*60*60*1000; // hours*minutes*seconds*milliseconds
                        var firstDate = new Date(val.qb_despatch_date);
                        var secondDate = new Date(val.packlabel_date);

                        var diffDays = Math.round((firstDate.getTime() - secondDate.getTime())/(oneDay));
                        
                        if(isNaN(diffDays)){
                          diffDays = 'Not Yet Dispatched';
                        }

                        var dispatchDate = new Date(val.qb_despatch_date);
                        var deliveryDate = new Date(val.qb_delivery_date);

                        var deliverydiffDays = Math.round((deliveryDate.getTime() - dispatchDate.getTime())/(oneDay));
                        
                        if(isNaN(deliverydiffDays)){
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

          var oneDay = 24*60*60*1000; // hours*minutes*seconds*milliseconds
          var firstDate = new Date(val.qb_despatch_date);
          var secondDate = new Date(val.packlabel_date);

          var diffDays = Math.round((firstDate.getTime() - secondDate.getTime())/(oneDay));
          
          if(isNaN(diffDays)){
            diffDays = 'Not Yet Dispatched';
          }

          var dispatchDate = new Date(val.qb_despatch_date);
          var deliveryDate = new Date(val.qb_delivery_date);

          var deliverydiffDays = Math.round((deliveryDate.getTime() - dispatchDate.getTime())/(oneDay));
          
          if(isNaN(deliverydiffDays)){
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

                        var oneDay = 24*60*60*1000; // hours*minutes*seconds*milliseconds
                        var firstDate = new Date(val.qb_despatch_date);
                        var secondDate = new Date(val.packlabel_date);

                        var diffDays = Math.round((firstDate.getTime() - secondDate.getTime())/(oneDay));
                        
                        if(isNaN(diffDays)){
                          diffDays = 'Not Yet Dispatched';
                        }

                        var dispatchDate = new Date(val.qb_despatch_date);
                        var deliveryDate = new Date(val.qb_delivery_date);

                        var deliverydiffDays = Math.round((deliveryDate.getTime() - dispatchDate.getTime())/(oneDay));
                        
                        if(isNaN(deliverydiffDays)){
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

});

app.controller('DashboardPenAndPaperPreTestController', function($scope,$http,$routeParams,DTOptionsBuilder, DTColumnBuilder, DTColumnDefBuilder,$location,$window,$route){
  
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
            DTColumnBuilder.newColumn('schoolCode').withTitle('School Code').withOption('title','School Code'),
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
            DTColumnBuilder.newColumn('schoolCode').withTitle('School Code').withOption('title','School Code'),
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
            DTColumnBuilder.newColumn('schoolCode').withTitle('School Code').withOption('title','School Code'),
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
            DTColumnBuilder.newColumn('schoolCode').withTitle('School Code').withOption('title','School Code'),
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
            DTColumnBuilder.newColumn('schoolCode').withTitle('School Code').withOption('title','School Code'),
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
            DTColumnBuilder.newColumn('schoolCode').withTitle('School Code').withOption('title','School Code'),
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
            DTColumnBuilder.newColumn('schoolCode').withTitle('School Code').withOption('title','School Code'),
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
            DTColumnBuilder.newColumn('schoolCode').withTitle('School Code').withOption('title','School Code'),
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
            DTColumnBuilder.newColumn('schoolCode').withTitle('School Code').withOption('title','School Code'),
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
            DTColumnBuilder.newColumn('schoolCode').withTitle('School Code').withOption('title','School Code'),
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
            DTColumnBuilder.newColumn('schoolCode').withTitle('School Code').withOption('title','School Code'),
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
            DTColumnBuilder.newColumn('schoolCode').withTitle('School Code').withOption('title','School Code'),
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
            DTColumnBuilder.newColumn('schoolCode').withTitle('School Code').withOption('title','School Code'),
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
            DTColumnBuilder.newColumn('schoolCode').withTitle('School Code').withOption('title','School Code'),
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
            DTColumnBuilder.newColumn('schoolCode').withTitle('School Code').withOption('title','School Code'),
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
            DTColumnBuilder.newColumn('schoolCode').withTitle('School Code').withOption('title','School Code'),
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

app.controller('SchoolOrderTrackingController', function($scope,$http,$ocLazyLoad,$location,$window,$route,$routeParams) {

 
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
