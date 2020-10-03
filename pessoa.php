<?php
   session_start();
   require_once('variaveis.php');
   require_once('conexao.php');

   
   $idPessoa = $_GET['idPessoa'];

   if(strlen($idPessoa)==0) 
  
   $idPessoa = 0;
   $nomePessoa  = "";
   $endPessoa = "";
   $numeroPessoa = 0;
   $complePessoa = "";
   $cidadePessoa = "";
   $estadoPessoa = "";
   $cepPessoa  = "";
   $dtnascimentoPessoa   = "";
   $telefonePessoa = "";
   $celularPessoa = "";
   $emailPessoa = "";

   
      //recuperando dados da sessao
      $id_usuario   = $_SESSION["id_usuario"];
      $tipoAcesso   = $_SESSION["tipo_acesso"];    
      $nome_usuario = "";
      
      $sql = "SELECT nome FROM usuarios WHERE id = ".$id_usuario;
      $resp = mysqli_query($conexao_bd, $sql);
      if($rows=mysqli_fetch_row($resp)){
          $nome_usuario = $rows[0];
      }
  
      $sql = "SELECT nome, endereco, numero, complemento, cidade, estado, cep, datanascimento, telefone, celular, email FROM pessoas WHERE idPessoa = " .$idPessoa;
      $resp = mysqli_query($conexao_bd, $sql);
      
      if($rows=mysqli_fetch_row($resp)){
         $nomePessoa          = $rows[0];      
         $endPessoa           = $rows[1];
         $numeroPessoa        = $rows[2];
         $complePessoa        = $rows[3];
         $cidadePessoa        = $rows[4];
         $estadoPessoa        = $rows[5];
         $cepPessoa           = $rows[6];
         $dtnascimentoPessoa  = $rows[7]; 
         $telefonePessoa      = $rows[8];
         $celularPessoa       = $rows[9];
         $emailPessoa         = $rows[10];
      }  
   
   
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
   <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>SysPacientes - Editar usuário</title>
   <link rel="icon" href="img/favicon/favicon2.ico">
   <!-- Bootstrap core CSS -->
   <link href="css/bootstrap.min.css" rel="stylesheet">

