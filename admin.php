<?php
    require_once('variaveis.php');
    require_once('conexao.php');

    $id_usuario = $_GET["id_usuario"];
    $nome_usuario = "";

    $sql = "SELECT nome FROM usuarios WHERE id = " . $id_usuario;
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
            <ul class="nav navbar-nav navbar-right">
              <li class="active"><a href="./">Status <span class="sr-only">(current)</span></a></li>
              <li><a href="../navbar-static-top/">Receitas</a></li>
              <li><a href="../navbar-fixed-top/">Situação</a></li>
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
        <p>Esta plaforma está em manutenção! Aguarde por novos procedimentos!!.</p>
        <p>
          <a class="btn btn-lg btn-primary" href="../../components/#navbar" role="button">Acessar &raquo;</a>
        </p>
      </div>

    </div>
        <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="https://code.jquery.com/jquery-1.12.4.min.js" integrity="sha384-nvAa0+6Qg9clwYCGGPpDQLVpLNn0fRaROjHqs13t4Ggj3Ez50XnGQqc/r8MhnRDZ" crossorigin="anonymous"></script>
    <script>window.jQuery || document.write('<script src="../../assets/js/vendor/jquery.min.js"><\/script>')</script>
    <script src="../../dist/js/bootstrap.min.js"></script>
    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <script src="../../assets/js/ie10-viewport-bug-workaround.js"></script>

    
</body>
</html>