<?php 
    include '../acesso.php';

    if(isset($_REQUEST['id'])){

        $id = $_REQUEST['id'];
        $descricao = $_REQUEST['descricao'];
        $obs = $_REQUEST['obs'];

        $sql = "UPDATE funcao SET descricao='$descricao', obs='$obs' WHERE id='$id'";

        $resultado = mysqli_query($conexao, $sql);
        // Mandar para página principal. 
        header('Location: ../funcao.php');
    }else {
        header('Location: ../funcao.php');
    }
?>