<?php
class TypePostController{	
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

function loaibaiviet_list(){		
	require_once "view/quantri/home.php";
}

function loaibaiviet_them(){
	if ($_POST ==NULL) require_once "view/quantri/home.php";
	else{	
	$kq = $this->qt->loaibaiviet_them();
		header('location:'. BASE_DIR.'TypePostController/loaibaiviet_list');
	}

}

}//class
