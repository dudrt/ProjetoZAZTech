<?php
include('../call_db.php');
$nome = $_POST['nome'];


$query = "INSERT INTO pessoas (nome) VALUES('$nome')";
if(mysqli_query($banco,$query)){//testa se deu certo
    echo '<script>alert("Usuário cadastrado com sucesso!")
    window.location.href = "add_pessoa.php"</script>';
}else{
    echo '<script>alert("Houve algum erro!")
    window.location.href = "add_pessoa.php"</script>';
}

mysqli_close($banco);

?>