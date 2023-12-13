<?php
include 'conexao.php';
include 'resources/valida.php';

$destino = "./agenda/inserir.php";

//se for diferente de vazio, ao receber um código de alteração
if (!empty($_GET['alteracao'])) {
    $id = $_GET['alteracao'];

    //selecionar o id escolhido para começar a alteração
    $sql = "SELECT * FROM agenda WHERE id='$id'";
    $dados = mysqli_query($conexao, $sql); //executa codigo sql
    $agendas = mysqli_fetch_assoc($dados); //variavel tem registros separados em colunas

    $destino = "./agenda/alterar.php";
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
                        <form action="./agenda/lancar.php" method="POST">

                            <div class="form-group">
                                <label>Id</label>
                                <input name="id" value="<?php echo isset($agendas) ? $agendas['id'] : '' ?>" type="text"
                                    class="form-control" placeholder="Id">
                            </div>

                            <div class="row">
                                <div class="col">
                                    <div class="form-group">
                                        <label>Data de Início</label>
                                        <input name="data_inicio" value="<?php echo isset($agendas) ? $agendas['data_inicio'] : '' ?>"
                                            type="date" class="form-control">
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="form-group">
                                        <label>Data de Término</label>
                                        <input name="data_fim" value="<?php echo isset($agendas) ? $agendas['data_fim'] : '' ?>"
                                            type="date" class="form-control">
                                    </div>
                                </div>
                            </div>

                            <div class="form-group">
                                <label> Dias </label><br>
                                <input type="checkbox" name="dias_semana[]" value="sunday"> Domingo -
                                <input type="checkbox" name="dias_semana[]" value="monday"> Segunda -
                                <input type="checkbox" name="dias_semana[]" value="tuesday"> Terça -
                                <input type="checkbox" name="dias_semana[]" value="wednesday"> Quarta -
                                <input type="checkbox" name="dias_semana[]" value="thursday"> Quinta -
                                <input type="checkbox" name="dias_semana[]" value="friday"> Sexta -
                                <input type="checkbox" name="dias_semana[]" value="saturday"> Sábado

                            <div class="row">
                                <div class="col">
                                    <div class="form-group">
                                        <label> Hora de Inicio </label>
                                        <input name="hora_inicio" type="time" value="<?php echo isset($agendas) ? $agendas['hora_inicio']: '' ?>" class="form-control" placeholder="Sua descrição">
                                    </div>
                                </div>

                                <div class="col">
                                    <div class="form-group">
                                        <label> Hora de Término </label>
                                        <input name="hora_fim" type="time" value="<?php echo isset($agendas) ? $agendas['hora_fim']: '' ?>" class="form-control" placeholder="Sua descrição">
                                    </div>
                                </div>
                            </div>

                            <div class="form-group">
                                <label>Curso</label>
                                <input name="curso" value="<?php echo isset($agendas) ? $agendas['curso'] : '' ?>"
                                    type="text" class="form-control" placeholder="Curso">
                            </div>

                            <div class="form-group">
                                <label>Código</label>
                                <input name="codigo" value="<?php echo isset($agendas) ? $agendas['codigo'] : '' ?>"
                                    type="text" class="form-control" placeholder="Código">
                            </div>

                            <div class="form-group">
                                <label>Observação</label>
                                <input name="obs" value="<?php echo isset($agendas) ? $agendas['obs'] : '' ?>"
                                    type="text" class="form-control" placeholder="Observação">
                            </div>

                            <div class="form-group">
                                <label>Funcionario</label>
                                <select class="form-control" name="funcionario"> 
                                    <option value="">Selecione</option>
                                    <?php
                                        $slq = "SELECT * FROM funcionario";
                                        $dados = mysqli_query($conexao, $slq);

                                        while($linha = mysqli_fetch_assoc($dados)){
                                            echo "<option value='".$linha['id']."'>".$linha['nome']."</option>";
                                        }
                                    ?>
                                </select>
                            </div>

                            <button type="submit" class="btn btn-primary">Enviar 
                                <i class="fa-solid fa-share-from-square"></i>
                            </button>
                            
                            
                        </form>
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