<form action="" method="post" id="baiviet_them" class="formbv" >
<table width=100% border=0 cellpadding=0>
<tr><td colspan=2><h4>THÊM BÀI VIẾT</h4></td></tr>
<td valign=top align=left >
<p><input class="txt" type="text" pla name="tieude" id="tieude" value="<?php echo isset($_POST['tieude']) ? $_POST['tieude'] : '' ?>" >  
	<?php echo  isset($_SESSION['error']['tieude']) ? $_SESSION['error']['tieude'] :'';unset($_SESSION['error']['error']['tieude']);?>
</p>
<p><textarea class=txt type=text name=tomtat id="tomtat"  ></textarea></p>
	<?php echo  isset($_SESSION['error']['tomtat']) ? $_SESSION['error']['tomtat'] :'';unset($_SESSION['error']['tomtat']);?>
<p>
<input class=txt type=text name=urlhinh id="urlhinh" title="Địa chỉ hình của bài viết. Nhắp nút ... để chọn hình" >
<input class=btn type=button name=chonfile id=chonfile value="..." >
</p>
</td>
<td valign=top width=280>
<p>
<input type=radio name=anhien id=anhien value=0 checked>Ẩn
<input type=radio name=anhien id=anhien value=1 >Hiện
</p>
<p>
<input type=radio name=noibat id=noibat value=0 checked>Bình thường
<input type=radio name=noibat id=noibat value=1>Nổi bật
</p>
<p>
<input type=radio name=themykien id=themykien value=0>Không ý kiến<input type=radio name=themykien id=themykien value=1 checked>Cho ý kiến
</p>
<p>
<?php $phanloai = $this-> qt->listloai_dequy(0); ?>
<select name=loaicha id=loaicha class="txt1" title="Chỉ định loại cho bài viết">
	<?php foreach ($phanloai as $loai) {?>
  	<option value="<?php echo $loai['id']?>"> <?php echo $loai['ten'];?> </option>
	<?php }?>
</select>
</p>
</td>
</tr>
<tr>
<td colspan=2>
<textarea name=noidung id=noidung class="ckeditor" rows=10 cols=110></textarea>
</td>
</tr>
<tr><td colspan=2><p align=center><input class="btnsubmit" value=" THÊM " type=submit name=btn id=btn >
<input type=checkbox checked name=themtiep>Thêm tiếp
</p></td></tr>
</form>
