<?php
  if(empty($this->params[0])|| $this->params[0]<=0){
  	$idloai= -1;
  }else{
  	$idloai =$this->params[0];
  	settype($idloai,"int");
  }  
 if(empty($this->params[1])){
 	$currentpage = 1;
 }else{
 	  $currentpage= $this->params[1]; 
 	  settype($currentpage,"int");
 }

  $per_page=5; $totalrows=0; 
  $start = ($currentpage-1)*$per_page;   
  $kq = $this->qt->baiviet_list($idloai,$per_page,$start, $totalrows);	 
?>

<table id=listNews width=100% border=1 cellpadding=4 cellspacing=0 class="list">
	<tr class=captionrow>
		<td colspan=4>
		<span>Quản trị bài viết</span>
		<a href="<?=BASE_URL?>PostController/baiviet_them" title="Thêm bài viết">Thêm mới </a>
		</td>
	</tr>

	<tr>
		<td colspan=4 align=midden height=50>
		<?php $phanloai = $this-> qt->listloai_dequy(0); ?>
		<form action="" method="post" style="margin: 0;" >
			<select name=loaicha id=loaicha class=txt1 onchange='document.location="<?php echo BASE_DIR?>quantri/baiviet_list/" + this.value;' title='Chọn để xem bài trong loại'>
				<option value=-1>Tất cả loại</option>
				<?php foreach ($phanloai as $loai) {?>
			  	       <option value="<?=$loai['id']?>" <?=($idloai==$loai['id'])?"selected":""?> > 
				    <?php echo $loai['ten'];?> 
				</option>
				<?php }?>
			</select>
		  Có <?php echo $totalrows?> bài viết.
		<a href="<?=BASE_URL?>quantri/baiviet_list/-1/">Xem hết</a>
		</form>
	</td>
</tr>

<form id="formlist">
<?php foreach($kq as $row){  $loaibv= $this->qt->chitietloaibaiviet($row['idloai']); ?>
<tr class=motbaiviet>
	<td width="90" align="center">
		<p class=idbv>Id: <?php echo $row['idbv']?></p>
		<p class="tenloai" title="Bài viết hiện trong loại này">
		<a href="<?=BASE_URL?>quantri/baiviet_list/<?php echo $row['idloai']?>/-1/"> 
			<?=$loaibv['tenloai']?>
		</a>
		</p>
	</td>
	<td style="width:15px"><input width:15 type="checkbox" name="" value=""></td>
<td valign=top>
	<a href="#" onclick="var w=window.open('<?=BASE_URL?><?=$loaibv['alias']?>/<?php echo $row['alias']?>.html','xemtin','width=950,height=750,top=0,left=0,scrollbars=yes'); w.focus();return false">
	<img src="http://localhost:2015/tintuc/img/<?=$row['urlhinh']?>" align=right width=90 height=75 >
	</a>
	<h4 class="tieude"><?php echo $row['tieude']?></h4>
	<span class="xem">Xem: <?php echo $row['solanxem']?>. 
	Ngày: <?php echo date('d/m/Y',strtotime($row['ngay']))?>. 
	</span>
	<p><?php echo $row['tomtat']?></p>
	</td>
	<td valign=middle align=center width="100" class=action >
	<p>    
	<?php if ($row['anhien']==0) {?>
	 ẩn<!-- <img class="anhien" idbv="<?=$row['idbv']?>" src="<?=BASE_URL?>img/AnHien_0.jpg" title="Bài này đang ấn." /> -->
	<?php } else {?>
	 hiện<!-- <img class="anhien" idbv="<?=$row['idbv']?>" src="<?=BASE_URL?>img/AnHien_1.jpg" title="Bài này đang hiện" /> -->
	<?php }?>
	Bài bt<?php if ($row['noibat']==0) {?>
	<!-- <img class="noibat" idbv="<?=$row['idbv']?>" src="<?=BASE_URL?>img/NoiBat_0.jpg" title="Bài này bình thường" /> -->
	<?php } else {?>
	Nổi b<!-- <img class="noibat" idbv="<?=$row['idbv']?>" src="<?=BASE_URL?>img/NoiBat_1.jpg" title="Bài này đang nổi bật " /> -->
	<?php }?>
</p>
<p>
 <a href="<?=BASE_URL?>PostController/baiviet_sua/<?php echo $row['idbv']?>" >Edit
 <!-- <img class="edit" src="<?=BASE_URL?>img/edit.png" title="Chỉnh bài viết"/> -->
 </a>
 <a href="<?=BASE_URL?>quantri/baiviet_xoa/<?php echo $row['idbv']?>" onclick="return confirm('Xóa hả');">
 <!-- <img class="del" src="<?=BASE_URL?>img/delete.png" title="Xóa bài viết"/> --> Xóa
 </a>
</p>
</td>
</tr>
<?php }?>
</form>
<tr><th colspan=3>
<div id="thanhphantrang">
<?php echo $this->qt->pageslist(BASE_DIR."quantri/baiviet_list/$idloai", $totalrows, 5,$per_page, $currentpage);?>
</div>

</th></tr>
</table>
