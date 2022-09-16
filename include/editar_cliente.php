<?php
session_start();
include_once "../config/db.php";

$cod_cliente = filter_input(INPUT_GET, 'cod_cliente', FILTER_SANITIZE_NUMBER_INT);
$sql = "SELECT * FROM cliente WHERE cod_cliente = '$cod_cliente'";
$res = mysqli_query($conn, $sql);
$row = mysqli_fetch_assoc($res);

try {
    $res = mysqli_query($conn, $sql);
} catch (\Throwable $th) {
    echo $th->getMessage();
}

?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro Clientes/Contato</title>
    <link rel="stylesheet" href="../css/style.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
</head>
    <body>
        <div class="envolve">
            <header>
                <h1>Atualização de Cadastro</h1>
            </header>
            <?php
            if(isset($_SESSION['msg'])){
                    echo $_SESSION['msg'];
                    unset($_SESSION['msg']);
                }
            ?>
            
            <form action="processa_editar_cliente.php" method="POST">
                <fieldset>   
                    <input type="hidden" name="cod_cliente" value="<?php echo $row['cod_cliente']; ?>">

                    <div class="form-group">
                        <label for="razao_social">Razao Social</label>
                        <input type="text"  class="form-control" name="razao_social" placeholder="Digite a razão social..." value="<?php echo $row['razao_social']; ?>" required>
                    </div>

                    <div class="form-group">
                        <label for="nome_fantasia">Nome Fantasia</label>
                        <input type="text"  class="form-control" name="nome_fantasia" placeholder="Digite o nome fantasia..." value="<?php echo $row['nome_fantasia']; ?>" required>
                    </div>
                    <div class="form-group">
                        <label for="endereco">Endereço</label>
                        <input type="text"  class="form-control" name="endereco" placeholder="Digite o endereço..." value="<?php echo $row['endereco']; ?>">
                    </div>
                    <div class="form-group">
                        <label >Complemento</label>
                        <input type="text"  class="form-control" name="complemento" placeholder="Digite o complemento do endereço..." value="<?php echo $row['complemento']; ?>">
                    </div>
                    <div class="form-group">
                        <label >Bairro</label>
                        <input type="text"  class="form-control" name="bairro" placeholder="Digite o bairro" value="<?php echo $row['bairro']; ?>">
                    </div>
                    <div class="form-group">
                        <label for="cidade">Cidade</label>
                        <input type="text"  class="form-control" name="cidade" placeholder="Digite a cidade..." value="<?php echo $row['cidade']; ?>">
                    </div>
                    <div class="form-group">
                        <label for="estado">Estado</label>
                        <input type="text"  class="form-control" name="estado" placeholder="Digite o estado que reside..." value="<?php echo $row['estado']; ?>">
                    </div>
                                    
                        <input type="submit" class="btn btn-primary btn-sm" value="Salvar">
                        <a href="../index.php" class="btn btn-primary btn-sm">Voltar</a>
                    
                </fieldset>
            </form>
           

            <footer>
                <p>Cadastro de pacientes V1.0</p>
            </footer>
        </div>
    </body>
</html>