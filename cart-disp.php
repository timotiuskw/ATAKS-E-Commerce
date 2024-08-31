<?php
    if ($_SESSION['role'] == "Guest" || $_SESSION['role'] == "Admin" || $_SESSION['role'] == "Pembeli" || $_SESSION['role'] == "Penjual") {
?>

<?php
    if ($_GET['page'] == "cart-disp"){
?>
    <div class="pagetitle">
    <h1>Cart</h1>
    <nav>
        <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="list-product.php">Home</a></li>
        <li class="breadcrumb-item active">Cart</li>
        </ol>
    </nav>
    </div>
<?php
    }
?>

<div class="card">
    <div class="card-body">
        <h5 class="card-title">Cart</h5>

        <p>
            <?php
                if (!empty($_SESSION['cart']['arrCart']))
                {?>
                    <a href="cart-remove.php">Kosongkan Cart</a> | <a href="list-product.php">Kembali Belanja</a>
                    <?php
                }
            ?>
        </p>

        <table class="table datatable">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Name</th>
                <th scope="col">Qty</th>
                <th scope="col">Price</th>
                <th scope="col">Subtotal</th>
            </tr>
        </thead>
        <tbody>
            <?php
                if (!empty($_SESSION['cart']['arrCart']))
                {
                    $max = sizeof($_SESSION['cart']['arrCart']);
                    $no = 1;
                    $totalsemua = 0;
                    $totalharga = 0;
                    $totalqty = 0;

                    for ($i = 0 ; $i < $max ; $i++)
                    {
                        echo '<tr><th scope="row">'.$no++.'</th>';

                        foreach($_SESSION['cart']['arrCart'][$i] as $key => $val)
                        {
                            echo "<td>".$val."</td>";
                        }

                        $totalqty += $_SESSION['cart']['arrCart'][$i]['jml'];
                        
                        $totalharga = $_SESSION['cart']['arrCart'][$i]['jml'] * $_SESSION['cart']['arrCart'][$i]['hrg'];
                        $totalsemua += $totalharga;

                        echo "<td>".$totalharga."</td>";
                        echo "</tr>";
                    }

                    echo "<td></td>";
                    echo "<td></td>";
                    echo "<td></td>";
                    echo "<td>Jumlah yang harus dibayar :</td>";
                    echo "<td>".$totalsemua."</td>";
                }
            ?>
        </tbody>
        </table>
    </div>
</div>
    <script>
		function addcart('jml') {
			var jumlah = prompt("Masukkan jumlah : ");
			var hasil = Number(jumlah);
		}
	</script>
<?php
    } else
    {
        header("location:loginsession.php");
    }
?>