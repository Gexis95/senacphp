<?php 
    include '../conexao.php';

    $id =$_REQUEST['id'];

    $sql = "DELETE FROM agenda WHERE agenda.id ='$id'";
    
    $resultado = mysqli_query($conexao, $sql) or die("Erro ao excluir");

    header('location:../agenda.php');
?>