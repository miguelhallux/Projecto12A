<!DOCTYPE html>
<html lang="pt-PT"> <!-- Define que o documento é em português de Portugal -->
<head>
    <meta charset="UTF-8"> <!-- Define a codificação de caracteres do documento como UTF-8 -->
    <meta name="viewport" content="width=device-width, initial-scale=1.0"> <!-- Torna o site responsivo, ajustando o layout em dispositivos móveis -->
    <link rel="stylesheet" href="css/style.css"><!-- Vincula uma folha de estilos CSS externa -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@24,400,0,0" />
    <title>Detalhes do Jogo<</title> <!-- Título da página que aparece na aba do navegador -->
</head>
<body>
<?php 
    // Inclui o arquivo "banco.php", que contém as funções de conexão ao banco de dados
    // 'require_once' garante que o arquivo será incluído apenas uma vez e, se houver erro, o script para de executar (erro fatal)
    require_once "includes/banco.php";

    require_once "includes/function.php";
    ?>

<main>

<h1>Detalhes do Jogo</h1> <!-- Título principal da página -->


<table class="detalhes">
<?php

// Pega o valor do parâmetro 'cod' da URL, se ele existir
// Se 'cod' não estiver presente, a variável '$c' será igual a 0 (valor padrão)
$c = $_GET['cod'] ?? 0;

// Exibe o valor de '$c'
//echo $c;
// Executa uma consulta SQL para selecionar todos os registros da tabela 'jogos' ordenada pelo nome
$search = $banco->query("SELECT * FROM jogos WHERE cod='$c'");

// Verifica se a consulta falhou
if(!$search){
    // Exibe uma mensagem de erro caso a consulta não tenha sido bem-sucedida
    echo "<tr><td>Infelizmente não há registos";
} else {
    // Verifica se o número de registros retornados pela consulta é igual a 0
    if($search->num_rows == 0){ 
        // Exibe uma mensagem se não houver nenhum jogo na base de dados
        echo "<tr><td>Infelizmente tem zero registos";
    }
    else {
        // Caso haja registros, utiliza um loop 'while' para exibir cada jogo
        while($registo = $search->fetch_object()){
            // Exibe a capa e o nome do jogo (assumindo que 'capa' e 'nome' são colunas da tabela 'jogos')
            //echo "<tr><td>$registo->capa<td>$registo->nome<td>Admin";
            //echo "<tr><td><img src='capas/$registo->capa' class='mini'><td>$registo->nome<td>Admin";
            
            
            // Usa a função 'thumb' para verificar se a imagem da capa existe ou se deve mostrar uma imagem padrão
            $t = thumb($registo->capa);

// Exibe uma linha na tabela com a capa do jogo, o nome do jogo e a palavra 'Admin'

echo "<tr><td rowspan='3'><img src=$t class='full'/>";// '$t' é o caminho para a imagem da capa (ou a imagem padrão, se a capa estiver ausente)
echo "<td><h2>$registo->nome</h2>";
echo "Nota: $registo->pontuacao";// Exibe uma linha na tabela com o nome do jogo, tem uma ancora para linkar á pagina.php
echo "<tr><td>$registo->descricao"; // Exibe uma linha na tabela com a palavra 'Admin'
echo "<tr><td>Admin"; 
        }
    }
}


?>


</table>
<? echo voltar() ?>
</main>

</body>
</html>
