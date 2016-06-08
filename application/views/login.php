<?php $this->load->view('incl/header'); ?>
<body>
<div class="row">
	<div class="container">
		<div class="col-md-12">
			<div class="form-login">
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
				<div class="panel panel-default">
					<div class="panel-heading">FORM LOGIN</div>
					<div class="panel-body">
						<form action="<?= site_url('pb/verif_login');?>" method="post" accept-charset="utf-8">
							<p>Email :</p>
							<p><input required="true" type="email" class="form-control" name="email"  placeholder="Masukan email anda disini."></p>
							<p>Password :</p>
							<p><input required="true" type="password" class="form-control" name="password"  placeholder="Masukan password anda disini."></p>
							<p><input class="btn btn-success" type="submit" value="Masuk"> <input class="btn btn-danger" type="reset" value="Ulangi"></p>
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<?php $this->load->view('incl/footer'); ?>