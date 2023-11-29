<?php
include 'conexao.php';
include 'resources/valida.php';

$destino = "./funcao/inserir.php";

//se for diferente de vazio, ao receber um código de alteração
if (!empty($_GET['alteracao'])) {
    $id = $_GET['alteracao'];

    //selecionar o id escolhido para começar a alteração
    $sql = "SELECT * FROM funcao WHERE id='$id'";
    $dados = mysqli_query($conexao, $sql); //executa codigo sql
    $funcaos = mysqli_fetch_assoc($dados); //variavel tem registros separados em colunas

    $destino = "./funcao/alterar.php";
}
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Página Principal</title>
    <link rel="stylesheet" href="resources\style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css"
        integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css"
        integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/jquery.dataTables.css">
</head>

<body style="background-color: #222222">
    <?php include('nav.php'); ?>

    <div class="container-fluid">
        <div class="row">
            <div class="col-md-3 menu animate__animated animate__fadeInLeft">
                <?php include 'menu.php'; ?>
            </div>

            <div class="col-md-9">

                <div class="row">
                    <div class="col-md cartao">
                        <h2>Cadastro/Alteração</h2>
                        <form action="<?= $destino; ?>" method="POST">

                            <div class="form-group">
                                <label>Id</label>
                                <input name="id" value="<?php echo isset($funcaos) ? $funcaos['id'] : '' ?>" type="text"
                                    class="form-control" placeholder="Id">
                            </div>

                            <div class="form-group">
                                <label>Descrição</label>
                                <input name="descricao" value="<?php echo isset($funcaos) ? $funcaos['descricao'] : '' ?>"
                                    type="text" class="form-control" placeholder="Descrição">
                            </div>

                            <div class="form-group">
                                <label>Observação</label>
                                <input name="obs" value="<?php echo isset($funcaos) ? $funcaos['obs'] : '' ?>"
                                    type="text" class="form-control" placeholder="Observação">
                            </div>
                            <button type="submit" class="btn btn-primary">Enviar <i class="fa-solid fa-share-from-square"></i></button>
                        </form>
                    </div>

                    <div class="col-md cartao">
                        <h1>Listagem</h1>
                        <table class="table table-striped table-dark" id="tabela">
                            <thead>
                                <tr>
                                    <th scope="col">ID</th>
                                    <th scope="col">Descrição</th>
                                    <th scope="col">Observação</th>
                                    <th scope="col">Alterar</th>
                                    <th scope="col">Excluir</th>
                                </tr>
                            </thead>
                            <tbody>


                                <?php
                                $sql = "SELECT * FROM funcao";
                                $resultado = mysqli_query($conexao, $sql);
                                while ($coluna = mysqli_fetch_array($resultado)) {
                                    ?>
                                    <tr>
                                        <th scope="row">
                                            <?php echo $coluna['id']; ?>
                                        </th>
                                        <td>
                                            <?php echo $coluna['descricao']; ?>
                                        </td>
                                        <td>
                                            <?php echo $coluna['obs']; ?>
                                        </td>
                                        <td> <a href="funcao.php?alteracao=<?= $coluna['id'] ?>"> <i class="fa-solid fa-pencil"></i> </a> </td>
                                        <td><a href="<?php echo "./funcao/excluir.php?id=" . $coluna['id']; ?>"><i class="fa-solid fa-trash"></i></a>
                                        </td>

                                    <?php } ?>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>

            </div>
        </div>
    </div>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.js"
        integrity="sha512-+k1pnlgt4F1H8L7t3z95o3/KO+o78INEcXTbnoJQ/F2VqDVhWoaiVml/OEHv9HsVgxUaVW+IbiZPUJQfF/YxZw=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"
        integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49"
        crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"
        integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy"
        crossorigin="anonymous"></script>
    <script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.js"></script>
    <script src="resources\script.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/0.9.0/jquery.mask.min.js"
        integrity="sha512-oJCa6FS2+zO3EitUSj+xeiEN9UTr+AjqlBZO58OPadb2RfqwxHpjTU8ckIC8F4nKvom7iru2s8Jwdo+Z8zm0Vg=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script>
        $("body").on('click', '.botaoMostrar', function () {

            $(this).toggleClass("fa-eye fa-eye-slash");

            var input = $("#campoSenha");
            if (input.attr("type") === "password") {
                input.attr("type", "text");
            } else {
                input.attr("type", "password");
            }

        });
    </script>
    <script>
        $(document).ready(function () {
            $('#cpf').mask('000.000.000-00');
        });
    </script>
</body>
</body>

</html>