<?php
    $email = $_POST["inputEmail"];
    $senha = $_POST["inputPassword"];

    if(strlen($senha) < 6 ){
        echo "Senha menor que 6 caracteres";
    }
    else if(strlen($senha) > 7) {
        echo "Senha maior que 6 caracteres";
    }
    echo "<hr>";
    echo "Email: " . $email. "<br>";
    echo "Senha: " . $senha;

?>