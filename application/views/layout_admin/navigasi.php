<link rel="stylesheet" type="text/css" href="<?= site_url()?>public/sw/swipebox.css">
<link rel="stylesheet" type="text/css" href="<?= site_url();?>public/css/dataTables.bootstrap.min.css">

<?php if ($this->uri->segment(3) == 'edit_menu') {?>
<div class="col-md-12">
<div class="box box-success">
  <div class="box-header with-border">
    <h3 class="box-title">Edit Menu</h3>
    <div class="box-tools pull-right">
      <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-plus"></i></button>
    </div>
    <!-- /.box-tools -->
  </div>
  <!-- /.box-header -->
   <div class="box-body" style="display: block;">
      <form action="<?= site_url('pp/upnavigasi/'.$this->uri->segment(3).'/'.$this->uri->segment(4)) ?>" enctype="multipart/form-data"  method="post" accept-charset="utf-8">
        <p>Nama Menu:</p>
        <p><input type="text" class="form-control" value="<?= $menu->menu; ?>" name="menu"  placeholder="Masukan nama menu disini."></p>
        <p>link :</p>
        <p><input type="text" class="form-control" value="<?= $menu->link; ?>" name="link"  placeholder="Masukan link disini."></p>
        <p><input type="submit" class="btn btn-success" name="simpan" value="Simpan"> <input type="reset" class="btn btn-danger" value="Ulangi" name="reset"></p>
      </form>
    </div>
  <!-- /.box-body -->
</div>
</div>
<?php }elseif ($this->uri->segment(3) == "daftar_menu") { ?>
<!-- ADD DAN VIEW -->
<div class="col-md-12">
 <div class="box box-success collapsed-box">
    <div class="box-header with-border">
    <h3 class="box-title">Tambah Menu</h3>
      <div class="box-tools pull-right">
        <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-plus"></i></button>
      </div>
      <!-- /.box-tools -->
    </div>
    <!-- /.box-header -->
    <div class="box-body" style="display: none;">
      <form action="<?= site_url('pp/innavigasi/'.$this->uri->segment(3)) ?>" enctype="multipart/form-data"  method="post" accept-charset="utf-8">
        <p>Nama Menu:</p>
        <p><input type="text" class="form-control" name="menu"  placeholder="Masukan nama menu disini."></p>
        <p>link :</p>
        <p> 
         <select class="form-control" name="id_level">
        <?php foreach ($as_menu as $m): ?>
          <option value="<?= $m->id_menu;?>"><?= $m->menu;?></option>
        <?php endforeach ?>
        </select>
        </p>
        <p><input type="submit" class="btn btn-success" name="simpan" value="Simpan"> <input type="reset" class="btn btn-danger" value="Ulangi" name="reset"></p>
      </form>
    </div>
    <!-- /.box-body -->
  </div>

 <div class="box box-default">
  <div class="box-header with-border">
    <h3 class="box-title">Daftar Menu</h3>
    <div class="box-tools pull-right">
      <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
    </div>
  </div>
  <div class="box-body" style="display: hidden;">
   <table id="tabel" class="table table-bordered">
     <thead>
       <tr>
         <th>#</th>
         <th>Menu</th>
         <th>Link</th>
         <th>Dibuat</th>
         <th style="text-align: center;"><i class="fa fa-gear"></i></th>
       </tr>
     </thead>
     <tbody>
       <?php $no=1; foreach ($menu as $val) { ?>
       <tr>
         <td><?= $no++;?></td>
         <td><?= $val->menu;?></td>
         <td><?= $val->link;?></td>
         <td><?= $val->date_buat;?></td>
         <td style="text-align: center;"><a href="#" onclick="location='<?= site_url('vp/navigasi/edit_menu/'.$val->id_menu.'/'.$val->token);?>'"><i class="fa fa-pencil"></i></a> . <a href="<?= site_url('vp/navigasi/hapus_menu/'.$val->id_menu.'/'.$val->token);?>" onclick="return confirm('Apakah anda yakin ingin menghapus menu ini ?')"><i class="fa fa-trash"></i></a></td> 
       </tr>
       <?php } ?>
     </tbody>
   </table>
 </div>
</div>
<?php }elseif ($this->uri->segment(3) == "edit_submenu") { ?>
<div class="col-md-12">
<div class="box box-success">
  <div class="box-header with-border">
    <h3 class="box-title">Edit Submenu</h3>
    <div class="box-tools pull-right">
      <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-plus"></i></button>
    </div>
    <!-- /.box-tools -->
  </div>
  <!-- /.box-header -->
   <div class="box-body" style="display: block;">
      <form action="<?= site_url('pp/upnavigasi/'.$this->uri->segment(3).'/'.$this->uri->segment(4)) ?>" enctype="multipart/form-data"  method="post" accept-charset="utf-8">
        <p>Nama Submenu:</p>
        <p><input type="text" class="form-control" value="<?= $menu->menu; ?>" name="menu"  placeholder="Masukan nama menu disini."></p>
        <p>Jadikan judul :</p>
        <p class="form-control">
        <?php if ($menu->judul == '1') {
          echo '<input type="radio" checked name="judul" value='.$menu->judul.'> Ya | <input type="radio" name="judul" value="0"> Tidak';
        }else{
          echo '<input type="radio" name="judul" value="1"> Ya | <input type="radio" name="judul" checked value='.$menu->judul.'> Tidak';
          } ?>
        </p>
        <p>Hubungkan ke menu</p>
        <p>
          <select class="form-control" name="id_level">
          <?php foreach ($as_menu as $m): ?>
             <?php if ($menu->id_level == $m->id_menu) {
               echo '<option value='.$menu->id_level.'>'.$m->menu.'</option>';
             }?>
           <?php endforeach ?>
            <option disabled>-----------</option>}
            <?php foreach ($as_menu as $m): ?>
              <option value="<?= $m->id_menu;?>"><?= $m->menu;?></option>
            <?php endforeach ?>
          </select>
        </p>
        <p>Link :</p>
        <p>
          <input class="form-control" type="text" name="link" value="<?= $menu->link?>" placeholder="Masukan Link disini (Boleh kosong)">
        </p>
        <p><input type="submit" class="btn btn-success" name="simpan" value="Simpan"> <input type="reset" class="btn btn-danger" value="Ulangi" name="reset"></p>
      </form>
    </div>
  <!-- /.box-body -->
