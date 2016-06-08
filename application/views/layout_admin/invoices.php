<link rel="stylesheet" type="text/css" href="<?= site_url();?>public/css/dataTables.bootstrap.min.css">

<?php if ($this->uri->segment(3) == 'invoices_pandding') { ?>

<!-- VIEW PANDDING -->
<div class="col-md-12">
  <div class="box box-default">
    <div class="box-header with-border">
    <h3 class="box-title">Daftar invoices menunggu konfirmasi</h3>
      <div class="box-tools pull-right">
        <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
      </div>
    </div>
    <div class="box-body" style="display: hidden;">
     <table id="tabel" class="table table-bordered">
       <thead>
         <tr>
           <th>#</th>
           <th>Kode Invoices</th>
           <th>Tanggal</th>
           <th>Tanggal Berakhir</th>
           <th>Status</th>
           <th style="text-align: center;"><i class="fa fa-gear"></i></th>
         </tr>
       </thead>
       <tbody>
       <?php $no=1; foreach ($invoices as $val) { ?>
         <tr>
           <td><?= $no++;?></td>
           <td><?= $val->kode_invoice;?></td>
           <td><?= $val->date;?></td>
           <td><?= $val->due_date;?></td>
           <td><?= $val->status;?></td>
           <td style="text-align: center;">
             <a href="#" onclick="location='<?= site_url('vp/invoices/detail_invoice/'.$val->id_invoice.'/'.$val->kode_invoice);?>'" title="Detail invoices"><i class="fa fa-eye"></i></a> . <a href="#" onclick="location='<?= site_url('vp/invoices/pesan_to_invoice/'.$val->id_invoice.'/'.$val->kode_invoice);?>'" title="Terima invoices"><i class="fa fa-check text-success"></i></a> . <a href="<?= site_url('vp/invoices/tolak_invoice/'.$val->id_invoice.'/'.$val->kode_invoice);?>" title="Batalkan invoices" onclick="return confirm('Apakah anda yakin ingin membatalkan invoice ini ?')"><i class="fa fa-times text-danger"></i></a>  
           </td>
         </tr>
       <?php } ?>
       </tbody>
     </table>
    </div>
  </div>
</div>

<?php }elseif ($this->uri->segment(3) == 'invoices_sukses') { ?>

<!-- VIEW SUKSES -->
<div class="col-md-12">
  <div class="box box-default">
    <div class="box-header with-border">
    <h3 class="box-title">Daftar invoices sudah di konfirmasi</h3>
      <div class="box-tools pull-right">
        <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
      </div>
    </div>
    <div class="box-body" style="display: hidden;">
     <table id="tabel" class="table table-bordered">
       <thead>
         <tr>
           <th>#</th>
           <th>Kode Invoices</th>
           <th>Feedback</th>
           <th>Status</th>
           <th style="text-align: center;"><i class="fa fa-gear"></i></th>
         </tr>
       </thead>
       <tbody>
       <?php $no=1; foreach ($invoices as $val) { ?>
         <tr>
           <td><?= $no++;?></td>
           <td><?= $val->kode_invoice;?></td>
           <td><?php if ($val->feedback != '') {
             echo "<b style='color:green;'>Ada</b>";
           }else{
            echo "<b style='color:red;'>Kosong</b>";
            } ?></td>
           <td><?= $val->status;?></td>
           <td style="text-align: center;">
            <a href="#" onclick="location='<?= site_url('vp/invoices/detail_invoice/'.$val->id_invoice.'/'.$val->kode_invoice);?>'" title="Detail invoices"><i class="fa fa-eye"></i></a>
           </td>
         </tr>
       <?php } ?>
       </tbody>
     </table>
    </div>
  </div>
</div>

<?php }elseif ($this->uri->segment(3) == 'invoices_batal') { ?>

  <!-- VIEW BATAL -->
<div class="col-md-12">
  <div class="box box-default">
    <div class="box-header with-border">
    <h3 class="box-title">Daftar invoices dibatalkan</h3>
      <div class="box-tools pull-right">
        <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
      </div>
    </div>
    <div class="box-body" style="display: hidden;">
      <p>
      <a href="<?=site_url('pp/deinvoiceba')?>" class='btn btn-danger'  onclick="return confirm('Apakah anda yakin ingin mengkosongkan semua invoices ini ?')" title="hapus semua">Kosongkan invoices</a>
      </p>
     <table id="tabel" class="table table-bordered">
       <thead>
         <tr>
           <th>#</th>
           <th>Kode Invoices</th>
           <th>Tanggal</th>
           <th>Tanggal Berakhir</th>
           <th>Status</th>
           <th style="text-align: center;"><i class="fa fa-gear"></i></th>
         </tr>
       </thead>
       <tbody>
       <?php $no=1; foreach ($invoices as $val) { ?>
         <tr>
           <td><?= $no++;?></td>
           <td><?= $val->kode_invoice;?></td>
           <td><?= $val->date;?></td>
           <td><?= $val->due_date;?></td>
           <td><?= $val->status;?></td>
           <td style="text-align: center;">
            <a href="#" onclick="location='<?= site_url('vp/invoices/detail_invoice/'.$val->id_invoice.'/'.$val->kode_invoice);?>'" title="Detail invoices"><i class="fa fa-eye"></i></a>
           </td>
         </tr>
       <?php } ?>
       </tbody>
     </table>
    </div>
  </div>
</div>

<?php }elseif ($this->uri->segment(3) == 'feedback') { ?>

  <!-- VIEW BATAL -->
<div class="col-md-12">
  <div class="box box-default">
    <div class="box-header with-border">
    <h3 class="box-title">Daftar Feedback</h3>
      <div class="box-tools pull-right">
        <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
      </div>
    </div>
    <div class="box-body" style="display: hidden;">
      <p>
      <a href="<?=site_url('pp/deinvoiceba')?>" class='btn btn-danger'  onclick="return confirm('Apakah anda yakin ingin mengkosongkan semua invoices ini ?')" title="hapus semua">Kosongkan invoices</a>
      </p>
     <table id="tabel" class="table table-bordered">
       <thead>
         <tr>
           <th>#</th>
           <th>Kode Invoices</th>
           <th>Tanggal</th>
           <th>Tanggal Berakhir</th>
           <th>Status</th>
           <th style="text-align: center;"><i class="fa fa-gear"></i></th>
         </tr>
       </thead>
       <tbody>
       <?php $no=1; foreach ($feedback as $val) { ?>
         <tr>
           <td><?= $no++;?></td>
           <td><?= $val->kode_invoice;?></td>
           <td><?= $val->date;?></td>
           <td><?= $val->due_date;?></td>
           <td><?= $val->status;?></td>
           <td style="text-align: center;">
            <a href="#" onclick="location='<?= site_url('vp/invoices/detail_invoice/'.$val->id_invoice.'/'.$val->kode_invoice);?>'" title="Detail invoices"><i class="fa fa-eye"></i></a>
           </td>
         </tr>
       <?php } ?>
       </tbody>
     </table>
    </div>
  </div>
</div>

<?php }elseif ($this->uri->segment(3) == 'detail_invoice') { ?>

<!-- DETAIL -->
<div class="col-md-12">
  <div class="box box-default">
    <div class="box-header with-border">
    <h3 class="box-title">Detail Invoices / Kode produk : <?= $this->uri->segment(5); ?> </h3>
      <div class="box-tools pull-right">
        <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
      </div>
    </div>
    <div class="box-body" style="display: hidden;">
      <div class="row">
        <div class="col-md-12">
          <p>Feedback</p>
          <p><textarea readonly style="min-height: 200px;" name="feedback" class="form-control"><?= $invoices->feedback; ?></textarea></p>
          <hr>
        </div>
        <div class="col-md-6">
          <p>Nama : </p>
          <p class="form-control"><?= $invoices->nama; ?></p>
          <p>Email : </p>
          <p class="form-control"><?= $invoices->email; ?></p>
          <p>Alamat : </p>
          <div style="border:solid 1px #ddd;padding: 10px;"><?= $invoices->alamat; ?></div>
          <p>Telepon : </p>
          <p class="form-control"><?= $invoices->telepon; ?></p>
        </div>
        <div class="col-md-6">
          <p>Mobile : </p>
          <p class="form-control"><?= $invoices->hp; ?></p>
          <p>Fax : </p>
          <p class="form-control"><?= $invoices->fax; ?></p>
          <p>Pesan : </p>
          <div style="border:solid 1px #ddd;padding: 10px;"><?= $invoices->pesan; ?></div>
        </div>
        <div class="col-md-12">
          <h3>Detail Produk :</h3>
          <table class="table table-bordered">
            <thead>
              <tr>
                <th>Nama Produk</th>
                <th>Jumlah</th>
                <th>Harga</th>
                <th>Subtotal</th>
              </tr>
            </thead>
            <tbody>
            <?php foreach ($invoice_produk as $key) {
             $sub = $key->harga*$key->jumlah; $total[] = $key->harga*$key->jumlah; ?>
              <tr>
                <td><?= $key->nama_produk;?></td>
                <td><?= $key->jumlah; ?></td>
                <td><?= $key->harga; ?></td>
                <td><?= $sub;?></td>
              </tr>
            <?php } ?>
              <tr>
                <td colspan="3" style="text-align:right;">Total :</td>
                <td><?= array_sum($total); ?></td>
              </tr>
            </tbody>
          </table>

          <div class="from-terima-tolak">
          <?php if ($invoices->status == "tunggu") { ?>
            <a href="#"  onclick="location='<?= site_url('vp/invoices/pesan_to_invoice/'.$invoices->id_invoice.'/'.$invoices->kode_invoice);?>'"><button type="button" class="btn btn-success"><i class="fa fa-check"></i> Terima invoice</button></a> <a href="<?= site_url('vp/invoices/tolak_invoice/'.$invoices->id_invoice.'/'.$invoices->kode_invoice);?>" title="Batalkan invoices" onclick="return confirm('Apakah anda yakin ingin membatalkan invoice ini ?')"><button class="btn btn-danger"><i class="fa fa-times"></i> Tolak invoice</button></a>
          <?php } ?>
          </div>

        </div>
      </div>
    </div>
  </div>
</div>

<?php }elseif ($this->uri->segment(3) == 'pesan_to_invoice') { ?>
<div class="col-md-12">
  <div class="box box-default">
    <div class="box-header with-border">
    <h3 class="box-title">Pesan email untuk invoices | Kode produk : <?= $this->uri->segment(5); ?> </h3>
      <div class="box-tools pull-right">
        <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
      </div>
    </div>
    <form action="<?= site_url('vp/invoices/terima_invoice/'.$invoices->id_invoice.'/'.$invoices->kode_invoice);?>" method="post" accept-charset="utf-8"> 
    <div class="box-body" style="display: hidden;">
      <p>Pesan kepada : <?= $invoices->email; ?> </p>
      <input type="hidden" name="email" value="<?= $invoices->email; ?>">
      <textarea name="pesan_email" class="form-control">
      <p>Hi <?=$invoices->nama?></p>
      <p>Terimakasih telah melakukan pemesanan di pelangibaby.com , berikut adalah rincian pemesanan anda :</p>

       -----------------------------------------------------
       Kode invoice anda :  <?= $this->uri->segment(5)?><br>
       -----------------------------------------------------
       <table class="table table-bordered" border="1">
            <thead>
              <tr>
                <th>Nama Produk</th>
                <th>Jumlah</th>
                <th>Harga</th>
                <th>Subtotal</th>
              </tr>
            </thead>
            <tbody>
            <?php foreach ($invoice_produk as $key) {
             $sub = $key->harga*$key->jumlah; $total[] = $key->harga*$key->jumlah; ?>
              <tr>
                <td><?= $key->nama_produk;?></td>
                <td><?= $key->jumlah; ?></td>
                <td><?= $key->harga; ?></td>
                <td><?= $sub;?></td>
              </tr>
            <?php } ?>
              <tr>
                <td colspan="3" style="text-align:right;">Total :</td>
                <td><?= array_sum($total); ?></td>
              </tr>
            </tbody>
          </table>
         ============================== 
        <p>Anda dapat mengirimkan pembayaran ke no rekening: </p>
        <table border="1">
          <tr>
            <td>Nama</td>
            <td>No Rekening</td>
          </tr>
          <tr>
            <td>NONE</td>
            <td>08913876831631</td>
          </tr>
        </table>
      <p><b>Anda juga dapat melakukan konfirmasi pembayaran lewat pesan email ini.</b></p>
      <br>
      <p>Salam Hangat</p>
      <p>Admin : Pelangibaby.com</p>
      <p>==============================</p>
      <p>Jika anda belum paham tentang pesan ini silahkan hubungi kami di :</p>
      <p>No Telepon : 08965023813</p>
      <p>Alamat Email : <a href="mailto:support@pelangibaby.com">support@pelangibaby.com</a></p>
      <p>==============================</p>
      </textarea>
      <br>
      <button type="submit" class="btn btn-success"><i class="fa fa-check"></i> Terima invoice</button>
    </div>
    </form>
  </div>
</div>
<?php } ?>
<script type="text/javascript" src="<?= site_url()?>public/js/script.js"></script>
<script type="text/javascript" src="<?= site_url();?>public/js/jquery.dataTables.min.js"></script>
<script type="text/javascript" src="<?= site_url();?>public/js/dataTables.bootstrap.min.js"></script>
<script src="//cdn.tinymce.com/4/tinymce.min.js"></script>
<script>
  tinymce.init({
    selector: 'textarea',
    height: 200,
    plugins: [
    'advlist autolink lists link image charmap print preview anchor',
    'searchreplace visualblocks code fullscreen',
    'insertdatetime media table contextmenu paste code'
    ],
    toolbar: 'insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image'
  });

</script>

<script type="text/javascript">
  
  $(document).ready(function() {
    $('#tabel').DataTable();
  });

  </script>