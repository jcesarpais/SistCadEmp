<?php
session_start();
include_once "../config/db.php";

$cod_contato = filter_input(INPUT_GET, 'cod_contato', FILTER_SANITIZE_NUMBER_INT);
$sql = "SELECT * FROM contato where cod_contato = '$cod_contato'";
$res = mysqli_query($conn, $sql);
$row = mysqli_fetch_assoc($res);

$cod_cliente = filter_input(INPUT_GET, 'cod_cliente', FILTER_SANITIZE_NUMBER_INT);
$sql1 = "SELECT * FROM cliente";
$res1 = mysqli_query($conn, $sql1);
$row1 = mysqli_fetch_assoc($res1);


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
                <h1>Atualização de Contato</h1>
            </header>
            <?php
            if(isset($_SESSION['msg'])){
                    echo $_SESSION['msg'];
                    unset($_SESSION['msg']);
                }
            ?>
            
            <form action="processa_editar_contato.php" method="POST">
                <fieldset>   
                    <input type="hidden" name="cod_contato" value="<?php echo $row['cod_contato']; ?>">
                    
                    <div class="form-group">
                        <label >Selecione o cliente: </label>
                            <select class="custom-select mr-sm-2" name="cod_cliente">
                                <?php
                                    //var_dump($res);
                                    foreach($res1 as $row1){  
                                ?>
                                    <option  value="<?php echo $row1['cod_cliente'];?>"><?php echo $row1['razao_social']?></option>
                                <?php }?>
                            </select>
                    </div>


                    <div class="form-group">
                        <label >Nome </label>
                        <input type="text" id="nome_contato" class="form-control" name="nome_contato" placeholder="Digite Nome do Contato..." value="<?php echo $row['nome_contato']; ?>" required>
                    </div>
                    <div class="form-row">
                        <div class="col">
                            <label >Telefone 1 </label>
                            <input type="text" id="telefone_1" class="form-control" name="telefone_1" placeholder="Digite o telefone 1..." value="<?php echo $row['telefone_1']; ?>">
                        </div>
                        <div class="col">
                            <label>Telefone 2 </label>
                            <input type="text" id="telefone_2" class="form-control" name="telefone_2" placeholder="Digite telefone 2..." value="<?php echo $row['telefone_2']; ?>">
                        </div>
                        <div class="col">
                            <label >Celular </label>
                            <input type="text" id="celular" class="form-control" name="celular" placeholder="Digite o celular..." value="<?php echo $row['celular']; ?>">
                        </div>
                    </div>
                    <div class="form-group">
                        <label >E-mail </label>
                        <input type="text" id="email" class="form-control" name="email" placeholder="Digite o E-mail" value="<?php echo $row['email']; ?>">
                    </div>
                  
                        <input type="submit" class="btn btn-primary btn-sm" value="Gravar">
                        <a href="../index.php" class="btn btn-primary btn-sm">Voltar</a>
                    
                </fieldset>
            </form>

            <footer>
                <p>Cadastro Clientes/Contato V1.0</p>
            </footer>
        </div>
    </body>
</html>