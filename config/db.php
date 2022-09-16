<?php

    ini_set('display_errors', 1);
    ini_set('display_startup_errors', 1);
    error_reporting(E_ALL);

    $servername = "127.0.0.1";
    $username = "root";
    $password = "";
    $dbname = "cademp";

    
    $conn = new mysqli($servername, $username, $password, $dbname);

    if ($conn->connect_error){
        die("Erro ao conectar com o Banco de Dados" . $conn->connect_error);
    }
    



?>