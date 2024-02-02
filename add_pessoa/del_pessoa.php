<?php

include('../call_db.php');

$id = $_GET['id'];

// Aqui a pessoa é deletada
$query="DELETE FROM pessoas WHERE id=$id";
if(mysqli_query($banco, $query)){//testa se deu certo

    $query_tarefa="UPDATE tarefas SET pessoa_atribuida=0 WHERE pessoa_atribuida=$id";
    mysqli_query($banco,$query_tarefa);

    echo '<script>alert("Usuário deletado com sucesso!");window.location.href = "add_pessoa.php"</script>';
} else{
    echo '<script>alert("Houve algum erro!");window.location.href = "add_pessoa.php"</script>';
}
mysqli_close($banco);


?>