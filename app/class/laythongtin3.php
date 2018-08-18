
<?php
require_once "simple_html_dom.php";
	class laythongtin3 {
	public $laytt;
	function __construct($action,$params){
		$this->laytt = new model_laythongtin;
		$this->params = $params;
	}

	function thanhnien(){
		set_time_limit(60*3);
		
		$tenmiens = "https://news.zing.vn/cong-nghe.html";
		$tenmien = "https://news.zing.vn";

		$linkarray=array();		
		$kq = file_get_html($tenmiens) ;
		
  		$ds = $kq->find("article"); // find==>ARRAY
  		


		//$arr = $kq->find("#tinitem1nd a") ;
		 $mang = array();
		 foreach($ds as $tin){
			 
		 		  // nọi dung thẻ a 
				  if(strlen($tin->find("p.title a", 0)->plaintext) >0 ){
					  $tieude = $tin->find("p.title a", 0)->plaintext;
					  
					 }	
				 if(strlen($tin->find("p.title a", 0)->plaintext) >0 ){
					  $commtet = $tin->find("p.title span", 0)->plaintext;
					  
					 }else{
						 $commtet = 0;
						}
				  if(strlen($tin->find("p.summary", 0)->plaintext) >0 ){
					   $motangan = $tin->find("p.summary", 0)->plaintext;  // nọi dung thẻ a
					  
					 }	
					 $link = $tin->find("p.title a", 0);  
					 if($link->href== "") {
						 continue; 
						}else{
					   if (substr($link->href,0,1)=="/") $link->href=$tenmien. $link->href;
					  if (substr($link->href,0,8)!="https://") $link->href=$tenmien."/".$link->href;
					  if (substr($link->href,0,strlen($tenmien)) != $tenmien) continue;
						}
					$linkarray[]=$link->href;

			
				
				 
	
 
  
   flush();
}

	 
	
		
		foreach ($linkarray as $urlbv ) {
			   $html = file_get_html($urlbv);
			   $kq = array();
			   $td = $html->find('h1.the-article-title',0); 
			   if (is_null($td)) continue;
			   $kq['tieude'] = strip_tags($td->plaintext); $td->outertext='';
			   $tt = $html->find('p.the-article-summary',0);    
			   if (is_null($tt)) continue;
			   $kq['tomtat'] = strip_tags($tt->innertext); $tt->outertext = '';
			   $content = $html->find('div .the-article-body',0);
			   if (is_null($content)) continue;
			   $urlhinh = '1';
			   if ($content!=NULL)
			  
			 
			   $kq['content'] = $content->innertext;
			   $kq['urlhinh'] = $urlhinh;
			   $kq['source']='zing';
			   $kq['urlbv']=$urlbv;
			   $html->clear(); unset($html);
			 
			  
			
			   $this->laytt->luutinmoilay($kq);
			   flush();
			}//foreach

	}
	function duyetbai(){
	$baimoi = $this->laytt->laytinmoi(10);
	$phanloai = $this->	laytt->layloai('vi',0);
	require_once "view/duyetbai.php";
}	

function xem1bai(){
   $idbv= $this->params[0]; settype($idbv,"int");
   $row = $this->laytt->xem1bai($idbv);
   echo "<h3>".$row['tieude'],"</h3>";
   echo "<i>".$row['tomtat'],"</i><hr/>";
   echo "<div>".$row['content'],"</div>";
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
