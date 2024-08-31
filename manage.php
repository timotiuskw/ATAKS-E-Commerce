<?php
    if ($_SESSION['role'] == "Admin" || $_SESSION['role'] == "Penjual") {
?>

<?php
    if ($_GET['page'] == "manage"){
?>
    <div class="pagetitle">
    <h1>Manajemen Produk</h1>
    <nav>
        <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="list-product.php">Home</a></li>
        <li class="breadcrumb-item active">Manajemen Produk</li>
        </ol>
    </nav>
    </div><!-- End Page Title -->
<?php
    }
?>

<div class="card">
	<div class="card-body">
		<h5 class="card-title">Manajemen Produk</h5>
		<p><a href="list-product.php?page=addBrg">Tambah Data</a></p>
		<!-- Table with stripped rows -->
		<table class="table datatable">
			<thead>
				<tr>
				<th scope="col">#</th>
				<th scope="col">Name</th>
				<th scope="col">Qty</th>
				<th scope="col">Price</th> 
				<th scope="col">Image</th>
				<th scope="col">Desc</th>
				<th scope="col">Action</th>
				</tr>
			</thead>
			<tbody>
				<?php
				$hasil=$db->produkAll();  
				$no=1;
				if ($hasil->num_rows>0) {
					while ($row=$hasil->fetch_assoc()){
						if ($row['penjual'] == $_SESSION['user'] || $_SESSION['user']  == "Admin"){
					?>
						<tr>
							<th scope="row"><?php echo $no++?></th>
							<td><?php echo $row["nama"]?></td>
							<td><?php echo $row["jml"]?></td>
							<td><?php echo $row["hrg"]?></td>
							<td>
								<img src="img/<?php echo $row["foto"]?>" style="width:100px;height:100px;"></img>
							</td>
							<td><?php echo $row["keterangan"]?></td> 
							<td>
								<a href="list-product.php?page=editBrg&id=<?php echo $row["id"]?>">Edit</a>
								<a href="delBrg.php?id=<?php echo $row["id"]?>">Hapus</a>
							</td>
						</tr>
					<?php
						}
					}	
				}
				?> 
			</tbody>
		</table>
	</div>
</div>

<?php
    } else{
?>
	ngapain hayo kamu disini<br>
	<a href="list-product.php">Kembali ke Menu Utama</a><br>
	<a href="logout.php">Logout</a><br>
<?php
	}
?>