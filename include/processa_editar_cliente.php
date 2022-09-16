<?php
	session_start();
	include_once "../config/db.php";



	$cod_cliente = filter_input(INPUT_POST, 'cod_cliente', FILTER_UNSAFE_RAW);
	$razao_social = filter_input(INPUT_POST, 'razao_social', FILTER_UNSAFE_RAW);
	$nome_fantasia = filter_input(INPUT_POST, 'nome_fantasia', FILTER_UNSAFE_RAW);
	$endereco = filter_input(INPUT_POST, 'endereco', FILTER_UNSAFE_RAW);
	$complemento = filter_input(INPUT_POST, 'complemento', FILTER_UNSAFE_RAW);
	$bairro = filter_input(INPUT_POST, 'bairro', FILTER_UNSAFE_RAW);
	$cidade = filter_input(INPUT_POST, 'cidade', FILTER_UNSAFE_RAW);
	$estado = filter_input(INPUT_POST, 'estado', FILTER_UNSAFE_RAW);


	$sql = "UPDATE cliente SET razao_social='$razao_social', nome_fantasia='$nome_fantasia', endereco='$endereco', complemento='$complemento', bairro='$bairro', cidade='$cidade', estado='$estado' WHERE cod_cliente='$cod_cliente'";
	
	$res = mysqli_query($conn, $sql);

	if(mysqli_affected_rows($conn)){
		$_SESSION['msg'] = "<p>Usuário editado com sucesso</p>";
		header("Location: ../index.php");
	}else{
		$_SESSION['msg'] = "<p>Não foi possível alterar o usuário, verifique os dados e tente novamente.</p>";
		header("Location: ../index.php?cod_cliente=$cod_cliente");
	}

?>