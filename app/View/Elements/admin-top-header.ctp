<header class="main-header">
  <a href="<?=ADMIN_WEBROOT?>home" class="logo">
    <span class="logo-mini">SE</span>
    <span class="logo-lg"><b>STORIES</b>EPICS</span>
  </a>
  <!-- Header Navbar: style can be found in header.less -->
  <nav class="navbar navbar-static-top" role="navigation">
    <!-- Sidebar toggle button-->
    <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
      <span class="sr-only">Toggle navigation</span>
    </a>
    <!-- Navbar Right Menu -->
    <div class="navbar-custom-menu">
      <ul class="nav navbar-nav">
        <!-- User Account: style can be found in dropdown.less -->
        <li class="dropdown user user-menu">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown">
            <?php if((!empty($loggedUser['profile_pic']))){ ?>
              <img src="<?=IMG_ADMIN.'user/thumb/'.$loggedUser['profile_pic']?>" width="160" height="160" class="user-image" alt="User Image">
            <?php  }else{ ?>
                <img src="<?=IMG_ADMIN?>user2-160x160.jpg" width="160" height="160" class="user-image" alt="User Image">
              <?php } ?>
            <span class="hidden-xs"><?php echo (!empty($loggedUser))?$loggedUser['full_name']:''; ?></span>
          </a>
          <ul class="dropdown-menu">
            <!-- User image -->
            <li class="user-header">
              <?php if((!empty($loggedUser['profile_pic']))){ ?>
                <img src="<?=IMG_ADMIN.'user/thumb/'.$loggedUser['profile_pic']?>" width="160" height="160" class="img-circle" alt="User Image">
              <?php  }else{ ?>
                  <img src="<?=IMG_ADMIN?>user2-160x160.jpg" width="160" height="160" class="img-circle" alt="User Image">
                <?php } ?>
              <p>
                <?php echo (!empty($loggedUser))?$loggedUser['full_name']:''; ?>
                <small>Member since <?php echo (!empty($loggedUser))?date('M, Y',strtotime($loggedUser['user_added_date'])):''; ?></small>
              </p>
            </li>                  
            <!-- Menu Footer-->
            <li class="user-footer">
              <div class="pull-left">
              <a href="<?=ADMIN_WEBROOT?>users/profile" class="btn btn-default btn-flat">Profile</a>
              </div>
              <div class="pull-right">
                <a href="<?=ADMIN_WEBROOT?>logins/logout" class="btn btn-default btn-flat">Sign out</a>
              </div>
            </li>
          </ul>
        </li>
      </ul>
    </div>
  </nav>
</header>

