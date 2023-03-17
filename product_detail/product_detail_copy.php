<?php
include("../config.php");
include('../protect.php');

$id = $_GET['id'];
$consulta = "select * from product_test where idproduct = $id";
print_r($_SESSION);
$con = $mysqli->query($consulta) or die($mysqli->error);
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
	<script src="./JS/home.js"></script>
</head>

<body>
<div class="navbar">
      <div class="header">
        <a href="../home.php" class="logo"><img src="../images/icons/logo_extended.png" alt=""></a>
        <div class="header_right">
          <a class="carrinho" href="">
            <img id="carrinhoImage" src="../images/icons/carrinho.png" alt="imagem de carrinho" >
            CARRINHO 
          </a>
        </div>
      </div>


		<div class="animal_type">
			<ul id="animal">
				<li class="animal_item"><a href="#">BOVINO</a></li>
				<li class="animal_item"><a href="#">EQUINO</a></li>
				<li class="animal_item"><a href="#">SUÍNO</a></li>
				<li class="animal_item"><a href="#">PET</a></li>
				<li class="animal_item"><a href="#">SUÍNO</a></li>
				<li class="animal_item"><a href="#">FERRAMENTAS</a></li>
				<li class="animal_item"><a href="#">PET</a></li>
			</ul>
		</div>
	</div>

	<div class="container-image-product-informations">
		<div class="product-information">
			<!-- <a href="home.php" id="page" style="text-decoration: none;">Página inicial</a> -->
			<?php while($dado = $con->fetch_array()){ ?>
      <h3>
            <?php echo $dado['product_name'] ?>
          
      </h3>

			<div class="box-product-image">
				<img src="../images/product_images/<?php echo $dado["image_path"]; ?>" alt="">
			</div>
		</div>

		<div class="price-buy">
			<p>R$<?php echo $dado["sale_price"]; ?></p>
      <p></p>
			<span id="vista"> à vista no PIX</span><br>
			<div class="quantity">
				<label for="quantity">Volume: <?php echo $dado["volume"] . $dado['measurement_unit']; ?></label>
				<input name="quantidade" type="number" placeholder="quantidade" step="1" autocomplete="off" id="quantity" value="1" min="1">
			</div>

			<button><a href="../cart/cart_insert.php?id=<?php echo $id ?>">COMPRAR</a></button>
			<br>
			<div class="cep">
				<label for="cep">Consultar frete</label>
				<input type="number" name="cep" id="cep" placeholder="CEP"><button id="consult-ok">OK</button>
			</div>
		</div>
	</div>

	<div class="recomended">
		<h4>Recomendado para:</h4>
		<div class="recomended-box">
      <?php echo $dado["indication"]; ?>
		</div>
	</div>

	<div class="description">
		<h4>Descrição</h4>
		<div class="description-box">
      <?php echo $dado["description"]; ?>
			
		</div>
	</div>

	<div class="formula">
		<h4>Fórmula</h4>
		<div class="formula-box">
    <?php echo $dado["formula"]; ?>
		</div>
	</div>

	<!--<div class="indication">
		<h4>Indicação</h4>
		<div class="indication-box">
			indication
		</div>
	</div>
      -->
	<div class="mode-of-use">
		<h4>Modo de uso</h4>
		<div class="mode-of-use-box">
    <?php echo $dado["mode of use"]; ?>
		</div>
	</div>

	<div class="grace-period">
		<h4>Período de carência</h4>
		<div class="grace-period-box">
    <?php echo $dado["grace_period"]; ?>
		</div>
	</div>
  <?php } ?>

	<div id="footer">
		<div class="box-footer">
			<img src="../images/icons/logo.png" alt="logo" id="image-logo">

			<ul class="departamen-footer">

				<h3>Departamentos</h3>
				<li id="dep">departamanet</li>
				<li id="dep">departamanet</li>
				<li id="dep">departamanet</li>
				<li id="dep">departamanet</li>
			</ul>

			<ul class="institutional-footer">
				<h3>Institucional</h3>
				<li id="inst">institut</li>
				<li id="inst">institut</li>
				<li id="inst">institut</li>
			</ul>

			<ul class="images-footer">
				<h3>Formas de pagamento</h3>
				<li id="pag"><img src="../images/icons/bb.png" alt="" style="width: 15px; height: 15px;"></li>
				<li id="pag"><img src="../images/icons/boleto.png" alt="" style="width: 15px; height: 15px;"></li>
				<li id="pag"><img src="../images/icons/mastercad.png" alt="" style="width: 15px; height: 15px;"></li>
				<li id="pag"><img src="../images/icons/pix.png" alt="" style="width: 15px; height: 15px;"></li>
			</ul>

			<ul class="contact-footer">
				<h3>Midia e contato</h3>
				<li id="cont"><img src="../images/icons/insta_preto.png" alt="" style="width: 15px; height: 15px;">Instagram</li>
				<li id="cont"><img src="../images/icons/gmail_preto.png" alt="" style="width: 15px; height: 15px;">&nbsp E-mail</li>
				<li id="cont"><img src="../images/icons/tel.png" alt="" style="width: 15px; height: 15px;">Telefone</li>
			</ul>

		</div>
	</div>


</body>

</html>