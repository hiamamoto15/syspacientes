<?php
   session_start();
   require_once('variaveis.php');
   require_once('conexao.php');
   
   
   $id_pessoa = $_POST["inputIdPessoa"];

   $nomePessoa = $_POST["inputNome"];
   $endPessoa = $_POST["inputEndereco"];
   $numeroPessoa  = $_POST["inputNumero"];
   $complePessoa = $_POST["inputcomple"];
   $cidadePessoa  = $_POST["inputCidade"];
   $estadoPessoa = $_POST["inputEstado"];
   $cepPessoa = $_POST["inputCep"];
   $dtnascimentoPessoa = $_POST["inputData"];
   $telefonePessoa = $_POST["inputTelefone"];
   $celularPessoa = $_POST["inputCell"];
   $emailPessoa = $POST["inputEmail"];
   
      if($id_pessoa){
         //atualizar
         $sql = "UPDATE pessoas SET 
                  nome='$nomePessoa',
                  endereco='$endPessoa',
                  numero='$numeroPessoa',
                  complemento = '$complePessoa',
                  cidade = '$cidadePessoa',
                  estado = '$estadoPessoa',
                  cep = '$cepPessoa',
                  datanascimento= '$dtnascimentoPessoa',
                  telefone = '$telefonePessoa',
                  celular = '$celularPessoa'
                  email='$emailPessoa'
               WHERE idPessoa = $id_pessoa";
      }else{
         //insert
         $sql = "INSERT INTO pessoas( nome, endereco, numero, complemento,cidade, estado, cep, datanascimento, , telefone ,  celular, email)
                               VALUES('$nomePessoa', '$endPessoa','$numPessoa','$complePessoa','$cidadePessoa','$estadoPessoa', '$cepPessoa', '$dtnascimentoPessoa', '$telefonePessoa', '$celularPessoa', '$emailPessoa') 
                               ";
      }

   mysqli_query($conexao_bd, $sql);
   mysqli_close($conexao_bd);
   header("location:pessoa_list2.php");
   echo $sql;
   
?>