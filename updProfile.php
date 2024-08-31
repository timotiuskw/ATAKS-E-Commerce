<?php
    require_once 'Database.php';
    $db = new Database();

    $id = $_POST['tid'];
    $username = $_POST['tusername'];
    $alamat = $_POST['talamat'];
    $tgllahir = $_POST['ttgllahir'];
    $notelp = $_POST['tnotelp'];
    $email = $_POST['temail'];
    $tgldaftar = $_POST['ttgldaftar'];

    $hasil = $db->updProfile($id,$username,$alamat,$tgllahir,$notelp,$email);	 

    if ($hasil)
    {
        header("location:list-product.php?page=profile");
    } else
    {

        echo "<script type='text/javascript'>
        alert('Error. Tidak Dapat Mengupdate Profile.');
		window.history.back();
		</script>";
    }
?>