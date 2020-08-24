<?php
    require_once('variaveis.php');
    require_once('conexao.php');

    $id_usuario = $GET_["id_usuario"];
    $nome_usuario = "";

    $sql = "SELECT nome * FROM usuarios WHERE id = " . $id_usuario;
    $resp = mysqli_query($conexao_bd, $sql);
    if($rows=mysqli_fetch_row($resp)) {
        $nome_usuario = $rows[0];
    }
    mysqli_close($conexao_bd);

?>

<!DOCTYPE html>
<html>
<head>
    <meta charset='utf-8'>
    <meta name='viewport' content='width=device-width, initial-scale=1'>
    <title>SysPacientes - ADM </title>
    <link rel='icon' href="img/favicon/favicon2.ico">
    <link href="css/bootstrap.min.css" rel="stylesheet">
    
        
</head>
<body>
<div class="container">

<!-- Static navbar -->
<nav class="navbar navbar-default">
  <div class="container-fluid">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand" href="#">SysPacientes</a>
    </div>
    <div id="navbar" class="navbar-collapse collapse">
      <ul class="nav navbar-nav">
        <li class="active"><a href="#">Home</a></li>
        <li><a href="#">Contato</a></li>
        <li><a href="#">Sobre</a></li>
      </ul>
    </div><!--/.nav-collapse -->
  </div><!--/.container-fluid -->
</nav>

<!-- Main component for a primary marketing message or call to action -->
<div class="jumbotron">
  <h1>
  <?php 
    echo "<h3>Bem vindo: ". $nome_usuario . "</h3> ";
    ?>
  </h1>
  <p>Esta é a sua pagina principal. Aqui voce pode.......</p>
  <p>
    <a class="btn btn-lg btn-primary" href="../../components/#navbar" role="button"> Clique para saber mais &raquo;</a>
  </p>
</div>

</div> <!-- /container -->
       
</body>
</html>