-VAMOS CRIAR NA QUERY


-- Cria a base de dados 'bd_games'

CREATE DATABASE db_games DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;
-- banco de dados será criado com o conjunto de caracteres  padrão UTF-8 , garantindo suporte a uma ampla gama de caracteres latinos, e com a collation (ordenação) UTF-8 case-insensitive, que é insensível a maiúsculas e minúsculas.


CREATE TABLE utilizadores(
  
    utilizador VARCHAR(10) NOT NULL,
    nome VARCHAR(30) NOT NULL,
    pass VARCHAR(60) NOT NULL,
    tipo VARCHAR(10) NOT NULL DEFAULT 'editor',
    PRIMARY KEY (utilizador));
