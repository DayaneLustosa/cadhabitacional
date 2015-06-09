CREATE TABLE `estados` (
  `id` INTEGER UNSIGNED NOT NULL AUTO_INCREMENT,
  `sigla` VARCHAR(2) NOT NULL,
  `estado` VARCHAR(45) NOT NULL,
  PRIMARY KEY (`id`),
  INDEX `ix_estado`(`estado`)
)
ENGINE = MyISAM
CHARACTER SET utf8 COLLATE utf8_general_ci;

INSERT INTO `estados` (id, sigla, estado ) VALUES 
	(1, 'AC', 'Acre'),
	(2, 'AL', 'Alagoas'),
	(3, 'AM', 'Amazonas'),
	(4, 'AP', 'Amap�'),
	(5, 'BA', 'Bahia'),
	(6, 'CE', 'Cear�'),
	(7, 'DF', 'Distrito Federal'),
	(8, 'ES', 'Esp�rito Santo'),
	(9, 'GO', 'Goi�s'),
	(10, 'MA', 'Maranh�o'),
	(11, 'MG', 'Minas Gerais'),
	(12, 'MS', 'Mato Grosso do Sul'),
	(13, 'MT', 'Mato Grosso'),
	(14, 'PA', 'Par�'),
	(15, 'PB', 'Para�ba'),
	(16, 'PE', 'Pernambuco'),
	(17, 'PI', 'Piau�'),
	(18, 'PR', 'Paran�'),
	(19, 'RJ', 'Rio de Janeiro'),
	(20, 'RN', 'Rio Grande do Norte'),
	(21, 'RO', 'Rond�nia'),
	(22, 'RR', 'Roraima'),
	(23, 'RS', 'Rio Grande do Sul'),
	(24, 'SC', 'Santa Catarina'),
	(25, 'SE', 'Sergipe'),
	(26, 'SP', 'S�o Paulo'),
	(27, 'TO', 'Tocantins')
;