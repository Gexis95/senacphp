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

        //inserir dados
        if($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['mensagem'])){
            $mensagem = $_POST['mensagem'];

            //forma mais compacta de um if
            //$usuario = $_SESSION['usuario'] ? $_SESSION['usuario'] : 'Anônimo';

            //forma convencional
            if(isset($_SESSION['usuario'])){
                $usuario = $_SESSION['usuario'];

            } else{
                $usuario = 'Anônimo';
            }
            $sql = "INSERT INTO tabela_mensagens(usuario, mensagem) VALUES ('$usuario', '$mensagem')";

            $conexao -> query($sql);
        }
    ?>

    <div class="painel">
        <h1> Senac Connect - Chat com PHP e MYSQL </h1>

        <div class="chat">
            <?php
                //script SQL de seleção
                $sql = "SELECT usuario, mensagem, id FROM tabela_mensagens";

                //armazena todos os resultados
                $resultado = $conexao -> query($sql);

                if($resultado -> num_rows > 0){
                    while($linha = $resultado -> fetch_assoc()){

                        echo '<div class="mensagens">';
                        echo "<p> <b>{$linha['usuario']}</b> {$linha['mensagem']}</p>";

                        echo '</div>';
                    }
                    
                    
                }
                else{
                    echo "<p> Nenhuma mensagem encontrada!</p>";
                }
            ?>
        </div>
        <br>
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