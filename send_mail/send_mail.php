<?php 
    include("../config.php");
    include("../protect.php");
    //$idproduct = $_GET['id'];
    $iduser = $_SESSION['iduser'];
    
    $sql = "select SUM(sale_price) as amount from product_test p, cart c, user u where c.iduser = $iduser and c.idproduct = p.idproduct;
    ";
    $result = mysqli_query($conn, $sql);

    $nome = $_SESSION['name'];
    //$produto = $row[''];
    $amount = '00000000000';
    $to_email = $_SESSION['email'];
    
    $descricao = 'TOTAL A PAGAR: ' . $amount;

    $subject = "Olá " . strtok($nome, " ");

        $message = "
                    <p>[{$descricao}]</p>
                    <p style='color:rgb(150, 150, 150); font-style: italic;'>
                        Email fictício. <br>
                        Projeto final: Laboratório de Programação WEB I (2022.1) <br>
                        
                    </p>
        ";

        $headers = array(
            'From' => 'skrmoreira@outlook.com',
            'Reply-To' => 'edilsonsjf@gmail.com',
            'MIME-Version' => '1.0',
            'Content-type' => 'text/html; charset=UTF-8'
        );

        $email = mail($to_email, $subject, $message, $headers);

        if( $email == true ) {
            echo "Email enviado com sucesso.";
        }else {
            echo "Email não pode ser enviado.";
        }

    

    if ($result) {
        echo
                "
                <script>
                    alert('Pedido realizado com sucesso, cheque seu email com as instruções para pagamento.');
                    document.location.href = '../homeUser.php';
                </script>
                ";
    } else {
        echo "Falha: " . mysqli_error($conn);
    }
?>