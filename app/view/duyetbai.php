<table width=800 border=1 align=center cellpadding=4 cellspacing=0 id=danhsach>
<tr> <th> Tiêu đề/Tóm tắt </th> <th>Action</th> </tr>
<?php foreach($baimoi as $row) { ?>
<tr><td>
  <p class="tieude"> <?=$row['tieude']?>&nbsp; 
     <span>(Ngày <?=$row['ngay']?>, idbv: <?=$row['idbv']?> )</span>
  </p>
  <p class="tomtat"><?=$row['tomtat']?></p>    
</td>
<td width="170">
<select name="idloai" id="idloai">
  <option value="0"> Chọn loại tin </option>
  <?php foreach ($phanloai as $loai) {?>
  	<option value="<?=$loai['id']?>"> <?=$loai['ten'];?> </option>
  <?php }?>
</select> <br />
  <input name="AnHien" type="checkBox" value="<?=$row['idbv']?>" checked>Hiện 
  <input name="NoiBat" type="checkbox" value="<?=$row['idbv']?>">Nổi bật<br>
  <input type=button class=btnduyet value="Duyệt"  idbv="<?=$row['idbv']?>">
  <input type="button" class="btnbo" value="  Bỏ  " idbv="<?=$row['idbv']?>">
  <input type="button" class="btnXem" value="Xem" id="btnXem" idbv="<?=$row['idbv']?>" >
</td></tr>
<?php } ?>
</table>
