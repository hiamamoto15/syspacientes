<?php
   session_start();
   require_once('variaveis.php');
   require_once('conexao.php');

   //$id_usuario = $_GET["id_usuario"];
   
   //recuperando dados da sessao
   $id_usuario   = $_SESSION["id_usuario"];   
   $tipoAcesso   = $_SESSION["tipo_acesso"]; 
   $nome_usuario = "";

   //validar se codigo do usuario esta na sesao
   if(strlen($id_usuario) == 0){
      header("location: index.php");
   }

   $sql = "SELECT nome FROM usuarios WHERE id = " . $id_usuario;
   $resp = mysqli_query($conexao_bd, $sql);
   if($rows=mysqli_fetch_row($resp)){
      $nome_usuario = $rows[0];
   }   
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
   <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>SysPacientes - Lista de usuários</title>
    <link rel="icon" href="img/favicon/favicon2.ico">
    <script src="js/jquery.min.js"></script>
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/navbar.css" rel="stylesheet">
    <link rel="stylesheet" href="css/sweetalert2.css">
    <script src="js/sweetalert2.js"></script>
    
    
   <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
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
                  <a class="dropdown-item" href="pessoa_list.php">Cadastro de usuários</a>                
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
      <?php
   session_start();
   require_once('variaveis.php');
   require_once('conexao.php');

   $senha       = $_POST["inputPassword"];
   $email       = $_POST["inputEmail"];
   $nome        = $_POST["inputNome"];
   $tipo_acesso = $_POST["lstTipoAcesso"];
   $id_usuario  = $_POST["inputIdUsuario"];
   
   if(strlen($id_usuario) > 0){
      if($id_usuario != 0){
         //atualizar
         $sql = "UPDATE usuarios SET 
                  nome='$nome', 
                  email='$email', 
                  senha='$senha',
                  tipo_acesso= $tipo_acesso
                 WHERE id = $id_usuario";
      }else{
         //insert
         $sql = "INSERT INTO pessoas(   nome,    email,    senha,tipo_acesso)
                               VALUES('$nome', '$email', '$senha',$tipo_acesso)";
      }
      mysqli_query($conexao_bd, $sql);
   }else{
      //erro!
   }
   mysqli_close($conexao_bd);
   header("location:pessoa.php");
   
?>