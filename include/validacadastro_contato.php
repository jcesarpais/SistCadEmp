<?php
include_once "../config/db.php";
session_start();

$cod_contato = filter_input(INPUT_POST, 'cod_contato', FILTER_UNSAFE_RAW);
$nome_contato = filter_input(INPUT_POST, 'nome_contato', FILTER_UNSAFE_RAW);
$telefone_1 = filter_input(INPUT_POST, 'telefone_1', FILTER_UNSAFE_RAW);
$telefone_2 = filter_input(INPUT_POST, 'telefone_2', FILTER_UNSAFE_RAW);
$celular = filter_input(INPUT_POST, 'celular', FILTER_UNSAFE_RAW);
$email = filter_input(INPUT_POST, 'email', FILTER_UNSAFE_RAW);
$cod_cliente = filter_input(INPUT_POST, 'cod_cliente', FILTER_UNSAFE_RAW);

    $sql = "INSERT INTO contato (nome_contato, telefone_1, telefone_2, celular, email, cod_cliente) 
    VALUES ( '" .$nome_contato . "', '" .$telefone_1 . "', '" .$telefone_2 . "', '" .$celular . "', '" .$email . "', '" .$cod_cliente . "')";

    $res = mysqli_query($conn, $sql);

    if(mysqli_affected_rows($conn)){
        $_SESSION['msg'] = "<p>Contato Cadastrado com Sucesso...</p>";
        header("Location: ../index.php");
    }else{
        $_SESSION['msg'] = "<p>Não foi possível cadastrar o usuário, verifique os dados e tente novamente.</p>";
        header("Location: ../index.php");
    }
?>