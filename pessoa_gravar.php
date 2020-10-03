<?php
   session_start();
   require_once('variaveis.php');
   require_once('conexao.php');
   
   
   $idPessoa= $_POST["inputIdPessoa"];

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
   
      if($idPessoa){
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
                  celular = '$celularPessoa',
                  email='$emailPessoa'
               WHERE idPessoa = $idPessoa";
      }else{
         //insert
         $sql = "INSERT INTO pessoas( nome, endereco, numero, complemento,cidade, estado, cep, datanascimento, , telefone ,  celular, email)
                               VALUES('$nomePessoa', '$endPessoa','$numeroPessoa','$complePessoa','$cidadePessoa','$estadoPessoa', '$cepPessoa', '$dtnascimentoPessoa', '$telefonePessoa', '$celularPessoa', '$emailPessoa', '$emailPessoa') 
                               ";
      }

   mysqli_query($conexao_bd, $sql);
   mysqli_close($conexao_bd);
   header("location:pessoa_list2.php");
   
?>