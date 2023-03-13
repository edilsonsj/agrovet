<?php 
    include "../config.php";
    $id = $_GET['id'];
    $sql = "SELECT * FROM product_test WHERE idproduct = $id";
    $result = mysqli_query($conn, $sql);
    $row = mysqli_fetch_assoc($result);

    if(isset($_POST["upload"])) {
        $nome = $_POST["name"];
        $preco = $_POST["preco"];
        $descricao = $_POST["descricao"];
        $indicacao = $_POST["indicacao"];
        $modo = $_POST["modo"];
        $fabricante = $_POST["fabricante"];
        $formula = $_POST["formula"];
        $carencia = $_POST["carencia"];
        $unidade = $_POST["unidade"];
        $volume = $_POST["volume"];


        $query = "UPDATE `product_test` SET `product_name`='$nome',`sale_price`='$preco',`measurement_unit`='$unidade',`volume`='$volume',`description`='$descricao',`indication`='$indicacao',`mode of use`='$modo',`brand`='$fabricante',`formula`='$formula',`grace_period`='$carencia' WHERE idproduct = $id";
        mysqli_query($conn, $query);
        echo
            "
            <script>
                alert('Produto alterado com sucesso');
                document.location.href = 'home.php';
            </script>
            ";

    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ALTERAR PRODUTO</title>
    <link rel="stylesheet" href="../css/admin_panel.css">
    <link rel="icon" href="images/icons/logo.png" type="image/x-icon">

</head>
<body>
    <div class="header">
        <a href="home.php" class="logo"><img src="images/logo_extended.png" alt=""></a>
        <div class="header_right">
        
        </div>      
    </div>

    <?php 
    
    
    ?>

    <div class="form_wrapper">
        <div class="container">

            <form method="POST" id="box" enctype="multipart/form-data">
                <h1>ALTERAR PRODUTO</h1>
                <label for="name">Nome do prodruto</label>
                <input name="name" type="text" required autocomplete="off" value="<?php echo $row['product_name'] ?>">
                <label for="">Preço</label>
                <input name="preco" type="number" step="0.01" id="preco" required autocomplete="off" value="<?php echo $row['sale_price'] ?>">
                <label for="">Descrição</label>
                <input name="descricao" type="text" required autocomplete="off" value="<?php echo $row['description'] ?>">
                <label for="">Indicação</label>
                <input name="indicacao" type="text" required autocomplete="off" value="<?php echo $row['indication'] ?>">
                <label for="">Modo de uso</label>
                <input name="modo" type="text" autocomplete="off" value="<?php echo $row['mode of use'] ?>">
                <label for="">Fabricante</label>
                <input name="fabricante" type="text" required autocomplete="off" value="<?php echo $row['brand'] ?>">
                <label for="">Fórmula</label>
                <input name="formula" type="text" required autocomplete="off" value="<?php echo $row['formula'] ?>">
                <label for="">Período de carência</label>
                <input name="carencia" type="text"  required autocomplete="off" value="<?php echo $row['grace_period'] ?>">

                <label for="unidade_medida">Unidade de Medida:</label>
                <select name="unidade" id="unidade_medida">
                    <option value="mL">mililitro (mL)</option>
                    <option value="L">litro (L)</option>
                    <option value="g">grama (g)</option>
                    <option value="kg">quilo (kg)</option>
                </select>
                <label for="">Volume</label>
                <input name="volume" type="number" step="0.01" autocomplete="off" value="<?php echo $row['volume'] ?>">
                
                <label for="image">Selecione a imagem:</label>
                <input name="image" type="file" accept="image/*" placeholder="Selecione a imagem">

                <button name="upload" type="submit">ALTERAR PRODUTO</button>


        </form>
        </div>
    </div>
</body>
</html>