<?php
include('../call_db.php');  
$nome = $_POST['nome'];
$desc = $_POST['desc'];
$prioridade = $_POST['prioridade'];
$estado = $_POST['estado'];
$pessoa = $_POST['pessoa_atribuida'];

if($nome == "" || $desc == ""){
    echo '<script>alert("Preencha todos os campos!")
    window.location.href = "add_tarefa.php"</script>';
    return;
}

// aqui é adicionado uma tarefa no banco de dados
$query = "INSERT INTO tarefas (nome,descricao,prioridade,estado,pessoa_atribuida) 
VALUES('$nome','$desc','$prioridade','$estado','$pessoa')";
if (mysqli_query($banco, $query)) { //testa se deu certo
    echo '<script>alert("Tarefa cadastrada com sucesso!")
    window.location.href = "../index.php"</script>';
} else {
    echo '<script>alert("Houve algum erro!")
    window.location.href = "../index.php"</script>';
}

mysqli_close($banco);

?>