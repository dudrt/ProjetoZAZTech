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

</head>

<body>

    <div class="div_top">
        <a href="../index.php"><img src="https://www.zaztech.com.br/wp-content/uploads/2022/09/Sem-Titulo-1-1.png"
                style="width:200px" /></a>
        <label>Sistema de Controle de Tarefas</label>
    </div>

    <a class="voltar" href="../index.php"><button class="voltar_button">Voltar</button></a>

    <form action="add_tarefa_db.php" method="post">
        <div class="div_form_main">
            <div class="div_left">
                <label for="nome">Digite o nome da Tarefa</label>
                <input class="input_nome" id="nome" type="text" placeholder="Nome da Tarefa..." name="nome"
                    maxlength="100">
                <label for="desc">Descrição da Tarefa</label>
                <textarea class="input_desc" type="text" id="desc" Placeholder="Descrição..." name="desc"
                    maxlength="1000"></textarea>
            </div>
            <div class="div_right">
                <label for="prioridade">Escolha a prioridade.</label>
                <select name="prioridade" id="prioridade">
                    <option value="1">Baixa</option>
                    <option value="2">Normal</option>
                    <option value="3">Alta</option>
                </select>
                <label for="estado">Escolha o estado da tarefa.</label>
                <select name="estado" id="estado">
                    <option value="1">Pendente</option>
                    <option value="2">Em andamento</option>
                    <option value="3">Concluído</option>
                </select>
                <label for="pessoa">Atribua uma pessoa para esta tarefa.</label>
                <select name="pessoa_atribuida" id="pessoa">
                    <option value="0">Ninguém</option>

                    <?php
                    include('../call_db.php');

                    $query = "SELECT * FROM pessoas";
                    $resultado = mysqli_query($banco, $query);

                    //Pegar todas as pessoas registradas
                    while ($pessoa = mysqli_fetch_array($resultado)) {

                        $tarefas_atribuidas = 0;
                        $id = $pessoa["id"];
                        // procuro por tarefas vinculadas a essa pessoa
                        $query_tarefas = "SELECT * FROM tarefas WHERE pessoa_atribuida = $id";
                        $resultado_tarefas = mysqli_query($banco, $query_tarefas);
                        while ($linhas = mysqli_fetch_array($resultado_tarefas)) {
                            // verifico quantas tarefas ela possui
                            $tarefas_atribuidas += 1;

                        }
                        // caso for menos que 3 ela pode aparecer para uma nova tarefa
                        if ($tarefas_atribuidas < 3) {
                            echo ' <option value="' . $pessoa["id"] . '">' . $pessoa["id"] . ' - ' . $pessoa["nome"] . '</option>';
                        }
                    }

                    mysqli_close($banco);
                    ?>
                </select>
                <div class="button_div">
                    <a href="../index.php"><input class="botao" type="button" style="cursor:pointer ;"
                            value="Cancelar"></a>
                    <input class="botao" type="submit" style="cursor:pointer ;" value="Registrar">
                </div>
            </div>
        </div>
    </form>
</body>

</html>