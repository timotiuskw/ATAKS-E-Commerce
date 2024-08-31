<?php 
	require_once 'Database.php';
	$db = new Database();
	include "uploadFoto.php";
	
	$nama=$_POST['tnama'];
	$hrg=$_POST['thrg'];
	$ket=$_POST['tket'];
	$jml=$_POST['tjml'];
	$penjual=$_POST['tpenjual'];

	if (upload_foto($_FILES["foto"])){
		$foto=$_FILES["foto"]["name"];
		$hasil = $db->insProduk($nama,$hrg,$jml,$ket,$foto,$penjual);

		if ($hasil) { 
			header("location:list-product.php?page=manage");
		} else{  
			echo "New records failed";			
		}
	} else{
		echo "<script type='text/javascript'>
		window.history.back();
		</script>";
	}
?>