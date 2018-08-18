<?php
	class BaseController{


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
	}









?>