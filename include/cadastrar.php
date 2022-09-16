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
                <h1>Tela Inclusão / Edição de Clientes</h1>
            </header>
                
            <section>
                
                <form id="formulario" action="validacadastro.php" method="POST">
                    <fieldset>
                        
                        <div class="form-group">
                            <label >Razao Social</label>
                            <input type="text" class="form-control" id="razao_social" name="razao_social"  placeholder="Digite a razão social..." required>
                        </div>
                        <div class="form-group">
                            <label >Nome Fantasia</label>
                            <input type="text" class="form-control" id="nome_fantasia"  name="nome_fantasia"  placeholder="Digite o nome fantasia..." required>
                        </div>
                        <div class="form-group">
                            <label >Endereço</label>
                            <input type="text" class="form-control" id="endereco"  name="endereco" placeholder="Digite o endereço...">
                        </div>
                        <div class="form-group">
                            <label >Complemento</label>
                            <input type="text" class="form-control" id="complemento"  name="complemento" placeholder="Digite o complemento do endereço...">
                        </div>                  
                        <div class="form-group">
                            <label >Bairro</label>
                            <input type="text" class="form-control" id="bairro"  name="bairro" placeholder="Digite o bairro">
                        </div>
                        
                        <div class="form-group">                    
                            <label >Cidade</label>
                            <input type="text" class="form-control" id="cidade"  name="cidade" placeholder="Digite a cidade...">
                        </div>
                        <div class="form-group">
                            <label >Selecione o Estado</label>
                            <input type="text" class="form-control" id="estado"  name="estado" placeholder="Digite o estado que reside...">
                        </div>
                        <div class="form-group">
                            <label >Data de Inclusão</label>
                            <input type="date" class="form-control" id="data_inclusao"  name="data_inclusao">
                        </div>
                        
                            <input type="submit" class="btn btn-primary btn-sm" value="Gravar">
                            <a href="../index.php" class="btn btn-primary btn-sm">Voltar</a>
                            
                        
                    </fieldset>
                </form>
                    

            </section>

            <footer>
                <p>Cadastro de Clientes / Contatos 1.0</p>
            </footer>
        </div>
        
    </body>
</html>