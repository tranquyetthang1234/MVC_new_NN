<form action="" method="post" id="baiviet_them" class="formbv" >
<table width=100% border=0 cellpadding=0>
<tr><td colspan=2><h4>THÊM BÀI VIẾT</h4></td></tr>
<td valign=top align=left >
<p><input class="txt" type="text" pla name="tieude" id="tieude" value="<?=$row['tieude']?>" >  
	<?php echo  isset($_SESSION['error']['tieude']) ? $_SESSION['error']['tieude'] :'';unset($_SESSION['error']['error']['tieude']);?>
</p>
<p><textarea class=txt type=text name=tomtat id="tomtat"  ><?= $row['tomtat']?></textarea></p>
	<?php echo  isset($_SESSION['error']['tomtat']) ? $_SESSION['error']['tomtat'] :'';unset($_SESSION['error']['tomtat']);?>
<p>
<input class=txt type=text value="<?=BASE_URL."img/".$row['urlhinh']?>" name=urlhinh id="urlhinh" title="Địa chỉ hình của bài viết. Nhắp nút ... để chọn hình" >
<input class=btn type=button name=chonfile id=chonfile value="..." >
</p>
</td>
<td valign=top width=280>
<p>
<input type=radio name=anhien id=anhien value=0 <?=($row['anhien']==0)? 'checked':''?> >Ẩn
<input type=radio name=anhien id=anhien value=1 <?=($row['anhien']==1)? 'checked':''?> >Hiện
</p>
<p>
<input type=radio name=noibat id=noibat value=0 <?=($row['noibat']==0)? 'checked':''?>>Bình thường
<input type=radio name=noibat id=noibat value=1 <?=($row['noibat']==1)? 'checked':''?>>Nổi bật
</p>
<p>
<input type=radio name=themykien id=themykien <?=($row['themykien']==1)? 'checked':''?> value=0>Không ý kiến<input <?=($row['themykien']==0)? 'checked':''?> type=radio name=themykien id=themykien value=1 checked>Cho ý kiến
</p>
<p>
<?php $phanloai = $this-> qt->listloai_dequy(0); ?>
<select name=loaicha id=loaicha class="txt1" title="Chỉ định loại cho bài viết">
	<?php foreach ($phanloai as $loai) {?>
  	<option <?=($loai['id']==$row['idloai'])? 'selected':''?> value="<?php echo $loai['id']?>"> <?php echo $loai['ten'];?> </option>
	<?php }?>
</select>
</p>
</td>
</tr>
<tr>
<td colspan=2>
<textarea name=noidung id=noidung class="ckeditor" rows=10 cols=110> :  <?= $row['content']?></textarea>
</td>
</tr>
<tr><td colspan=2><p align=center><input class="btnsubmit" value=" Sửa " type=submit name=btn id=btn >
<input type=checkbox checked name=themtiep>Thêm tiếp
</p></td></tr>
</form>
