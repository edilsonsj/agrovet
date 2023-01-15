<?php 
    $conn = mysqli_connect("localhost:3307", "root", "", "agrovet");

    if(isset($_POST["upload"])) {
        $nome = $_POST["nome"];
        $preco = $_POST["preco"];
    
    if($_FILES["image"]["error"] === 4) {
        echo   
        "<script> alert('Imagem inexistente'); </script>";
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
            
            move_uploaded_file($tmp_name, 'product_images/' . $new_image_name);

            $query = "INSERT INTO product_test(product_name, sale_price, image_path) values('$nome', '$preco', '$new_image_name')";
            mysqli_query($conn, $query);

            echo
                "
                <script>
                    alert('Produto adicionado com sucesso');
                    document.location.href = 'index_copy.php';
                </script>
                ";
        }
    }

    }
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ADMIN</title>
</head>
<body>
    <h1>CADASTRO DE PRODUTO</h1>
    <form method="post" enctype="multipart/form-data" action="">
        <p>
            <p>
                <label for="nome">Nome do Produto</label>
                <input name="nome" type="text">
            </p>

            <p>
                <label for="preco">Preço</label>
                <input name="preco" type="number" step="0.01" id="preco">
            </p>

            <p>
                <label for="">Selecione a imagem</label>
                <input name="image" type="file" accept="image/*">
            </p>
        </p>
        <button name="upload" type="submit">Enviar imagem</button>
    </form>


</body>
</html>