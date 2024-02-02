


function EnviarDelPessoa(id){
    // Construindo a  URL para redirecionamento contendo o ID da pessoa
    var url = 'del_pessoa.php?id=' + encodeURIComponent(id)

        // Redirecionando para a nova pagina
        window.location.href = url;
}