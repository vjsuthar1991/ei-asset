<!-- start: Header -->
        <nav class="navbar navbar-default header navbar-fixed-top">
          <div class="col-md-12 nav-wrapper">
            <div class="navbar-header" style="width:100%;">
                <a href="" class="navbar-brand">
                <img src="asset/img/asset-logo.png" style="width: 39px;display: inline-block;margin-top: -6px;"> 
                 <b style="font-size: 25px;">ASSET</b>
                </a>

              <ul class="nav navbar-nav search-nav">
              
              <li class="active"><a href="./">Home</a></li>
               

              <li class="dropdown">
                <a href="javascript:void(0)" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Vendor Management <span class="caret"></span></a>
                <ul class="dropdown-menu">
                  <li><a href="create_vendor">Create Vendor</a></li>
                  <li role="separator" class="divider"></li>
                  <li><a href="vendor_list">Vendor's List</a></li>
                </ul>
              </li>

              <li class="dropdown">
                <a href="javascript:void(0)" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Pre Test <span class="caret"></span></a>
                <ul class="dropdown-menu">
                  <li><a href="generate_packing_slips">Generate Packing Slip</a></li>
                  <li role="separator" class="divider"></li>
                  <li><a href="packing_slips_list">Packing Slip List</a></li>
                  <li role="separator" class="divider"></li>
                  <li><a href="qb_mis_list">Test Material Status</a></li>
                  <li role="separator" class="divider"></li>
                  <li><a href="school-order-tracking">School Order Tracking</a></li>
                </ul>
              </li>
              
              </ul>

              <ul class="nav navbar-nav navbar-right user-nav">
                <li class="user-name"><span id="usernamespan"></span></li>
                  <li class="dropdown avatar-dropdown">
                   <img src="asset/img/avatar.jpg" class="img-circle avatar" alt="user name" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true"/>
                   <ul style="background-color:#FFF !important;" class="dropdown-menu user-dropdown">
                     <li ><a href="admin-logout"><span class="fa fa-power-off"></span> Logout</a></li>
                     <!-- <li><a href="#"><span class="fa fa-calendar"></span> My Calendar</a></li>
                     <li role="separator" class="divider"></li>
                     <li class="more">
                      <ul>
                        <li><a href=""><span class="fa fa-cogs"></span></a></li>
                        <li><a href=""><span class="fa fa-lock"></span></a></li>
                        <li><a href=""><span class="fa fa-power-off"></span></a></li>
                      </ul>
                    </li> -->
                  </ul>
                </li>
              </ul>
            </div>
          </div>
        </nav>
        <script type="text/javascript">

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
                  ;
          $('#usernamespan').text('Welcome! '+getCookie('loginusername'));

        </script>
      <!-- end: Header -->