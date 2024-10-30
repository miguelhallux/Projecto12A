<!DOCTYPE html>
<html lang="pt-pt">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=B, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css">
    <title>Biblioteca de Jogos</title>  <!--Define a fonte do texto para Tahoma */ -->
</head>
<?php 
/**
 * Função para determinar o caminho correto da capa de um jogo.
 *
 * Esta função verifica se o arquivo de capa especificado existe no servidor.
 * Se o arquivo não existir ou se o parâmetro fornecido for nulo ou vazio,
 * a função retorna um caminho para uma imagem de capa indisponível padrão.
 */
function thumbnail ($nomeArquivo){
// Define o diretório base onde as capas são armazenadas.
$caminho = "capas/$nomeArquivo";

// Verifica se o nome do arquivo é nulo ou se o arquivo não existe no diretório.
if (is_null($nomeArquivo) || !file_exists($caminho)){
return "capas/indisponivel.png";
}
else{

// Retorna o caminho completo para o arquivo da capa se ele existir
return $caminho;

}
}


?>

<body>


   <?php 
   require_once "includes/banco.php"
   
   //includes/banco.php -> Especifica o caminho do arquivo a ser incluído. Normalmente, a pasta includes é usada para armazenar arquivos de script que são usados frequentemente por outros scripts no aplicativo, como conexões de banco de dados, configurações globais, funções úteis, etc. 
   
   //banco.php -> geralmente contém o código necessário para estabelecer uma conexão com um banco de dados. Isso inclui definir credenciais de conexão, criar uma conexão usando essas credenciais, e configurar opções de conexão, como o conjunto de caracteres.
    
   //require_once ->  para incluir um arquivo de configuração do banco de dados é uma prática comum porque garante que a conexão com o banco de dados esteja disponível para o script que precisa dela, ao mesmo tempo que previne problemas de múltiplas conexões ou redefinições de variáveis que poderiam ocorrer se o arquivo fosse incluído mais de uma vez.

   ?>

    
    
 

   <main>


   <div id="corpo">

    <h1>Escolha o seu Jogo</h1>


    <table class="listagem">
    
    <?php 
       
       $search = $banco->query("SELECT * FROM jogos ");
      
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
                 
                   $caminhoCapa = thumbnail($registro->capa);

                 echo "<td><img src='$caminhoCapa'class= mini></td>";  //Exibe a coluna capa na tabela HTML. Em que a capa seja um campo na tabela do banco de dados que está sendo acessada.
                 echo "<td>$registro->nome</td>"; //Exibe a coluna nome.
                 echo "<td>Admin</td></tr>"; //Adiciona uma coluna estática com o texto "Admin". Isto pode ser um placeholder para futuras implementações, como links para ações administrativas relacionadas a cada registro.
                 }
             }
         }
        
        ?> 


</main>
       
    



        </table>


        </main>
</div>



</body>
</html>
