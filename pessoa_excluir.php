<?php
   session_start();
   require_once('variaveis.php');
   require_once('conexao.php');

   $idPessoas = $_GET['idPessoa'];

   //verifico se é vazio:
   if(strlen($idPessoas) > 0){
      $sql = "DELETE FROM pessoas WHERE id = " .$idPessoas;
      mysqli_query($conexao_bd, $sql);
   }else{
      alert("Nao foi possivel remover essa pessoa!");
   }
   mysqli_close($conexao_bd);
   header("location:pessoa_list2.php");
?>