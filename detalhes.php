<!DOCTYPE html>
<html lang="pt-PT"> <!-- Define que o documento HTML será interpretado como HTML5 e está em português de Portugal -->
<head>
    <meta charset="UTF-8"> <!-- Define o conjunto de caracteres Unicode UTF-8, suportando a maioria das linguagens escritas -->
    <meta name="viewport" content="width=device-width, initial-scale=1.0"> <!-- Assegura que a página é visível de forma adequada em todos os dispositivos e escalas de forma apropriada ao tamanho do dispositivo -->
    <link rel="stylesheet" href="css/style.css"> <!-- Link para a folha de estilo externa que define a apresentação visual da página -->

    <title>Detalhes do Jogo<</title> <!-- Define o título que será mostrado na aba do navegador; contém um erro com um '<' a mais -->
</head>
<body>
<?php 
    require_once "includes/banco.php"; // Inclui o script PHP "banco.php" uma única vez durante a execução, utilizado para conexão com o banco de dados
?>

<main>
<?php 
$codigo = $_GET['cod'] ?? 0; // Atribui à variável $codigo o valor recebido via GET com a chave 'cod', se não houver valor, atribui 0
$search = $banco->query("SELECT * from jogos where cod='$codigo'"); // Executa uma consulta SQL que busca todos os dados de um jogo com o código especificado

?>
<h1>Detalhes do Jogo</h1> <!-- Título principal da página dentro do elemento <main> -->
<table class='detalhes'> <!-- Início da tabela para exibir detalhes do jogo -->
    <tr> <!-- Primeira linha da tabela -->
<td rowspan="3">capa grande</td> <!-- Célula que ocupa três linhas, 
 para mostrar a capa do jogo -->
<td>nome do jogo </td></tr> <!-- Célula adjacente que deveria mostrar o nome do jogo -->

<tr><td>descricao</td> <!-- Segunda linha, célula para descrição do jogo -->
<tr><td>admin</td> <!-- Terceira linha, célula para mostrar informações do administrador ou ações administrativas disponíveis -->

</tr>
</table>

</main>

</body>
</html>
