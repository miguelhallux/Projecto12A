<?php
// Função chamada 'thumb' que recebe o nome de um arquivo como argumento
function thumb($arquivo) {
    
    // Define o caminho onde o arquivo (imagem) está guardado, na pasta 'capas'
    $caminho = "capas/$arquivo";
    
    // Verifica se o arquivo é nulo (não foi informado) ou se o arquivo não existe no caminho
    if (is_null($arquivo) || !file_exists($caminho)) {
        
        // Se o arquivo não for encontrado ou for nulo, retorna a imagem 'indisponivel.png'
        return "capas/indisponivel.png";
    }
    else {
        
        // Se o arquivo existir, retorna o caminho correto da imagem
        return $caminho;
    }
}


function voltar(){
    return 
    "<a href='gestao_jogos.php'>
    <span class='material-symbols-outlined'>
arrow_back_ios_new</span></a>";
}

function msg_sucesso($m){
  $resp = "<div class = 'sucesso'><span class='material-symbols-outlined'>
check_circle
</span>$m</div>";
return $resp ;
}

function msg_aviso($m){
    $resp = "<div class = 'aviso'><span class='material-symbols-outlined'>
  info
  </span>$m</div>";
  return $resp ;
  }


  function msg_erro($m){
    $resp = "<div class = 'erro'><span class='material-symbols-outlined'>
  error
  </span>$m</div>";
  return $resp ;
  }

?>

<!-- Explicação para estudantes:
Função thumb($arquivo): Esta função serve para verificar se a capa de um jogo existe. Se a capa estiver disponível, ela vai mostrar a imagem. Se a capa não existir ou o arquivo não for informado, uma imagem padrão de "indisponível" será mostrada.

$caminho = "capas/$arquivo";: Define a pasta onde as imagens das capas dos jogos estão guardadas. O nome do arquivo é passado como argumento para a função.

is_null($arquivo) || !file_exists($caminho): Verifica se o nome do arquivo foi dado (não é nulo) e se o arquivo realmente existe no diretório indicado.

return "capas/indisponivel.png";: Se a capa não for encontrada ou o nome não for informado, mostra uma imagem chamada indisponivel.png que indica que a capa não está disponível.

return $caminho;: Se a capa estiver disponível, devolve o caminho correto para a imagem do arquivo, que pode ser usada para exibir a capa do jogo.

Com essa função, se um jogo não tiver uma capa, a página vai mostrar uma imagem padrão, evitando erros. -->
