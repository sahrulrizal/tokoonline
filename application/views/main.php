<?php $this->load->view('incl/header'); ?>
<body>

<div id="fb-root"></div>
<script>(function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) return;
  js = d.createElement(s); js.id = id;
  js.src = "//connect.facebook.net/id_ID/sdk.js#xfbml=1&version=v2.5&appId=307135749420895";
  fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));</script>

<!--Start of Tawk.to Script-->
<script type="text/javascript">
var Tawk_API=Tawk_API||{}, Tawk_LoadStart=new Date();
(function(){
var s1=document.createElement("script"),s0=document.getElementsByTagName("script")[0];
s1.async=true;
s1.src='https://embed.tawk.to/56f6c0a9479b17744b2ab200/default';
s1.charset='UTF-8';
s1.setAttribute('crossorigin','*');
s0.parentNode.insertBefore(s1,s0);
})();
</script>
<!--End of Tawk.to Script-->

	<div class="row">
		<!-- Header -->
		<div class="col-md-12">
			<header class="navbar navbar-default navbar-fixed-top" id="top" role="banner" style="border:none;border-radius: 0;margin-bottom: 20px;">
				<div class="row">
				<div class="container">
				<div class="col-md-12">
				<div class="navbar-header">
						<button class="navbar-toggle collapsed" type="button" data-toggle="collapse" data-target=".navbar-collapse">
							<span class="sr-only">Toggle navigation</span>
							<span class="icon-bar"></span>
							<span class="icon-bar"></span>
							<span class="icon-bar"></span>
						</button>
						<a href="<?=site_url('')?>" class="navbar-brand"><img  class="img-circle" style="position: relative;top: -5px" src="<?=base_url('uploads/'.$key->logo)?>" alt="pelangibaby"></a>
				</div>
				<div class="collapse navbar-collapse js-navbar-collapse">
					<?=$key->menu;?>
					<ul class="nav navbar-nav navbar-right">
						<li><a href="<?=site_url('keranjang_belanja')?>"><i class="glyphicon glyphicon-shopping-cart"></i> Keranjang belanja (<?= count($this->cart->contents()); ?>) item</a></li>
					</ul>
				</div><!-- /.nav-collapse -->
				</div>
				</div>
				</div>
			</header>
		</div>
    <!-- Sidebar kiri -->
    <div class="container">
    <div class="col-md-12 m20">
    	<!-- <div class="banner">sasa</div> -->
    </div>
    <div class="bawah m70"></div>
    <aside class="col-md-3">
        <div class="row">
        	<?php $this->load->view('incl/gadget-kiri'); ?>
        </div>
    </aside>

    <!-- Sidebar kanan -->
		<aside class="col-md-9">
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

          <?php 
            if ($this->uri->segment(1) == "produk") {
              $this->load->view('layout/single_produk');
            }elseif ($this->uri->segment(1) == "feedback") {
              $this->load->view('layout/feedback');
            }elseif ($this->uri->segment(1) == "kategori") {
              $this->load->view('layout/kategori');
            }elseif ($this->uri->segment(1) == "promo") {
              $this->load->view('layout/promo');
            }elseif ($this->uri->segment(1) == "laman") {
              $this->load->view('layout/single_laman');
            }elseif ($this->uri->segment(1) == "pemesanan") {
              $this->load->view('layout/pemesanan');
            }elseif ($this->uri->segment(1) == "keranjang_belanja") {
              $this->load->view('layout/keranjang_bel');
            }else{
              $this->load->view('layout/produk_hal_depan');
            }
          ?>
        </div>
    </aside>
    </div>
		<!-- Footer -->
		<div class="col-md-12">
			<div class="footer-header">
				<div class="row">
					<div class="container">
					<div class="col-md-4">
						<?= $key->pk; ?>
					</div>
					<div class="col-md-8">
						<!-- <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3965.528197231051!2d106.70783931428355!3d-6.325523995422227!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e69e5685dd3b6f7%3A0x5a4d47ec44a735f3!2sPELANGI+BABY+%26+KIDS+FASHION!5e0!3m2!1sen!2sid!4v1457759810149" width="100%" height="280" frameborder="0" style="border:0" allowfullscreen></iframe> -->
					</div>
					</div>
				</div>
			</div>
			<div class="footer-bottom">
				Copyright © 2016 <?= $key->nama_brand; ?>. All Rights Reserved. Development by Scodesain
			</div>
		</div>
	</div>
	<script type="text/javascript">
		$(document).ready(function(){
			$(".dropdown").hover(            
				function() {
					$('.dropdown-menu', this).not('.in .dropdown-menu').stop(true,true).slideDown();
					$(this).toggleClass('open');        
				},
				function() {
					$('.dropdown-menu', this).not('.in .dropdown-menu').stop(true,true).slideUp();
					$(this).toggleClass('open');       
				}
				);
		});
	</script>
<?php $this->load->view('incl/footer'); ?>