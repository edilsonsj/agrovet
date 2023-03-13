<?php 
    include("../config.php");
    $id = $_GET['id'];
    $sql = "DELETE  FROM `product_test` WHERE idproduct = $id";
    $result = mysqli_query($conn, $sql);
    if ($result) {
        echo
                "
                <script>
                    alert('Produto excluido com sucesso');
                    document.location.href = '../home.php';
                </script>
                ";
    } else {
        echo "Falha: " . mysqli_error($conn);
    }
?>