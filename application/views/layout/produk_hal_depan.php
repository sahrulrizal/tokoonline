<!-- Slider -->
<div class="col-md-12" style="overflow: hidden;">
  <div class="panel panel-default">
    <div class="panel-heading p3d">Selamat datang</div>
    <div class="panel-body" style="padding: 0">
      <div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
        <!-- Indicators -->
        <ol class="carousel-indicators">
          <li data-target="#carousel-example-generic" data-slide-to="0" class="active"></li>
          <li data-target="#carousel-example-generic" data-slide-to="1"></li>
          <li data-target="#carousel-example-generic" data-slide-to="2"></li>
        </ol>

        <!-- Utama -->
        <div class="carousel-inner" role="listbox">
          <div class="item active">
            <img src="<?=base_url();?>uploads/slider/sw.png" alt="<?=$key->nama_brand;?>">
            <div class="carousel-caption">
              Selamat datang di pelangibaby & fashion kids
            </div>
          </div>

          <?php foreach ($slider as $s): ?>
            <div class="item">
              <img src="<?=base_url('uploads/slider/'.$s->img);?>" alt="<?=$key->nama_brand;?>">
              <div class="carousel-caption">
                <?=$s->judul?>
              </div>
            </div>
          <?php endforeach ?>
        </div>
        <!-- Controls -->
        <a class="left carousel-control" href="#carousel-example-generic" role="button" data-slide="prev">
          <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
          <span class="sr-only">Previous</span>
        </a>
        <a class="right carousel-control" href="#carousel-example-generic" role="button" data-slide="next">
          <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
          <span class="sr-only">Next</span>
        </a>
      </div>
    </div>
  </div>
</div>
<!-- Produk -->
<div class="col-md-12" id="ass">
  <div class="row">
    <?php $this->load->view('incl/gadget-top'); ?>
    <?php foreach ($produk as $p): ?>                            
      <div class="col-md-4">
        <a href="<?=site_url('produk/'.$p->kode_link);?>" class="thumbnail" style="max-height: 400px;" >
          <div class="baru" style="padding: 10px;background:#ED4B4B;;color: #FFF;position: absolute;">BARU</div>
          <img data-src="holder.js/100%x180" alt="pelangibaby" src="<?= base_url().'uploads/produk/'.$p->img;?>" style="width: 100%; display: block;">
          <div class="thm-atas"><?= character_limiter($p->nama_produk, 20);?></div>
          <div class="thm-tengah"><b> <?= 'Rp.'.number_format($p->harga_satuan - @$p->potongan,0,',','.') ?><?php if (@$p->kode_promo != '') {echo "<sup style='font-size: 12px;margin-left: 4px;color:#999;'><del>".'Rp.'.number_format($p->harga_satuan,0,',','.')."</del></sup>";}?></b></div>
        </a>
      </div>
    <?php endforeach ?>
    <?php $this->load->view('incl/gadget-bottom'); ?>
  </div>
</div>