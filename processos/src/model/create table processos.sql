CREATE TABLE  processos (
	id INT NOT NULL AUTO_INCREMENT PRIMARY KEY ,
	numeroProcesso VARCHAR( 50 ) ,
	tribunal VARCHAR( 100 ) ,
	situacao VARCHAR(100) ,
	cliente VARCHAR( 100 ) ,
	observacoes VARCHAR( 255 )
	) ENGINE = INNODB;

CREATE TABLE FASES(
	id_processo INT,
	fase VARCHAR(100),
	data DATE,
	CONSTRAINT chave_primaria PRIMARY KEY (id_processo, fase)
);

CREATE TABLE CLIENTE (
	id INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
	nome VARCHAR(50),
	usuario_login VARCHAR(20),
	senha VARCHAR(8)
);