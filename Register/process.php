<?php

include_once("connection.php");

$nome = $_POST['name'];
$cpf = $_POST['cpf'];
$birthdate = $_POST['birthdate'];
$email = $_POST['email'];
$phone = $_POST['phone'];
$pass = $_POST['password'];

$sql_register = "INSERT INTO user('name', 'taxp', 'birthdate', 'email', 'password', 'phone') 
                  values ('$nome', '$cpf', '$birthdate', '$email', '$pass', '$phone')";


$register = mysqli_query($conector, $sql_register);

$linha_afectada = mysqli_affected_rows($conector);

mysqli_close($conector);

?>