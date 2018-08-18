<?php
class model_quantri{
	public $db;
	public function __construct(){
	   $this->db= new mysqli('localhost', 'root', '', 'laytudong') or die(213);	
	    if($this->db->connect_errno) die( $db->connect_error ); 	
	    $this->db->set_charset("utf8");
	}
function checklogin() {
	if (isset($_SESSION['login_id'])== false){
		  $_SESSION['error'] = 'Bạn chưa đăng nhập';
		  $_SESSION['back'] = $_SERVER['REQUEST_URI'];
		   header('location:'. BASE_URL. 'quantri/dangnhap'); 
		   exit();
	 }elseif ($_SESSION['login_level']!=1){
		  $_SESSION['error'] = 'Bạn không có quyền xem trang này';
		  $_SESSION['back'] = $_SERVER['REQUEST_URI'];
		  header('location:'. BASE_URL. 'quantri/dangnhap'); 
		  exit();
	 }
	}
public function login($u, $p){
	$sql=sprintf("SELECT iduser, username, password,hoten,idgroup FROM users 
	  WHERE username='%s' AND password=md5(concat('%s', salt))",$u,$p);
	if(!$kq = $this->db->query($sql)) die( $this->db->error);
	if ($kq->num_rows==0) return false;
	$row = $kq->fetch_assoc();
	$_SESSION['login_id']=$row['iduser'];
	$_SESSION['login_user']=$row['username'];
	$_SESSION['login_hoten']=$row['hoten'];
	$_SESSION['login_level']=$row['idgroup'];
	return true;
}//login
function baiviet_list($idloai, $per_page=5, $startrow=0, &$totalrows){		
	$sql="select idbv, tieude, tomtat, ngay, urlhinh, noibat, anhien, idloai, solanxem  from baiviet WHERE (idloai=$idloai or $idloai=-1)ORDER BY ngay DESC, idbv DESC LIMIT $startrow, $per_page";        
	if(!$kq = $this->db->query($sql)) die( $this->db->error);
	$data=array(); while ($row= $kq ->fetch_assoc()) $data[]= $row;
	
	$sql="SELECT count(*) from baiviet WHERE (idloai=$idloai or $idloai=-1)"; 
	if(!$rs = $this->db->query($sql)) die( $this->db->error);
	$row = $rs->fetch_row();
	$totalrows=$row[0];		
	return $data;
}
public function chitietloaibaiviet($id){
	settype($id,"int");
	$sql="SELECT idloai,tenloai,thutu,idcha,anhien,lang FROM phanloaibai WHERE idloai= $id";
	if (!$kq= $this->db->query($sql)) die($this->db->error);
	if (!$kq) return FALSE;		
	$data = $kq->fetch_assoc() ;
	return $data;		
}
public function phanloaibai(){
	$sql="SELECT * FROM phanloaibai ";
	if (!$kq= $this->db->query($sql)) die($this->db->error);
	if (!$kq) return FALSE;		

 	$data=array();
   while ($row= $kq->fetch_assoc()) $data[]=$row;
   return $data;
	 
}
function listloai_dequy($idcha = 0,$gach = '-  ', $arr = NULL){ 
	if(!$arr) $arr = array();
	$sql="SELECT idloai, tenloai FROM phanloaibai WHERE idcha=$idcha ORDER BY ThuTu";
	if(!$kq = $this->db->query($sql)) die( $this->db->error);	
	while($row = $kq->fetch_assoc()){ 
		$arr[] = array('id'=>$row['idloai'],'ten'=>$gach.$row['tenloai']); 
		$arr = $this->listloai_dequy($row['idloai'],$gach.'--   ',$arr); 
	} 
	return $arr; 
}
function pageslist($baseurl, $totalrows, $offset,$per_page, $currentpage){
	$totalpages = ceil($totalrows/$per_page);
	$from = $currentpage-$offset;
	$to = $currentpage +$offset;
	if ($from<=0) $from=1;
	if ($to>$totalpages) $to=$totalpages;
	$links="<a href=$baseurl title='Trang đầu'>Đ</a>";
	for ($j=$from; $j<=$to; $j++) {
		if ($j==$currentpage) $links = $links . "<span>$j</span>"; 
		else $links = $links . "<a href = '$baseurl/$j/'>$j</a>"; 	
	}
	$links = $links . "<a href = '$baseurl/$totalpages/' title='Trang cuối'>C</a>"; 	
	return $links;
}

public function loaibaiviet(){	
	$sql="SELECT * FROM loaibaiviet";
	if (!$kq= $this->db->query($sql)) die($this->db->error);
	if (!$kq) return FALSE;		
	$data=array();
	while ($row= $kq ->fetch_assoc()) $data[] = $row;
	return $data;
}
function baiviet_daoanhien($id){
	settype($id,"int");
	$sql="SELECT anhien FROM baiviet WHERE idbv=$id";
	if (!$kq= $this->db->query($sql)) die($this->db->error);
	if (!$kq) return FALSE;
	$row = $kq->fetch_assoc() ;
	$anhien = $row['anhien'];
	if ($anhien==0) $anhien=1; else $anhien=0;
	$sql="UPDATE baiviet SET anhien=$anhien WHERE idbv=$id";
	if (!$kq= $this->db->query($sql)) die($this->db->error);
	return BASE_DIR. "img/AnHien_{$anhien}.jpg";
}
function baiviet_daonoibat($id){
	settype($id,"int");
	$sql="SELECT noibat FROM baiviet WHERE idbv=$id";
	if (!$kq= $this->db->query($sql)) die($this->db->error);
	if (!$kq) return FALSE;
	$row = $kq->fetch_assoc() ;
	$noibat = $row['noibat'];
	if ($noibat==0) $noibat=1; else $noibat=0;
	$sql="UPDATE baiviet SET noibat=$noibat WHERE idbv=$id";
	if (!$kq= $this->db->query($sql)) die($this->db->error);
	return BASE_DIR. "img/NoiBat_{$noibat}.jpg";
}
function baiviet_xoa($id){
	settype($id,"int");
	$sql="DELETE FROM baiviet WHERE idbv=". $id;
	if (!$kq= $this->db->query($sql)) die($this->db->error);		
	$sql="DELETE FROM bandocykien WHERE idTin=". $id;
	if (!$kq= $this->db->query($sql)) die($this->db->error);	
}
public function chitietbaiviets($id){
	settype($id,"int");
	$sql="SELECT idbv, tieude, tomtat, content,ngay,anhien, noibat, urlhinh ,idloai, themykien FROM baiviet WHERE idbv=$id";
	if (!$kq= $this->db->query($sql)) die($this->db->error);
	if (!$kq) return FALSE;		
	$data = $kq->fetch_assoc() ;
	return $data;		
}
public function chitietbaiviet($id){
	settype($id,"int");
	$sql="SELECT urlhinh  FROM baiviet WHERE idbv=$id";
	if (!$kq= $this->db->query($sql)) die($this->db->error);
	if (!$kq) return FALSE;		
	$data = $kq->fetch_assoc() ;
	return $data;		
}
function stripUnicode($str){ 
	if(!$str) return false;
	$unicode = array(
	 'a'=>'á|à|ả|ã|ạ|ă|ắ|ằ|ẳ|ẵ|ặ|â|ấ|ầ|ẩ|ẫ|ậ|́á|á|ạ|á|à|ạ',
	 'A'=>'Á|À|Ả|Ã|Ạ|Ă|Ắ|Ằ|Ẳ|Ẵ|Ặ|Â|Ấ|Ầ|Ẩ|Ẫ|Ậ',
	 'd'=>'đ',
	 'D'=>'Đ',
	 'e'=>'é|è|ẻ|ẽ|ẹ|ê|ế|ề|ể|ễ|ệ',
	 'E'=>'É|È|Ẻ|Ẽ|Ẹ|Ê|Ế|Ề|Ể|Ễ|Ệ',
	 'i'=>'í|ì|ỉ|ĩ|ị|í',	  
	 'I'=>'Í|Ì|Ỉ|Ĩ|Ị',
	 'o'=>'ó|ò|ỏ|õ|ọ|ô|ố|ồ|ổ|ỗ|ộ|ơ|ớ|ờ|ở|ỡ|ợ|ò',
	 'O'=>'Ó|Ò|Ỏ|Õ|Ọ|Ô|Ố|Ồ|Ổ|Ỗ|Ộ|Ơ|Ớ|Ờ|Ở|Ỡ|Ợ',
	 'u'=>'ú|ù|ủ|ũ|ụ|ư|ứ|ừ|ử|ữ|ự|ụ',
	 'U'=>'Ú|Ù|Ủ|Ũ|Ụ|Ư|Ứ|Ừ|Ử|Ữ|Ự',
	 'y'=>'ý|ỳ|ỷ|ỹ|ỵ',
	 'Y'=>'Ý|Ỳ|Ỷ|Ỹ|Ỵ'
);
	foreach($unicode as $khongdau=>$codau) {
	  $arr = explode("|",$codau);
	  $str = str_replace($arr,$khongdau,$str);
	}
	return $str;
}

function changeTitle($str){
	$str = $this->stripUnicode($str);
	$str = str_replace(array("'",'"',"&","?","+","%","#","“","”","(",")","–","“","”","…",",") , "" , $str);
	$str = str_replace(array("ā","ī","ṭ","ṇ","ḍ","ð","Ð","ō"),array("a","i","t","n","d", "d","d","o"), $str);
	$str = str_replace("-"," ",$str);		
	$str = trim($str);		
	while (strpos($str,'  ')>0) $str = str_replace("  "," ",$str);
	$str = mb_convert_case($str , MB_CASE_LOWER , 'utf-8');		
	$str = str_replace(" ","-",$str);	
	
	return $str;
}

function baiviet_themss(){	
	$_SESSION['error'] = array();	
	$iduser = 21;//$_SESSION['login_id'];
	$tieude= trim(strip_tags($_POST['tieude']));
	$tomtat= trim(strip_tags($_POST['tomtat']));
	$urlhinh= trim(strip_tags($_POST['urlhinh']));
	$anhien=$_POST['anhien']; settype($anhien, "int");
	$noibat=$_POST['noibat']; settype($noibat, "int");
	$cha=$_POST['loaicha']; settype($cha, "int");
	$themyk=$_POST['themykien']; settype($themyk, "int");
	$alias = $this->changeTitle($tieude);
	$nd= $_POST['noidung'];

	if($tieude == ""){
		
		$_SESSION['error']['tieude'] = "Mới nhập vào tiêu đề";
	}
	if($tomtat == ""){
		$_SESSION['error']['tomtat'] = "Mới nhập vào tóm tắt";
	}
	
	
		if($_SESSION['error'] == NULL){
			
			$sql= "INSERT INTO baiviet SET tieude=?, alias=?,tomtat=?, urlhinh=?, content=?, anhien=?, noibat=?, idloai=?, themykien=?, iduser= ?, ngay=now()";
		$st = $this->db->prepare($sql);
		$st->bind_param('sssssiiiii', $tieude,$alias,$tomtat, $urlhinh,$nd,$anhien,$noibat, $cha,$themyk,$iduser); 
		$st->execute();
		$_SESSION['success'] = "Thêm mới thành công";
		$idbv = $st->insert_id;
		return $idbv;
		}else{

			header('location:'. BASE_URL.'PostController/baiviet_them');
		}
}
function baiviet_sua($id){


$_SESSION['error'] = array();	
	$iduser = 21;//$_SESSION['login_id'];
	$tieude= trim(strip_tags($_POST['tieude']));
	$tomtat= trim(strip_tags($_POST['tomtat']));
	$urlhinh= trim(strip_tags($_POST['urlhinh']));
	$anhien=$_POST['anhien']; settype($anhien, "int");
	$noibat=$_POST['noibat']; settype($noibat, "int");
	$cha=$_POST['loaicha']; settype($cha, "int");
	$themyk=$_POST['themykien']; settype($themyk, "int");
	$alias = $this->changeTitle($tieude);
	$nd= $_POST['noidung'];

	if($tieude == ""){
		
		$_SESSION['error']['tieude'] = "Mới nhập vào tiêu đề";
	}
	if($tomtat == ""){
		$_SESSION['error']['tomtat'] = "Mới nhập vào tóm tắt";
	}
	
		if($_SESSION['error'] == NULL){
			
		$sql= "UPDATE baiviet SET tieude=?, alias=?,tomtat=?, urlhinh=?, content=?, anhien=?, noibat=?, idloai=?, themykien=?, iduser=? ,ngay=now() where idbv=?";
	   $st = $this->db->prepare($sql);
		$st->bind_param('sssssiiiiii',$tieude,$alias,$tomtat, $urlhinh, $nd,$anhien,$noibat, $cha,$themyk,$iduser,$id);         
		$st->execute();
			$_SESSION['success'] = "Sửa tin tức thành công";
		header('location:'. BASE_DIR.'quantri/baiviet_list');	
		}else{

			header('location:'. BASE_URL.'PostController/baiviet_sua/'.$id);
		}
}


function loaibaiviet_list($per_page=5, $startrow=0, &$totalrows){				
	$sql= "select * from phanloaibai ORDER BY idcha ASC, idloai DESC LIMIT $startrow, $per_page";
	if(!$kq = $this->db->query($sql)) die( $this->db->error);
	$data=array(); while ($row= $kq ->fetch_assoc()) $data[] =	$row;
		
	$sql="SELECT count(*) from phanloaibai";
	if(!$rs = $this->db->query($sql)) die( $this->db->error);		
	$row = $rs->fetch_row();
	$totalrows=$row[0];		
	return $data;
}
function laytenloaibaiviet($id){
	settype($id,"int");
	$sql="SELECT tenloai FROM phanloaibai WHERE idloai=". $id;
	if (!$kq= $this->db->query($sql)) die($this->db->error);	
	if ($kq->num_rows>0) {
		$row = $kq->fetch_row();
		return $row[0];		
	} else return "Không có";
}
function demsobaiviettrongloai($id){
	settype($id,"int");
	$sql="SELECT count(*) FROM baiviet WHERE idloai=". $id;
	if (!$kq= $this->db->query($sql)) die($this->db->error);	
	if (isset($kq) && $kq->num_rows>0) {
		$row = $kq->fetch_row();
		return $row[0];		
	} else return 0;
}
function loaibaiviet_them(){
	$tenloai= $this->db->escape_string($_POST['tenloai']);
	$anhien=$_POST['anhien']; settype($anhien, "int");		
	$thutu=$_POST['thutu']; settype($thutu, "int");
	$cha=$_POST['loaicha']; settype($cha, "int");		
	$alias = $this->changetitle($tenloai);
	$sql= "INSERT INTO phanloaibai SET tenloai=?, alias=?,anhien=?, thutu=?, idcha=?";
	$st = $this->db->prepare($sql);		
	$st->bind_param('ssiii', $tenloai,$alias,$anhien,$thutu,$cha);
	$st->execute();
}

function dequy3($data , $parent_id = 0 , $select = '',$selected =0 ){

    foreach ($data as $key => $value){
        if($value['idCha'] == $parent_id){
            $id = $value['idloai'];
            if($selected == $id && $selected != 0){
                echo "<option  selected ='selected' value='".$value['idloai']."'>".$select.$value['TenLoai']."</option>";
            }else{
                echo "<option   value='".$value['idloai']."'>".$select.$value['TenLoai']."</option>";
           		foreach ($data as $key => $value2) {
           		 $id2 = $value2['idloai'];
           		if($value2['idCha'] == $id){
           			echo "<option   value='".$value2['idloai']."'>".$select.'--|'.$value2['TenLoai']."</option>";
	           			foreach ($data as $key => $value3) {
	           			if($value3['idCha'] == $id2){
	           			echo "<option   value='".$value3['idloai']."'>".$select.'----|'.$value3['TenLoai']."</option>";
           					}
	           			}
	           		}
           		}
            }
        }

    }
}
public function allloai(){	
	$sql="SELECT * FROM phanloaibai";
	if (!$kq= $this->db->query($sql)) die($this->db->error);
	if (!$kq) return FALSE;		
	$data=array();
	while ($row= $kq ->fetch_assoc()) $data[] = $row;
	return $data;
}
}
