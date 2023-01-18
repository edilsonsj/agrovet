<?php

$server = "127.0.0.1";
$user = "user";
$database = "agrovet";
$password = "Bycmlla11@@";

try {
    $conector = mysqli_connect($server, $user, $database, $password);
    echo "Sucess";
    
} catch(\Throwable $th) {
    echo "Error on connection " . $th; 
}


?>