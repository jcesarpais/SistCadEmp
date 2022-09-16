<?php
session_start();
include_once "../config/db.php";

$cod_cliente = filter_input(INPUT_GET, 'cod_cliente', FILTER_SANITIZE_NUMBER_INT);
$sql = "DELETE FROM cliente WHERE cod_cliente = '$cod_cliente'";
$res = mysqli_query($conn, $sql);

if(mysqli_affected_rows($conn)){
    $_SESSION['msg'] = "<p> cliente Apagado com Sucesso</p>";
    header("Location: ../index.php");

}else{
    $_SESSION['msg'] = "<p>Erro o cliente não foi excluido </p>";
}
?>