<html>
<head>

  
<link href="<?=BASE_URL?>css/quantri/quantri.css" rel="stylesheet" type="text/css"/>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script type="text/javascript" src="<?=BASE_URL?>js/menu_quantri/menu_jquery.js"></script>
<link type="text/css" href="<?=BASE_URL?>js/menu_quantri/styles.css" rel="stylesheet" />
<script type="text/javascript" src="<?=BASE_URL?>js/menu_quantri/myjs.js"></script>

<title>Quản trị website</title>
</head>
<body>
<div id="wrapper"> 
  <div id="header"> 
    <h1>Quản Trị WEBSITE </h1>  
    <div id="chao"> 
      <p>
            <a href="<?php echo BASE_URL?>" target=_blank>Phần Public</a> &nbsp;
      <a href="<?=BASE_URL?>quantri/thoat">Thoát</a> &nbsp;
      -  &nbsp; Chào <?php echo $_SESSION['login_hoten'];?>  &nbsp;
      </p>
    </div>  
  </div>
   <div id="menu"> 
 
   <div id='cssmenu'>

              <?php if(isset($_SESSION['success'])){ ?>
                <div class="col-xs-4 thang" style="z-index :99;position:fixed;right:40px;top:100px">
                  <div class="alert alert-success" style="padding:15px;background-color:lightblue">
                      <strong><?php echo isset($_SESSION['success']) ? $_SESSION['success'] :'';unset($_SESSION['success'])?></strong>
                 </div>
               </div>
              <?php }?>
    <ul>
       <li><a href="<?=BASE_URL?>quantri"><span>Trang chủ</span></a></li>
       <li class='has-sub'><a href='#'><span>Bài viết</span></a>
          <ul>
             <li><a href="<?=BASE_URL?>PostController/baiviet_them"><span>Thêm bài viết</span></a></li>
             <li><a href="<?=BASE_URL?>quantri/baiviet_list"><span>Danh sách bài viết</span></a></li>             
          </ul>
       </li>
       <li class='has-sub'><a href='#'><span>Loại bài viết</span></a>
          <ul>
             <li><a href="<?=BASE_URL?>TypePostController/loaibaiviet_them"><span>Thêm loại bài viết</span></a></li>
             <li><a href="<?=BASE_URL?>TypePostController/loaibaiviet_list"><span>Danh sách loại bài viết</span></a></li>
          </ul>
       </li>
       <li><a href="#"><span>Ý kiến</span></a></li>     
       <li class='last'><a href="#"><span>Cấu hình</span></a></li>
    </ul>
    </div>
   </div>
   
   <div id="content"> 
  <?php
  if ($this->current_action=="baiviet_them") include "baiviet_them.php";
  if ($this->current_action=="baiviet_list") include "baiviet_list.php";
  if ($this->current_action=="baiviet_sua") include "baiviet_sua.php";
  
  if ($this->current_action=="loaibaiviet_them") include "loaibaiviet_them.php";
  if ($this->current_action=="loaibaiviet_list") include "loaibaiviet_list.php";
  if ($this->current_action=="loaibaiviet_sua") include "loaibaiviet_sua.php";
  ?>
    <div style="clear: both;"></div>
   </div>
   
</div>
</body>
</html>
