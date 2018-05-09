<aside class="main-sidebar">
  <section class="sidebar">
    <div class="user-panel">
      <div class="pull-left image">
        <?php if((!empty($loggedUser['profile_pic']))){ ?>
        <img src="<?=IMG_ADMIN.'user/thumb/'.$loggedUser['profile_pic']?>" width="160" height="160" class="img-circle" alt="User Image">
        <?php  }else{ ?>
        <img src="<?=IMG_ADMIN?>user2-160x160.jpg" width="160" height="160" class="img-circle" alt="User Image">
        <?php } ?>
      </div>
      <div class="pull-left info">
        <p><?php echo (!empty($loggedUser))?$loggedUser['full_name']:''; ?></p>
        <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
      </div>
    </div>
    <ul class="sidebar-menu">
      <li class="header"><i class="fa fa-angle-double-right"></i> ADMIN PANEL</li>
      <li class="active treeview">
        <a href="<?=ADMIN_WEBROOT?>home">
          <i class="fa fa-dashboard"></i> <span>Dashboard</span>
        </a>
      </li>
      <li class="treeview">
        <a href="#">
          <i class="fa fa-fw fa-user"></i>
          <span>User Management</span>
          <span class="label label-primary pull-right"><?=$no_of_user?></span>
        </a>
        <ul class="treeview-menu">
          <li><a href="<?=ADMIN_WEBROOT?>users"><i class="fa fa-angle-double-right"></i> List Users</a></li>
          <li><a href="<?=ADMIN_WEBROOT?>users/add"><i class="fa fa-angle-double-right"></i> Add User</a></li>
        </ul>
      </li>
      <li class="treeview">
        <a href="#">
          <i class="fa fa-fw fa-envelope"></i>
          <span>Email Templates</span>
          <i class="fa fa-angle-left pull-right"></i>
        </a>
        <ul class="treeview-menu">
          <li><a href="<?=ADMIN_WEBROOT?>EmailTemplates"><i class="fa fa-angle-double-right"></i> List Templates</a></li>
          <li><a href="<?=ADMIN_WEBROOT?>EmailTemplates/add"><i class="fa fa-angle-double-right"></i> Add Template</a></li>     </ul>
        </li>
        <li class="treeview">
          <a href="#">
            <i class="fa fa-fw fa-tag"></i>
            <span>User Tags</span>
            <i class="fa fa-angle-left pull-right"></i>
          </a>
          <ul class="treeview-menu">
            <li><a href="<?=ADMIN_WEBROOT?>UserTags/user_tag"><i class="fa fa-angle-double-right"></i> List User Tags</a></li>
            <li><a href="<?=ADMIN_WEBROOT?>UserTags"><i class="fa fa-angle-double-right"></i> List Tags</a></li>
            <li><a href="<?=ADMIN_WEBROOT?>UserTags/add"><i class="fa fa-angle-double-right"></i> Add Tag</a></li>     
          </ul>
        </li>
        <li class="treeview">
          <a href="#">
            <i class="fa fa-fw fa-pencil-square"></i>
            <span>Manage Content</span>
            <i class="fa fa-angle-left pull-right"></i>
          </a>
          <ul class="treeview-menu">
            <li><a href="<?=ADMIN_WEBROOT?>contents"><i class="fa fa-angle-double-right"></i> List Pages</a></li>
            <li><a href="<?=ADMIN_WEBROOT?>contents/add"><i class="fa fa-angle-double-right"></i> Add Page</a></li>
          </ul>
        </li>
        <li><a href="<?=ADMIN_WEBROOT?>UserFriends"><i class="fa fa-fw fa-users"></i> User Friends <i class="fa fa-angle-left pull-right"></i></a></li>
      </ul>
    </section>
  </aside>