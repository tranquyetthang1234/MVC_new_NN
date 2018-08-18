<form action="" method="post" id="loaibaiviet_them"  class="form">
<h4>THÊM LOẠI BÀI VIẾT</h4>
<p><span>Tên loại</span><input class=txt type=text name=tenloai id=tenloai></p>
<p><span>Loại cha</span>
<?php $phanloai = $this-> qt->listloai_dequy(0); ?>
<select class=txt type=text name=loaicha id=loaicha>
<option value="0"> Không có </option>
  <?php foreach ($phanloai as $loai) {?>
  	<option value="<?=$loai['id']?>"> <?=$loai['ten'];?> </option>
  <?php }?>
</select>
</p>
<p><span>Ẩn hiện</span><input type=radio name=anhien id=anhien value=0>Ẩn 
<input type=radio name=anhien id=anhien value=1 checked>Hiện</p>
<p><span>Thứ tự</span><input class=txt type=text name=thutu id=thutu></p>
<p align=center><input value=" Thêm " type=submit name=btn id=btn ></p>
</form>
