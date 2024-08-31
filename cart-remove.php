<?php
    session_start();
    unset($_SESSION['cart']);
    header("location:list-product.php?page=cart-disp");
?>