</head>
<script type='text/javascript' src='https://code.jquery.com/jquery-1.11.0.js'></script>
<script type='text/javascript' src="https://rawgit.com/RobinHerbots/jquery.inputmask/3.x/dist/jquery.inputmask.bundle.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.15/jquery.mask.min.js"></script>
</script>
<body>
   <div class="container">
      <!-- Static navbar -->
      <nav class="navbar navbar-expand-lg navbar-light bg-light rounded">
        <a class="navbar-brand" href="#">SysPacientes</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarsExample09" aria-controls="navbarsExample09" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarsExample09">
          <ul class="navbar-nav mr-auto">
            <li class="nav-item">
              <a class="nav-link" href="admin.php">Home <span class="sr-only">(current)</span></a>
            </li>
            <?php 
            if($tipoAcesso != 3) {
            ?>
              <li class="nav-item dropdown active">
                <a class="nav-link dropdown-toggle" href="#" id="dropdown09" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Cadastros</a>
                <div class="dropdown-menu" aria-labelledby="dropdown09">
                  <a class="dropdown-item" href="pessoa_list2">Cadastro de pessoas</a>
                  <a class="dropdown-item" href="usuario_list2.php">Cadastro de usuários</a>                
                  <a class="dropdown-item" href="#">Cadastro de pacientes</a>
                </div>
              </li>
            <?php
            }
            ?>
          </ul>  
          <ul class="navbar-nav navbar-right">
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="dropdown10" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                  <?php echo($nome_usuario); ?>
                </a>
                <div class="dropdown-menu" aria-labelledby="dropdown10">
                <a class="dropdown-item" href="minhaconta.php">Minha conta</a>
                <a class="dropdown-item" href="logout.php">Sair</a>                 
              </div>
            </li>
          </ul>
        </div>
      </nav>

      <!-- Main component for a primary marketing message or call to action -->
      <div class="jumbotron">
      <?php
         if($idPessoa != 0){
            echo("<h1>Editando a pessoa: $nomePessoa</h1>");
         }else{
            echo("<h1>Cadastro de nova Pessoa:</h1>");
         }
        ?>
        <form
            method="post"
            action="pessoa_gravar.php">
            <div class="form-group">
               <label for="inputNome">Nome Pessoa:</label>
               <input type="text" class="form-control" id="inputNome" 
                     name="inputNome" placeholder="Nome Pessoa" maxlength="100"
                     value="<?php echo($nomePessoa); ?>" required >
                     
            </div>
            <div class="form-group">
               <label for="inputEndereco">Endereço:</label>
               <input type="endereco" class="form-control" id="inputEndereco" 
                     name="inputEndereco" placeholder="Endereco"
                     value="<?php echo($endPessoa); ?>" required >
                     
            </div>
            <div class="form-group">
               <label for="inputNumero">Numero:</label>
               <input type="number" name="inputNumero" class="form-control" 
               id="inputNumero" min="0"  value="<?php echo($numeroPessoa); ?>" required
               data-bind="value:replyNumber" />
                     
            </div>
            <div class="form-group">
               <label for="inputcomple">Complemento:</label>
               <input type="complemento" class="form-control" id="inputcomple" 
                     name="inputcomple" placeholder="Complemento"
                     value="<?php echo($complePessoa); ?>">
                     
            </div>
            <div class="form-group">
               <label for="inputCidade">Cidade:</label>
               <input type="cidade" class="form-control" id="inputCidade" 
                     name="inputCidade" placeholder="Cidade"
                     value="<?php echo($cidadePessoa); ?>" required>
            </div>        
                     <div class="form-group">
               <label for="inputEstado">Estado:</label>
               <input type="estado" class="form-control" id="inputEstado" 
                     name="inputEstado" placeholder="Estado"
                     value="<?php echo($estadoPessoa); ?>" required>
            </div>     
                     <div class="form-group">
               <label for="inputCep">CEP:</label>
               <input type="text" class="form-control" onkeypress="$(this).mask('00.000-000')" id="inputCep" 
                        name="inputCep" placeholder="00.000-000"
                        value="<?php echo($cepPessoa); ?>"
                        required>
            </div>
                     
                     <div class="form-group">
               <label for="inputData">Data de nascimento:</label>
                <input type="text"  name="inputData" class="form-control " onkeypress="$(this).mask('000.000.000-00') id="inputData" value="<?php echo($dtnascimentoPessoa ); ?> " required
                />
            </div>   
                     <div class="form-group">
               <label for="inputTelefone">Telefone:</label>
               <input type="telefone" class="form-control" id="inputTelefone" 
                     name="inputTelefone" placeholder="Telefone"
                     value="<?php echo($telefonePessoa); ?>">
            </div>         
                     <div class="form-group">
               <label for="inputCell">Celular:</label>
               <input type="text" class="form-control" id="inputCell" 
                     name="inputCell" placeholder="Celular"
                     value="<?php echo($celularPessoa); ?>">
                     
            </div>
            <div class="form-group">
               <label for="inputEmail">Email:</label>
               <input type="email" class="form-control" id="inputEmail" 
                     name="inputEmail" placeholder="E-mail"
                     value="<?php echo($emailPessoa); ?>" required >
                     
            </div>
                
               </select>
            </div>            
            <input type="hidden" id="inputIdPessoa" name="inputIdPessoa" value="<?php echo($idPessoa) ?>">
            <button type="submit" class="btn btn-success">Gravar</button>&nbsp;
            <a href="pessoa_list2.php" class="btn btn-warning" role="button">Retornar</a>
         </form>
      </div>
    </div>



</body>
<?php
//encerrando a conexao com mysql
mysqli_close($conexao_bd);
?>
</html>