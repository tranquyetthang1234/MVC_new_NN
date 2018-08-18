<!DOCTYPE html> <html>
<head>
   <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
   <base href="<?=BASE_URL?>">
    
   <link href="<?=BASE_URL?>css/c1.css" rel="stylesheet" type="text/css" />
   <title>Tin tức online</title></head>
<body>
<div id="container">
  <div id="header"><img src="<?=BASE_DIR?>/img/template/banner1.jpg" width="990" height="180">
<div id="sitetitle">TIN TỨC TRỰC TUYẾN</div>
  </div>
   <div id="menungang">  </div>
      <?php if ($this->current_action=="index") {?>
          <div id="content1"><?php include "view/bainoibat.php"; ?>  </div>
          <div id="info">  </div>
          <div id="content2">
      <?php }?>
      <div id="baixemnhieu">
    <h4>Bài xem nhiều</h4>
    <?php foreach ($baixn as $row) {?>
    <p> <a href="#"> <?=$row['tieude'];?> </a> </p>
    <?php } ?>
</div>
  </div>    
   <div id="content3">  </div>
   <div id="quangcao">
   <a href="#"> <img src="<?=BASE_DIR?>/img/template/qc1.jpg" width="400" height="90" align=left> </a>
<a href="#"> <img src="<?=BASE_DIR?>/img/template/qc4.gif" width="385" height="90" align=left> </a>

    </div>
   <div id="content4"> 
   		<?php 
		   if ($this->current_action=="detail") include "view/detail.php";
		   else include "view/baimoi.php";
?>

    </div>   
<div id="footer">  </div>
</div> <!--container-->
</body></html>
