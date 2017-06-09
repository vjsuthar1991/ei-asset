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
  var round = $('#roundfilter').val();
  var data = {round:'V'};
  data = JSON.stringify(data);

  $.ajax({
    url: './api/packingslip/list_schools',
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
                          percentagePaid: val.advance_per_paid

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
      var vendorSelected = $('#vendorSelected').val();

      var round = $('#roundfilter').val();
      
      if(vendorSelected != "" && vendorSelected != "undefined")
      {
        $('#vendorSelected').css('box-shadow','0px 0px #FF968B');
      if(arrayOfValues.length > 0){

        $('#generatepackingslip').attr('disabled','disabled');
        
        var data = {data:arrayOfValues,vendor:vendorSelected,round:round};
        
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
                    packingslipSchoolsCSV: val. packingslip_schools_data_csv,
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
                      return '<a href="api/packingslipbreakupCSVFiles/'+full.packingslipBreakupCSV+'" download="'+full.packingslipBreakupCSV+'" title="Download CSV"><img style="width: 30px;height: 30px;" class="packingslip-breakup-download" src="asset/img/CSV_download.png"></a>';
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

                  $('#vendor_userdescname').text(response.data[0].vendor_name);

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

                  $('#mimin').removeClass('form-signin-wrapper');

                  $location.path('/vendor-dashboard');$scope.$apply();$route.reload();


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
              }
              
            }
          });

return false;


  });

});

app.controller('UnauthorisedAccessController', function($scope,$http,$routeParams,$location,$window,$route){

});

app.controller('VendorDashboardController', function($scope,$http,$ocLazyLoad) {

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

                setTimeout(function(){ $('#upload_csv_message_box').addClass('hide'); }, 2000);
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

  //script code to list all the schools of current round with rounds and country
  $scope.dtInstance = {};
  
  $scope.rounds = [];
  $scope.lotnos = [];
  $scope.zones = [];
  $scope.qbmisreports = [];

  var flag = 0;
  var userData = [];
  var round = $('#qbroundfilter').val();
  var data = {round:'V'};
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

        
        jQuery.each( response.schooldata, function( i, val ) {
         
           $scope.schoolCodes.push(val.school_code);
           $scope.schoolNames.push(val.school_name);
        
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
            schoolName: val.school_name,
            schoolCity: val.school_city,
            schoolRegion: val.school_region,
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

        var data = {round:round,lotno:lotno,zone:zone};
        
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

                  console.log(response.filteredqbreports);
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
                          schoolName: val.school_name,
                          schoolCity: val.school_city,
                          schoolRegion: val.school_region,
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
            
                console.log($scope.filteredqbReports);

                   
                   
                    
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

app.controller('DashboardPenAndPaperPreTestController', function($scope,$http){
  var doughnutData = [
                {
                    value: 100,
                    color:"#4ED18F",
                    highlight: "#15BA67",
                    label: "Alfa"
                },
                {
                    value: 250,
                    color: "#15BA67",
                    highlight: "#15BA67",
                    label: "Beta"
                },
                {
                    value: 100,
                    color: "#5BAABF",
                    highlight: "#15BA67",
                    label: "Gamma"
                },
                

            ];

              var ctx2 = $(".pie-chart")[0].getContext("2d");
                window.myPie = new Chart(ctx2).Pie(doughnutData, {
                    responsive : true,
                    showTooltips: true
                });

                var ctx2 = $(".pie-chart2")[0].getContext("2d");
                window.myPie = new Chart(ctx2).Pie(doughnutData, {
                    responsive : true,
                    showTooltips: true
                });

                var ctx2 = $(".pie-chart3")[0].getContext("2d");
                window.myPie = new Chart(ctx2).Pie(doughnutData, {
                    responsive : true,
                    showTooltips: true
                });

                var ctx2 = $(".pie-chart4")[0].getContext("2d");
                window.myPie = new Chart(ctx2).Pie(doughnutData, {
                    responsive : true,
                    showTooltips: true
                });

                var ctx2 = $(".pie-chart5")[0].getContext("2d");
                window.myPie = new Chart(ctx2).Pie(doughnutData, {
                    responsive : true,
                    showTooltips: true
                });




});