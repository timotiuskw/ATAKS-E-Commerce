<?php
require_once 'Database.php';
$db = new Database();
$id=$_GET['id']; 

$foto = $db->getFoto($id);

if ($foto!=""){
	unlink("img/".$foto);	  
}	 

$hasil=$db->delProduk($id);

if ($hasil) { 
  header("location:list-product.php?page=manage");
}else{ 
  echo "New records failed";
} 
?>