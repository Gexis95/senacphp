<?php
    include 'conexao.php';
    $cpf = $_REQUEST['cpf'];
    $senha = $_REQUEST['senha'];

    $sql = "SELECT * FROM usuario WHERE cpf = '$cpf' AND senha= '$senha' ";

    $resultado = mysqli_query($conexao, $sql);

    //busca uma linha específica e carrega só essse unico registro, em lista
    $coluna = mysqli_fetch_assoc($resultado);

    //se o numero de registros de resultados na busca for maior que zero
    if (mysqli_num_rows($resultado) > 0) {
        session_start();
        $_SESSION['usuario'] = $coluna['nome'];
        $_SESSION['cpf'] = $coluna['cpf'];
        $_SESSION['senha'] = $coluna['senha'];

        header('location:principal.php');
    } else {
        session_unset();
        session_destroy();
        header('location:index.php');

    }
?>