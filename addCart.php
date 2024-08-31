<?php
        session_start();

        require_once 'Database.php';
        $db = new Database();
        $hasil = $db->produkAll(); 
        if ($_SERVER["REQUEST_METHOD"] == "GET")
        {
            $id = $_GET['id'];
            $brg = $_GET['brg'];
            $hrg = $_GET['hrg'];
            $jml = $_GET['jml'];
        
           
            if (!empty($_SESSION['cart']['arrCart']))
            {
                $max = sizeof($_SESSION['cart']['arrCart']);
                $find = false;

                for ($i = 0 ; $i < $max ; $i++)
                {
                    $cari = array_search($brg, $_SESSION['cart']['arrCart'][$i]);
                    if ($cari)
                    {
                        $_SESSION['cart']['arrCart'][$i]['jml'] += 1;

                        $find = true;
                        break;
                    }
                }
            }

            if (!$find)
            {
                $item = array('nmBrg' => $brg, 'jml' => $jml, 'hrg' => $hrg);
                array_push($_SESSION['cart']['arrCart'], $item);
            }

            if ($hasil)
            {
                header("location:list-product.php?page=manage");
            } else
            {
                echo "New records failed";
            }

        }
        
        header("location:list-product.php?page=cart-disp");
?>