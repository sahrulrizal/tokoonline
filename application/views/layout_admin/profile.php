<div class="col-md-12">
	<form action="<?= site_url('pp/upprofile')?>" method="post" accept-charset="utf-8">
	    <p>Nama: </p>
		<p><input type="text"  class="form-control" name="nama" placeholder="Masukan nama anda disini!" value="<?=$key->nama_lengkap;?>" required></p>
		<p>Email unik masuk admin: </p>
		<p><input type="text"  class="form-control" name="email" placeholder="Masukan email anda disini!" value="<?=$key->uemail;?>" required></p>
		<p><input type="submit" name="simpan" class="btn btn-primary" value="Ubah"></p>
	</form>
</div>