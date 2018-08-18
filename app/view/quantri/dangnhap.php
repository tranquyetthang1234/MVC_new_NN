<style>
#formlogin1  { border:solid 1px #FFFFFF; color:#036; font-weight:bold; width:500px; 	margin:80px auto; text-align:center; border-radius:5px;
	background: linear-gradient(-90deg, rgba(255, 161, 0, 0.96), rgba(255, 151, 0, 0.42));
}
#formlogin1 h3 {margin:0; padding:8px; background-color:#06446D; color: white;
	background: linear-gradient(0, rgba(255, 161, 0, 0.96), rgba(255, 151, 0, 0.42));
}
#formlogin1  span { width: 120px; float:left; text-align:left; margin-left:10px}
#formlogin1  #u, #formlogin1 #p {background-color:#036; color:#6FF; padding:5px; border:solid 1px #990; width:320px;border-radius:5px;}
#formlogin1 #btnLog{ background-color:#036; color:#6FF; width:140px; border-radius:5px; padding:14px; border:solid 1px #6FF; cursor:pointer;}
#formlogin1 #error {margin:20px; color: red; font-size:18px;}
</style>

<title>ĐĂNG NHẬP QUẢN TRỊ</title>
<form id="formlogin1" name="formlogin1" method="post" action="">

<h3>ĐĂNG NHẬP QUẢN TRỊ</h3>
<div id="error"> </div>
	<?php  echo isset($_SESSION['error']) ?  $_SESSION['error'] : ''; unset($_SESSION['error']);?>
<p><span>Tên đăng nhập</span><input type=text name="u" id="u"></span></p>
<p><span>Mật khẩu</span><input type=password name="p" id="p" ></span></p>
<p><span> </span><input type="checkbox" name="nho" id="nho">Ghi nhớ</span></p>
<p><input type="submit" name="btnLog" id="btnLog" value="Đăng nhập" /></p>
</form>
