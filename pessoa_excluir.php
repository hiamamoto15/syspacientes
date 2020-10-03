<?php
   session_start();
   require_once('variaveis.php');
   require_once('conexao.php');

   $id_pessoas = $_GET['idPessoa'];

   //verifico se é vazio:
   if(strlen($id_pessoas) > 0){
      $sql = "DELETE FROM pessoas WHERE id = " .$id_pessoas;
      mysqli_query($conexao_bd, $sql);
   }else{
      //erro!
   }
   mysqli_close($conexao_bd);
   header("location:pessoa_list2.php");
?>