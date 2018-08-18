
<?php
	class model_laythongtin{
	public $db;
	public function __construct(){
	   $this->db= new mysqli('localhost', 'root', '', 'laytudong') or die(213);	
	    if($this->db->connect_errno) die( $db->connect_error ); 	
	    $this->db->set_charset("utf8");
	}
	function luutinmoilay($kq){
  $sql=sprintf("INSERT INTO laytudong SET tieude='%s', tomtat='%s', 
	  urlhinh='%s', content='%s', source='%s', urlgoc='%s', ngay=NOW()", 
	  $this->db->escape_string($kq['tieude']), 
		$this->db->escape_string($kq['tomtat']), 
	  $this->db->escape_string($kq['urlhinh']),
	  $this->db-> escape_string ($kq['content']), 
	  $kq['source'], $kq['urlbv']) ;
	  if(!$rs = $this->db->query($sql)) die( $this->db->error. " - ".$urlbv);	
}
	function laytinmoi($sotin){
   $sql = "SELECT idbv, tieude, tomtat, ngay,urlgoc,source FROM laytudong 
	     WHERE daduyet=0 ORDER BY idbv ASC LIMIT 0, $sotin";
   if(!$kq = $this->db->query($sql)) die( $this->db->error);		
   $data=array();
   while ($row= $kq->fetch_assoc()) $data[]=$row;
   return $data;
} //laytinmoi
function layloai($lang='vi',$idcha = 0,$gach = '-  ', $arr = NULL){ 
   if(!$arr) $arr = array();
   $sql="SELECT idloai, tenloai FROM phanloaibai 
         WHERE idcha=$idcha and lang='$lang'";
   if(!$kq = $this->db->query($sql)) die( $this->db->error);	
   while($row = $kq->fetch_assoc()){ 
	$arr[] = array('id'=>$row['idloai'],'ten'=>$gach.$row['tenloai']); 
	$arr = $this->layloai($lang,$row['idloai'],$gach.'--   ',$arr); 
   } 
   
   return $arr; 
}//layloai
function xem1bai($idbv){
   settype($idbv,"int");
   $sql= "SELECT idbv,tieude,tomtat,content FROM laytudong WHERE idbv=$idbv";
   if (!$kq=$this->db->query($sql)) die($this->db->error);
   $row = $kq->fetch_assoc();
   return $row;
}

}//class

?>