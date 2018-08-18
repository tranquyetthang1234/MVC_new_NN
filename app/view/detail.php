<div id="baiviet_ct">
<h4  class="tieude"><a href="#"><?=$bai['tieude']?></a></h4>
<img src="<?=BASE_DIR?>img/<?=$bai['urlhinh'];?>" align=left width=140 height=100>
<div class="xem">
Số lần xem: <?=$bai['solanxem']?>  . 
Ngày đăng: <?=date('d/m/Y',strtotime($bai['ngay']))?>
</div>
<div class="tomtat"><?=$bai['tomtat']?></div> <hr>
<div id="content"><?=$bai['content']?></div>
</div>
