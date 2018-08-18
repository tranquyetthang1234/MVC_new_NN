<?php   

 if(empty($this->params[1])){
 	$currentpage = 1;
 }else{
 	  $currentpage= $this->params[1]; 
 	  settype($currentpage,"int");
 }  
  $per_page=10; $totalrows=0;  $start = ($currentpage-1)*$per_page;  
  $kq = $this->qt->loaibaiviet_list($per_page,$start, $totalrows);
  $q = $this->qt->allloai();
 
 ?>
 <select >
 	<?php 

 $c=  $this->qt->dequy3($q); print_r($c);

  ?>
 </select>


<table width=100%>
<tr>
<td class="colleft" valign=top width=350>
<div id="loaibaivietTree"> <?php include "loaibaiviet_tree.php"?> </div>
</td>
<td valign=top class=colright>
<!-- <center><?=$_SESSION['thongbao']; unset($_SESSION['thongbao']);?></center> -->
<table id=listloaibaiviet width=100% border=1 cellpadding=4 cellspacing=0 class="list">
<tr class=captionrow>
<td colspan=7>	
<span>Loại bài viết</span> <a href="<?=BASE_URL?>TypePostController/loaibaiviet_them">Thêm</a>
</td></tr>
<tr>
<th width=50>id</th> <th>Tên loại</th> <th>Thứ tự</th> <th>Alias</th> 
<th>Ẩn hiện</th> <th>Loại cha</th> <th>Action</th>
</tr>
<?php foreach($kq as $row){ ?>
<tr>

<td><?php echo $row['idloai']?></td>
<td>
<?php echo $row['TenLoai']?> &nbsp;
(<a href="<?=BASE_DIR?>quantri/baiviet_list/<?=$row['idloai']?>"> 
<?=$this->qt->demsobaiviettrongloai($row['idloai']);?> bv
</a>)
</td>
<td  align=center><?php echo $row['ThuTu']?></td>
<td  align=center><?php echo $row['Alias']?></td>
<td  align=center><?php echo ($row['AnHien']==1)? "Hiện":"Ẩn"?></td>
<td  align=center><?php echo $this->qt->laytenloaibaiviet($row['idCha']);?></td>
<td  align=center>
<a href="<?=BASE_URL?>quantri/loaibaiviet_xoa/<?= $row['idloai']?>" onclick="return confirm('Xóa hả');"> Xóa</a> &nbsp;
<a href="<?=BASE_URL?>quantri/loaibaiviet_sua/<?=$row['idloai']?>" >Sửa</a> &nbsp;
</td>
</tr>
<?php }?>
<tr><th colspan=7>
<div id="thanhphantrang">
<?=$this->qt->pageslist(BASE_DIR."quantri/loaibaiviet_list", $totalrows, 3,$per_page, $currentpage);?>
</div>
</th></tr>
</table>
</td>
</tr>
</table>
