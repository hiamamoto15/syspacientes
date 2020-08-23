<?php
    // echo "boa noite!";
    /*
    $con = mysqli_connect(
        "localhost",
        "root",
        "123456",
        "syspacientes");
    if(!$con){
        echo "Error:" .PHP_EOL;
        exit;
    }
    echo "Conectou!!!";
    echo "<br>";
    echo "Informações do host: " . 
        mysqli_get_host_info($con);
        mysqli_close($con);
      
        $nome = $_GET["nome"];
    $sobrenome = $_GET["sobrenome"];
    echo "O Nome é: " .$nome. " " .$sobrenome;
        */
$onload = "";        
$erro = $_GET['erro'];

if(strlen($erro) > 0) {
    $onload = "onload= 'alert(\'$erro\')'";
}
?>
<!DOCTYPE html>
    <html lang="pt-br">
    <head>
    <meta charset="UTF-8">
    <meta name="viewport" content=""width=device-width, initial-scale=1.0">
    <title> syspacientes </title>
    <link rel="icon" href="img/favicon/favicon1.cio">
    <!-- Bootstrap core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <!-- Custom styles for this template -->
    <link href="css/login.css" rel="stylesheet">
    <script type="text/javascript">
    function validaTela() {
        var resposta = true;
        var senha = document.getElementById("inputPassword");
        if(senha.lenght == 0) {
            alert("Digite sua senha.");
            resposta = false;
        }
            else if(senha.length > 6){
                alert("Senha maior que 6 caracteres");
                resposta = false;
            }
        }
        return resposta;
    }
    </script>
    </head>
    <body class="text-center" <?php> echo $onload; ?> >
    <form class="form-signin"
        method="post"
        action="redirect.php"
        onsubmit="return validaTela()"

    >
      <img class="mb-4" src="img/login.png" alt="" width="80" height="72">
      <h1 class="h3 mb-3 font-weight-normal">Insira suas credênciais</h1>
      <label for="inputEmail" class="sr-only">Email</label>
      <input type="email" id="inputEmail" name="inputEmail" class="form-control" placeholder="Endereço de Email" required autofocus>
      <label for="inputPassword" class="sr-only">Senha</label>
      <input type="password" id="inputPassword" name="inputPassword" class="form-control" placeholder="Password" required>
      <div class="checkbox mb-3">

      </div>
      <button class="btn btn-lg btn-primary btn-block" type="submit">Sign in</button>
      <p class="mt-5 mb-3 text-muted">Trend Softwares &copy; 2017-2018</p>
    </form>
  </body>
    </html>

