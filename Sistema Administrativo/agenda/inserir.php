<?php
include '../conexao.php';

$data = $_REQUEST['data'];
$hora_inicio = $_REQUEST['hora_inicio'];
$hora_fim = $_REQUEST['hora_fim'];
$curso = $_REQUEST['curso'];
$codigo = $_REQUEST['codigo'];
$obs = $_REQUEST['obs'];
$funcionario = $_REQUEST['funcionario'];

$sql = "INSERT INTO agenda 
    (data, hora_inicio, hora_fim, curso, codigo, obs, funcionario)
    VALUES ('$data', '$hora_incio', '$hora_fim', '$curso', '$codigo', '$obs', '$funcionario')";

$resultado = mysqli_query($conexao, $sql) or die("Erro ao inserir");

header('Location: ../agenda.php');
?>