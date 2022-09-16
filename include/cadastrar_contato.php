<?php
    session_start();
    include_once "../config/db.php";

    $sql = "SELECT * FROM cliente";
    $res = mysqli_query($conn, $sql);
    $row = mysqli_fetch_assoc($res);

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
                <h1>Tela Inclusão / Edição de Contatos</h1>
            </header>
                
            <section >
                
                    <form id="formulario" action="validacadastro_contato.php" method="POST">
                                            
                        <div class="form-group">
                            <label >Selecione o cliente</label>
                                <select class="custom-select mr-sm-2" id="inlineFormCustomSelect" name="cod_cliente">
                                <option selected>Selecione o Cliente</option>
                                <?php
                                    //var_dump($res);
                                    foreach($res as $row){
                                    
                                ?>
                                    <option  value="<?php echo $row['cod_cliente'];?>"><?php echo $row['razao_social']?></option>
                                <?php }?>
                            </select>
                        </div>

                    
                        <div class="form-group">
                            <label for="">Nome do Contato</label>   
                            <input type="text" class="form-control"  name="nome_contato" required placeholder="Digite nome do contato...">
                        </div>
                        <div class="form-row">
                            <div class="col">
                                <label for="">Telefone 1</label>
                                <input type="text" class="form-control"  name="telefone_1" placeholder="Digite telefone 1...">
                            </div>
                            <div class="col">
                                <label for="">Telefone 2</label>
                                <input type="text" class="form-control"  name="telefone_2" placeholder="Digite telefone 2 se houver...">
                            </div>
                            <div class="col">
                                <label for="">Celular</label>
                                <input type="text" class="form-control"   name="celular" placeholder="Digite o celular...">
                            </div>
                        </div>             
                        <div class="form-group">
                            <label for="">Celular</label>
                            <input type="email" class="form-control"   name="email" placeholder="Digite o email...">
                        </div>
                                            
                            <input type="submit" class="btn btn-primary btn-sm" value="Gravar">
                            <a href="../index.php" class="btn btn-primary btn-sm">Voltar</a>
                            
                        
                        
                    </form>
                    

                </section>
                
                
                
                
            <footer>
                <p>Cadastro de Clientes / Contatos 1.0</p>
            </footer>
        </div>
        
    </body>
</html>