</div>
</div>
<?php }elseif ($this->uri->segment(3) == "daftar_submenu") { ?>
  <div class="col-md-12">
 <!-- Tambah Submenu -->
 <div class="box box-success collapsed-box">
    <div class="box-header with-border">
    <h3 class="box-title">Tambah Submenu</h3>
      <div class="box-tools pull-right">
        <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-plus"></i></button>
      </div>
      <!-- /.box-tools -->
    </div>
    <!-- /.box-header -->
    <div class="box-body" style="display: none;">
      <form action="<?= site_url('pp/innavigasi/'.$this->uri->segment(3)) ?>" enctype="multipart/form-data"  method="post" accept-charset="utf-8">
        <p>Nama Menu:</p>
        <p>
          <input type="text" class="form-control" name="menu"  placeholder="Masukan nama submenu disini.">
        </p>
        <p>Jadikan judul :</p>
        <p class="form-control">
          <input type="radio" name="judul" value="1"> Ya | <input type="radio" name="judul" value="0"> Tidak
        </p>
        <p>Hubungkan ke menu :</p>
        <p>
        <select class="form-control" name="id_level">
        <?php foreach ($as_menu as $m): ?>
          <option value="<?= $m->id_menu;?>"><?= $m->menu;?></option>
        <?php endforeach ?>
        </select>
        </p>
        <p>Link :</p>
        <p>
          <input class="form-control" type="text" name="link" placeholder="Masukan Link disini (Boleh kosong)">
        </p>
        <p><input type="submit" class="btn btn-success" name="simpan" value="Simpan"> <input type="reset" class="btn btn-danger" value="Ulangi" name="reset"></p>
      </form>
    </div>
    <!-- /.box-body -->
  </div>

 <div class="box box-default">
  <div class="box-header with-border">
    <h3 class="box-title">Daftar Submenu</h3>
    <div class="box-tools pull-right">
      <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
    </div>
  </div>
  <div class="box-body" style="display: hidden;">
   <table id="tabel" class="table table-bordered">
     <thead>
       <tr>
         <th>#</th>
         <th>Nama submenu</th>
         <th>Hubungan menu</th>
         <th>Dibuat</th>
         <th style="text-align: center;"><i class="fa fa-gear"></i></th>
       </tr>
     </thead>
     <tbody>
       <?php $no=1; foreach ($menu as $val) { ?>
       <tr>
         <td><?= $no++;?></td>
         <td><?= $val->menu;?> <span class="label label-warning"><?php if($val->judul == '1'){echo "Judul";}?></span></td>
         <td>
           <?php foreach ($as_menu as $m): ?>
             <?php if ($val->id_level == $m->id_menu) {
               echo $m->menu;
             }?>
           <?php endforeach ?>
         </td>
         <td><?= $val->date_buat;?></td>
         <td style="text-align: center;"><a href="#" onclick="location='<?= site_url('vp/navigasi/edit_submenu/'.$val->id_menu.'/'.$val->token);?>'"><i class="fa fa-pencil"></i></a> . <a href="<?= site_url('vp/navigasi/hapus_submenu/'.$val->id_menu.'/'.$val->token);?>" onclick="return confirm('Apakah anda yakin ingin menghapus submenu ini ?')"><i class="fa fa-trash"></i></a></td> 
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