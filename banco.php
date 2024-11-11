
<?php


// Função para apresentar erros de forma estilizada
function exibirErro($mensagem) {
    echo "<div style='border: 1px solid red; padding: 10px; background-color: #fdd; color: #900;'>";
    echo "<strong>Erro:</strong> " . $mensagem;
    echo "</div>";
}

// Função para exibir sucesso em verde
function exibirSucesso($mensagem) {
    echo "<div style='border: 1px solid green; padding: 10px; background-color: #dfd; color: #090;'>";
    echo "<strong>Sucesso:</strong> " . $mensagem;
    echo "</div>";
}

//eu vou criar um objeto , $banco é objeto de new MySQLI. mysqli é uma classe que já vem na  biblioteca do php, dentro 
//do construtor vamos passar 4 parametros

try {
    // Estabelece a conexão com o banco de dados MySQL
    $banco = new mysqli('localhost', 'root', '', 'db_games2'); // Conecta ao MySQL (localhost, usuário 'root', sem senha, banco de dados 'db_games')
    //$banco = new mysqli('localhost', 'i35344', 'i35344', 'i35344_db_games'); // Conecta ao MySQL (localhost, usuário 'root', sem senha, banco de dados 'db_games')
    


    // Define o charset como utf8
$banco->set_charset("utf8");


    // Verifica se houve algum erro na conexão com o banco de dados
    // banco é um objeto, ele possui atributos e métodos dentro dele, a seta é a referência ao objeto,
    // atributo chamado connect_errno,o número do erro
    // atributo connect_error, que é a descrição do erro

    if ($banco->connect_errno) { // Se houver um erro na conexão, o código dentro do if será executado
        // Exibe uma mensagem de erro com o código do erro e a mensagem detalhada
        echo "<p>Erro de conexão: " . $banco->connect_errno . " --> " . $banco->connect_error . "</p>";
        exit(); // Encerra o script se houver um erro de conexão
    }else {
        // Exibe mensagem de sucesso se a conexão for bem-sucedida
        exibirSucesso("Conexão estabelecida com sucesso ao banco de dados 'db_games'!");


       // $search = $banco->query("SELECT * FROM jogos");

    /* $banco: Este é um objeto que representa a conexão com o banco de dados. Geralmente, é criado usando uma classe como PDO ou mysqli.

    query(): Este método é chamado no objeto $banco e é responsável por executar a consulta SQL fornecida. O resultado da consulta é armazenado na variável $search.

    "SELECT * FROM jogos": Esta é a instrução SQL.

    SELECT *: O asterisco (*) indica que queremos selecionar todas as colunas de cada registro.
    FROM jogos: Indica que queremos os dados da tabela jogos. */

        if(!$search){

            //echo ("Falha na busca");
        }
        else{
        //$registo = $search->fetch_object();//O método fetch_object() vai buscar apenas uma linha de resultado da sua consulta e, a cada chamada subsequente, ele vai buscar a próxima linha disponível.

        
       //echo $registo->nome; //echo vai buscar para exibir propriedades específicas (colunas) do objeto retornado da consulta.
       
       //while ($registo!= false){
        //print_r($registo = $search->fetch_object());

       //}

        }
    }

}catch (mysqli_sql_exception $e) {
    // "catch" captura exceções do tipo "mysqli_sql_exception" que ocorrem no bloco "try".
    // Quando ocorre um erro relacionado ao MySQLi (como falha de conexão), ele será tratado aqui.
    // A variável "$e" armazena o erro capturado, que pode ser acessado através de métodos da classe mysqli_sql_exception.
    
    // Exibe a mensagem de erro de forma estilizada.
    // "getMessage()" retorna a mensagem de erro detalhada contida na exceção "$e".
    // A função "exibirErro()" recebe essa mensagem e a apresenta visualmente ao usuário.
    exibirErro($e->getMessage());
    
    // Interrompe a execução do script imediatamente após exibir o erro.
    // Isso impede que o código continue a rodar após um erro crítico.
    exit();
}catch (Exception $e) {
    // Captura qualquer exceção que não foi tratada por blocos de "catch" mais específicos.
    // "Exception" é a classe base de todas as exceções, então erros genéricos serão capturados aqui.
    // "$e" é a variável que armazena os detalhes do erro capturado.

    // Exibe a mensagem de erro associada à exceção capturada.
    // "getMessage()" retorna a mensagem de erro específica que está dentro da exceção "$e".
    // A função "exibirErro()" é chamada para apresentar a mensagem de erro de forma estilizada ao usuário.
    exibirErro($e->getMessage());
    
    // Interrompe a execução do script após exibir o erro.
    // Isso evita que o código continue sendo executado depois de um erro crítico.
    exit();
}


?>









