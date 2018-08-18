<?php


class model_baiviet{
public $db;
public $data = array();
public function __construct(){
	$this->db= new mysqli('localhost', 'root', '', 'laytudong') or die(213);	
	$this->db->set_charset("utf8");
	
	
} //construct

public  function cacloai($lang='vi'){
		$sql="SELECT idloai, tenloai FROM phanloaibai WHERE lang='$lang' AND  anhien=1
			AND lang='$lang' AND idcha=0 ORDER BY thutu";
		if(!$kq = $this->db->query($sql)) die( $this->db->error);
		$data =array();
		foreach ($kq as $row) 
		
		$data[] = $row;
		return $data;
}//cacloai
public function bainoibat($lang='vi',$sobai=5){
$sql="SELECT idbv, tieude, urlhinh, tomtat FROM baiviet 
	WHERE lang='$lang' AND noibat=1 ORDER BY idbv DESC LIMIT 0, $sobai";
if(!$kq = $this->db->query($sql)) die( $this->db->error);
foreach ($kq as $row) $data[] = $row;
return $data;
}//bainoibat

public function baixemnhieu($lang='vi',$sobai=5){
$sql="SELECT idbv, tieude, urlhinh, tomtat FROM baiviet 
	WHERE lang='$lang' AND noibat=1 ORDER BY solanxem DESC LIMIT 0, $sobai";
if(!$kq = $this->db->query($sql)) die( $this->db->error);
foreach ($kq as $row) $data[] = $row;
return $data;
}

	public function cacloais($lang='vi'){
	$sql="SELECT idloai, tenloai FROM phanloaibai WHERE lang='$lang' AND  anhien=1
		AND lang='$lang' AND idcha=0 ORDER BY thutu";
	if(!$kq = $this->db->query($sql)) die( $this->db->error);
	foreach ($kq as $row) $data[] = $row;
	return $data;
	}//cacloai
public function baimoitrongloai($id,$sobai=5){
$sql="SELECT idbv, tieude, tomtat, urlhinh, ngay, solanxem FROM baiviet 
  WHERE idloai IN(SELECT idloai FROM phanloaibai WHERE idloai=$id OR idcha=$id)
  ORDER BY idbv DESC LIMIT 0,$sobai";
if(!$kq = $this->db->query($sql)) die( $this->db->error);
foreach ($kq as $row) $data[] = $row;
return $data;
}//baimoitrongloai
	
public function detail($id){
settype($id,"int");
$sql="SELECT idbv, tieude, tomtat, urlhinh, ngay, solanxem, content 
	FROM baiviet WHERE idbv=$id";
if (!$kq= $this->db->query($sql)) die($this->db->error);
if (!$kq) return FALSE;
return $kq->fetch_assoc();		
}//detail





}//class
