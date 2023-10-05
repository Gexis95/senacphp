<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Postagens</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

    <div class="painel">

        <div class="cabecalho">
            <h1>Definição de Cookie</h1>
            <a href="index.html" class="botao">Faça um post aqui!</a>
            <a href="list.php" class="botao">Lista de Posts</a>
        </div>
    
        <div class="conteudo">
        
            <?php
                //verifica se a requisição é post 
                if($_SERVER["REQUEST_METHOD"]== "POST"){
                    $nome = $_POST["usuario"];

                    setcookie("nome", $nome, time() + 86400 * 30, "/");

                    echo "Seu nome de usuário foi definido com sucesso. <br>";
                    echo "Nome de Usuário: $nome";
                }else{
                    echo "Erro na requisição (não é post)";
                }
            ?>
        </div>

        <div class="rodape">
        </div>

    </div>
    
</body>
</html>