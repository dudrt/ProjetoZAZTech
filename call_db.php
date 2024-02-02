<?php
// Apenas um código para se conectar ao banco de dados
$servidor='localhost';
$usuario = 'root';
$senha='';
$dbname='controle_tarefa';
$banco = mysqli_connect($servidor,$usuario,$senha,$dbname);
    if(!$banco){
        die('ouve um erro: '.mysqli_connect_error());
    }
?>