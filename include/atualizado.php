<?php
session_start();
include_once "../config/db.php";

    $sql= "SELECT * FROM cliente WHERE cod_cliente = cod_cliente";
    $res = mysqli_query($conn, $sql);

    try {
        $result = mysqli_query($conn, $sql );
    } catch (\Throwable $th) {
        echo $th->getMessage();
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../css/style.css">
</head>
    <body>
        <header>
            <h1>Cadastro Alterado</h1>
        </header>
            <?php
                
                

                if(isset($_SESSION['msg'])){
                    echo $_SESSION['msg'];
                    unset($_SESSION['msg']);
                }
                ?>
               <section>
                    <form action="formulario">
                            <table border="1">
                                <tr>
                                    <td>Cód. Cliente</td>
                                    <td>Razão Social</td>
                                    <td>Nome Fantasia</td>
                                    <td>Data de Inclusão</td>
                                    <td>Nº Contatos</td>
                                    
                                </tr>
                                
                                <?php
                                    if ($res !== false && $res -> num_rows > 0){
                                        while($row = mysqli_fetch_array($res)){ 
                                ?>
                                    <tr>
                                        <td><?php echo $row['cod_cliente']; ?></td>
                                        <td><?php echo $row['razao_social']; ?></td>
                                        <td><?php echo $row['nome_fantasia']; ?></td>
                                        <td><?php echo date ('d/m/y', strtotime($row['data_inclusao'])); ?></td>
                                        <td></td>
                                        <td>
                                            <?php echo '<a href="editar_cliente.php?cod_cliente= ' .$row['cod_cliente'] .'">Editar</a>'; ?>
                                        
                                            <a href="usu_excluir.php?codigo=<?php echo $dado['usu_codigo']; ?>">Excluir</a>
                                        </td>
                                    </tr>

                                <?php
                                        }
                                    }
                                    mysqli_close($conn);
                                ?>

                            </table>    

                            <div>
                                <button>
                                    <a href="cadastrar.php">Novo</a>
                                </button>
                            </div>

                        </form>

                </section>

        
                
        <footer>
            <p>Cadastro de pavientes V1.0</p>
        </footer>

    </body>
</html>