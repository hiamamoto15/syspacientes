<?php

    $conexao_bd = mysqli_connect (
        "localhost",
        "root",
        "123456",
        "syspacientes");
    
    if(!$con){
        echo "NÃO FOI POSSIVEL CONECTAR NO BANCO DE DADOS: ";
        exit;
    }
    



?>