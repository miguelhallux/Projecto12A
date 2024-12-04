<!DOCTYPE html>
<html lang="pt-pt">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=B, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css">
    <title>Biblioteca de Jogos</title>
    <!--Define a fonte do texto para Tahoma */ -->
</head>


<body>


<?php 
   // Inclui o arquivo 'banco.php' que geralmente contém o código necessário para conectar ao banco de dados.
   // require_once garante que o arquivo seja incluído apenas uma vez, evitando problemas de múltiplas inclusões.
   require_once "includes/banco.php";

   // Inclui o arquivo 'function.php' que deve conter funções auxiliares usadas neste script.
   require_once "includes/function.php";

   // Captura o valor do parâmetro 'o' da URL (representando a ordem desejada de listagem).
   // Utiliza o operador de coalescência nula (??) para definir um valor padrão ('n') caso 'o' não seja fornecido.
   $ordem = $_GET['o'] ?? 'n';
   
   // Explicação do "includes/banco.php":
   // -> Especifica o caminho do arquivo que contém scripts usados frequentemente, como conexões ao banco de dados, configurações, etc.
   // -> O 'banco.php' geralmente contém as credenciais de conexão ao banco (nome do host, usuário, senha, nome do banco) e faz a conexão.

   // Explicação do 'require_once':
   // -> 'require_once' é usado para garantir que o arquivo seja incluído apenas uma vez.
   // -> Ao incluir um arquivo de conexão com o banco de dados, isso previne múltiplas conexões ou redefinições de variáveis.
   // -> Se o arquivo não for encontrado ou falhar ao ser incluído, o script será interrompido (diferente do 'include', que só gera um aviso).
?>

