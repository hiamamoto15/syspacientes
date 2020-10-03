<?php
   session_start();
   require_once('variaveis.php');
   require_once('conexao.php');

   $idPessoa = $_GET['idPessoa'];

   //recuperando dados da sessao
   $idPessoa   = $_SESSION["idPessoa"];
 
   $nome_usuario = "";
   
   $sql = "SELECT nome FROM pessoas WHERE id = ".$idPessoa;
   $resp = mysqli_query($conexao_bd, $sql);
   if($rows=mysqli_fetch_row($resp)){
      $nomePessoa = $rows[0];
   }

   //verificar se o parametro de id de edição está vazio:   
   if(strlen($idPessoa)==0) 
      $idPessoa = 0;

   $nomePessoa  = "";
   $endPessoa = "";
   $numPessoa = 0;
   $complePessoa = "";
   $estadoPessoa = "";
   $cepPessoa  = 0;
   $dtnascimentoPessoa   = "";
   $telefonePessoa = 0;
   $celularPessoa = 0;
   $emailPessoa = "";

   if($idUsuario != 0){
      $sql = "SELECT nome, endereco, numero,
      complemento, cidade, estado, cep, datanascimento, telefone, celular, email from pessoas WHERE idPessoa = " .$idPessoa;
      $resp = mysqli_query($conexao_bd, $sql);
      if($rows=mysqli_fetch_row($resp)){
         $nomePessoa          = $rows[0];      
         $endPessoa           = $rows[1];
         $numPessoa           = $rows[2];
         $complePessoa        = $rows[3];
         $cidadePessoa        = $rows[4];
         $estadoPessoa        = $rows[5];
         $cepPessoa           = $rows[6];
         $dtnascimentoPessoa  = $rows[7]; 
         $telefonePessoa      = $rows[8];
         $celularPessoa       = $rows[9];
         $emailPessoa         = $rows[10];
      }  
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
                  <a class="dropdown-item" href="#">Cadastro de pessoas</a>
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
            echo("<h1>Editando o paciente: $nomePessoa</h1>");
         }else{
            echo("<h1>Cadastro de novo paciente:</h1>");
         }
        ?>
        <form
            method="post"
            action="usuario_gravar.php">
            <div class="form-group">
               <label for="inputNome">Nome Paciente:</label>
               <input type="text" class="form-control" id="inputNome" 
                     name="inputNome" placeholder="Nome Paciente"
                     value="<?php echo($nomePessoa); ?>"
                     >
            </div>
            <div class="form-group">
               <label for="inputEndereco">Endereço:</label>
               <input type="endereco" class="form-control" id="inputEndereco" 
                     name="inputEndereco" placeholder="Endereco"
                     value="<?php echo($endPessoa); ?>"
                     >
            </div>
            <div class="form-group">
               <label for="inputnumero">Numero:</label>
               <input type="numero" class="form-control" id="inputnumero" 
                     name="inputnumero" placeholder="Numero"
                     value="<?php echo($numPessoa); ?>"
                     >
            </div>
            <div class="form-group">
               <label for="inputcomple">Complemento:</label>
               <input type="complemento" class="form-control" id="inputcomple" 
                     name="inputcomple" placeholder="Complemento"
                     value="<?php echo($complePessoa); ?>"
                     >
            </div>
            <div class="form-group">
               <label for="inputCidade">Cidade:</label>
               <input type="cidade" class="form-control" id="inputCidade" 
                     name="inputCidade" placeholder="Cidade"
                     value="<?php echo($cidadePessoa); ?>"
                     >
                     <div class="form-group">
               <label for="inputEstado">Estado:</label>
               <input type="estado" class="form-control" id="inputEstado" 
                     name="inputEstado" placeholder="Estado"
                     value="<?php echo($estadoPessoa); ?>"
                     >
                     <div class="form-group">
               <label for="inputCEP">CEP:</label>
               <input type="estado" class="form-control .cep-mask" id="inputCEP" 
                     name="inputCEP" placeholder="CEP"
                     value="<?php echo($cepPessoa); ?>"
                     >
                     <div class="form-group">
               <label for="inputDtNasc">Data Nascimento:</label>
               <input type="text" class="form-control date-mask" id="inputDtNasc"  
                     name="inputDtNasc" placeholder="##/##/####"
                     value="<?php echo($dtnascimentoPessoa); ?>"
                     >
                     <div class="form-group">
               <label for="inputTelefone">Telefone:</label>
               <input type="telefone" class="form-control" id="inputTelefone" 
                     name="inputTelefone" placeholder="Telefone"
                     value="<?php echo($telefonePessoa); ?>"
                     >
                     <div class="form-group">
               <label for="inputCell">Celular:</label>
               <input type="celular" class="form-control" id="inputCell" 
                     name="inputCell" placeholder="Celular"
                     value="<?php echo($celularPessoa); ?>"
                     >
            </div>
            <div class="form-group">
               <label for="inputEmail">Email:</label>
               <input type="email" class="form-control" id="inputEmail" 
                     name="inputEmail" placeholder="Email"
                     value="<?php echo($emailPessoa); ?>"
                     >
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