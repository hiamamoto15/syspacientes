<?php
    require_once('variaveis.php');
    require_once('conexao.php');
    
    

    $email = $_POST["inputEmail"];
    $senha = $_POST["inputPassword"];
    $validou = true;
    $erro = " ";

    //validar login

    $sql = "SELECT * FROM usuarios WHERE email = '$email'";
    $resp =mysqli_query($conexao_bd, $sql);

    if($rows=mysqli_fetch_row($resp)){
        echo $rows[0] . " | " . $rows[1] . " | " . $rows[2];
    }
    mysqli_close($conexao_bd);

    if(strlen($senha) < 6 ){
        $erro = "Senha menor que 6 caracteres";
        $validou = false;
    }
    else if(strlen($senha) > 6) {
        $erro = "Senha maior que 6 caracteres";
        $validou = false;
    }
    if($validou) {
    echo "<hr>";
    echo "Email: " . $email. "<br>";
    echo "Senha: " . $senha;
    }else {
        header("location:index.php?erro=$erro");
    }

?>