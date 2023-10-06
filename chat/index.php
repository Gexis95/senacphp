<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Chat</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <?php 
        include "banco.php"; //importa o banco.php, similar ao link
        session_start();

        //mudar nome de usuário
        if($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['usuario'])){
            $_SESSION['usuario'] = $_POST['usuario'];
        }
    ?>

    <div class="painel">
        <h1> Senac Connect - Chat com PHP e MYSQL </h1>

        <div class="chat">

        </div>
        <form method="POST" action="">
            <input type="text" name="mensagem" placeholder="Digite sua mensagem">
            <button type="submit">Enviar Mensagem</button>
        </form>

        <form method="POST" action="">
            <input type="text" name="usuario" placeholder="Insira seu nome de usuário">
            <button type="submit">Atualizar nome</button>
        </form>
    </div>
</body>
</html>