<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Média</title>
</head>
<body>

    <h1>Calculando média</h1>

    <?php
        //lista de notas
        $notasAluno1 = array(9.5, 8.7, 7.8);
        $notasAluno2 = array(6.5, 5.2, 4.9);
        $notasAluno3 = array(7.0, 8.5, 6.7);

        //processamento de dados
        function calcularMedia($notas){
            //$soma = array_sum($notas);
            $soma = 0;
            $quantidade = count($notas); //contando quantos itens existem na lista
            for($i=0; $i < $quantidade; $i++){
                $soma = $soma + $notas[$i];
            }

            if($quantidade > 0){
                return $soma / $quantidade;
            }else{
                return 0;
            }
        }

        $mediaAluno1 = calcularMedia($notasAluno1);
        $mediaAluno2 = calcularMedia($notasAluno2);
        $mediaAluno3 = calcularMedia($notasAluno3);
            
        //saída - imprimindo, colocando em formato numérico brasileiro
        $mediaAluno1 = number_format($mediaAluno1, 2, ',','.');
        $mediaAluno2 = number_format($mediaAluno2, 2, ',','.');
        $mediaAluno3 = number_format($mediaAluno3, 2, ',','.');

        echo "<br> Média do aluno 1: $mediaAluno1";
        echo "<br> Média do aluno 2: $mediaAluno2";
        echo "<br> Média do aluno 3: $mediaAluno3";

        $alunos = array(
            "José" => $mediaAluno1,
            "Maria" => $mediaAluno2,
            "Julio" => $mediaAluno3
        );

        foreach($alunos as $aluno => $media){
            if($meida >= 6){
                echo "<br>$aluno foi aprovado";
            }else{
                echo "<br> $aluno foi reprovado";
            }
        }
    ?>

</body>
</html>