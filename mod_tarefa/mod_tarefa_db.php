<?php
include('../call_db.php');
$nome = $_POST['nome'];
$desc = $_POST['desc'];
$prioridade = $_POST['prioridade'];
$estado = $_POST['estado'];
$pessoa = $_POST['pessoa_atribuida'];
$id = $_POST["id"];



if($nome == "" || $desc == ""){
    echo '<script>alert("Preencha todos os campos!")
    window.location.href = "mod_tarefa.php"</script>';
    return;
}
// aqui acontece a modificação da tabela
$query="UPDATE tarefas SET nome='$nome',descricao='$desc',prioridade=$prioridade,estado=$estado,pessoa_atribuida=$pessoa WHERE id=$id";

if (mysqli_query($banco, $query)) { //testa se deu certo
    echo '<script>alert("Tarefa modificada com sucesso!")
    window.location.href = "../index.php"</script>';
} else {
    echo '<script>alert("Houve algum erro!")
    window.location.href = "../index.php"</script>';
}

mysqli_close($banco);

?>