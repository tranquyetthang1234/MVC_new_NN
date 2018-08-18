<div id="baixemnhieu">
<h4>Bài xem nhiều</h4>
<?php foreach ($baixn as $row) {?>
<p> <a href="<?=BASE_DIR?>/detail/<?=$row->id?>"> <?=$row['tieude'];?> </a> </p>
<?php } ?>
</div>
