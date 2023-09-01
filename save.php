<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Processando Postagem</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

    <div class="painel"> 

        <div class="cabecalho">
            <img width="200px" src="https://upload.wikimedia.org/wikipedia/commons/thumb/8/86/Senac_logo.svg/2560px-Senac_logo.svg.png" alt="">
            <h1>Connect</h1>    
        </div>

        <div class="conteudo"> 
            <h2>Postagem efetuada com Sucesso!</h2>
            <?php
                $usuario = "Felipe Geraldino";
                
                //verifica se a requisição foi feita usando POST
                if($_SERVER ["REQUEST_METHOD"] == "POST"){

                    //obtém o conteúdo da postagem no campo "postagem"
                    $postagem = $_POST["postagem"];
                    echo "$usuario, seu post foi: $postagem";

                }
            ?>
        </div>

        <div class="rodape"> 
            <a href="index.html" class="botao">Faça outra aqui!</a>
            <a href="usuario.html" class="botao">Cadastrar Usuário</a>
            <a href="busca.html" class="botao">Buscar</a>  
        </div>

    </div>
    
</body>
</html>