<?php foreach ($this->mb->gad_l() as $gadget): ?> 
  <div class="panel panel-default">
    <?php if ($gadget->judul !=''): ?>
    <div class="panel-heading p3d"><?=$gadget->judul?></div>
    <?php endif ?>
    <div class="panel-body" style="padding: 0">
      <?=$gadget->isi?>
    </div>
  </div>
<?php endforeach ?>