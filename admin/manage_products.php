

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/manage_products.css">
    <title>Document</title>
</head>
<body>
    <div class="header">
          <a href="../home.php" class="hlogo"><img src="../images/pics/logo_extended.png" alt=""></a>
          <div class="header_right">
            <a class="login" href="../login/login.php">LOGIN</a>
            <a class="adm" href="../admin/admin_panel.php">ADM</a>
          </div>      
    </div>
    <div class="container">
        <div class="child">
            <table>
                <tr class="table-header">
                    <th>ID</th>
                    <th>NOME DO PRODUTO</th>
                    <th>PREÇO</th>
                    <th>AÇÃO</th>
                </tr>
                <?php 
                include("../config.php");
                $sql = "SELECT * FROM product_test p";
                $result = mysqli_query($conn, $sql);
                //$con = $mysqli->query($consulta) or die($mysqli->error);
                while ($row = mysqli_fetch_assoc($result)) {
                    ?>
                    <tr>
                        <th><?php echo $row['idproduct'] ?></th>
                        <th><?php echo $row['product_name'] ?></th>
                        <th><?php echo $row['sale_price'] ?></th>
                        <th>
                            <a id="alterar-btn" href="alter_product.php?id=<?php echo $row['idproduct']?>">alterar</a>
                            <a id="deletar-btn" href="delete_product.php?id=<?php echo $row['idproduct']?>">excluir</a>
                        </th>
                    </tr>
                    <?php
                }
                ?>
            </table>
        </div>
    </div>
</body>
</html>