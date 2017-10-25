<div class="sidebar">
  <div class="logopanel">
    <h1>
      <img src="<?php echo base_url();?>pictures/kbk.gif" height="35" width="154" alt="logo" class="logo-default" /> </a>
    </h1>
  </div>
  <div class="sidebar-inner">
    <ul class="nav nav-sidebar">
      <!-- DASHBOARD -->
      <?php if ($main == "Dashboard") { ?>
          <li class=" nav-active active">
        <?php }else { ?>
          <li class=" nav">
        <?php } ?>
          <a href="<?php echo base_url();?>Dashboard"><i class="icon-home"></i><span>Dashboard</span></a>
        </li>
      <!-- DASHBOARD -->

      <!-- MCU -->
      <?php if ($this->session->userdata('rolePMR') == "dokter" || $this->session->userdata('rolePMR') == "hr"): ?>
        <?php if ($main == "MCU") { ?>
          <li class="nav-parent nav-active active">
        <?php }else { ?>
          <li class="nav-parent">
        <?php } ?>
          <a href=""><i class="icon icons-medical-03"></i><span>Medical Check Up</span> <span class="fa arrow"></span></a>
          <ul class="children collapse">
            <?php if ($sub == "InputMCU") { ?>
              <li class="active">
            <?php }else { ?>
              <li >
            <?php } ?>
              <a href="<?php echo base_url();?>MCU/Input"> Input MCU</a>
            </li>
            <?php if ($sub == "recordMCU") { ?>
              <li class="active">
            <?php }else { ?>
              <li >
            <?php } ?>
              <a href="<?php echo base_url();?>MCU/Table"> MCU Record</a>
            </li>
            <?php if ($sub == "importMCU") { ?>
              <li class="active">
            <?php }else { ?>
              <li >
            <?php } ?>
              <a href="<?php echo base_url();?>MCU/Import"> Import MCU</a>
            </li>
          </ul>
        </li>
      <?php endif; ?>
      <!-- MCU -->

      <!-- ON SITE -->
      <?php if ($main == "OnSite") { ?>
          <li class="nav-parent nav-active active">
        <?php }else { ?>
          <li class="nav-parent">
        <?php } ?>
        <a href=""><i class="fa fa-sign-in"></i><span>On Site Record</span> <span class="fa arrow"></span></a>
        <ul class="children collapse">
          <?php if ($sub == "InputOnSite") { ?>
            <li class="active">
          <?php }else { ?>
            <li >
          <?php } ?>
            <a href="<?php echo base_url();?>OnSite/Input"> Input On Site Record</a>
          </li>
          <?php if ($this->session->userdata('rolePMR') == "dokter" || $this->session->userdata('rolePMR') == "hr"): ?>
            <?php if ($sub == "recordOnSite") { ?>
              <li class="active">
            <?php }else { ?>
              <li >
            <?php } ?>
              <a href="<?php echo base_url();?>OnSite/Table"> View On Site Record</a>
            </li>
            <?php if ($sub == "importOnSite") { ?>
              <li class="active">
            <?php }else { ?>
              <li >
            <?php } ?>
              <a href="<?php echo base_url();?>OnSite/Import"> Import On Site Record</a>
            </li>
          <?php endif; ?>
        </ul>
      </li>
      <!-- ON SITE -->

      <!-- OFF SITE -->
      <?php if ($this->session->userdata('rolePMR') == "dokter" || $this->session->userdata('rolePMR') == "hr"): ?>
        <?php if ($main == "OffSite") { ?>
          <li class="nav-parent nav-active active">
        <?php }else { ?>
          <li class="nav-parent">
        <?php } ?>
          <a href=""><i class="fa fa-external-link"></i><span>Off Site Record</span><span class="fa arrow"></span></a>
          <ul class="children collapse">
            <?php if ($sub == "InputOffSite") { ?>
              <li class="active">
            <?php }else { ?>
              <li >
            <?php } ?>
              <a href="<?php echo base_url();?>OffSite/Input"> Input OffSite Record</a>
            </li>
            <?php if ($sub == "recordOffSite") { ?>
              <li class="active">
            <?php }else { ?>
              <li >
            <?php } ?>
              <a href="<?php echo base_url();?>OffSite/Table"> View OffSite Record</a>
            </li>
            <?php if ($sub == "importOffSite") { ?>
              <li class="active">
            <?php }else { ?>
              <li >
            <?php } ?>
              <a href="<?php echo base_url();?>OffSite/Import"> Import OffSite Record</a>
            </li>
          </ul>
        </li>
      <?php endif; ?>
      <!-- OFF SITE -->

      <!-- REFERENCE -->
      <?php if ($this->session->userdata('rolePMR') == "dokter" || $this->session->userdata('rolePMR') == "hr"): ?>
        <?php if ($main == "Reference") { ?>
          <li class="nav-parent nav-active active">
        <?php }else { ?>
          <li class="nav-parent">
        <?php } ?>
          <a href=""><i class="fa fa-user-md"></i><span>Referral</span><span class="fa arrow"></span></a>
          <ul class="children collapse">
            <?php if ($sub == "InputReference") { ?>
              <li class="active">
            <?php }else { ?>
              <li >
            <?php } ?>
              <a href="<?php echo base_url();?>Reference/Input"> Input Referral</a>
            </li>
            <?php if ($sub == "recordReference") { ?>
              <li class="active">
            <?php }else { ?>
              <li >
            <?php } ?>
              <a href="<?php echo base_url();?>Reference/Table"> View Referral</a>
            </li>
            <?php if ($sub == "importReference") { ?>
              <li class="active">
            <?php }else { ?>
              <li >
            <?php } ?>
              <a href="<?php echo base_url();?>Reference/Import"> Import Referral</a>
            </li>
            <?php if ($sub == "uploadReference") { ?>
              <li class="active">
            <?php }else { ?>
              <li >
            <?php } ?>
              <a href="<?php echo base_url();?>Reference/Upload"> Upload Referral</a>
            </li>
          </ul>
      </li>
      <?php endif; ?>
      <!-- REFERENCE -->

      <!-- PMR -->
      <?php if ($this->session->userdata('rolePMR') == "dokter" || $this->session->userdata('rolePMR') == "hr"): ?>
        <?php if ($main == "PMR") { ?>
          <li class=" nav-active active">
        <?php }else { ?>
          <li class=" nav">
        <?php } ?>
          <a href="<?php echo base_url();?>Summary"><i class="fa fa-book"></i><span>Personal Medical Record </span></a>
        </li>
      <?php endif; ?>
      <!-- PMR -->

      <!-- PATIENT -->
      <?php if ($main == "Patient") { ?>
          <li class="nav-parent nav-active active">
        <?php }else { ?>
          <li class="nav-parent">
        <?php } ?>
        <a href=""><i class="fa fa-users"></i><span>patient</span><span class="fa arrow"></span></a>
        <ul class="children collapse">
          <?php if ($sub == "InputPatient") { ?>
            <li class="active">
          <?php }else { ?>
            <li >
          <?php } ?>
            <a href="<?php echo base_url();?>Patient/Input"> New Patient</a>
          </li>
          <?php if ($sub == "recordPatient") { ?>
            <li class="active">
          <?php }else { ?>
            <li >
          <?php } ?>
            <a href="<?php echo base_url();?>Patient/Table"> List Patient</a>
          </li>
          <?php if ($this->session->userdata('rolePMR') == "dokter" || $this->session->userdata('rolePMR') == "hr"): ?>
            <?php if ($sub == "importPatient") { ?>
              <li class="active">
            <?php }else { ?>
              <li >
            <?php } ?>
              <a href="<?php echo base_url();?>Patient/Import"> Import Patient</a>
            </li>
          <?php endif; ?>
        </ul>
      </li>
      <!-- PATIENT -->

    </ul>
  </div>
</div>
