CREATE TABLE  `processos` (
	`id` INT NOT NULL AUTO_INCREMENT PRIMARY KEY ,
	`numeroProcesso` VARCHAR( 100 ) ,
	`tribunal` VARCHAR( 100 ) ,
	`situacao` VARCHAR( 100 ) ,
	`cliente` VARCHAR( 100 ) ,
	`observacoes` VARCHAR( 255 )
	) ENGINE = INNODB;