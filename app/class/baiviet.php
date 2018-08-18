<?php
class baiviet {
	public $bv;
	public $params;
	public $current_action;
	public $cname="baiviet";
	public $lang;
	
	function __construct($action,$params){
		$this->bv = new model_baiviet;
		$this->current_action=$action;
		$this->params = $params;
		$this->lang = 'vi';
	}//construct
	
	function index(){
		$cacloai = $this->bv->cacloai($this->lang);
		$baixn = $this->bv ->baixemnhieu($this->lang,10);
		$bainb = $this->bv ->bainoibat($this->lang,4);
		
		$cacloais = $this->bv ->cacloais($this->lang);
		require_once "view/home.php"; //nạp layout
	}//index
	
	function detail(){	
		
		
		$id= $this->params[0]; settype($id,"int"); if ($id<=0) return;
		$bai = $this->bv->detail($id);
		require_once "view/home.php";
	}//detail
	public function bainoibat($lang='vi',$sobai=5){
	$sql="SELECT idbv, tieude, urlhinh, tomtat FROM baiviet 
		WHERE lang='$lang' AND noibat=1 ORDER BY idbv DESC LIMIT 0, $sobai";
	if(!$kq = $this->db->query($sql)) die( $this->db->error);
	foreach ($kq as $row) $data[] = $row;
	return $data;
	function detail(){		
	$id= $this->params[0]; settype($id,"int"); if ($id<=0) return;
	$bai = $this->bv->detail($id);
	require_once "view/home.php";
}//detail

	
}//bainoibat


}//class
