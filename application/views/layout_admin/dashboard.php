<link rel="stylesheet" type="text/css" href="<?= base_url(); ?>public/sw/swipebox.css">
<script type="text/javascript" src="<?= base_url(); ?>public/sw/swipebox.js"></script>
<script type="text/javascript" src="<?= base_url(); ?>public/js/script.js"></script>

<div class="col-md-12">
<div class="box box-default">
  <div class="box-header">Deksripsi utama website</div>
  <div class="box-body">

    <form action="<?= site_url('vp/uputama'); ?>" method="post" enctype="multipart/form-data"  accept-charset="utf-8">
        <p>Nama brand : </p>
        <p><input type="text" value="<?= $key->nama_brand;?>" class="form-control" name="nama_brand" placeholder="Masukan nama brand website anda disini." required></p>
        <p>Email (Email ini berfungsi mengirimkan pemberitahuan jika ada pemesanan baru!) : </p>
        <p><input type="email" value="<?= $key->email;?>" class="form-control" name="email" placeholder="Masukan email website anda disini." required></p>
        <p>Logo : </p>
        <?php if ($key->logo != "") { ?>
        <p class="form-control" id="lo"><a href="<?= base_url('uploads/'.$key->logo);?>" class="sw"><i class="fa fa-eye"></i> Lihat logo</a> | <a href="#" onclick="delogo('<?= $key->logo?>')" style="color:red;" ><i class="fa fa-trash"></i> Hapus logo</a></p>
        <p>
        <div id="hlogo"></div>
        <?php }else{ ?>
          <input type="file" class="form-control" name="logo" placeholder="Masukan logo website anda disini." required></p>
        <?php } ?>
        <!-- <p>Banner : </p>
        <?php if ($key->banner != "") { ?>
        <p class="form-control" id="be"><a href="<?= base_url('uploads/'.$key->banner);?>" class="sw"><i class="fa fa-eye"></i> Lihat banner</a> | <a href="#" style="color:red;" onclick="debanner('<?= $key->banner?>')"><i class="fa fa-trash"></i> Hapus banner</a></p>
        <div id="hbanner"></div>
        <?php }else{ ?>
        <p><input type="file" class="form-control" name="banner" placeholder="Masukan banner website anda disini." required></p>
        <?php } ?> -->
        <p>Footer : </p>
        <p><textarea class="form-control" name="pk" placeholder="Masukan pesan dan kesan website anda disini." required><?= $key->pk;?></textarea></p>
        <p>Deksripsi website: </p>
        <p><textarea class="form-control" name="deskripsi" placeholder="Masukan deksripsi website anda disini" required><?= $key->deskripsi;?></textarea></p>
        <p>Menu : </p>
        <p><textarea style="font-size:12px;" class="form-control" name="menu" placeholder="Masukan pesan dan kesan website anda disini." required><?= $key->menu;?></textarea></p>
        <p><input type="submit" name="simpan" class="btn btn-success" value="Simpan Perubahan"></p>
    </form>
  </div>
</div>
</div>

<script type="text/javascript">
  // Swipbox
  $(document ).ready(function() {
    /* Basic Gallery */
    $('.sw').swipebox();
  });

</script>