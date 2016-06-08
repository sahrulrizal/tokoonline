<link rel="stylesheet" type="text/css" href="<?= site_url()?>public/sw/swipebox.css">
<link rel="stylesheet" type="text/css" href="<?= site_url();?>public/css/dataTables.bootstrap.min.css">

<?php if ($this->uri->segment(3) == 'edit_promo') {?>
<!-- EDIT -->
<div class="col-md-12">
 <div class="box box-success">
    <div class="box-header with-border">
    <h3 class="box-title">Edit promo</h3>
      <div class="box-tools pull-right">
        <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-plus"></i></button>
      </div>
      <!-- /.box-tools -->
    </div>
    <!-- /.box-header -->
    <div class="box-body" style="display: block;">
      <form action="<?= site_url('Pp/uppromo/'.$this->uri->segment(4)) ?>" enctype="multipart/form-data"  method="post" accept-charset="utf-8">
        <p>Judul:</p>
        <p><input type="text" class="form-control" name="judul" value="<?=$promo->judul?>"  placeholder="Masukan judul untuk promo."></p>
        <p>Foto / Gambar :</p>
        <?php if ($promo->img != "") { ?>
        <p class="form-control" id="promimg"><a href="<?= base_url('uploads/promo/'.$promo->img);?>" class="sw"><i class="fa fa-eye"></i> Lihat Foto</a> | <a href="#" onclick="depromimg('<?= $promo->id_promo; ?>','<?= $promo->img; ?>')" style="color:red;"><i class="fa fa-trash"></i> Delete foto</a></p>
        <?php }else{ echo '<input class="form-control" type="file" name="img">';} ?>
        <div id="hpromimg"></div>
        <p>Kode promo:</p>
        <p><input type="text" class="form-control" name="kode_promo" value="<?=$promo->kode_promo?>"  placeholder="Masukan kode promo untuk promo."></p>
        <p>Potongan</p>
        <p><input type="number" class="form-control" name="potongan" value="<?=$promo->potongan?>"  placeholder="Masukan potongan untuk promo."></p>
        <p>Isi :</p>
        <p><textarea name="isi" class="form-control"><?=$promo->isi?></textarea></p>
        <p><input type="submit" class="btn btn-success" name="simpan" value="Simpan"> <input type="reset" class="btn btn-danger" value="Ulangi" name="reset"></p>
      </form>
    </div>
    <!-- /.box-body -->
  </div>
</div>
<script type="text/javascript" src="<?= site_url();?>public/js/script.js"></script>
<?php }else{ ?>
<!-- ADD DAN VIEW -->
<div class="col-md-12">
 <div class="box box-success collapsed-box">
    <div class="box-header with-border">
    <h3 class="box-title">Tambah promo</h3>
      <div class="box-tools pull-right">
        <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-plus"></i></button>
      </div>
      <!-- /.box-tools -->
    </div>
    <!-- /.box-header -->
    <div class="box-body" style="display: none;">
      <form action="<?= site_url('Pp/inpromo') ?>"  method="post" enctype="multipart/form-data" accept-charset="utf-8">
        <p>Judul:</p>
        <p><input type="text" class="form-control" name="judul"  placeholder="Masukan judul untuk promo."></p>
        <p>Kode promo:</p>
        <p><input type="text" class="form-control" name="kode_promo"  placeholder="Masukan kode promo untuk promo."></p>
        <p>Gambar/foto:</p>
        <p><input type="file" class="form-control" name="img"></p>
        <p>Potongan</p>
        <p><input type="number" class="form-control" name="potongan"  placeholder="Masukan potongan untuk promo."></p>
        <p>Isi :</p>
        <p><textarea name="isi" class="form-control"></textarea></p>
        <p><input type="submit" class="btn btn-success" name="simpan" value="Simpan"> <input type="reset" class="btn btn-danger" value="Ulangi" name="reset"></p>
      </form>
    </div>
    <!-- /.box-body -->
  </div>

 <div class="box box-default">
  <div class="box-header with-border">
    <h3 class="box-title">Daftar promo</h3>
    <div class="box-tools pull-right">
      <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
    </div>
  </div>
  <div class="box-body" style="display: hidden;">
   <table id="tabel" class="table table-bordered">
     <thead>
       <tr>
         <th>#</th>
         <th>Judul</th>
         <th>kode promo</th>
         <th>potongan</th>
         <th style="text-align: center;"><i class="fa fa-gear"></i></th>
       </tr>
     </thead>
     <tbody>
       <?php $no=1; foreach ($promo as $val) { ?>
       <tr>
         <td><?= $no++;?></td>
         <td><?= $val->judul;?></td>
         <td><?= $val->kode_promo;?></td>
         <td><?= $val->potongan;?></td>
         <td style="text-align: center;"><a href="#" onclick="location='<?= site_url('vp/promo/edit_promo/'.$val->id_promo.'/'.$val->token);?>'"><i class="fa fa-pencil"></i></a> . <a href="<?= site_url('vp/promo/hapus_promo/'.$val->id_promo.'/'.$val->token);?>" onclick="return confirm('Apakah anda yakin ingin menghapus promo ini ?')"><i class="fa fa-trash"></i></a></td>
       </tr>
       <?php } ?>
     </tbody>
   </table>
 </div>
</div>
<?php } ?>
<script type="text/javascript" src="<?= site_url();?>public/js/jquery.dataTables.min.js"></script>
<script type="text/javascript" src="<?= site_url();?>public/js/dataTables.bootstrap.min.js"></script>
<script type="text/javascript" src="<?= site_url()?>public/sw/swipebox.js"></script>
<script src="//cdn.tinymce.com/4/tinymce.min.js"></script>
<script type="text/javascript">

  $(document).ready(function() {
    $('#tabel').DataTable();
  });

  $(document ).ready(function() {
    /* Basic Gallery */
    $('.sw').swipebox();
  });

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