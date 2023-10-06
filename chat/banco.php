<?php
    //fazendo conexão com o banco de dados
    $nomeServidor = "localhost";
    $username = "root";
    $senha = "";
    $nomeBanco = "rede_banco";

    //mysqli - driver responsável por conectar com o banco (driverKKKKKKKKKKKKKKKKKKKKKK QUICKBLOOM)
    $conexao = new mysqli($nomeServidor, $username, $senha, $nomeBanco);

    if ($conexao -> connect_error){
        die("Conexão com o banco de dados falhou!". $conexao -> connect_error);
    }
?>