<?php 
  include("config.php");

  $consulta = "SELECT p.product_name, p.sale_price, p.image_path FROM product_test p";

  $con = $mysqli->query($consulta) or die($mysqli->error);

  include('protect.php');
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cardoso Agrovet</title>
    <link rel="icon" href="images/icons/logo.png" type="image/x-icon">
    <link rel="stylesheet" href="css/homeUser.css">
</head>
<body>
    
    <div class="nav">
      <div class="header">
        <a href="home.php" class="logo"><img src="images/icons/logo_extended.png" alt=""></a>
        <div class="header_right">
          <a class="update" href="update_user/update_user.php">ALTERE SEUS DADOS</a>
          <a class="carrinho" href="">
            <img id="carrinhoImage" src="images/icons/carrinho.png" alt="imagem de carrinho" >
             CARRINHO </a>
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
            <li class="animal_item"><a href="#">PET</a></li>
          </ul>
      </div>
    </div>

    <div class="product_wrapper">
    
      <?php while($dado = $con->fetch_array()){ ?>
          <div class="product_item">
            <div class="product_item_content">
              <img src="images/product_images/<?php echo $dado["image_path"]; ?>" alt="">
              <div class="product_name">
                <h3><?php echo $dado["product_name"]; ?></h3>
              </div>
              <h1>R$<?php echo $dado["sale_price"]; ?></h1>
              <button>COMPRAR</button>
            </div>
          </div>

        <?php } ?>
    </div>
      </div>

    <div class="footer">
        Cardoso Agrovet  © 2022 - Todos os direitos reservados<br>
        Rua Alexandre Ferreira, 48 - Barão de Camaçari, Catu CEP: 48110-000 - CNPJ: 47.845.005/0001-89
    </div>

</body>
</html>