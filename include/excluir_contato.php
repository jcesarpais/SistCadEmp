<?php
session_start();
include_once "../config/db.php";

$cod_contato = filter_input(INPUT_GET, 'cod_contato', FILTER_SANITIZE_NUMBER_INT);
$sql = "DELETE FROM contato WHERE cod_contato = '$cod_contato'";
$res = mysqli_query($conn, $sql);

if(mysqli_affected_rows($conn)){
    $_SESSION['msg'] = "<p> contato Apagado com Sucesso</p>";
    header("Location: ../index.php");

}else{
    $_SESSION['msg'] = "<p>Erro o contato não foi excluido </p>";
}
?>