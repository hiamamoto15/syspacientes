<?php
   session_start();
   require_once('variaveis.php');
   require_once('conexao.php');

   $id_pessoa = $_POST['inputIdPessoa'];

   
   $nomePessoa          = $_POST["inputNome"];
   $endPessoa           = $_POST["inputEndereco"];
   $numPessoa           = $_POST["inputnumero"];
   $complePessoa        = $_POST["inputcomple"];;
   $cidadePessoa        = $_POST["inputCidade"];
   $estadoPessoa        = $_POST["inputEstado"];
   $cepPessoa           = $_POST["inputCEP"];
   $dtnascimentoPessoa  = $_POST["inputDtNasc"]; 
   $telefonePessoa      = $_POST["inputTelefone"];
   $celularPessoa       = $_POST["inputCell"];
   $emailPessoa         = $_POST["inputEmail"];
   
         if($id_pessoa){
            $sql = "UPDATE pessoas SET 
            nome             ='$nomePessoa', 
            endereco         ='$endPessoa',
            numero           ='$numPessoa,
            complemento      ='$complePessoa,
            cidade           ='$cidadePessoa,
            estado           ='$estadoPessoa,
            cep              ='$cepPessoa,
            datanascimento   ='$dtnascimentoPessoa,
            telefone         ='$telefonePessoa,
            celular          ='$celularPessoa,
            email            ='$emailPessoa'
           WHERE idPessoa = $id_pessoa";
         }else {
         $sql = "INSERT INTO pessoas( nome, endereco, numero, complemento, cidade, estado, cep, datanascimento, telefone, celular, email)
         VALUES('$nomePessoa','$endPessoa','$numPessoa','$complePessoa','$cidadePessoa','$estadoPessoa',$cepPessoa', '$dtnascimentoPessoa','$telefonePessoa', '$celularPessoa', '$emailPessoa')
         ";
         }
   mysqli_query($conexao_bd, $sql);
   mysqli_close($conexao_bd);
   header("location:pessoa_list2.php");
   echo $sql;
   
?>
