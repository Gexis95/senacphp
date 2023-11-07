<?php
    include 'conexao.php';
    $cpf = $_REQUEST['cpf'];
    $senha = $_REQUEST['senha'];

    $sql = "SELECT * FROM usuario WHERE cpf = '$cpf' AND senha= '$senha' ";

    $resultado = mysqli_query($conexao, $sql);

    $linha = mysqli_fetch_assoc($resultado);
?>