<div id="baimoi">
<?php foreach($cacloais as $lt){?>
<div class="rows"> <h4><a href="#"><?=$lt['tenloai']?></a></h4> 
	<?php $idloai= $lt['idloai'];
	$bm = $this->bv->baimoitrongloai($idloai,4);?>
<?php $bai=$bm[0];?>
<div class="tindau"> 
   <img src="<?=BASE_DIR?>img/<?=$bai['urlhinh'];?>" style="width:80px;" align=left />
   <div class="tieude"><a href="#"><?=$bai['tieude'];?></a></div>
   <div class="tomtat"><?=$bai['tomtat'];?></div>
</div>
<div class="tintieptheo">
   <?php for($j =1; $j<count($bm); $j++) {$bai = $bm[$j]; ?>	
	<p class="tieude"> <a href="#"><?=$bai['tieude']?> </a></p>
   <?php }	//for $j?>
</div>

</div>
<?php }?>
</div>
