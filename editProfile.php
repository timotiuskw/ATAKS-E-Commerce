<?php
    if ($_SESSION['role'] == "Guest" || $_SESSION['role'] == "Admin" || $_SESSION['role'] == "Pembeli" || $_SESSION['role'] == "Penjual") {
?>

<?php  
	require_once 'Database.php';
	$db = new Database();
	$user = $_SESSION['user'];
	
	$hasil = $db->profil($user); 

	while ($row = $hasil->fetch_assoc()){
		$id = $row['id'];
        $username = $row['username'];
        $alamat = $row['alamat'];
        $tgllahir = $row['tgllahir'];
        $notelp = $row['notelp'];
        $email = $row['email'];
        $tgldaftar = $row['tgldaftar'];
	}
?>

<?php
    if ($_GET['page'] == "profile"){
?>
    <div class="pagetitle">
        <h1>Profile</h1>
        <nav>
            <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="index.html">Home</a></li>
            <li class="breadcrumb-item active">Profile</li>
            </ol>
        </nav>
    </div><!-- End Page Title -->
<?php
    }
?>

<div class="card">
	<div class="card-body">
		<h5 class="card-title">Edit Profile Anda</h5>

		<form class="row g-3" action="updProfile.php" method="post" enctype="multipart/form-data">
			<div class="col-12">
				<label for="tid" class="form-label">ID</label>
				<input type="text" class="form-control" id="tnama" name="tid" value="<?= $id;?>" readonly>
			</div>
			<div class="col-12">
				<label for="tusername" class="form-label">Username</label>
				<input type="text" class="form-control" id="tnama" name="tusername" value="<?= $username;?>" readonly>
			</div>
			<div class="col-12">
				<label for="talamat" class="form-label">Alamat</label>
				<input type="text" class="form-control" id="thrg" name="talamat" value="<?= $alamat;?>">
			</div>
			<div class="col-12">
				<label for="ttgllahir" class="form-label">Tanggal Lahir</label>
				<input type="text" class="form-control" id="tjml" name="ttgllahir" value="<?= $tgllahir;?>">
			</div>
			<div class="col-12">
				<label for="tnotelp" class="form-label">No. Telepon</label>
				<input type="text" class="form-control" id="tket" name="tnotelp" value="<?= $notelp;?>">
			</div>
            <div class="col-12">
				<label for="temail" class="form-label">Email</label>
				<input type="text" class="form-control" id="tket" name="temail" value="<?= $email;?>">
			</div>
            <div class="col-12">
				<label for="ttgldaftar" class="form-label">Tanggal Daftar</label>
				<input type="text" class="form-control" id="tket" name="ttgldaftar" value="<?= $tgldaftar;?>" readonly>
			</div>
            <div class="text-center">
                <input type="submit" class="btn btn-primary" value="Simpan">
            </div>
		</form>
	</div>
</div>

<?php
    } else
    {
        header("location:loginsession.php");
    }
?>