<link rel="stylesheet" type="text/css" href="<?= site_url();?>public/css/dataTables.bootstrap.min.css">

<?php if ($this->uri->segment(3) == 'edit_gadget') {?>
<!-- EDIT -->
<div class="col-md-12">
 <div class="box box-success">
    <div class="box-header with-border">
    <h3 class="box-title">Edit gadget</h3>
      <div class="box-tools pull-right">
        <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-plus"></i></button>
      </div>
      <!-- /.box-tools -->
    </div>
    <!-- /.box-header -->
    <div class="box-body" style="display: block;">
      <form action="<?= site_url('pp/upgadget/'.$this->uri->segment(4)) ?>" method="post" accept-charset="utf-8">
       <p>Judul:</p>
        <p><input type="text" value="<?=$gadget->judul;?>" class="form-control" name="judul"  placeholder="Masukan judul untuk di gadget."></p>
        <p>Letak:</p>
        <p>
          <select class="form-control" name="letak">
          <?php if ($gadget->letak == 'l') {
            echo '<option value='.$gadget->letak.'>Kiri</option>';
          }elseif ($gadget->letak == 'tp') {
            echo '<option value='.$gadget->letak.'>Diatas list produk</option>';
          }elseif ($gadget->letak == 'bp') {
            echo '<option value='.$gadget->letak.'>Dibawah list produk</option>';
          } ?>
          <option disabled> ------ </option>
          <option value="l">Kiri</option>
          <option value="tp">Diatas list Produk</option>
          <option value="bp">Dibawah list Produk</option>
        </select>
      </p>
        <p>html/javascript :</p>
        <p><textarea name="isi" class="form-control"><?=$gadget->isi;?></textarea></p>
        <p><input type="submit" class="btn btn-success" name="simpan" value="Simpan"> <input type="reset" class="btn btn-danger" value="Ulangi" name="reset"></p>
      </form>
    </div>
    <!-- /.box-body -->
  </div>
</div>
<?php }else{ ?>
<!-- ADD DAN VIEW -->
<div class="col-md-12">
 <div class="box box-success collapsed-box">
    <div class="box-header with-border">
    <h3 class="box-title">Tambah gadget</h3>
      <div class="box-tools pull-right">
        <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-plus"></i></button>
      </div>
      <!-- /.box-tools -->
    </div>
    <!-- /.box-header -->
    <div class="box-body" style="display: none;">
      <form action="<?= site_url('pp/ingadget') ?>"  method="post" accept-charset="utf-8">
        <p>Judul:</p>
        <p><input type="text" class="form-control" name="judul"  placeholder="Masukan judul untuk di gadget."></p>
        <p>Letak:</p>
        <p>
          <select class="form-control" name="letak">
            <option value="l">Kiri</option>
            <option value="tp">Setelah Produk</option>
            <option value="bp">Sesudah Produk</option>
          </select>
        </p>
        <p>html/javascript :</p>
        <p><textarea name="isi" class="form-control"></textarea></p>
        <p><input type="submit" class="btn btn-success" name="simpan" value="Simpan"> <input type="reset" class="btn btn-danger" value="Ulangi" name="reset"></p>
      </form>
    </div>
    <!-- /.box-body -->
  </div>

 <div class="box box-default">
  <div class="box-header with-border">
    <h3 class="box-title">Daftar gadget</h3>
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
         <th>Letak</th>
         <th style="text-align: center;"><i class="fa fa-gear"></i></th>
       </tr>
     </thead>
     <tbody>
       <?php $no=1; foreach ($gadget as $val) { ?>
       <tr>
         <td><?= $no++;?></td>
         <td><?= $val->judul;?></td>
         <td>
           <?php if ($val->letak == 'l') {
             echo "Kiri";
           }elseif ($val->letak == 'tp') {
             echo "Diatas produk";
           }elseif ($val->letak == 'bp') {
             echo "Dibawah produk";
           } ?>
         </td>
         <td style="text-align: center;"><a href="#" onclick="location='<?= site_url('vp/gadget/edit_gadget/'.$val->id_gadget);?>'"><i class="fa fa-pencil"></i></a> . <a href="<?= site_url('vp/gadget/hapus_gadget/'.$val->id_gadget);?>" onclick="return confirm('Apakah anda yakin ingin menghapus gadget ini ?')"><i class="fa fa-trash"></i></a></td>
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