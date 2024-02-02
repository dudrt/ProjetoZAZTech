<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        @import url(style.css);
        @import url('https://fonts.googleapis.com/css2?family=Kanit&family=Nanum+Gothic&family=Raleway&display=swap');
    </style>
    <script src="script.js"></script>
</head>
<body>
    <div class="div_top">
        <a href="../index.php"><img src="https://www.zaztech.com.br/wp-content/uploads/2022/09/Sem-Titulo-1-1.png"
                style="width:200px" /></a>
        <label>Sistema de Controle de Tarefas</label>
    </div>

    <a class="voltar" href="../index.php"><button class="voltar_button">Voltar</button></a>
    <h3>Adicionar Pessoas</h3>
    <form action="add_pessoa_db.php" method="post">
        <input class="name_input" type="text" name="nome" maxlength="100"
            placeholder="Digite o nome da pessoa aqui..."><br>
        <input class="form_button" type="submit" value="Cadastrar">
    </form>

    <h3>Pessoas Cadastradas</h3>

    <table class="show_pessoas">
        <tr class="linha">
            <td class="coluna">ID</td>
            <td class="coluna">Nome</td>
            <td class="coluna">Tarefas</td>
            <td class="coluna">Excluir</td>
        </tr>

        <?php

        include('../call_db.php');
        $query = "SELECT * FROM pessoas";
        $resultado = mysqli_query($banco, $query);

        // Aqui cria a tabela de todas as pessoas
        while ($rows = mysqli_fetch_array($resultado)) {

            $tarefas_atribuidas = "";
            $id = $rows["id"];
            $query_tarefas = "SELECT * FROM tarefas WHERE pessoa_atribuida = $id";
            $resultado_tarefas = mysqli_query($banco, $query_tarefas);
            // Se a pessoa possuir uma tarefa atribuida, aqui é adicionado
            while ($linhas = mysqli_fetch_array($resultado_tarefas)) {

                if ($tarefas_atribuidas == "") {
                    $tarefas_atribuidas = $tarefas_atribuidas . $linhas["nome"];
                } else {
                    $tarefas_atribuidas = $tarefas_atribuidas . ' | ' . $linhas["nome"];
                }

            }
            if ($tarefas_atribuidas == "") {
                $tarefas_atribuidas = "Nenhuma";
            }

            echo '
    <tr>
    <td class="coluna borda">' . $rows["id"] . '</td>
    <td class="coluna borda">' . $rows["nome"] . '</td>
    <td class="coluna borda">' . $tarefas_atribuidas . '</td>
    <td class="coluna borda"><button class="button_del" onclick=(EnviarDelPessoa(' . $rows["id"] . '))>Excluir</button></td>
    </tr>';
        }
        mysqli_close($banco);

        ?>


</body>

</html>