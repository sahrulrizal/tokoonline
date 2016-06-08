<?php if ($this->uri->segment(2) != ""){ ?>
<div class="col-md-12" style="overflow: hidden;">
  
  <div class="detail">
  <div class="row">
     <div class="col-md-5">
        <img class="img-responsive" style="min-width: 200px;max-height: 400px;" src="<?=base_url('uploads/produk/'.$p->img);?>" alt="<?=$key->nama_brand.' : '.$p->nama_produk;?>" alt="pelangibaby.com">
        <p class="link-ukuran"><a href="#www.pelangibaby.com" target="_blank" onclick="window.location='<?=base_url('uploads/produk/'.$p->img);?>'" title="ukuran">Lihat gambar dengan ukuran asli</a></p>
     </div>
     <div class="col-md-7">
       <div class="keterangan">
          <h3><?= $p->nama_produk; ?></h3>
          <div class="harga">Harga : <?= 'Rp.'.number_format($p->harga_satuan - @$p->potongan,0,',','.') ?><?php if (@$p->kode_promo != '') {echo "<sup style='font-size: 12px;margin-left: 4px;color:#999;'><del>".'Rp.'.number_format($p->harga_satuan,0,',','.')."</del></sup>";}?></div>
          <div class="ket-utama"><?= $p->keterangan; ?></div>
          <div class="row">
            <div class="col-md-6"><div class="b-harga"><a href="#" onclick="window.location='<?=site_url('vb/incart/'.$p->id_produk);?>'"><button type="submit" class="btn btn-success">BELI SEKARANG <i class="glyphicon glyphicon-shopping-cart" style="padding-left: 5px;font-size: 16px;"></i></button></a></div></div>
            <div class="col-md-6">
              <div class="part-number"><div class="pn" style="text-align: center;"><?php if (@$p->kode_promo != '') {echo 'PROMO : '.$p->kode_promo;}else{echo "Promo : -";} ?></div></div>
            </div>
          </div>
      </div>
     </div>
  </div>
  </div>
</div>
<?php }else{?>
<div class="col-md-12">
  <div class="row">
    <?php foreach ($p as $pr){ ?>                            
      <div class="col-md-4">
        <a href="<?=site_url('kategori/'.$pr->kategori);?>" class="thumbnail" style="overflow: hidden;text-align: center;">
        </style> 
           <h4><?= character_limiter($pr->kategori, 20);?></h4>
        </a>
      </div>
    <?php }?>
  </div>
</div>
<?php } ?>