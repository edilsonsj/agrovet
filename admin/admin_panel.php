<?php 
    $conn = mysqli_connect("localhost:3307", "root", "", "agrovet");

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
    
    if($_FILES["image"]["error"] === 4) {
        echo   
        "<script> alert('Produto não cadastrado (imagem não foi inserida)'); </script>";
    } else {
        $file_name = $_FILES["image"]["name"];
        $file_size = $_FILES["image"]["size"];
        $tmp_name = $_FILES["image"]["tmp_name"];

        $valid_image_extension = ['webp', 'jpeg', 'jpg', 'png'];
        $image_extension = explode('.', $file_name);
        $image_extension = strtolower(end($image_extension));

        if (!in_array($image_extension, $valid_image_extension)) {
            echo
                "<script> alert('Formato de imagem inválido (é permitido apenas o envio de imagens)'); </script>";   
        }
        else if($file_size > 1000000){
            echo
                "<script> alert('Imagem muito grande'); </script>";
            
        }
        else{
            $new_image_name = uniqid();
            $new_image_name .= '.' . $image_extension;
            
            move_uploaded_file($tmp_name, '../images/product_images/' . $new_image_name);

            $query = "INSERT INTO product_test(`product_name`, `sale_price`, `measurement_unit`, `volume`, `description`, `indication`, `mode of use`, `brand`, `formula`, `grace_period`, `image_path`)  values('$nome', '$preco', '$unidade', '$volume', '$descricao', '$indicacao', '$modo', '$fabricante', '$formula', '$carencia','$new_image_name')";
            mysqli_query($conn, $query);

            echo
                "
                <script>
                    alert('Produto adicionado com sucesso');
                    document.location.href = '../home.php';
                </script>
                ";
        }
    }

    }
?>





<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Painel ADMIN</title>
    <link rel="stylesheet" href="../css/admin_panel.css">
    <link rel="icon" href="images/icons/logo.png" type="image/x-icon">

</head>
<body>
    <div class="header">
        <a href="home.php" class="logo"><img src="../images/icons/logo_extended.png" alt=""></a>
        <div class="header_right">
        <a href="manage_products.php" class="cadastro">GERENCIAR PRODUTOS</a>
        </div>      
    </div>

    <div class="form_wrapper">
        <div class="container">

            <form method="POST" id="box" enctype="multipart/form-data">
                <h1>CADASTRO DE PRODUTO</h1>
                <input name="name" type="text" placeholder="nome do produto" required autocomplete="off">

                <input name="preco" type="number" placeholder="preço" step="0.01" id="preco" required autocomplete="off">

                <input name="descricao" type="text" placeholder="descrição" required autocomplete="off">
                <input name="indicacao" type="text" placeholder="indicação" required autocomplete="off">
                <input name="modo" type="text" placeholder="modo de uso" autocomplete="off">
                <input name="fabricante" type="text" placeholder="fabricante" required autocomplete="off">
                <input name="formula" type="text" placeholder="formula" required autocomplete="off">
                <input name="carencia" type="text" placeholder="período de carência"  required autocomplete="off">

                <label for="unidade_medida">Unidade de Medida:</label>
                <select name="unidade" id="unidade_medida">
                    <option value="">Clique para ecolher</option>
                    <option value="mL">mililitro (mL)</option>
                    <option value="L">litro (L)</option>
                    <option value="g">grama (g)</option>
                    <option value="kg">quilo (kg)</option>
                </select>

                <input name="volume" type="number" placeholder="volume" step="0.01" autocomplete="off">
                
                <label for="image">Selecione a imagem:</label>
                <input name="image" type="file" accept="image/*" placeholder="Selecione a imagem" required>

                <button name="upload" type="submit">CADASTRAR PRODUTO</button>


        </form>
        </div>
    </div>
</body>
</html>