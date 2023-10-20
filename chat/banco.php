<?php
    //fazendo conexão com o banco de dados
    $nomeServidor = "sql207.infinityfree.com"; //localhost
    $username = "if0_35249826"; //root
    $senha = "iQw8H9V9Fr1ZLv"; //""
    $nomeBanco = "if0_35249826_rede_banco";//rede_banco

    //mysqli - driver responsável por conectar com o banco (driverKKKKKKKKKKKKKKKKKKKKKK QUICKBLOOM)
    $conexao = new mysqli($nomeServidor, $username, $senha, $nomeBanco);

    if ($conexao -> connect_error){
        die("Conexão com o banco de dados falhou!". $conexao -> connect_error);
    }
?>