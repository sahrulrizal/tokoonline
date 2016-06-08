
<!-- Promo -->
<?php if (@$promo) { ?>
<div class="col-md-12">
  <div class="row">
  <?php $n = count($promo); if ($n != 0  ) { ?>
    <?php foreach ($promo as $p){ ?>                            
        <div class="col-md-4">
        <a href="<?=site_url('promo/'.$p->link.'/'.$p->token);?>" class="thumbnail" >
          <div class="baru" style="padding: 10px;background:#3BB2FF;color: #FFF;position: absolute;">PROMO</div>
          <img data-src="holder.js/100%x180" alt="pelangibaby" src="<?= base_url().'uploads/promo/'.$p->img;?>" style="width: 100%; display: block;">
          <div class="jdk" style="padding: 10px;"><?=$p->judul?></div>
        </a>
      </div>
    <?php }  }else{
      echo "Tidak ada";
      } ?>
  </div>
  <center>
  <?= $halaman; ?>
  </center>
</div>
  
<?php }elseif (@$produk) {  ?>
 
<div class="col-md-12">
  <div class="row">
  <?php $n = count($produk); if ($n != 0  ) { ?>
    <?php foreach ($produk as $p){ ?>                            
      <div class="col-md-4">
        <a href="<?=site_url('produk/'.$p->kode_link);?>" class="thumbnail" >
          <img data-src="holder.js/100%x180" alt="pelangibaby" src="<?= base_url().'uploads/produk/'.$p->img;?>" style="width: 100%; display: block;">
          <div class="thm-atas"><?= character_limiter($p->nama_produk, 20);?></div>
          <div class="thm-tengah"><b><?= 'Rp.'.number_format($p->harga_satuan,0,',','.') ?></b></div>
        </a>
      </div>
    <?php } }else{
      echo "Tidak ada";
      } ?>
  </div>
<center>
  <?= $halaman; ?>
  </center>
</div>

<?php }else{ ?>
<div class="col-md-12">
<div class="error" style="background: antiquewhite;padding: 10px;text-align: center;"> Maaf kategori yang anda ketik tidak dapat kami temukan !</div>
</div>
<?php } ?>
