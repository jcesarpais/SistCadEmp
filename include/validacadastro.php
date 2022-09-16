<?php
    include_once "../config/db.php";
    session_start();


    $cod_cliente = filter_input(INPUT_POST, 'cod_cliente', FILTER_UNSAFE_RAW);
    $razao_social = filter_input(INPUT_POST, 'razao_social', FILTER_UNSAFE_RAW);
    $nome_fantasia = filter_input(INPUT_POST, 'nome_fantasia', FILTER_UNSAFE_RAW);
    $endereco = filter_input(INPUT_POST, 'endereco', FILTER_UNSAFE_RAW);
    $complemento = filter_input(INPUT_POST, 'complemento', FILTER_UNSAFE_RAW);
    $bairro = filter_input(INPUT_POST, 'bairro', FILTER_UNSAFE_RAW);
    $cidade = filter_input(INPUT_POST, 'cidade', FILTER_UNSAFE_RAW);
    $estado = filter_input(INPUT_POST, 'estado', FILTER_UNSAFE_RAW);
    $data_inclusao = filter_input(INPUT_POST, 'data_inclusao', FILTER_UNSAFE_RAW);


        //$campos = array($razao_social, $nome_fantasia, $endereco, $cidade, $estado);

    $sql = "INSERT INTO cliente (cod_cliente, razao_social, nome_fantasia, endereco, complemento, bairro, cidade, estado, data_inclusao) 
    VALUES ( '" .$cod_cliente . "', '" .$razao_social . "', '" .$nome_fantasia . "', '" .$endereco . "', '" .$complemento . "', '" .$bairro . "', '" .$cidade . "', '" .$estado . "', '" .$data_inclusao . "' )";

    $res = mysqli_query($conn, $sql);

    if(mysqli_affected_rows($conn)){
        $_SESSION['msg'] = "<p>Contato Cadastrado com Sucesso...</p>";
        header("Location: ../index.php");
    }else{
        $_SESSION['msg'] = "<p>Não foi possível cadastrar o usuário, verifique os dados e tente novamente.</p>";
        header("Location: ../index.php");
    }
?>