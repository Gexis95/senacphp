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
            <h1> Lista de Posts</h1>
            <a href="index.html" class="botao">Faça um post aqui!</a>
            <a href="busca.html" class="botao">Buscar</a>
            <a href="cadastro.html" class="botao">Cadastrar Usuário</a>  
        </div>
    
        <div class="conteudo">

            <?php 
                $usuario = $_COOKIE["nome"];

                session_start();
                
                foreach($_SESSION["postagens"]as $postagem){
                    echo '<div class="card">';
                    echo "<strong> $usuario: </strong>";
                    echo "$postagem";
                    echo '</div>';
                }
            ?>

        </div>

        <div class="rodape">
        </div>

    </div>
    
</body>
</html>