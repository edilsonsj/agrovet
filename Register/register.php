<?php 

    include('../config.php');
    
    if(isset($_POST['register'])) {
        $nome = $_POST['nome'];
        $cpf = $_POST['cpf'];
        $data = $_POST['birthdate'];
        $email = $_POST['email'];
        $tel = $_POST['phone'];
        $senha = $_POST['password'];

        $query = "INSERT INTO agrovet.user(`name`, `taxp`, `birthdate`, `email`, `password`, `phone`) VALUES ('$nome', '$cpf', '$data', '$email', '$senha', '$tel')";

        $result = mysqli_query($conn, $query);

       if ($result) {
        echo
        "
        <script>
            alert('Cadastro realizado com sucesso');
            document.location.href = '../home.php';
        </script>
        ";
       }else {
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
    <title>REGISTRE-SE</title>
    <link rel="stylesheet" href="../css/register.css">
    <link rel="icon" href="../images/icons/logo.png" type="image/x-icon">
</head>
<body>
    

    <div class="header">
      <a href="../home.php" class="hlogo"><img src="../images/icons /logo_extended.png" alt=""></a>
      <div class="header_right">
        <a class="login" href="../login/login.php">LOGIN</a>
        <a class="adm" href="../admin/admin_panel.php">ADM</a>
      </div>      
    </div>


    <div id="main" >
        <form id="box" action="" method="POST">
            <div id="All">
                <div id="register">CADASTRE-SE</div>
                    <div>
                        <input type="text" name="nome" id="nameRegister" placeholder="Nome" required>

                        <input type="text" name="cpf" id="tax" placeholder="CPF" required>

                        <br>
                        <label class="data" for="date">Data de nascimento</label><br>
                        <input class="data" type="date" name="birthdate" id="birthdate" placeholder="Data de Nascimento">
                        <br>
                        <input type="email" name="email" id="emailRegister" placeholder="Email" required>
                        <input type="tel" name="phone" id="phoneRegister" placeholder="Telefone" required>
                        <input type="password" name="password" id="passwordRegister" placeholder="Senha" required>
                    </div>
                <button name="register" type="submit" id="continueButton">CRIAR CONTA</button>
            </div>
        </form>
    </div>
    <footer>
        Cardoso Agrovet  © 2022 - Todos os direitos reservados<br>
        Rua Alexandre Ferreira, 48 - Barão de Camaçari, Catu CEP: 48110-000 - CNPJ: 47.845.005/0001-89
    </footer>
</body>
</html>