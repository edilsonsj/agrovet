

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/cart.css">
    <link rel="icon" href="../images/icons/logo.png" type="image/x-icon">

    
    <title>CARRINHO</title>
</head>
<body>
    <div class="header">
    <a href="../homeUser.php" class="logo"><img src="../images/icons/logo_extended.png" alt=""></a>
          <div class="header_right">
            <a class="adm" href="../send_mail/send_mail.php">FINALIZAR COMPRA</a>
          </div>      
    </div>
    <div class="container">
        <div class="child">
            <table>
                <tr class="table-header">
                    <th>ID</th>
                    <th>NOME DO PRODUTO</th>
                    <th>PREÇO</th>
                </tr>
                <?php 
                include("../config.php");
                $sql = "SELECT * FROM cart c, product_test p, user u  where c.iduser = u.iduser and c.idproduct = p.idproduct;";
                $result = mysqli_query($conn, $sql);
                //$con = $mysqli->query($consulta) or die($mysqli->error);
                while ($row = mysqli_fetch_assoc($result)) {
                    ?>
                    <tr>
                        <th><?php echo $row['idproduct'] ?></th>
                        <th><?php echo $row['product_name'] ?></th>
                        <th><?php echo $row['sale_price'] ?></th>
                    </tr>
                    <?php
                }
                ?>

            </table>
        </div>
    </div>
</body>
</html>