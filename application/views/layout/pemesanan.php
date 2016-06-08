<?php if (count($this->cart->contents()) < 1) { redirect('keranjang_belanja');} ?>
<div class="col-md-12">
<div class="pemesanan">
<table class="table table-bordered" width="100%" border="1">
	<tbody><tr>
		<td align="center">No</td>
		<td colspan="2" align="center">Item Produk</td>
		<td align="center">Qty</td>
		<td align="center">Harga</td>
		<td align="center">Sub Total</td>
	</tr>
	<?php 
	$n=1;
	foreach ($this->cart->contents() as $i) {
		?>
		<tr> 
			<td><?= $n++?></td>
			<td><img width="100" width="100" src="<?=base_url('uploads/produk/'.$i['img']);?>" alt=""></td>
			<td><?= $i['name']; ?></td>
			<td><?= $i['qty']; ?></td>
			<td><?='Rp.'.$this->cart->format_number($i['price']); ?></td>
			<td><?='Rp.'.$this->cart->format_number($i['subtotal']); ?></td>
		<?php } ?>
		<tr>
			<td colspan="5" align="center"><strong>Total Order</strong></td>
			<td align="right"><strong >Rp.<?php echo $this->cart->format_number($this->cart->total()); ?></strong></td>
		</tr>
		
	</tr>
	</tbody>
</table>
</div>
<div class="panel panel-success">
	<div class="panel-heading">Beritahu kami bagaimana kami dapat menghubungi anda :</div>
	<div class="panel-body">
		<form action="<?=site_url('vb/inpemesanan');?>" method="post" accept-charset="utf-8">
			<p>Nama anda : </p>
			<p><input type="text" class="form-control" name="nama"  placeholder="Masukan nama anda disini." required></p>
			<p>Email anda : </p>
			<p><input type="email" class="form-control" name="email"  placeholder="Masukan email anda disini." required></p>
			<p>Alamat lengkap : </p>
			<p><textarea  class="form-control" name="alamat"  placeholder="Masukan alamat anda disini." required></textarea></p>
			<p>Telepon : </p>
			<p><input type="number" class="form-control" name="telepon"  placeholder="Masukan telepon anda disini."></p>
			<p>No. HP : </p>
			<p><input type="number" class="form-control" name="hp"  placeholder="Masukan Handphone anda disini." ></p>
			<p>Fax: </p>
			<p><input type="text" class="form-control" name="fax"  placeholder="Masukan fax anda disini." required></p>
			<p>Pesan : </p>
			<p><textarea  class="form-control" name="pesan"  placeholder="Masukan pesan anda disini. (ex: Misalnya seperti, pilihan warna,ukuran, dll)" ></textarea></p>
			<p><input class="btn btn-warning" type="reset" value="Ulangi semua"> <input type="submit" class="btn btn-success" name="kirimpem" value="Kirim"></p>
		</form>
	</div>
</div>
</div>