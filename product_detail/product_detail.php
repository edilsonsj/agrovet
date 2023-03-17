

<?php 
  include("../config.php");
  $idproduct = $_GET['id'];
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cardoso Agrovet</title>
    <link rel="icon" href="../images/icons/logo.png" type="image/x-icon">
    <link rel="stylesheet" href="../css/product_detail.css">
</head>
<body>
    
    <div class="nav">
      <div class="header">
        <a href="../home.php" class="logo"><img src="../images/icons/logo_extended.png" alt=""></a>
        <div class="header_right">
          <a class="login" href="login/login.php">LOGIN</a>
          <a class="cadastro" href="register/register.php">CADASTRO</a>
          <a class="adm" href="../agrovet/admin/admin_panel.php">ADM</a>
        </div>      
      </div>

      <div class="animal_type">
          <ul id="animal">
            <li class="animal_item"><a href="#">BOVINO</a></li>
            <li class="animal_item"><a href="#">EQUINO</a></li>
            <li class="animal_item"><a href="#">SUÍNO</a></li>
            <li class="animal_item"><a href="#">FERRAMENTAS</a></li>
            <li class="animal_item"><a href="#">PET</a></li>
            <li class="animal_item"><a href="#">SUÍNO</a></li>
            <li class="animal_item"><a href="#">FERRAMENTAS</a></li>
            <li class="animal_item"><a href="#">PET</a></li>
          </ul>
      </div>
    </div>

    <div class="container">
        <div class="child">
            <table>
                <tr class="table-header">
                    <th>NOME DO PRODUTO</th>
                    <th>PREÇO</th>
                    <th>UNIDADE DE MEDIDA</th>
                    <th>VOLUME</th>
                    <th>DESCRICAO</th>
                    <th>AÇÃO</th>
                </tr>
                <?php 
                $sql = "SELECT * FROM product_test p where idproduct = $idproduct";
                $result = mysqli_query($conn, $sql);
                //$con = $mysqli->query($consulta) or die($mysqli->error);
                while ($row = mysqli_fetch_assoc($result)) {
                    ?>
                    <tr>
                        <th><?php echo $row['product_name'] ?></th>
                        <th><?php echo $row['sale_price'] ?></th>
                        <th><?php echo $row['measurement_unit'] ?></th>
                        <th><?php echo $row['volume'] ?></th>
                        <th><?php echo $row['description'] ?></th>
                        <th><a id="alterar-btn" href="">ADICIONAR AO CARRINHO</a></th>

                    </tr>
                    
                    <?php
                }
                ?>
            </table>
        </div>
    </div>

    <div class="footer">
        Cardoso Agrovet  © 2022 - Todos os direitos reservados<br>
        Rua Alexandre Ferreira, 48 - Barão de Camaçari, Catu CEP: 48110-000 - CNPJ: 47.845.005/0001-89
    </div>

</body>
</html>