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
      <a class="navbar-brand" href="#">SysPacientes</a>
    </div>
   

<!-- Main component for a primary marketing message or call to action -->
<div class="jumbotron">
  <h1><?php echo "<h3>Bem vindo: ". $nome_usuario . "</h3> "; ?></h1>
  <p>Esta é sua pagina principal, nela você pode...</p>
  <p>
    <a class="btn btn-lg btn-primary" href="https://www.youtube.com/watch?v=dQw4w9WgXcQ" role="button">Clique para saber mais &raquo;</a>
  </p>
</div>

</div> <!-- /container -->
    
</body>
</html>