<?php
	session_start();
	require_once 'Database.php';
	$db = new Database();

	if ($_SESSION['role'] == "Guest" || $_SESSION['role'] == "Admin" || $_SESSION['role'] == "Pembeli" || $_SESSION['role'] == "Penjual") {
		if (empty($_SESSION['cart']["arrCart"]))
			$_SESSION['cart']["arrCart"]=array();
	
?>
	<!DOCTYPE html> 
	<html lang="en">

	<head>
	<meta charset="utf-8">
	<meta content="width=device-width, initial-scale=1.0" name="viewport">

	<title>Dashboard - NiceAdmin Bootstrap Template</title>
	<meta content="" name="description">
	<meta content="" name="keywords">

	<!-- Favicons -->
	<link href="assets/img/favicon.png" rel="icon">
	<link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">

	<!-- Google Fonts -->
	<link href="https://fonts.gstatic.com" rel="preconnect">
	<link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

	<!-- Vendor CSS Files -->
	<link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
	<link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
	<link href="assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
	<link href="assets/vendor/quill/quill.snow.css" rel="stylesheet">
	<link href="assets/vendor/quill/quill.bubble.css" rel="stylesheet">
	<link href="assets/vendor/remixicon/remixicon.css" rel="stylesheet">
	<link href="assets/vendor/simple-datatables/style.css" rel="stylesheet">

	<!-- Template Main CSS File -->
	<link href="assets/css/style.css" rel="stylesheet">

	</head>

	<body>

	<!-- ======= Header ======= -->
	<header id="header" class="header fixed-top d-flex align-items-center">

		<div class="d-flex align-items-center justify-content-between">
		<a href="index.html" class="logo d-flex align-items-center">
			<img src="assets/img/pngtree-letter-a-logo-design-vector-png-png-image_6948256.png" alt="">
			<span class="d-none d-lg-block">Ataks</span>
		</a>
		<i class="bi bi-list toggle-sidebar-btn"></i>
		</div><!-- End Logo -->

		<?php
			if(!isset($_GET['page'])){
		?>

		<div class="search-bar">
			<form class="search-form d-flex align-items-center" method="POST" action="#">
				<input type="text" id="searchInput" name="query" placeholder="Search" title="Enter search keyword" oninput="searchCards()">
				<button type="submit" title="Search"><i class="bi bi-search"></i></button>
			</form>
		</div>

		<?php
			}
		?>

		<nav class="header-nav ms-auto">
		<ul class="d-flex align-items-center">

			<li class="nav-item d-block d-lg-none">
				<a class="nav-link nav-icon search-bar-toggle " href="#">
					<i class="bi bi-search"></i>
				</a>
			</li><!-- End Search Icon-->

			<li class="nav-item dropdown pe-3">

			<a class="nav-link nav-profile d-flex align-items-center pe-0" href="#" data-bs-toggle="dropdown">
				<span class="d-none d-md-block dropdown-toggle ps-2"><?php echo $_SESSION['user']?></span>
			</a><!-- End Profile Image Icon -->

			<ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow profile">
				<li class="dropdown-header">
					<h6><?php echo $_SESSION['user']?></h6>
					<span><?php echo $_SESSION['role']?></span>
				</li>
				<li>
					<a class="dropdown-item d-flex align-items-center" href="logout.php">
						<i class="bi bi-box-arrow-right"></i>
						<span>Sign Out</span>
					</a>
				</li>

			</ul><!-- End Profile Dropdown Items -->
			</li><!-- End Profile Nav -->

		</ul>
		</nav><!-- End Icons Navigation -->

	</header><!-- End Header -->

	<!-- ======= Sidebar ======= -->
	<aside id="sidebar" class="sidebar">

		<ul class="sidebar-nav" id="sidebar-nav">

		<li class="nav-item">
			<a class="nav-link collapsed" href="list-product.php">
			<i class="bi bi-grid"></i>
			<span>Katalog</span>
			</a>
		</li><!-- End Katalog Nav -->

		<li class="nav-item">
			<a class="nav-link collapsed" href="list-product.php?page=cart-disp">
			<i class="bi bi-cart"></i>
			<span>Cart</span>
			</a>
		</li>

		<?php
			if ($_SESSION['role'] == "Admin" || $_SESSION['role'] == "Penjual")
			{
		?>
			<li class="nav-item">
				<a class="nav-link collapsed" href="list-product.php?page=manage">
				<i class="bi bi-menu-button-wide"></i>
				<span>Manajemen Produk</span>
				</a>
			</li>
		<?php
			}
		?>

		<li class="nav-item">
			<a class="nav-link collapsed" href="list-product.php?page=profile">
			<i class="bi bi-person"></i>
			<span>Profile</span>
			</a>
		</li>

		</ul>

	</aside><!-- End Sidebar-->

	<main id="main" class="main">

		<?php
			if (!isset($_GET['page'])){
		?>
			<div class="pagetitle">
			<h1>Katalog</h1>
			<nav>
				<ol class="breadcrumb">
				<li class="breadcrumb-item"><a href="list-product.php">Home</a></li>
				<li class="breadcrumb-item active">Katalog</li>
				</ol>
			</nav>
			</div><!-- End Page Title -->
		<?php
			}
		?>

		<?php
			if (!isset($_GET['page'])){
		?>
		<section class="section dashboard">
		<div class="row align_items-top">
			<div class="col-lg-12">
			<div class="card" id="cardContainer">
				<div class="card-body">
		<?php
			}
		?>
				<?php
					if(isset($_GET['page'])){
						include($_GET['page'].".php");
					}else{
						$sql = "SELECT * FROM barang";

						$hasil = $db->produkAll();
				?>

						<div class="row">

				<?php
						if($hasil->num_rows > 0){
							while($row = $hasil->fetch_assoc()){
				?>
							<div class="col-lg-6">
								<div class="card mb-3" style="margin-top: 10px;">
									<div class="card-body text-center">
										<img src="img/<?php echo $row['foto']?>" class="img-fluid rounded-start" alt="..." style="width: 300px; height: 300px;">
										<h5 class="card-title"><?php echo $row['nama']?></h5>
										<p class="card-text">Rp. <?php echo $row['hrg']?><br>Stok : <?php echo $row['jml']?><br>
										<label for="quantity">Jumlah :</label>
										
										<input type="number" id="quantity" name="quantity" min="1" max="<?php echo $row['jml']?>" onblur="quantityBarang('<?php echo $row['nama']?>', <?php echo $row['hrg']?>,<?php echo $row['id']?>)"><br>
										
										<a href="addCart.php?brg=<?php echo $row['nama']?>&hrg=<?php echo $row['hrg']?>&jml=1&id=<?php echo $row['id']?>" id="addtocart">Add to Cart</a>
										</p>
									</div>
								</div>
							</div>
				<?php
							}
				?>
						</div>
				<?php
						}
					}
				?>
		<?php
			if (!isset($_GET['page'])){
		?>
				</table>
				</div>
			</div>
			</div>
		</div>
		</section>
		<?php
			}
		?>

	</main><!-- End #main -->

	<!-- ======= Footer ======= -->
	<footer id="footer" class="footer">
		<div class="copyright">
		&copy; Copyright <strong><span>NiceAdmin</span></strong>. All Rights Reserved
		</div>
		<div class="credits">
		<!-- All the links in the footer should remain intact. -->
		<!-- You can delete the links only if you purchased the pro version. -->
		<!-- Licensing information: https://bootstrapmade.com/license/ -->
		<!-- Purchase the pro version with working PHP/AJAX contact form: https://bootstrapmade.com/nice-admin-bootstrap-admin-html-template/ -->
		Designed by <a href="https://bootstrapmade.com/">BootstrapMade</a>
		</div>
	</footer><!-- End Footer -->

	<a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

	<!-- Vendor JS Files -->
	<script src="assets/vendor/apexcharts/apexcharts.min.js"></script>
	<script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
	<script src="assets/vendor/chart.js/chart.umd.js"></script>
	<script src="assets/vendor/echarts/echarts.min.js"></script>
	<script src="assets/vendor/quill/quill.min.js"></script>
	<script src="assets/vendor/simple-datatables/simple-datatables.js"></script>
	<script src="assets/vendor/tinymce/tinymce.min.js"></script>
	<script src="assets/vendor/php-email-form/validate.js"></script>

	<!-- Template Main JS File -->
	<script src="assets/js/main.js"></script>

	<script>
	function searchCards() {
		let input = document.getElementById("searchInput").value.toLowerCase();
		let cards = document.getElementsByClassName("card-title");
		let cardContainer = document.getElementById("cardContainer");
		let noDataMessage = document.getElementById("noDataMessage");

		let foundMatch = false;

		for (let i = 0; i < cards.length; i++) {
		let title = cards[i].textContent.toLowerCase();
		let card = cards[i].parentNode.parentNode.parentNode; // Mendapatkan elemen card yang terkait

		if (title.includes(input)) {
			card.style.display = "block"; // Menampilkan card jika judul cocok dengan input
			foundMatch = true;
		} else {
			card.style.display = "none"; // Menyembunyikan card jika judul tidak cocok dengan input
		}
		}

		if (!foundMatch) {
		if (noDataMessage) {
			noDataMessage.style.display = "block"; // Menampilkan pesan "Data tidak ditemukan"
		} else {
			noDataMessage = document.createElement("p");
			noDataMessage.id = "noDataMessage";
			noDataMessage.textContent = "Data tidak ditemukan";
			noDataMessage.style.marginLeft = "30px";
			cardContainer.appendChild(noDataMessage); // Menambahkan pesan "Data tidak ditemukan" ke dalam cardContainer
		}
		} else {
		if (noDataMessage) {
			noDataMessage.style.display = "none"; // Menyembunyikan pesan "Data tidak ditemukan" jika ada card yang cocok
		}
		}
	}
	</script>

	<script>
		function quantityBarang(nama,harga,id){
			let qty = document.getElementById("quantity").value || 1;
			let url = `addCart.php?brg='${nama}'&hrg=${harga}&jml=${qty}&id=${id}`
			document.getElementById("addtocart").setAttribute("href",url);
		}
		// function addcart() {
		// 	let jumlah = prompt("Masukkan jumlah : ");
		// 	let hasil = Number(jumlah);
		// }
	</script>
	</body>

	</html>
	<?php
}else{
	//session belum ada artinya belum login
	header("location:loginsession.php"); 
}
 					
?> 
