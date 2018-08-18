<?php
class quantri {	
	public $qt;
	public $params;
	public $current_action;
	public $cname="quantri";
	public $lang;

function __construct($action,$params){		
	$this->qt = new model_quantri;
	if ($action == "") $action="index";
	$this->current_action=$action;
	$this->params = $params;		
	if ($action!="dangnhap" && $action!="thoat") $this -> qt->checklogin();
	$this->$action();
}
function baiviet_list(){	
	require_once "view/quantri/home.php";
}

function index(){		
	require_once "view/quantri/home.php";
}
function dangnhaps(){
	require_once "view/quantri/dangnhap.php";
}	
function dangnhap(){

	if ($_POST ==NULL) {require_once "view/quantri/dangnhap.php";}
	else {
		$u = strip_tags($_POST['u']); $p = strip_tags($_POST['p']);	

		$kq = $this->qt->login($u, $p);
		if ($kq==false){ $_SESSION['error'] = "Tài khoản mật khẩu không chính xác" ;
		
			header('location:'.BASE_URL.'quantri/dangnhap');
			die();
		}else{
			/*if (isset($_SESSION['back'])) {
				$b = $_SESSION['back'];  
				unset($_SESSION['back']);  */
			header('location:'. BASE_URL.'quantri/home');
			}
			//else header('location:'. BASE_URL.'quantri/home');
		
	}
}

function baiviet_daoanhien(){
	$id=$this->params[0]; settype($id, "int");

	echo $this->qt->baiviet_daoanhien($id);		
}
function baiviet_daonoibat(){
	$id=$this->params[0]; settype($id, "int");
	echo $this->qt->baiviet_daonoibat($id);		
}
function baiviet_xoa(){
	$id=$this->params[0]; settype($id, "int");
	$this->_del($id);
	$_SESSION['success'] = "Xóa thành công tin tức";		
	header('Location: ' . $_SERVER['HTTP_REFERER']);
	exit;
}

private function _del($id){
	$nameimg = $this->qt->chitietbaiviet($id);
	if(!$nameimg){
		$_SESSION['success'] = "Bài viết không tồi tại";
		header("location: " . BASE_URL."quantri/baiviet_list");	
		exit();
	}
	
	$image_link =  './img/'.$nameimg['urlhinh'];
		//echo $image_link;
	    if(is_dir($image_link))
	    {
	    	
	        unlink($image_link);
	    }
	 
     $this->qt->baiviet_xoa($id);
}
function thoat(){
	session_destroy();  
	header('location:'.BASE_URL.'quantri/dangnhap');
}
}//class
