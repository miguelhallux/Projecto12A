<!DOCTYPE html>
<html lang="pt-PT"> <!-- Define que o documento HTML é em HTML5 e está em português de Portugal -->
<head>
    <meta charset="UTF-8"> <!-- Define a codificação de caracteres UTF-8 para o documento, suportando caracteres especiais -->
    <meta name="viewport" content="width=device-width, initial-scale=1.0"> <!-- Garante que o layout é responsivo e se adapta a diferentes tamanhos de tela -->
    <link rel="stylesheet" href="css/style.css"> <!-- Vincula a folha de estilos externa para estilização da página -->
    <title>Detalhes do Jogo</title> <!-- Define o título da página; corrige o erro com um '<' extra no título -->
</head>
<body>
<?php 
    require_once "includes/banco.php"; // Inclui o arquivo 'banco.php' para conexão com o banco de dados, garantindo que é incluído apenas uma vez
?>

<main>
<?php 
$codigo = $_GET['cod'] ?? 0; // Recupera o código do jogo da URL ou atribui 0 se não estiver definido
$search = $banco->query("SELECT * from jogos where cod='$codigo'"); // Realiza uma consulta no banco de dados para buscar detalhes do jogo com o código fornecido
?>
<h1>Detalhes do Jogo</h1> <!-- Título principal da página -->
<table class='detalhes'> <!-- Inicia uma tabela para mostrar os detalhes do jogo -->
<?php 
if(!$search){ // Verifica se a consulta ao banco falhou
    echo "<tr><td>Search falhou! $banco->error</td></tr>"; // Exibe mensagem de erro se a consulta falhar
}
else{
    if($search->num_rows == 1){ // Verifica se a consulta retornou exatamente um resultado
        $registro = $search->fetch_object(); // Obtém o resultado como um objeto
        echo "<tr><td rowspan='3'>capa grande</td>"; // Célula para a capa do jogo, ocupando três linhas
        echo "<td><h2>$registro->nome</h2></td></tr>"; // Exibe o nome do jogo
        echo "<tr><td>descricao</td></tr>"; // Exibe a descrição do jogo
        echo "<tr><td>admin</td></tr>"; // Exibe opções de administração relacionadas ao jogo
    }
}
?>
</table>
</main>

</body>
</html>
