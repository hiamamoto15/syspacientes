<?php
    $email = $_POST["inputEmail"];
    $senha = $_POST["inputPassword"];
    $validou = true;
    $erro = " ";
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