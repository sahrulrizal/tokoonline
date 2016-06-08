<?php $this->load->view('incl/head_admin'); ?>
<body class="skin-black sidebar-mini layout-boxed">
<div class="wrapper">

  <header class="main-header">
    <!-- Logo -->
    <a href="" class="logo"><b><?= $key->nama_brand;?></b></a>
    <!-- Header Navbar: style can be found in header.less -->
    <nav class="navbar navbar-static-top" role="navigation">
      <!-- Sidebar toggle button-->
      <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
        <span class="sr-only">Toggle navigation</span>
      </a>
      <div class="navbar-custom-menu">
        <ul class="nav navbar-nav">
          <!-- Messages: style can be found in dropdown.less-->
          <li class="dropdown messages-menu">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              <i class="fa fa-envelope-o"></i>
              <span class="label label-success"><?= $this->mp->invoice_tunggu()->num_rows(); ?></span>
            </a>
            <ul class="dropdown-menu">
              <li class="header">Kamu mempunyai <?= $this->mp->invoice_tunggu()->num_rows(); ?> pesanan</li>
              <li>
                <!-- inner menu: contains the actual data -->
                <div class="slimScrollDiv" style="position: relative; overflow-y: scroll; width: auto; height: 200px;"><ul class="menu" style="overflow: hidden; width: 100%; height: 200px;">
                <?php foreach ($this->mp->invoice_tunggu()->result() as $in): ?>                  
                  <li>
                    <a href="<?= site_url('vp/invoices/invoices_pandding') ?>">
                      <div class="pull-left">
                        <img src="<?=base_url();?>assets/dist/img/avatar5.png" class="img-circle" alt="pemesan">
                      </div>
                      <h4>
                        <?= $in->nama;?>
                        <small><i class="fa fa-clock-o"></i> <?= $in->date; ?></small>
                      </h4>
                      <p>Menunggu konfirmasi</p>
                    </a>
                  </li>
                <?php endforeach ?>
                </ul><div class="slimScrollBar" style="width: 3px; position: absolute; top: 0px; opacity: 0.4; display: block; border-radius: 7px; z-index: 99; right: 1px; background: rgb(0, 0, 0);"></div><div class="slimScrollRail" style="width: 3px; height: 100%; position: absolute; top: 0px; display: none; border-radius: 7px; opacity: 0.2; z-index: 90; right: 1px; background: rgb(51, 51, 51);"></div></div>
              </li>
              <li class="footer"><a href="<?= site_url('vp/invoices/invoices_pandding') ?>">See All Messages</a></li>
            </ul>
          </li>
          <li class="dropdown notifications-menu">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                  <i class="fa fa-exchange"></i>
                  <span class="label label-warning"><?= $this->mp->feedback_tunggu()->num_rows(); ?></span>
                </a>
                <ul class="dropdown-menu">
                  <li class="header">Kamu mempunyai <?= $this->mp->feedback_tunggu()->num_rows(); ?> Feedback</li>
                  <li>
                    <!-- inner menu: contains the actual data -->
                    <ul class="menu">
                     <?php foreach ($this->mp->feedback_tunggu()->result() as $in){ ?> 
                      <li>
                        <a href="<?=site_url('pp/feedback_to')?>">
                          <i class="fa fa-exchange text-aqua"></i><?= $in->kode_invoice; ?> 
                        </a>
                      </li>
                      <?php } ?>
                    </ul>
                  </li>
                  <li class="footer"><a href="<?=site_url('pp/feedback_to')?>">View all</a></li>
                </ul>
          </li>
          <!-- User Account: style can be found in dropdown.less -->
          <li class="dropdown user user-menu">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              <img src="<?=base_url('uploads/'.$key->logo); ?> " class="user-image" alt="User Image">
              <span class="hidden-xs"><?= $key->nama_lengkap;?></span>
            </a>
            <ul class="dropdown-menu">
              <!-- User image -->
              <li class="user-header">
                <img src="<?=base_url('uploads/'.$key->logo); ?> " class="img-circle" alt="User Image">
                <p>
                  <?= $key->nama_lengkap;?>
                  <small>Member since Feb. 2016</small>
                </p>
              </li>
              <!-- Menu Footer-->
              <li class="user-footer">
                <div class="pull-left">
                  <a href="<?=site_url('vp/profile')?>" class="btn btn-default btn-flat">Profile</a>
                 </div>
                <div class="pull-right">
                  <a href="<?=site_url('vp/logout')?>" class="btn btn-default btn-flat">Sign out</a>
                 </div>
              </li>
            </ul>
          </li>
        </ul>
      </div>
    </nav>
  </header>
  <!-- Left side column. contains the logo and sidebar -->
  <aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar" style="height: auto;">
      <!-- Sidebar user panel -->
      <div class="user-panel">
        <div class="image">
          <p>
            <a href="<?= site_url()?>">
            <button type="button" class="btn btn-success" style="width: 100%;">Lihat Website</button>
            </a>
          </p>
          <a href="<?= site_url('vp/laman')?>">
          <button type="button" class="btn btn-warning" style="width: 100%;">Halaman</button>
          </a>
        </div>
      </div>
    
      <!-- /.search form -->
      <!-- sidebar menu: : style can be found in sidebar.less -->
      <ul class="sidebar-menu">
        <li class="header">MENU CONTROL PANEL</li>
        <li class="<?php if($this->uri->segment(2) == 'dashboard'){echo 'active';}?>">
          <a href="<?= site_url('vp/dashboard'); ?>">
            <i class="fa fa-dashboard"></i> <span>Dashboard</span> <i class=" pull-right"></i>
          </a>
        </li>
        <li class="<?php if($this->uri->segment(2) == 'produk'){echo 'active';}?>">
          <a href="<?= site_url('vp/produk'); ?>">
            <i class="fa fa-archive"></i> <span>Produk</span> <i class=" pull-right"></i>
          </a>
        </li>
        <li class="<?php if($this->uri->segment(2) == 'slider'){echo 'active';}?>">
          <a href="<?= site_url('vp/slider'); ?>">
            <i class="fa fa-picture-o"></i> <span>Slider</span> <i class=" pull-right"></i>
          </a>
        </li>
         <li class="<?php if($this->uri->segment(2) == 'gadget'){echo 'active';}?>">
          <a href="<?= site_url('vp/gadget'); ?>">
            <i class="fa fa-puzzle-piece"></i> <span>Gadget</span> <i class=" pull-right"></i>
          </a>
        </li>
         <li class="<?php if($this->uri->segment(2) == 'promo'){echo 'active';}?>">
          <a href="<?= site_url('vp/promo'); ?>">
            <i class="fa fa-gift"></i> <span>Promo</span> <i class=" pull-right"></i>
          </a>
        </li>
         <!-- <li class="treeview <?php if($this->uri->segment(3) == 'daftar_menu' || $this->uri->segment(3) == 'daftar_submenu'){echo 'active';}?>">
          <a href="#">
            <i class="fa fa-bars"></i>
            <span>Navigasi</span>
            <i class="fa fa-angle-left pull-right"></i>
          </a>
          <ul class="treeview-menu">
            <li class="<?php if($this->uri->segment(3) == 'daftar_menu'){echo 'active';}?>"><a href="<?= site_url('vp/navigasi/daftar_menu'); ?>"><i class="fa fa-circle-o text-primary"></i> Daftar menu</a></li>
            <li class="<?php if($this->uri->segment(3) == 'daftar_submenu'){echo 'active';}?>"><a href="<?= site_url('vp/navigasi/daftar_submenu'); ?>"><i class="fa fa-circle-o text-primary"></i> Daftar submenu</a></li>
          </ul>
        </li> -->
        <li class="treeview <?php if($this->uri->segment(3) == 'invoices_pandding' || $this->uri->segment(3) == 'invoices_sukses' || $this->uri->segment(3) == 'invoices_batal'){echo 'active';}?>">
          <a href="#">
            <i class="fa fa-building-o"></i>
            <span>Invoices</span>
            <i class="fa fa-angle-left pull-right"></i>
          </a>
          <ul class="treeview-menu">
            <li class="<?php if($this->uri->segment(3) == 'invoices_pandding'){echo 'active';}?>"><a href="<?= site_url('vp/invoices/invoices_pandding'); ?>"><i class="fa fa-circle-o text-warning"></i> Menunggu konfirmasi</a></li>
            <li class="<?php if($this->uri->segment(3) == 'invoices_sukses'){echo 'active';}?>"><a href="<?= site_url('vp/invoices/invoices_sukses'); ?>"><i class="fa fa-circle-o text-success"></i> Sudah di konfirmasi</a></li>
            <li class="<?php if($this->uri->segment(3) == 'invoices_batal'){echo 'active';}?>"><a href="<?= site_url('vp/invoices/invoices_batal'); ?>"><i class="fa fa-circle-o text-danger"></i> Invoices di batalkan</a></li>
          </ul>
        </li>
         <li class="<?php if($this->uri->segment(2) == 'faq'){echo 'active';}?>">
          <a href="<?= site_url('vp/faq'); ?>">
            <i class="fa fa-asterisk text-danger"></i> <span>Bantuan</span> <i class=" pull-right"></i>
          </a>
        </li>
      </ul>
    </section>
    <!-- /.sidebar -->
  </aside>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper" style="min-height: 918px;">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        <?= $judul; ?>
        <small>Control panel</small>
      </h1>
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-md-12">
        <?php if ($this->session->flashdata('error')) { ?>
        <div class="alert alert-danger" role="alert">
          <span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true"></span>
          <span class="sr-only">Error:</span>
          <?php echo $this->session->flashdata('error'); ?>
        </div>  
        <?php }elseif ($this->session->flashdata('sukses')) {?>
        <div class="alert alert-success" role="alert">
          <span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true"></span>
          <span class="sr-only">Berhasil:</span>
          <?php echo $this->session->flashdata('sukses'); ?>
        </div>  
        <?php } ?>
        </div>

        <?php if ($this->uri->segment(2) == "dashboard") {
          $this->load->view('layout_admin/dashboard');
        }elseif ($this->uri->segment(3) == "edit_produk") {
          $this->load->view('layout_admin/produk');
        }elseif ($this->uri->segment(3) == "detail_produk") {
          $this->load->view('layout_admin/produk');
        }elseif ($this->uri->segment(3) == "detail_invoice") {
          $this->load->view('layout_admin/invoices');
        }elseif ($this->uri->segment(3) == "pesan_to_invoice") {
          $this->load->view('layout_admin/invoices');
        }elseif ($this->uri->segment(3) == "invoices_pandding") {
          $this->load->view('layout_admin/invoices');
        }elseif ($this->uri->segment(3) == "feedback") {
          $this->load->view('layout_admin/invoices');
        }elseif ($this->uri->segment(3) == "invoices_sukses") {
          $this->load->view('layout_admin/invoices');
        }elseif ($this->uri->segment(3) == "invoices_batal") {
          $this->load->view('layout_admin/invoices');
        }elseif ($this->uri->segment(3) == "daftar_menu") {
          $this->load->view('layout_admin/navigasi');
        }elseif ($this->uri->segment(3) == "daftar_submenu") {
          $this->load->view('layout_admin/navigasi');
        }elseif ($this->uri->segment(2) == "produk") {
          $this->load->view('layout_admin/produk');
        }elseif ($this->uri->segment(2) == "slider") {
          $this->load->view('layout_admin/slider');
        }elseif ($this->uri->segment(3) == "daftar_menu") {
          $this->load->view('layout_admin/navigasi');
        }elseif ($this->uri->segment(3) == "daftar_submenu") {
          $this->load->view('layout_admin/navigasi');
        }elseif ($this->uri->segment(2) == "navigasi") {
          $this->load->view('layout_admin/navigasi');
        }elseif ($this->uri->segment(2) == "gadget") {
          $this->load->view('layout_admin/gadget');
        }elseif ($this->uri->segment(2) == "promo") {
          $this->load->view('layout_admin/promo');
        }elseif ($this->uri->segment(2) == "laman") {
          $this->load->view('layout_admin/laman');
        }elseif ($this->uri->segment(2) == "profile") {
          $this->load->view('layout_admin/profile');
        }elseif ($this->uri->segment(2) == "faq") {
          $this->load->view('layout_admin/faq');
        }else{
          $this->load->view('layout_admin/dashboard');
        } ?>      
      </div>
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

  <footer class="main-footer">
    <div class="pull-right hidden-xs">
      <b>Version</b> 2.0
    </div>
    <strong>Copyright © 2014-2015 <a href="<?php site_url(); ?>"><?= $key->nama_brand;?></a>.</strong> All rights reserved.
  </footer>

</div>
<?php $this->load->view('incl/footer_admin'); ?>