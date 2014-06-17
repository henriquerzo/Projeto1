DROP TABLE IF EXISTS `usuarios`;
CREATE TABLE USUARIOS (
	`id` INT(11) UNSIGNED NOT NULL AUTO_INCREMENT,
	`nome` VARCHAR( 50 ) NOT NULL ,
	`usuario` VARCHAR( 25 ) NOT NULL ,
	`senha` VARCHAR( 40 ) NOT NULL ,
	`email` VARCHAR( 100 ) NOT NULL ,
	`nivel` INT(1) UNSIGNED NOT NULL DEFAULT '1',
	`ativo` BOOL NOT NULL DEFAULT '1',
	`cadastro` DATETIME NOT NULL ,
	PRIMARY KEY (`id`),
	UNIQUE KEY `usuario` (`usuario`),
	KEY `nivel` (`nivel`)
);

DROP TABLE IF EXISTS `processos`;
CREATE TABLE  PROCESSOS (
	id INT NOT NULL AUTO_INCREMENT PRIMARY KEY ,
	numeroProcesso VARCHAR( 50 ) ,
	tribunal VARCHAR( 100 ) ,
	data DATE ,
	situacao VARCHAR(100) ,
	cliente VARCHAR( 100 ) ,
	observacoes VARCHAR( 255 ) ,
	status CHAR ,
	usuario_id INT(11) ,
	FOREIGN KEY (usuario_id) REFERENCES USUARIOS(id)
	)

#241092000

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



INSERT INTO `usuarios` VALUES (NULL, 'Usuário Teste', 'demo', SHA1( 'demo' ), 'usuario@demo.com.br', 1, 1, NOW( ));
INSERT INTO `usuarios` VALUES (NULL, 'Administrador Teste', 'admin', SHA1( 'admin' ), 'admin@demo.com.br', 2, 1, NOW( ));