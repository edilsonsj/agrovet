<?php

include('../config.php');

$id = $_GET['iduser'];

if (isset($_POST['register'])) {
    $nome = $_POST['nome'];
    $cpf = $_POST['cpf'];
    $data = $_POST['birthdate'];
    $email = $_POST['email'];
    $tel = $_POST['phone'];
    $senha = $_POST['pass'];

    $query = "UPDATE `user` 
    SET `name`='$nome',`taxp`='$cpf',`birthdate`='$data',`email`='$email',`password`='$senha',`phone`='$tel' WHERE '$id' = `iduser`";

    $result = mysqli_query($conn, $query);

    if ($result) {
        echo
        "
        <script>
            alert('Atualização de cadastro realizada com sucesso');
            document.location.href = '../homeUser.php';
        </script>
        ";
    } else {
        echo mysqli_error($conn);
    }
}

?>



<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cardoso Agrovet</title>
    <link rel="stylesheet" href="../css/update.css">
</head>

<body>
    <div class="header">
        <a href="../homeUser.php" class="hlogo"><img src="../images/icons/logo_extended.png" alt=""></a>
        <div class="header_right">
        </div>
    </div>

    <?php 
        $id = $_GET['iduser'];
        $sql = "SELECT * FROM `user` WHERE iduser = $id";
        $result = mysqli_query($conn, $sql);
        $row = mysqli_fetch_assoc($result);
    ?>
    <div id="main">
        <form id="box" action="" method="POST">
            <div id="All">
                <div id="register">ALTERAR CADASTRO</div>
                <div>
                    <input type="text" name="nome" id="nameRegister" value="<?php echo $row['name']?>" required>
                    <input type="text" name="cpf" id="tax" value="<?php echo $row['taxp'] ?>" required>
                    <br>
                    <label class="data" for="date">Data de nascimento</label><br>
                    <input class="data" type="date" name="birthdate" id="birthdate" placeholder="Data de Nascimento"
                    value="<?php echo $row['birthdate'] ?>">
                    <br>
                    <input type="email" name="email" id="emailRegister" value="<?php echo $row['email'] ?>" required>
                    <input type="tel" name="phone" id="phoneRegister" value="<?php echo $row['phone'] ?>" required>
                    <input type="password" name="pass" id="passwordRegister" placeholder="password" value="<?php echo $row['password'] ?>" required>
                </div>
            </div>
            <button name="register" type="submit" id="continueButton">CONCLUIR</button>
        </form>
    </div>
</body>

</html>