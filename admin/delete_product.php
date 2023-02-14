<?php 
    include("../config.php");
    $id = $_GET['id'];
    $sql = "DELETE  FROM `product_test` WHERE idproduct = $id";
    $result = mysqli_query($conn, $sql);
    if ($result) {
        header("Location: manage_products.php");
    } else {
        echo "Falha: " . mysqli_error($conn);
    }
?>