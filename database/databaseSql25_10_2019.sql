-- --------------------------------------------------------
-- Servidor:                     localhost
-- Versão do servidor:           5.7.24 - MySQL Community Server (GPL)
-- OS do Servidor:               Win64
-- HeidiSQL Versão:              10.2.0.5599
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;


-- Copiando estrutura do banco de dados para cadastro_unico
CREATE DATABASE IF NOT EXISTS `cadastro_unico` /*!40100 DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci */;
USE `cadastro_unico`;

-- Copiando estrutura para tabela cadastro_unico.ano_escolar
CREATE TABLE IF NOT EXISTS `ano_escolar` (
  `idAnoEscolar` int(11) NOT NULL AUTO_INCREMENT,
  `idNivel` int(11) NOT NULL,
  `nomeAnoEscolar` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`idAnoEscolar`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Copiando dados para a tabela cadastro_unico.ano_escolar: ~0 rows (aproximadamente)
/*!40000 ALTER TABLE `ano_escolar` DISABLE KEYS */;
INSERT INTO `ano_escolar` (`idAnoEscolar`, `idNivel`, `nomeAnoEscolar`) VALUES
	(1, 2, '1º Ano'),
	(2, 2, '2º  Ano'),
	(3, 2, '3º Ano'),
	(4, 2, '4º Ano'),
	(5, 2, '5º Ano'),
	(6, 3, '6º Ano'),
	(7, 3, '7º  Ano'),
	(8, 3, '8º Ano'),
	(9, 3, '9º Ano'),
	(10, 4, '1º Ano EM'),
	(11, 4, '2º Ano EM'),
	(12, 4, '3º Ano EM');
/*!40000 ALTER TABLE `ano_escolar` ENABLE KEYS */;

-- Copiando estrutura para tabela cadastro_unico.area_conhecimento
CREATE TABLE IF NOT EXISTS `area_conhecimento` (
  `idAreaConhecimento` int(11) NOT NULL AUTO_INCREMENT,
  `nomeAreaConhecimento` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `strSigla` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`idAreaConhecimento`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Copiando dados para a tabela cadastro_unico.area_conhecimento: ~7 rows (aproximadamente)
/*!40000 ALTER TABLE `area_conhecimento` DISABLE KEYS */;
INSERT INTO `area_conhecimento` (`idAreaConhecimento`, `nomeAreaConhecimento`, `strSigla`) VALUES
	(1, 'Língua Portuguesa', 'LP'),
	(2, 'Matemática', 'MT'),
	(3, 'Ciências', 'CI'),
	(4, 'Linguagens, Códigos e suas Tecnologias', 'LCT'),
	(5, 'Ciências Humanas e suas Tecnologias', 'CHT'),
	(6, 'Ciências da Natureza e suas Tecnologias', 'CNT'),
	(7, 'Matemática e suas Tecnologias', 'MTT');
/*!40000 ALTER TABLE `area_conhecimento` ENABLE KEYS */;

-- Copiando estrutura para tabela cadastro_unico.arquivo
CREATE TABLE IF NOT EXISTS `arquivo` (
  `idArquivo` int(11) NOT NULL,
  `nomeArquivo` varchar(150) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  `diretorio` varchar(45) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`idArquivo`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Copiando dados para a tabela cadastro_unico.arquivo: ~0 rows (aproximadamente)
/*!40000 ALTER TABLE `arquivo` DISABLE KEYS */;
/*!40000 ALTER TABLE `arquivo` ENABLE KEYS */;

-- Copiando estrutura para tabela cadastro_unico.arquivo_especificacao
CREATE TABLE IF NOT EXISTS `arquivo_especificacao` (
  `idArquivoEspecificacao` int(11) NOT NULL,
  `idArquivo` int(11) NOT NULL,
  `idEspecificacao` int(11) NOT NULL,
  PRIMARY KEY (`idArquivoEspecificacao`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Copiando dados para a tabela cadastro_unico.arquivo_especificacao: ~0 rows (aproximadamente)
/*!40000 ALTER TABLE `arquivo_especificacao` DISABLE KEYS */;
/*!40000 ALTER TABLE `arquivo_especificacao` ENABLE KEYS */;

-- Copiando estrutura para tabela cadastro_unico.campo
CREATE TABLE IF NOT EXISTS `campo` (
  `idCampo` int(11) NOT NULL AUTO_INCREMENT,
  `nomeCampo` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  PRIMARY KEY (`idCampo`)
) ENGINE=InnoDB AUTO_INCREMENT=23 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Copiando dados para a tabela cadastro_unico.campo: ~0 rows (aproximadamente)
/*!40000 ALTER TABLE `campo` DISABLE KEYS */;
INSERT INTO `campo` (`idCampo`, `nomeCampo`) VALUES
	(1, 'Título'),
	(2, 'Título Obra'),
	(3, 'Geração de uso (ano)'),
	(4, 'Ano de lançamento'),
	(5, 'Ciclo de vida (até)'),
	(6, 'Área de conhecimento'),
	(7, 'Nível e ensino'),
	(8, 'Ano Escolar / Série'),
	(9, 'Volume'),
	(10, 'Número da edição'),
	(11, 'Origem'),
	(12, 'Idioma'),
	(13, 'PEG (LA)'),
	(14, 'PEG (LP)'),
	(15, 'ISBN (LA)'),
	(16, 'ISBN (LP)'),
	(17, 'Nome para contrato'),
	(18, 'Nome para capa'),
	(19, 'Pseudônomio'),
	(20, 'Número do contrato'),
	(21, 'Data de assinatura'),
	(22, 'Validade do contrato');
/*!40000 ALTER TABLE `campo` ENABLE KEYS */;

-- Copiando estrutura para tabela cadastro_unico.especificacoes_tecnicas
CREATE TABLE IF NOT EXISTS `especificacoes_tecnicas` (
  `idEspecificacao` int(11) NOT NULL AUTO_INCREMENT,
  `idProduto` int(11) NOT NULL,
  `idTipoEspecificacao` int(11) NOT NULL,
  `componente` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT '0',
  `formatoAberto` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT '0',
  `formatoFechado` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT '0',
  `numPagina` int(11) DEFAULT '0',
  `papel` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT '0',
  `cores` varchar(150) COLLATE utf8mb4_unicode_ci DEFAULT '0',
  `acabamento` varchar(150) COLLATE utf8mb4_unicode_ci DEFAULT '0',
  `observacoes` varchar(300) COLLATE utf8mb4_unicode_ci DEFAULT '0',
  `espessura` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT '0',
  `peso` double DEFAULT '0',
  `orientacao` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `alvura` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `opacidade` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `lombada` varchar(5) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `medLombada` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `bolAnulado` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`idEspecificacao`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Copiando dados para a tabela cadastro_unico.especificacoes_tecnicas: ~0 rows (aproximadamente)
/*!40000 ALTER TABLE `especificacoes_tecnicas` DISABLE KEYS */;
/*!40000 ALTER TABLE `especificacoes_tecnicas` ENABLE KEYS */;

-- Copiando estrutura para tabela cadastro_unico.estrutura_produto
CREATE TABLE IF NOT EXISTS `estrutura_produto` (
  `idEstrutura` int(11) NOT NULL,
  `idProduto` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Copiando dados para a tabela cadastro_unico.estrutura_produto: ~0 rows (aproximadamente)
/*!40000 ALTER TABLE `estrutura_produto` DISABLE KEYS */;
/*!40000 ALTER TABLE `estrutura_produto` ENABLE KEYS */;

-- Copiando estrutura para tabela cadastro_unico.imagem_especificacao
CREATE TABLE IF NOT EXISTS `imagem_especificacao` (
  `idImagemEspecificacao` int(11) NOT NULL,
  `idArquivo` int(11) NOT NULL,
  `idEspecificacao` int(11) NOT NULL,
  PRIMARY KEY (`idImagemEspecificacao`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Copiando dados para a tabela cadastro_unico.imagem_especificacao: ~0 rows (aproximadamente)
/*!40000 ALTER TABLE `imagem_especificacao` DISABLE KEYS */;
/*!40000 ALTER TABLE `imagem_especificacao` ENABLE KEYS */;

-- Copiando estrutura para tabela cadastro_unico.imagem_produto
CREATE TABLE IF NOT EXISTS `imagem_produto` (
  `idImagemProduto` int(11) NOT NULL,
  `idProduto` int(11) NOT NULL,
  `idArquivo` int(11) NOT NULL,
  PRIMARY KEY (`idImagemProduto`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Copiando dados para a tabela cadastro_unico.imagem_produto: ~0 rows (aproximadamente)
/*!40000 ALTER TABLE `imagem_produto` DISABLE KEYS */;
/*!40000 ALTER TABLE `imagem_produto` ENABLE KEYS */;

-- Copiando estrutura para tabela cadastro_unico.logs
CREATE TABLE IF NOT EXISTS `logs` (
  `idLog` int(11) NOT NULL AUTO_INCREMENT,
  `idTipoLog` int(11) NOT NULL,
  `idUsuario` int(11) NOT NULL DEFAULT '0',
  `descricaoLog` varchar(350) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `observacao` varchar(350) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` datetime NOT NULL,
  PRIMARY KEY (`idLog`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Copiando dados para a tabela cadastro_unico.logs: ~0 rows (aproximadamente)
/*!40000 ALTER TABLE `logs` DISABLE KEYS */;
/*!40000 ALTER TABLE `logs` ENABLE KEYS */;

-- Copiando estrutura para tabela cadastro_unico.migrations
CREATE TABLE IF NOT EXISTS `migrations` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=21 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Copiando dados para a tabela cadastro_unico.migrations: ~20 rows (aproximadamente)
/*!40000 ALTER TABLE `migrations` DISABLE KEYS */;
INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
	(1, '2014_10_12_000000_create_users_table', 1),
	(2, '2014_10_12_100000_create_password_resets_table', 1),
	(3, '2019_10_23_170514_create_ano_escolar_table', 1),
	(4, '2019_10_23_170514_create_area_conhecimento_table', 1),
	(5, '2019_10_23_170514_create_arquivo_especificacao_table', 1),
	(6, '2019_10_23_170514_create_arquivo_table', 1),
	(7, '2019_10_23_170514_create_campo_table', 1),
	(8, '2019_10_23_170514_create_especificacoes_tecnicas_table', 1),
	(9, '2019_10_23_170514_create_estrutura_produto_table', 1),
	(10, '2019_10_23_170514_create_imagem_especificacao_table', 1),
	(11, '2019_10_23_170514_create_imagem_produto_table', 1),
	(12, '2019_10_23_170514_create_logs_table', 1),
	(13, '2019_10_23_170514_create_modelo_campo_table', 1),
	(14, '2019_10_23_170514_create_modelo_table', 1),
	(15, '2019_10_23_170514_create_nivel_ensino_table', 1),
	(16, '2019_10_23_170514_create_observacoes_table', 1),
	(17, '2019_10_23_170514_create_origem_table', 1),
	(18, '2019_10_23_170514_create_produto_table', 1),
	(19, '2019_10_23_170514_create_tipo_especificacao_table', 1),
	(20, '2019_10_23_170514_create_tipo_log_table', 1);
/*!40000 ALTER TABLE `migrations` ENABLE KEYS */;

-- Copiando estrutura para tabela cadastro_unico.modelo
CREATE TABLE IF NOT EXISTS `modelo` (
  `idModelo` int(11) NOT NULL AUTO_INCREMENT,
  `idUsuario` int(11) DEFAULT NULL,
  `nomeModelo` varchar(150) COLLATE utf8mb4_unicode_ci NOT NULL,
  `autor` varchar(150) COLLATE utf8mb4_unicode_ci NOT NULL,
  `compartilhamento` int(11) NOT NULL DEFAULT '0',
  `bolAnulado` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`idModelo`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Copiando dados para a tabela cadastro_unico.modelo: ~6 rows (aproximadamente)
/*!40000 ALTER TABLE `modelo` DISABLE KEYS */;
INSERT INTO `modelo` (`idModelo`, `idUsuario`, `nomeModelo`, `autor`, `compartilhamento`, `bolAnulado`) VALUES
	(1, NULL, 'Modelo de Impressão 1', 'Isa', 1, 0),
	(2, NULL, 'Modelo 2 ', 'Ale', 2, 0),
	(3, NULL, 'Teste de Modelo', 'Gessica', 1, 0),
	(4, NULL, 'Modelo 3', 'Lucas', 2, 0),
	(5, NULL, 'Modelo 4 Teste', 'Taironi', 1, 1),
	(6, NULL, 'Teste modelo 5', 'Olavo', 2, 1),
	(7, 2, 'efwefw', 'Usuario teste', 1, 1),
	(8, 2, 'dsadaa', 'Usuario teste', 1, 1),
	(9, 2, 'dsadaa', 'Usuario teste', 1, 1),
	(10, 2, 'dsadaa', 'Usuario teste', 1, 1),
	(11, 2, 'dsadaa', 'Usuario teste', 1, 1),
	(12, 2, 'vsvefrver', 'Usuario teste', 1, 1);
/*!40000 ALTER TABLE `modelo` ENABLE KEYS */;

-- Copiando estrutura para tabela cadastro_unico.modelo_campo
CREATE TABLE IF NOT EXISTS `modelo_campo` (
  `idModelo` int(11) NOT NULL,
  `idCampo` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Copiando dados para a tabela cadastro_unico.modelo_campo: ~0 rows (aproximadamente)
/*!40000 ALTER TABLE `modelo_campo` DISABLE KEYS */;
INSERT INTO `modelo_campo` (`idModelo`, `idCampo`, `created_at`, `updated_at`) VALUES
	(11, 13, '2019-10-25 12:11:59', '2019-10-25 12:11:59'),
	(11, 17, '2019-10-25 12:11:59', '2019-10-25 12:11:59'),
	(11, 21, '2019-10-25 12:11:59', '2019-10-25 12:11:59'),
	(11, 10, '2019-10-25 12:11:59', '2019-10-25 12:11:59'),
	(11, 2, '2019-10-25 12:11:59', '2019-10-25 12:11:59'),
	(12, 1, '2019-10-25 12:59:30', '2019-10-25 12:59:30'),
	(12, 5, '2019-10-25 12:59:30', '2019-10-25 12:59:30'),
	(12, 13, '2019-10-25 12:59:30', '2019-10-25 12:59:30'),
	(12, 21, '2019-10-25 12:59:30', '2019-10-25 12:59:30');
/*!40000 ALTER TABLE `modelo_campo` ENABLE KEYS */;

-- Copiando estrutura para tabela cadastro_unico.nivel_ensino
CREATE TABLE IF NOT EXISTS `nivel_ensino` (
  `idNivel` int(11) NOT NULL,
  `nomeNivel` varchar(45) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`idNivel`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Copiando dados para a tabela cadastro_unico.nivel_ensino: ~0 rows (aproximadamente)
/*!40000 ALTER TABLE `nivel_ensino` DISABLE KEYS */;
INSERT INTO `nivel_ensino` (`idNivel`, `nomeNivel`) VALUES
	(1, 'EI'),
	(2, 'EF1'),
	(3, 'EF2'),
	(4, 'EM');
/*!40000 ALTER TABLE `nivel_ensino` ENABLE KEYS */;

-- Copiando estrutura para tabela cadastro_unico.observacoes
CREATE TABLE IF NOT EXISTS `observacoes` (
  `idObservacao` int(11) NOT NULL AUTO_INCREMENT,
  `idProduto` int(11) NOT NULL,
  `idUsuario` int(11) NOT NULL DEFAULT '0',
  `observacao` varchar(350) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`idObservacao`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Copiando dados para a tabela cadastro_unico.observacoes: ~0 rows (aproximadamente)
/*!40000 ALTER TABLE `observacoes` DISABLE KEYS */;
/*!40000 ALTER TABLE `observacoes` ENABLE KEYS */;

-- Copiando estrutura para tabela cadastro_unico.origem
CREATE TABLE IF NOT EXISTS `origem` (
  `idOrigem` int(11) NOT NULL AUTO_INCREMENT,
  `nomeOrigem` varchar(150) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`idOrigem`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Copiando dados para a tabela cadastro_unico.origem: ~0 rows (aproximadamente)
/*!40000 ALTER TABLE `origem` DISABLE KEYS */;
/*!40000 ALTER TABLE `origem` ENABLE KEYS */;

-- Copiando estrutura para tabela cadastro_unico.password_resets
CREATE TABLE IF NOT EXISTS `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL,
  KEY `password_resets_email_index` (`email`),
  KEY `password_resets_token_index` (`token`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Copiando dados para a tabela cadastro_unico.password_resets: ~0 rows (aproximadamente)
/*!40000 ALTER TABLE `password_resets` DISABLE KEYS */;
/*!40000 ALTER TABLE `password_resets` ENABLE KEYS */;

-- Copiando estrutura para tabela cadastro_unico.produto
CREATE TABLE IF NOT EXISTS `produto` (
  `idProduto` int(11) NOT NULL AUTO_INCREMENT,
  `idAreaConhecimento` int(11) NOT NULL,
  `idAnoEscolar` int(11) NOT NULL,
  `idOrigem` int(11) NOT NULL,
  `titulo` varchar(350) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tituloObra` varchar(350) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `anoUso` int(11) DEFAULT '0',
  `anoLancamento` int(11) DEFAULT '0',
  `anoCicloVida` int(11) DEFAULT '0',
  `volume` int(11) DEFAULT '0',
  `numEdicao` varchar(150) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `pegLA` varchar(150) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `pegLP` varchar(150) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `ISBN_LA` varchar(150) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `ISBN_LP` varchar(150) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `nomeContrato` varchar(150) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `nomeCapa` varchar(150) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `pseudonomio` varchar(150) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `numContrato` int(11) DEFAULT '0',
  `dataAssinatura` date DEFAULT NULL,
  `validadeContrato` date DEFAULT NULL,
  `arquivado` tinyint(1) NOT NULL,
  `bolAnulado` tinyint(1) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`idProduto`)
) ENGINE=InnoDB AUTO_INCREMENT=26 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Copiando dados para a tabela cadastro_unico.produto: ~14 rows (aproximadamente)
/*!40000 ALTER TABLE `produto` DISABLE KEYS */;
INSERT INTO `produto` (`idProduto`, `idAreaConhecimento`, `idAnoEscolar`, `idOrigem`, `titulo`, `tituloObra`, `anoUso`, `anoLancamento`, `anoCicloVida`, `volume`, `numEdicao`, `pegLA`, `pegLP`, `ISBN_LA`, `ISBN_LP`, `nomeContrato`, `nomeCapa`, `pseudonomio`, `numContrato`, `dataAssinatura`, `validadeContrato`, `arquivado`, `bolAnulado`, `created_at`, `updated_at`) VALUES
	(1, 1, 1, 1, 'Dicionario de Teste', 'Teste 011', 2019, 2019, 2022, 2, '3', '7h3hi', '37h3', '83h3r8', '38r3', 'Nome Teste', 'NomeTeste', 'tester', 267, '2019-10-17', '2019-10-17', 0, 0, '2019-10-17 11:25:34', '2019-10-17 11:25:44'),
	(2, 1, 1, 1, 'Livro d Teste', 'Teste 02', 2019, 2019, 2022, 2, '3', 'fgfhfhg', '37h3', '83h3r8', '38r3', 'Nome Teste', 'NomeTeste', 'tester', 267, '2019-10-17', '2019-10-17', 0, 1, '2019-10-17 11:25:34', '2019-10-23 14:42:03'),
	(3, 1, 1, 1, 'Caderno de Teste 03', 'Teste 03', 2019, 2019, 2022, 2, '3', '7h3hi', '37h3', '83h3r8', '38r3', 'Nome Teste', 'NomeTeste', 'tester', 267, '2019-10-17', '2019-10-17', 1, 0, '2019-10-17 11:25:34', '2019-10-17 11:25:44'),
	(5, 1, 2, 1, 'Meu primeiro produto', 'dfsfsdfawf', NULL, NULL, NULL, NULL, NULL, 'rgrgrg', 'wgweg', 'wegwege', 'gweg', NULL, NULL, NULL, NULL, NULL, NULL, 0, 0, '2019-10-22 12:38:26', '2019-10-23 14:40:14'),
	(6, 1, 2, 1, 'Meu produto 2', '3343rgd', NULL, NULL, NULL, NULL, NULL, 'gf', NULL, 'gfhgf', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 0, '2019-10-22 12:47:14', '2019-10-23 14:47:34'),
	(7, 1, 2, 1, 'asdasada', 'dasdas', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 1, '2019-10-22 12:55:35', '2019-10-23 14:50:29'),
	(8, 1, 2, 1, 'gergegr', 'ergegeg', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 1, '2019-10-22 13:02:28', '2019-10-23 16:38:31'),
	(9, 1, 2, 1, 'Testando cadastros', 'vwevererverbbe', NULL, NULL, NULL, NULL, NULL, 'rebere', NULL, 'vcbcbgf', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 1, '2019-10-22 13:07:20', '2019-10-25 13:24:43'),
	(10, 1, 2, 1, 'rgergegre', 'fgdfgd', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, 0, '2019-10-22 13:07:45', '2019-10-22 13:07:45'),
	(11, 1, 2, 1, 'dfgddfg', 'fgdfg', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 1, '2019-10-22 13:08:08', '2019-10-23 16:38:29'),
	(12, 1, 2, 1, 'dfsfsfs', 'fgdgdg', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, 0, '2019-10-22 13:08:42', '2019-10-22 13:08:42'),
	(13, 1, 2, 1, 'fgngnfn', 'fgd', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 1, '2019-10-22 13:10:04', '2019-10-23 16:38:28'),
	(14, 1, 2, 1, 'fewfewefwf', 'fgdgfdgd', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 1, '2019-10-22 13:10:27', '2019-10-23 14:50:44'),
	(15, 1, 2, 1, 'fgngnfn', 'fgd', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 1, '2019-10-23 16:38:15', '2019-10-23 16:38:26'),
	(16, 1, 2, 1, 'Testando cadastros', 'vwevererverbbe', NULL, NULL, NULL, NULL, NULL, 'rebere', NULL, 'vcbcbgf', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 1, '2019-10-24 17:22:40', '2019-10-24 17:30:43'),
	(17, 1, 2, 1, 'Testando cadastros', 'vwevererverbbe', NULL, NULL, NULL, NULL, NULL, 'rebere', NULL, 'vcbcbgf', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 1, '2019-10-24 17:23:41', '2019-10-24 17:23:48'),
	(18, 1, 2, 1, 'Testando cadastros', 'vwevererverbbe', NULL, NULL, NULL, NULL, NULL, 'rebere', NULL, 'vcbcbgf', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 1, '2019-10-24 17:24:00', '2019-10-24 17:24:04'),
	(19, 1, 2, 1, 'Testando cadastros', 'vwevererverbbe', NULL, NULL, NULL, NULL, NULL, 'rebere', NULL, 'vcbcbgf', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 1, '2019-10-24 17:25:03', '2019-10-24 17:25:07'),
	(20, 1, 2, 1, 'Testando cadastros', 'vwevererverbbe', NULL, NULL, NULL, NULL, NULL, 'rebere', NULL, 'vcbcbgf', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 1, '2019-10-24 17:25:12', '2019-10-24 17:25:23'),
	(21, 1, 2, 1, 'Testando cadastros', 'vwevererverbbe', NULL, NULL, NULL, NULL, NULL, 'rebere', NULL, 'vcbcbgf', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 1, '2019-10-24 17:25:27', '2019-10-24 17:25:46'),
	(22, 1, 2, 1, 'Testando cadastros', 'vwevererverbbe', NULL, NULL, NULL, NULL, NULL, 'rebere', NULL, 'vcbcbgf', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 1, '2019-10-24 17:25:49', '2019-10-24 17:29:19'),
	(23, 1, 2, 1, 'Testando cadastros', 'vwevererverbbe', NULL, NULL, NULL, NULL, NULL, 'rebere', NULL, 'vcbcbgf', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 1, '2019-10-24 17:25:51', '2019-10-24 17:26:27'),
	(24, 1, 2, 1, 'Testando cadastros', 'vwevererverbbe', NULL, NULL, NULL, NULL, NULL, 'rebere', NULL, 'vcbcbgf', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 1, '2019-10-24 17:29:28', '2019-10-24 17:29:31'),
	(25, 1, 2, 1, 'Testando cadastros', 'vwevererverbbe', NULL, NULL, NULL, NULL, NULL, 'rebere', NULL, 'vcbcbgf', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 1, '2019-10-24 17:29:46', '2019-10-24 17:29:48');
/*!40000 ALTER TABLE `produto` ENABLE KEYS */;

-- Copiando estrutura para tabela cadastro_unico.tipo_especificacao
CREATE TABLE IF NOT EXISTS `tipo_especificacao` (
  `idTipoEspecificacao` int(11) NOT NULL AUTO_INCREMENT,
  `nomeTipoEspecificacao` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`idTipoEspecificacao`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Copiando dados para a tabela cadastro_unico.tipo_especificacao: ~0 rows (aproximadamente)
/*!40000 ALTER TABLE `tipo_especificacao` DISABLE KEYS */;
INSERT INTO `tipo_especificacao` (`idTipoEspecificacao`, `nomeTipoEspecificacao`) VALUES
	(1, 'Livros e Suplementos'),
	(2, 'Livro do Aluno'),
	(3, 'Livro do Professor'),
	(4, 'Suplementos');
/*!40000 ALTER TABLE `tipo_especificacao` ENABLE KEYS */;

-- Copiando estrutura para tabela cadastro_unico.tipo_log
CREATE TABLE IF NOT EXISTS `tipo_log` (
  `idTipoLog` int(11) NOT NULL AUTO_INCREMENT,
  `nomeLog` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`idTipoLog`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Copiando dados para a tabela cadastro_unico.tipo_log: ~0 rows (aproximadamente)
/*!40000 ALTER TABLE `tipo_log` DISABLE KEYS */;
/*!40000 ALTER TABLE `tipo_log` ENABLE KEYS */;

-- Copiando estrutura para tabela cadastro_unico.users
CREATE TABLE IF NOT EXISTS `users` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(60) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Copiando dados para a tabela cadastro_unico.users: ~0 rows (aproximadamente)
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
/*!40000 ALTER TABLE `users` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
