<?php 
    include_once "config/db.php";
    session_start();
    $sql = "SELECT * FROM cliente cli WHERE (SELECT count(1) FROM contato con where con.cod_cliente = cli.cod_cliente) = 0";
    $res = mysqli_query($conn, $sql);


    $cont = "SELECT * FROM contato WHERE telefone_1 = '' OR telefone_1 IS null OR telefone_2 = '' OR telefone_2 is null OR celular = '' OR celular is null OR email= '' OR email is null";
    $rescont = mysqli_query($conn, $cont);

?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
    <title>Cadastro Clientes/Contato</title>
</head>
<body>
    <div class="envolve">
        <header>
            <h1>Cadastro Clientes/Contato</h1>
        </header>
        
        <section>
            <h6>Relatório de Clientes que não possuem contatos</h6>
        <?php
            if(isset($_SESSION['msg'])){
                echo $_SESSION['msg'];
                unset($_SESSION['msg']);
            }
        ?>
            <form action="formulario">
                <table class="table">
                    <thead class="thead-dark">
                        <tr>
                            <td scope="col">Cód. Cliente</td>
                            <td scope="col">Razão Social</td>
                            <td scope="col">Nome Fantasia</td>
                            <td scope="col">Data de Inclusão</td>
                            
                            
                        </tr>
                    </thead>
                    <tbody>
                    <?php
                        if ($res !== false && $res -> num_rows > 0){
                            while($row = mysqli_fetch_array($res)){ 
                        ?>
                        
                        <tr>
                            <td scope="col"><?php echo $row['cod_cliente']; ?></td>
                            <td scope="col"><?php echo $row['razao_social']; ?></td>
                            <td scope="col"><?php echo $row['nome_fantasia']; ?></td>
                            <td scope="col"><?php echo date ('d/m/y', strtotime($row['data_inclusao'])); ?></td>
                            
                        </tr>

                    <?php
                            }
                        }
                        
                    ?>
                    </tbody>
                </table>    

            </form>

        </section>
        <br>

        <section>
            <h6>Relatório de Contatos que não possuem Telefone1 ou Telefone2 ou Celular ou Email</h6>
        <?php
            if(isset($_SESSION['msg'])){
                    echo $_SESSION['msg'];
                    unset($_SESSION['msg']);
                }
        ?>
            <form action="formulario">
                <table class="table">
                    <thead class="thead-dark" >
                        <tr>
                            <td scope="col">Cód. Contato</td>
                            <td scope="col">Nome</td>
                            <td scope="col">Telefones</td>
                            <td scope="col">Celular</td>
                            <td scope="col">E-mail</td>
                        
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                            if ($rescont !== false && $rescont -> num_rows > 0){
                                while($row = mysqli_fetch_array($rescont)){ 
                        ?>
                            <tr>
                                <td scope="col"><?php echo $row['cod_contato']; ?></td>
                                <td scope="col"><?php echo $row['nome_contato']; ?></td>
                                <td scope="col"><?php echo $row['telefone_1'];
                                        echo $row['telefone_2']; ?></td>
                                <td scope="col"><?php echo $row['celular']; ?></td>
                                <td scope="col"><?php echo $row['email']; ?></td>
 
                            </tr>

                        <?php
                                }
                            }
                            mysqli_close($conn);
                        ?>
                    </tbody>
                </table>    
            </form>

        </section>
        
            <a class="btn btn-primary btn-sm" href="index.php">Voltar</a>
        
        <footer>
                <p>Cadastro de Clientes / Contatos V1.0</p>
        </footer>
    </div>
</body>
</html>