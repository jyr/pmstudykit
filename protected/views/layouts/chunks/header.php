<!-- Logo -->
        <a href="<?php echo Yii::app()->request->baseUrl; ?>" class="logo"><b>PMSTUDYKIT</b>(Beta)</a>
        <!-- Header Navbar: style can be found in header.less -->
        <nav class="navbar navbar-static-top" role="navigation">
          <!-- Sidebar toggle button-->
          <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </a>
          <div class="navbar-custom-menu">
            <ul class="nav navbar-nav">
              <!-- Messages: style can be found in dropdown.less-->
              
              <!-- User Account: style can be found in dropdown.less -->
              <li class="dropdown user user-menu">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                  <img src="http://pmstudykit.com/resources/userprofile.jpg" class="user-image" alt="User Image"/>
                  <span class="hidden-xs"><?php echo Yii::app()->session['name']." ".Yii::app()->session['lastname'];?></span>
                </a>
                <ul class="dropdown-menu">
                  <!-- User image -->
                  <li class="user-header">
                    <img src="http://pmstudykit.com/resources/userprofile.jpg" class="img-circle" alt="User Image" />
                    <p>
                      <?php echo Yii::app()->session['name']." ".Yii::app()->session['lastname'];?>
                      <!-- <small>Member since Nov. 2012</small> -->
                    </p>
                  </li>

                  <!-- Menu Footer-->
                  <li class="user-footer">
                    <!-- <div class="pull-left">
                      <a href="#" class="btn btn-default btn-flat">Profile</a>
                    </div> -->
                    <div class="pull-right">
                      <a href="<?php echo Yii::app()->createAbsoluteUrl("Site/close"); ?>" class="btn btn-default btn-flat">Cerrar sesión</a>
                    </div>
                  </li>
                </ul>
              </li>
              <!-- Control Sidebar Toggle Button 
              <li>
                <a href="#" data-toggle="control-sidebar"><i class="fa fa-gears"></i></a>
              </li>-->
            </ul>
          </div>
        </nav>