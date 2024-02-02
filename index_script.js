

function EnviarModTarefa(id){
        // Construindo a  URL para redirecionamento contendo o ID da tarefa desejada
        var url = 'mod_tarefa/mod_tarefa.php?id=' + encodeURIComponent(id)

        // Redirecionando para a nova pagina
        window.location.href = url;
}