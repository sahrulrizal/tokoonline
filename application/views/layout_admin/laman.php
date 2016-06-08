<link rel="stylesheet" type="text/css" href="<?= site_url();?>public/css/dataTables.bootstrap.min.css">

<?php if ($this->uri->segment(3) == 'edit_laman') {?>
<!-- EDIT -->
<div class="col-md-12">
 <div class="box box-success">
    <div class="box-header with-border">
    <h3 class="box-title">Edit laman</h3>
      <div class="box-tools pull-right">
        <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-plus"></i></button>
      </div>
      <!-- /.box-tools -->
    </div>
    <!-- /.box-header -->
    <div class="box-body" style="display: block;">
      <form action="<?= site_url('pp/uplaman/'.$this->uri->segment(4)) ?>" enctype="multipart/form-data"  method="post" accept-charset="utf-8">
         <p>Judul:</p>
        <p><input type="text" class="form-control" name="judul" value="<?=$laman->judul;?>" placeholder="Masukan judul untuk di laman."></p>
        <p>Isi</p>
        <p><textarea name="isi"><?=$laman->isi;?></textarea></p>
        <p><input type="submit" class="btn btn-success" name="simpan" value="Simpan Perubahan"> <input type="reset" class="btn btn-danger" value="Ulangi" name="reset"></p>
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
    <h3 class="box-title">Tambah laman</h3>
      <div class="box-tools pull-right">
        <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-plus"></i></button>
      </div>
      <!-- /.box-tools -->
    </div>
    <!-- /.box-header -->
    <div class="box-body" style="display: none;">
      <form action="<?= site_url('pp/inlaman') ?>" enctype="multipart/form-data"  method="post" accept-charset="utf-8">
        <p>Judul:</p>
        <p><input type="text" class="form-control" name="judul"  placeholder="Masukan judul untuk di laman."></p>
        <p>Isi</p>
        <p><textarea name="isi"></textarea></p>
        <p><input type="submit" class="btn btn-success" name="simpan" value="Simpan"> <input type="reset" class="btn btn-danger" value="Ulangi" name="reset"></p>
      </form>
    </div>
    <!-- /.box-body -->
  </div>

 <div class="box box-default">
  <div class="box-header with-border">
    <h3 class="box-title">Daftar laman</h3>
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
         <th>Link</th>
         <th>Dibuat</th>
         <th style="text-align: center;"><i class="fa fa-gear"></i></th>
       </tr>
     </thead>
     <tbody>
       <?php $no=1; foreach ($laman as $val) { ?>
       <tr>
         <td><?= $no++;?></td>
         <td><?= $val->judul;?></td>
         <td><a href='<?php echo 'http://'.$_SERVER['HTTP_HOST'].'/pelangifashion/laman/'.$val->link;?>' title="Link"><?= $val->link;?></a></td>
         <td><?= $val->date_buat;?></td>
         <td style="text-align: center;"><a href="#" onclick="location='<?= site_url('vp/laman/edit_laman/'.$val->id_laman);?>'"><i class="fa fa-pencil"></i></a> . <a href="<?= site_url('vp/laman/hapus_laman/'.$val->id_laman);?>" onclick="return confirm('Apakah anda yakin ingin menghapus laman ini ?')"><i class="fa fa-trash"></i></a></td>
       </tr>
       <?php } ?>
     </tbody>
   </table>
 </div>
</div>
<?php } ?>
<script type="text/javascript" src="<?= site_url();?>public/js/jquery.dataTables.min.js"></script>
<script type="text/javascript" src="<?= site_url();?>public/js/dataTables.bootstrap.min.js"></script>
<script src="//cdn.tinymce.com/4/tinymce.min.js"></script>
<script type="text/javascript">
  
  $(document).ready(function() {
    $('#tabel').DataTable();
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