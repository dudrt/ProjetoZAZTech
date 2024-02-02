<?php

include('../call_db.php');

$id = $_GET['id'];
// aqui é deletado uma tarefa
$query = "DELETE FROM tarefas WHERE id=$id";
if (mysqli_query($banco, $query)) { //testa se deu certo

    echo '<script>alert("Tarefa deletada com sucesso!");window.location.href = "../index.php"</script>';
} else {
    echo '<script>alert("Houve algum erro!");window.location.href = "add_pessoa.php"</script>';
}
mysqli_close($banco);


?>