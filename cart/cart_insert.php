<?php 
    include("../config.php");
    include("../protect.php");
    $idproduct = $_GET['id'];
    $iduser = $_SESSION['iduser'];
    
    $sql = "INSERT INTO `cart`(`iduser`, `idproduct`) VALUES ($iduser,$idproduct)";
    $result = mysqli_query($conn, $sql);
    if ($result) {
        echo
                "
                <script>
                    alert('Produto adicionado ao carrino com sucesso');
                    document.location.href = 'cart.php';
                </script>
                ";
    } else {
        echo "Falha: " . mysqli_error($conn);
    }
?>