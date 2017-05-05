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

    $(document).on('submit','#adduserform',function(){
            // code
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

app.controller('EditUserController', function($scope,$http,$routeParams){
    var param1 = $routeParams.param1;
    console.log(param1);
});