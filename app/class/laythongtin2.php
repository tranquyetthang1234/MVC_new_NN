<?php
require_once "simple_html_dom.php";
	class laythongtin2 {
	public $laytt;
	function __construct($action,$params){
		$this->laytt = new model_laythongtin;
		$this->params = $params;
	}

	function thanhnien(){
		set_time_limit(60*3);
	
		$tenmien = "https://thanhnien.vn/thoi-su/";
	print_r($tenmien);die();
		$linkarray=array();		
		$kq = file_get_html($tenmien) ;

  		$ds = $kq->find("ul li.fn-playlist-item .item-song span",5)->innertext; // find==>ARRAY
  		echo '<pre>';
  		print_r($ds);die();


		//$arr = $kq->find("#tinitem1nd a") ;
		/* $mang = array();
		 foreach($ds as $tin){
		 		 $tieude = $tin->find("h3.title_news a", 0)->innertext;  // nọi dung thẻ a 
    			$url = $tin->find("h3.title_news a", 0)->href;   // lấy href
		   if(strlen($tin->find("div.thumb_art a img", 0)->getAttribute("data-original"))>0){
		      $hinh = $tin->find("div.thumb_art a img", 0)->getAttribute("data-original");
		    }else{
		      $hinh = $tin->find("div.thumb_art a img", 0)->src;
		    }
		      $img = './img/download/'.basename($hinh);
		    file_put_contents($img, file_get_contents($hinh));
		    $hinh = basename($hinh);

		    $tomtat = $tin->find(".description", 0)->innertext;
		     
		    $htmlCT = file_get_html($tenmien);
		     array_push($mang, new Tin($tieude, $url,$tomtat ));
		 }
		 
echo '<pre>';
print_r($mang);
echo '</pre>';*/

	}



}//class

class Tin{
  public $TIEUDE;
  public $URL;
  public $HINH;
  public $TOMTAT;
  public $CHITIET;
  function Tin($tieude, $url,  $tomtat ){
    $this->TIEUDE = $tieude;
    $this->URL = $url;
    $this->TOMTAT = $tomtat;
   
  }

}
?>