<main>
    <div id="corpo"> <!-- Inicia a seção principal do corpo da página -->
        <?php include_once "header.php"; ?> <!-- Inclui o cabeçalho da página uma única vez. 'header.php' pode conter elementos como o logo e o menu de navegação. -->

        <h1>Escolha o seu Jogo</h1> <!-- Título principal da página -->

        <!-- Formulário de pesquisa para ordenar e filtrar a listagem dos jogos -->
        <form method="get" id="search" action="index8.php">
            Ordenar : 
            <!-- Links que ao serem clicados atualizam a página com um parâmetro 'o' diferente na URL -->
            <a href="index8.php?o=n">Nome </a> | <!-- Ordena por Nome (padrão) -->
            <a href="index8.php?o=p">Produtora </a> | <!-- Ordena por Produtora -->
            <a href="index8.php?o=n1"> Nota Alta </a> | <!-- Ordena por Nota (da mais alta para a mais baixa) -->
            <a href="index8.php?o=n2">Nota Baixa </a> | <!-- Ordena por Nota (da mais baixa para a mais alta) -->

            <!-- Campo de entrada de texto para o filtro adicional (como procurar por um nome específico de jogo ou produtor) -->
            Filtrar : <input type="text" name="c" size="10" maxlength="40"> <!-- Nome do filtro que o usuário quer aplicar -->
            <input type="submit" value="ok"> <!-- Botão para enviar o formulário e aplicar o filtro ou a ordenação -->
        </form>

        <!-- Inicia a tabela que vai listar os jogos -->
        <table class="listagem">

            <?php 
            // Define a consulta SQL inicial que seleciona jogos e suas informações relacionadas.
            // A consulta usa 'JOIN' para relacionar jogos aos gêneros e produtoras.
            $q = "SELECT j.cod, j.capa, j.nome, g.genero, p.produtora FROM jogos j 
                  JOIN generos g ON j.cod_genero = g.cod 
                  JOIN produtoras p ON j.cod_produtora = p.cod ";
            
            // Switch case para determinar a ordem da listagem com base no valor do parâmetro 'ordem' ($ordem).
            switch($ordem) {
                case "p":
                    // Caso 'o' seja 'p', ordena a consulta pela produtora dos jogos.
                    $q .= "ORDER BY p.produtora ";
                    break;
                case "n1":
                    // Caso 'o' seja 'n1', ordena pela pontuação dos jogos, da maior para a menor.
                    $q .= "ORDER BY j.pontuacao DESC ";
                    break;
                case "n2":
                    // Caso 'o' seja 'n2', ordena pela pontuação dos jogos, da menor para a maior.
                    $q .= "ORDER BY j.pontuacao ASC ";
                    break;
                default:
                    // Caso não seja passado valor, ou seja um valor não previsto, ordena por nome do jogo (padrão).
                    $q .= "ORDER BY j.nome ";
                    break;
            }

            // Explicação do Switch-Case:
            // O valor da variável $ordem determina como os registros serão ordenados no banco de dados.
            // Dependendo do valor de $ordem, uma instrução 'ORDER BY' diferente é adicionada à consulta.
            // - 'p': Ordena pela produtora.
            // - 'n1': Ordena pela pontuação dos jogos, em ordem decrescente (da mais alta para a mais baixa).
            // - 'n2': Ordena pela pontuação dos jogos, em ordem crescente (da mais baixa para a mais alta).
            // - default: Se nenhuma das opções anteriores for encontrada, ordena por nome dos jogos (em ordem alfabética).

            // O símbolo '.=' é utilizado para concatenar a string, ou seja, adicionar ao fim da consulta SQL original.
            // Isso permite adicionar diferentes cláusulas 'ORDER BY' dependendo da lógica do código.
    



       $search = $banco->query($q);
      
     // $banco->query("SELECT * FROM jogos ") -> Esta linha é responsável por executar uma consulta SQL no banco de dados através do objeto $banco, que é uma instância da classe mysqli, uma das maneiras mais comuns de interagir com bancos de dados MySQL em PHP. 
         
     // $banco-> Este é o objeto que representa a conexão com o banco de dados. Ele é criado anteriormente no código, usualmente com uma linha que instancia mysqli e conecta ao banco usando detalhes como servidor, nome de usuário, senha e nome do banco.
        
     // ->: Este operador é usado em PHP para acessar métodos ou propriedades de um objeto. Aqui, ele é usado para acessar o método query do objeto $banco.
 
    //  query("SELECT * FROM jogos"): Este é o método que executa uma consulta SQL passada como argumento. A consulta SQL aqui é "SELECT * FROM jogos", que seleciona todos os campos (*) de todas as linhas na tabela jogos do banco de dados. Este tipo de consulta é útil quando você precisa recuperar todas as informações de uma tabela.
 
     // $search: O resultado da consulta SQL é armazenado na variável $search. Este resultado pode ser um objeto que contém os dados retornados pela consulta, que podem ser manipulados ou exibidos conforme necessário. Se a consulta falhar por qualquer motivo (por exemplo, se a tabela não existir), $search será false. 
 
 
 
     
     if (!$search) //Esta condição verifica se a variável $search é false. Se for false, isso geralmente indica que a consulta SQL falhou (por exemplo, devido a um erro de sintaxe SQL ou problemas de conexão com o banco de dados).
         {
         echo "A consulta SQL FALHOU";
         }
     else //Esta é a parte do código que lida com o resultado da consulta quando não há falhas na execução.
         {
         if($search->num_rows == 0) // Verifica se o número de linhas retornadas pela consulta é zero. Se for, significa que a consulta foi bem-sucedida, mas não encontrou nenhum registro que atenda aos critérios da consulta.
             {
             echo "nenhum registo encontrado";
             }
         else //Esta cláusula é executada se houver registros retornados pela consulta.
             {
                 while($registro = $search->fetch_object()) //Este loop itera sobre cada linha de resultado da consulta. O método fetch_object() retorna a próxima linha do resultado como um objeto, onde cada coluna da linha pode ser acessada como uma propriedade do objeto.
                 {
                 
                   $caminhoCapa = thumb($registro->capa);

                 echo "<td><img src='$caminhoCapa'class= mini></td>";  //Exibe a coluna capa na tabela HTML. Em que a capa seja um campo na tabela do banco de dados que está sendo acessada.
                 echo "<td><a href='detalhes.php?cod=$registro->cod'>$registro->nome</a>"; //Exibe a coluna nome.
                 echo "[$registro->genero]";
                 echo "<br>$registro->produtora</TD>";
                 echo "<td>Admin</td></tr>"; //Adiciona uma coluna estática com o texto "Admin". Isto pode ser um placeholder para futuras implementações, como links para ações administrativas relacionadas a cada registro.
                 }
             }
         }
        
        ?>


    </main>





    </table>


    </main>
    </div>

    <?php include_once "footer.php";?>

</body>

</html>
