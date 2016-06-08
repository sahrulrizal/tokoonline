<link rel="stylesheet" type="text/css" href="<?= site_url()?>public/sw/swipebox.css">
<link rel="stylesheet" type="text/css" href="<?= site_url();?>public/css/dataTables.bootstrap.min.css">

<?php if ($this->uri->segment(3) == 'edit_slider') {?>
<!-- EDIT -->
<div class="col-md-12">
 <div class="box box-success">
    <div class="box-header with-border">
    <h3 class="box-title">Edit Slider</h3>
      <div class="box-tools pull-right">
        <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-plus"></i></button>
      </div>
      <!-- /.box-tools -->
    </div>
    <!-- /.box-header -->
    <div class="box-body" style="display: block;">
      <form action="<?= site_url('Pp/upslider') ?>" enctype="multipart/form-data"  method="post" accept-charset="utf-8">
        <p>Judul:</p>
        <p><input type="text" class="form-control" name="judul" value="<?= $slider->judul; ?>" placeholder="Masukan judul untuk di slider."></p>
        <p><input type="hidden" readonly class="form-control" name="id" value="<?= $slider->id_slider; ?>" placeholder="Masukan judul untuk di slider."></p>
        <p>Foto / Gambar :</p>
        <?php if ($slider->img != "") { ?>
        <p class="form-control" id="sliimg"><a href="<?= base_url('uploads/slider/'.$slider->img);?>" class="sw"><i class="fa fa-eye"></i> Lihat Foto</a> | <a href="#" onclick="desliimg('<?= $slider->id_slider; ?>','<?= $slider->img; ?>')" style="color:red;"><i class="fa fa-trash"></i> Delete foto</a></p>
        <div id="hsliimg"></div>
        <?php }else{ ?>
          <input type="file" class="form-control" name="img"  placeholder="Masukan foto / gambar untuk di dijadikan slide." required></p>
        <?php } ?>
        <p>link :</p>
        <p><input type="text" class="form-control" name="link" value="<?= $slider->link ?>" placeholder="Masukan link."></p>
        <p><input type="submit" class="btn btn-success" name="simpan" value="Simpan perubahan"> <input type="reset" class="btn btn-danger" value="Ulangi" name="reset"></p>
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
    <h3 class="box-title">Tambah Slider</h3>
      <div class="box-tools pull-right">
        <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-plus"></i></button>
      </div>
      <!-- /.box-tools -->
    </div>
    <!-- /.box-header -->
    <div class="box-body" style="display: none;">
      <form action="<?= site_url('Pp/inslider') ?>" enctype="multipart/form-data"  method="post" accept-charset="utf-8">
        <p>Judul:</p>
        <p><input type="text" class="form-control" name="judul"  placeholder="Masukan judul untuk di slider."></p>
        <p>Foto / Gambar :</p>
        <p><input type="file" class="form-control" name="img"  placeholder="Masukan foto / gambar untuk di slider."></p>
        <p>link :</p>
        <p><input type="text" class="form-control" name="link"  placeholder="Masukan link."></p>
        <p><input type="submit" class="btn btn-success" name="simpan" value="Simpan"> <input type="reset" class="btn btn-danger" value="Ulangi" name="reset"></p>
      </form>
    </div>
    <!-- /.box-body -->
  </div>

 <div class="box box-default">
  <div class="box-header with-border">
    <h3 class="box-title">Daftar Slider</h3>
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
         <th>Gambar</th>
         <th>Link</th>
         <th>Dibuat</th>
         <th style="text-align: center;"><i class="fa fa-gear"></i></th>
       </tr>
     </thead>
     <tbody>
       <?php $no=1; foreach ($slider as $val) { ?>
       <tr>
         <td><?= $no++;?></td>
         <td><?= $val->judul;?></td>
         <td>
           <?php if ($val->img != "") { ?>
           <a class="sw" href="<?= base_url('uploads/slider/'.$val->img);?>" title="<?= $val->judul;?>" alt="<?= $key->nama_brand;?>">Lihat</a>
           <?php }else{echo "Tidak ada foto";} ?>
         </td>
         <td><?= $val->link;?></td>
         <td><?= $val->date_buat;?></td>
         <td style="text-align: center;"><a href="#" onclick="location='<?= site_url('vp/slider/edit_slider/'.$val->id_slider);?>'"><i class="fa fa-pencil"></i></a> . <a href="<?= site_url('vp/slider/hapus_slider/'.$val->id_slider);?>" onclick="return confirm('Apakah anda yakin ingin menghapus slider ini ?')"><i class="fa fa-trash"></i></a></td>
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
<script type="text/javascript">
  
  $(document).ready(function() {
    $('#tabel').DataTable();
  });

  $(document ).ready(function() {
    /* Basic Gallery */
    $('.sw').swipebox();
  });

</script>