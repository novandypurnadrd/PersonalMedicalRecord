<div class="topbar">
	<div class="header-left">
		<div class="topnav">
			<a class="menutoggle" href="#" data-toggle="sidebar-collapsed"><span class="menu__handle"><span>Menu</span></span></a>
		</div>
	</div>
	<div class="header-right">
		<ul class="header-menu nav navbar-nav">
			<!-- BEGIN USER DROPDOWN -->
			<li class="dropdown" id="user-header">
				<a href="#" data-toggle="dropdown" data-hover="dropdown" data-close-others="true">
				<i class="icon-user"></i>
				<span class="username"><?php echo $this->session->userdata('namePMR'); ?></span>
				</a>
				<ul class="dropdown-menu">
          <li>
            <a href="<?php echo base_url();?>Profile"><i class="fa fa-gear"></i><span>Change Password</span></a>
          </li>
          <li>
            <a href="<?php echo base_url();?>PMR/Logout"><i class="icon-logout"></i><span>Logout</span></a>
          </li>
        </ul>
      </li>
      <!-- END USER DROPDOWN -->
      <!-- CHAT BAR ICON -->
      <li id="quickview-toggle"></li>
		</ul>
	</div>
	<!-- header-right -->
</div>
