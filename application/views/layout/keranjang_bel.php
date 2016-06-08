<script type="text/javascript">
	function upcart(row,id) {	
		$('#row').val(row);
		$('#qty').val(id);
	}
</script>

<div class="col-md-12">
	<div class="keranjang">
	<h1 class="lead">Keranjang Belanja :</h1>
	<table class="table table-bordered" width="100%" border="1">
		<tbody><tr>
			<td align="center">No</td>
			<td colspan="2" align="center">Item Produk</td>
			<td align="center">Qty</td>
			<td align="center">Harga</td>
			<td align="center">Sub Total</td>
			<td align="center">#</td>
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
				<td><a href="#" data-toggle="modal" data-target="#myEdit" onclick="upcart('<?= $i['rowid']; ?>','<?= $i['qty']; ?>')">Edit</a> | <a href="<?=site_url('vb/decart/'.$i['rowid'])?>" onclick="return confirm('Apakah anda yakin ingin menghapus item ini ?')">Hapus</a></td>
			</tr>
			<?php } ?>
			<tr>
				<td colspan="6" align="center"><strong>Total Order</strong></td>
				<td align="right"><strong >Rp.<?php echo $this->cart->format_number($this->cart->total()); ?></strong></td>
			</tr>
			<tr> 
			</tr><tr>
			<td colspan="4" align="center" >&nbsp;</td>
			<td colspan="2"  align="center">&nbsp;<br><strong><a href="<?= site_url();?>"><span class="btn btn-primary" style="width: 100%;">Lanjut Belanja</span></a></strong><br>&nbsp;</td>
			<td colspan="2"  align="center">&nbsp;<br><strong>
			<?php if (count($this->cart->contents()) > 0) { ?><a href="<?= site_url('pemesanan');?>"><span class="btn btn-success" style="width: 100%;">Check Out</span></a><?php }else{echo "Happy Shoping";} ?></strong><br>&nbsp;</td>	
		</tr>
		</tbody>
	</table>
	</div>
</div>

<div class="modal fade" id="myEdit" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
				<h4 class="modal-title" id="myModalLabel">Edit</h4>
			</div>
			<form action="<?=site_url('vb/upcart');?>" method="post" accept-charset="utf-8">
				<div class="modal-body">
					<p class="lead">Jumlah (Qty):</p>
					<input type="hidden" name="row" id="row">
					<input type="number" name="qty" class="form-control" id="qty" placeholder="Masukan jumlah item yang akan di beli" min="1" required>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-default" data-dismiss="modal">Tutup</button>
					<button type="submit" class="btn btn-primary">Simpan Perubahan</button>
				</div>
			</form>
		</div>
	</div>
</div>



