<?php
class PostController{	
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

}

function baiviet_them(){
	if ($_POST ==NULL) require_once "view/quantri/home.php";		
	else{
		$kq = $this->qt->baiviet_themss();
		if($kq){	
			header('location:'. BASE_URL.'quantri/baiviet_list');
		}
	}
}

function baiviet_sua(){
	$id= $this->params[0]; settype($id,"int");
	if (isset($_POST['btn'])==true){
		$kq = $this->qt->baiviet_sua($id);			
		
	} else {
		$row = $this->qt->chitietbaiviets($id);
		require_once "view/quantri/home.php";
	} 
}



}//class
