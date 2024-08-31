<?php  
	require_once 'Database.php';
	$db = new Database();
	$id=$_GET['id']; 
	
	$hasil=$db->produk($id); 

	while ($row=$hasil->fetch_assoc()){
		$nama=$row['nama']; 
		$hrg=$row['hrg']; 
		$jml=$row['jml']; 
		$keterangan=$row['keterangan']; 
		$foto=$row['foto'];
		$penjual=$row['penjual'];
	}
?>

<?php
    if ($_GET['page'] == "editBrg"){
?>
    <div class="pagetitle">
    <h1>Manajemen Produk</h1>
    <nav>
        <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="index.html">Home</a></li>
        <li class="breadcrumb-item active">Manajemen Produk</li>
        </ol>
    </nav>
    </div><!-- End Page Title -->
<?php
    }
?>

<div class="card">
	<div class="card-body">
		<h5 class="card-title">Form Edit Barang</h5>
		Kembali ke <a href='list-product.php?page=manage'>Manajemen Product</a><br><br>

		<form class="row g-3" action="updBrg.php" method="post" enctype="multipart/form-data">
			<div class="col-12">
				<label for="tid" class="form-label">ID</label>
				<input type="text" class="form-control" id="tnama" name="tid" value="<?= $id;?>" readonly>
			</div>
			<div class="col-12">
				<label for="tnama" class="form-label">Nama Barang</label>
				<input type="text" class="form-control" id="tnama" name="tnama" value="<?= $nama;?>">
			</div>
			<div class="col-12">
				<label for="thrg" class="form-label">Harga Barang</label>
				<input type="text" class="form-control" id="thrg" name="thrg" value="<?= $hrg;?>">
			</div>
			<div class="col-12">
				<label for="tjml" class="form-label">Jml Stok</label>
				<input type="text" class="form-control" id="tjml" name="tjml" value="<?= $jml;?>">
			</div>
			<div class="col-12">
				<label for="tket" class="form-label">Keterangan</label>
				<input type="text" class="form-control" id="tket" name="tket" value="<?= $keterangan;?>">
			</div>
			<div class="col-12">
				<label for="foto" class="form-label">Foto</label>
				<input type="file" class="form-control" id="foto" name="foto">
				<input type='hidden' name='foto_lama' value="<?= $foto;?>">
			</div>
			<div class="col-12">
				<label for="tpenjual" class="form-label">Penjual</label>
				<input type="text" class="form-control" id="tpenjual" name="tpenjual" value="<?= $penjual;?>" readonly>
			</div>
			<div class="col-12">
				<img src="img/<?php echo $foto; ?>" width="150px" height="120px" /></br>
				<input type="checkbox" name="ubah_foto" value="true"> Ceklis jika ingin mengubah foto
			</div>
			<div class="text-center">
				<input type="submit" class="btn btn-primary" value="Update">
			</div>
		</form>
	</div>
</div>