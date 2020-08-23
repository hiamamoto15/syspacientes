<?php

    $conexao_bd = mysqli_connect (
        "localhost",
        "root",
        "123456",
        "syspacientes");
    
    if(!$conexao_bd){
        echo "NÃO FOI POSSIVEL CONECTAR NO BANCO DE DADOS: ";
        exit;
    }




?>