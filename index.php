<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="icon" href="https://www.zaztech.com.br/wp-content/uploads/2021/01/Z-480x480.png" sizes="192x192">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>@import url(index_style.css);
  @import url('https://fonts.googleapis.com/css2?family=Kanit&family=Nanum+Gothic&family=Raleway&display=swap');
</style>
    <script src="index_script.js"></script>  
</head>
<body>
 
<div class="div_top">
    <img src="https://www.zaztech.com.br/wp-content/uploads/2022/09/Sem-Titulo-1-1.png" style="width:200px"/>
    <label>Sistema de Controle de Tarefas</label>
</div>

<div class=div_main>

<div class="div_options">
    <label class="text_div_options">Outras Funcionalidades</label>
    <a href="add_pessoa/add_pessoa.html"><button class="botao_newfunc">Adicionar Pessoas</button></a>

</div>


<table class="show_tarefas">
<tr class="linha">
    <td class="coluna">Nome Da Tarefa</td>
    <td class="coluna">Prioridade</td>
    <td class="coluna">Estado</td>
    <td class="coluna">Pessoa Atribuída</td>
    </tr>
<?php
 include('call_db.php');
$result_cadastros = "SELECT * FROM tarefas";
$resultado_cadastros = mysqli_query( $banco, $result_cadastros);
$prioridade = ["Baixa","Normal","Alta"];
$estado = ["Pendente","Em andamento","Concluída"];

while ( $rows = mysqli_fetch_array( $resultado_cadastros )){
    $pessoa_atribuida = "";
    if($rows["pessoa_atribuida"]==0){
        $pessoa_atribuida = "Nenhuma";
    }else{
        $id = $rows["pessoa_atribuida"];
        $query = "SELECT nome FROM pessoas WHERE id = $id";
        $result = mysqli_query( $banco, $query);
        $pessoa_atribuida = mysqli_fetch_array($result)["nome"];
        
    }

    echo '
    <tr class="info_tarefa" OnClick="EnviarModTarefa('.$rows["id"].')">
    <td class="coluna borda">'.$rows["nome"].'</td>
    <td class="coluna borda">'.$prioridade[$rows["prioridade"]-1].'</td>
    <td class="coluna borda">'.$estado[$rows["estado"]-1].'</td>
    <td class="coluna borda">'.$pessoa_atribuida.'</td>
    </tr>';
}
echo '</table></div></body></html>';
?>