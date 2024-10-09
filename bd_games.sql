-VAMOS CRIAR NA QUERY


-- Cria a base de dados 'bd_games'

CREATE DATABASE db_games DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;
-- banco de dados será criado com o conjunto de caracteres  padrão UTF-8 , garantindo suporte a uma ampla gama de caracteres latinos, e com a collation (ordenação) UTF-8 case-insensitive, que é insensível a maiúsculas e minúsculas.


CREATE TABLE utilizadores(
   
    utilizador VARCHAR(10) NOT NULL,
    nome VARCHAR(30) NOT NULL,
    pass VARCHAR(60) NOT NULL,
    tipo VARCHAR(10) NOT NULL DEFAULT 'editor',
    PRIMARY KEY (utilizador)

) ENGINE=INNODB DEFAULT CHARSET=utf8;


CREATE TABLE generos(
    cod int(11) not null,           
    genero varchar(20) not null,   
    PRIMARY KEY(cod)                
) ENGINE=INNODB DEFAULT charset=utf8;              


CREATE TABLE produtoras(
    cod int(11) not null,           
    produtora varchar(20) not null, 
    pais varchar(15) not null,      
    PRIMARY KEY(cod)                
) ENGINE=INNODB DEFAULT charset=utf8;               


CREATE TABLE jogos(
    cod int(11) not null,              
    nome varchar(40) not null,        
    cod_genero int(11) not null,       
    cod_produtora int(11) not null,    
    descricao text,                   
    pontuacao decimal(4,2) not null, 
    capa varchar(40) default null,    
    PRIMARY KEY(cod),                
    FOREIGN KEY(cod_genero) REFERENCES generos(cod),         
    FOREIGN KEY(cod_produtora) REFERENCES produtoras(cod)     
) 
ENGINE=INNODB DEFAULT charset=utf8;    
