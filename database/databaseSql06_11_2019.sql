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

-- Copiando dados para a tabela cadastro_unico.ano_escolar: ~12 rows (aproximadamente)
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

-- Copiando dados para a tabela cadastro_unico.campo: ~22 rows (aproximadamente)
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
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Copiando dados para a tabela cadastro_unico.especificacoes_tecnicas: ~9 rows (aproximadamente)
/*!40000 ALTER TABLE `especificacoes_tecnicas` DISABLE KEYS */;
INSERT INTO `especificacoes_tecnicas` (`idEspecificacao`, `idProduto`, `idTipoEspecificacao`, `componente`, `formatoAberto`, `formatoFechado`, `numPagina`, `papel`, `cores`, `acabamento`, `observacoes`, `espessura`, `peso`, `orientacao`, `alvura`, `opacidade`, `lombada`, `medLombada`, `bolAnulado`, `created_at`, `updated_at`) VALUES
	(1, 1, 2, 'capa', '454', 'dge5', 54, 'A4', 'Branco, Azul', 'Normal', 'gergergre', '56h56', 65, 'retrato', 'hrthr', 'tr', 'gfg', 'gfn', 0, '2019-10-28 12:41:05', '2019-11-04 14:29:45'),
	(2, 1, 2, 'capa', 'fvdfvd', NULL, 434, 'dcc', 'cz', 'zx zx', 'cxczcz', 'xcz', 43, 'retrato', 'c', NULL, NULL, NULL, 0, '2019-10-28 13:27:51', '2019-10-28 13:27:51'),
	(4, 2, 2, 'miolo', '434', NULL, 43, 'erfe', 'rter', 'retet', 'tretertrete', '434', 43, NULL, NULL, NULL, NULL, NULL, 0, '2019-10-28 13:28:56', '2019-10-28 13:28:56'),
	(5, 2, 4, 'miolo', 'sefsefs', NULL, 32, 'fasc', 'sdas', 'dadsa', 'asdasas', 'asdasd', 23, 'retrato', NULL, NULL, NULL, NULL, 0, '2019-10-28 13:32:22', '2019-10-28 13:32:22'),
	(6, 1, 1, 'capa', 'teste', NULL, 12, 'sdsfdfs', 'dsda', 'dasda', 'sdasda', '32', 23, 'retrato', '23', NULL, NULL, NULL, 0, '2019-10-28 13:34:10', '2019-10-31 14:37:33'),
	(7, 1, 4, 'capa', 'wrefe', NULL, 534, 'sdsdf', 'sdfsf', 'dsfsdf', 'sdfsfdsd', 'fsdfs', 3424, 'retrato', '4t4', 'fsedfse', 'A', 'fwew', 1, '2019-10-30 17:59:30', '2019-10-31 14:35:36'),
	(8, 14, 3, 'miolo', 'ergerg', 'fr343r3', 453, 'ssfwe', NULL, 'fefe', 'fwefef', 'efwe', 0, NULL, NULL, NULL, NULL, NULL, 0, '2019-10-30 18:03:43', '2019-11-05 16:50:51'),
	(9, 1, 1, 'capa', 'i7ik7k8', NULL, 45, 'bfbdf', 'fbfbf', 'bfbfbf', 'fbdfbd', '453', 43, 'retrato', '43', 'oi', NULL, NULL, 1, '2019-10-31 14:34:49', '2019-11-04 16:06:15'),
	(10, 14, 1, 'capa', 'f343', 'bdfgbf', 323, NULL, 'fsd', NULL, NULL, NULL, 0, NULL, NULL, NULL, NULL, NULL, 0, '2019-11-05 16:49:10', '2019-11-05 16:50:22');
/*!40000 ALTER TABLE `especificacoes_tecnicas` ENABLE KEYS */;

-- Copiando estrutura para tabela cadastro_unico.estrutura_produto
CREATE TABLE IF NOT EXISTS `estrutura_produto` (
  `idEstrutura` int(11) NOT NULL,
  `idProduto` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Copiando dados para a tabela cadastro_unico.estrutura_produto: ~6 rows (aproximadamente)
/*!40000 ALTER TABLE `estrutura_produto` DISABLE KEYS */;
INSERT INTO `estrutura_produto` (`idEstrutura`, `idProduto`) VALUES
	(1, 1),
	(1, 3),
	(2, 6),
	(14, 1),
	(14, 14),
	(1, 14);
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

-- Copiando estrutura para tabela cadastro_unico.logs_produto
CREATE TABLE IF NOT EXISTS `logs_produto` (
  `idLogProduto` int(11) NOT NULL AUTO_INCREMENT,
  `idUsuario` int(11) NOT NULL DEFAULT '0',
  `idProduto` int(11) NOT NULL DEFAULT '0',
  `idTipoLog` int(11) NOT NULL DEFAULT '0',
  `idEspecificacao` int(11) DEFAULT '0',
  `descricaoLog` text COLLATE utf8_unicode_ci,
  `observacao` text COLLATE utf8_unicode_ci,
  `created_at` timestamp NOT NULL,
  PRIMARY KEY (`idLogProduto`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- Copiando dados para a tabela cadastro_unico.logs_produto: ~0 rows (aproximadamente)
/*!40000 ALTER TABLE `logs_produto` DISABLE KEYS */;
/*!40000 ALTER TABLE `logs_produto` ENABLE KEYS */;

-- Copiando estrutura para tabela cadastro_unico.migrations
CREATE TABLE IF NOT EXISTS `migrations` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=81 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Copiando dados para a tabela cadastro_unico.migrations: ~80 rows (aproximadamente)
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
	(20, '2019_10_23_170514_create_tipo_log_table', 1),
	(21, '2019_10_25_175150_create_ano_escolar_table', 2),
	(22, '2019_10_25_175150_create_area_conhecimento_table', 2),
	(23, '2019_10_25_175150_create_arquivo_table', 2),
	(24, '2019_10_25_175150_create_arquivo_especificacao_table', 2),
	(25, '2019_10_25_175150_create_campo_table', 2),
	(26, '2019_10_25_175150_create_especificacoes_tecnicas_table', 2),
	(27, '2019_10_25_175150_create_estrutura_produto_table', 2),
	(28, '2019_10_25_175150_create_imagem_especificacao_table', 2),
	(29, '2019_10_25_175150_create_imagem_produto_table', 2),
	(30, '2019_10_25_175150_create_logs_table', 2),
	(31, '2019_10_25_175150_create_modelo_table', 2),
	(32, '2019_10_25_175150_create_modelo_campo_table', 2),
	(33, '2019_10_25_175150_create_nivel_ensino_table', 2),
	(34, '2019_10_25_175150_create_observacoes_table', 2),
	(35, '2019_10_25_175150_create_origem_table', 2),
	(36, '2019_10_25_175150_create_password_resets_table', 2),
	(37, '2019_10_25_175150_create_produto_table', 2),
	(38, '2019_10_25_175150_create_tipo_especificacao_table', 2),
	(39, '2019_10_25_175150_create_tipo_log_table', 2),
	(40, '2019_10_25_175150_create_users_table', 2),
	(41, '2019_10_25_175206_create_ano_escolar_table', 0),
	(42, '2019_10_25_175206_create_area_conhecimento_table', 0),
	(43, '2019_10_25_175206_create_arquivo_table', 0),
	(44, '2019_10_25_175206_create_arquivo_especificacao_table', 0),
	(45, '2019_10_25_175206_create_campo_table', 0),
	(46, '2019_10_25_175206_create_especificacoes_tecnicas_table', 0),
	(47, '2019_10_25_175206_create_estrutura_produto_table', 0),
	(48, '2019_10_25_175206_create_imagem_especificacao_table', 0),
	(49, '2019_10_25_175206_create_imagem_produto_table', 0),
	(50, '2019_10_25_175206_create_logs_table', 0),
	(51, '2019_10_25_175206_create_modelo_table', 0),
	(52, '2019_10_25_175206_create_modelo_campo_table', 0),
	(53, '2019_10_25_175206_create_nivel_ensino_table', 0),
	(54, '2019_10_25_175206_create_observacoes_table', 0),
	(55, '2019_10_25_175206_create_origem_table', 0),
	(56, '2019_10_25_175206_create_password_resets_table', 0),
	(57, '2019_10_25_175206_create_produto_table', 0),
	(58, '2019_10_25_175206_create_tipo_especificacao_table', 0),
	(59, '2019_10_25_175206_create_tipo_log_table', 0),
	(60, '2019_10_25_175206_create_users_table', 0),
	(61, '2019_10_25_175236_create_ano_escolar_table', 0),
	(62, '2019_10_25_175236_create_area_conhecimento_table', 0),
	(63, '2019_10_25_175236_create_arquivo_table', 0),
	(64, '2019_10_25_175236_create_arquivo_especificacao_table', 0),
	(65, '2019_10_25_175236_create_campo_table', 0),
	(66, '2019_10_25_175236_create_especificacoes_tecnicas_table', 0),
	(67, '2019_10_25_175236_create_estrutura_produto_table', 0),
	(68, '2019_10_25_175236_create_imagem_especificacao_table', 0),
	(69, '2019_10_25_175236_create_imagem_produto_table', 0),
	(70, '2019_10_25_175236_create_logs_table', 0),
	(71, '2019_10_25_175236_create_modelo_table', 0),
	(72, '2019_10_25_175236_create_modelo_campo_table', 0),
	(73, '2019_10_25_175236_create_nivel_ensino_table', 0),
	(74, '2019_10_25_175236_create_observacoes_table', 0),
	(75, '2019_10_25_175236_create_origem_table', 0),
	(76, '2019_10_25_175236_create_password_resets_table', 0),
	(77, '2019_10_25_175236_create_produto_table', 0),
	(78, '2019_10_25_175236_create_tipo_especificacao_table', 0),
	(79, '2019_10_25_175236_create_tipo_log_table', 0),
	(80, '2019_10_25_175236_create_users_table', 0);
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
) ENGINE=InnoDB AUTO_INCREMENT=19 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Copiando dados para a tabela cadastro_unico.modelo: ~18 rows (aproximadamente)
/*!40000 ALTER TABLE `modelo` DISABLE KEYS */;
INSERT INTO `modelo` (`idModelo`, `idUsuario`, `nomeModelo`, `autor`, `compartilhamento`, `bolAnulado`) VALUES
	(1, NULL, 'Modelo de Impressão 1', 'Isa', 1, 1),
	(2, NULL, 'Modelo 2 ', 'Ale', 2, 1),
	(3, NULL, 'Teste de Modelo', 'Gessica', 1, 1),
	(4, NULL, 'Modelo 3', 'Lucas', 2, 1),
	(5, NULL, 'Modelo 4 Teste', 'Taironi', 1, 1),
	(6, NULL, 'Teste modelo 5', 'Olavo', 2, 1),
	(7, 2, 'efwefw', 'Usuario teste', 1, 1),
	(8, 2, 'dsadaa', 'Usuario teste', 1, 1),
	(9, 2, 'dsadaa', 'Usuario teste', 1, 1),
	(10, 2, 'dsadaa', 'Usuario teste', 1, 1),
	(11, 2, 'dsadaa', 'Usuario teste', 1, 1),
	(12, 2, 'vsvefrver', 'Usuario teste', 1, 1),
	(13, 2, 'bdfbdfbdfb', 'Usuario teste', 1, 1),
	(14, 2, 'Modelo Teste 1', 'Usuario teste', 1, 0),
	(15, 2, 'Modelo Teste 2', 'Usuario teste', 1, 0),
	(16, 2, 'Teste de modelo 3', 'Usuario teste', 1, 0),
	(17, 2, 'Modelo 4 Teste deletar', 'Usuario teste', 1, 1),
	(18, 2, 'Modelo Teste check All', 'Usuario teste', 1, 0);
/*!40000 ALTER TABLE `modelo` ENABLE KEYS */;

-- Copiando estrutura para tabela cadastro_unico.modelo_campo
CREATE TABLE IF NOT EXISTS `modelo_campo` (
  `idModelo` int(11) NOT NULL,
  `idCampo` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Copiando dados para a tabela cadastro_unico.modelo_campo: ~82 rows (aproximadamente)
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
	(12, 21, '2019-10-25 12:59:30', '2019-10-25 12:59:30'),
	(13, 1, '2019-10-28 17:18:17', '2019-10-28 17:18:17'),
	(13, 5, '2019-10-28 17:18:17', '2019-10-28 17:18:17'),
	(13, 9, '2019-10-28 17:18:17', '2019-10-28 17:18:17'),
	(13, 10, '2019-10-28 17:18:17', '2019-10-28 17:18:17'),
	(13, 2, '2019-10-28 17:18:17', '2019-10-28 17:18:17'),
	(13, 7, '2019-10-28 17:18:17', '2019-10-28 17:18:17'),
	(13, 15, '2019-10-28 17:18:17', '2019-10-28 17:18:17'),
	(15, 1, '2019-10-30 12:04:06', '2019-10-30 12:04:06'),
	(15, 2, '2019-10-30 12:04:06', '2019-10-30 12:04:06'),
	(15, 3, '2019-10-30 12:04:06', '2019-10-30 12:04:06'),
	(15, 4, '2019-10-30 12:04:06', '2019-10-30 12:04:06'),
	(15, 12, '2019-10-30 12:04:06', '2019-10-30 12:04:06'),
	(15, 11, '2019-10-30 12:04:06', '2019-10-30 12:04:06'),
	(15, 10, '2019-10-30 12:04:06', '2019-10-30 12:04:06'),
	(15, 9, '2019-10-30 12:04:06', '2019-10-30 12:04:06'),
	(15, 17, '2019-10-30 12:04:06', '2019-10-30 12:04:06'),
	(15, 18, '2019-10-30 12:04:06', '2019-10-30 12:04:06'),
	(15, 19, '2019-10-30 12:04:06', '2019-10-30 12:04:06'),
	(15, 20, '2019-10-30 12:04:06', '2019-10-30 12:04:06'),
	(16, 1, '2019-10-30 12:04:26', '2019-10-30 12:04:26'),
	(16, 5, '2019-10-30 12:04:26', '2019-10-30 12:04:26'),
	(16, 9, '2019-10-30 12:04:26', '2019-10-30 12:04:26'),
	(16, 13, '2019-10-30 12:04:26', '2019-10-30 12:04:26'),
	(16, 17, '2019-10-30 12:04:26', '2019-10-30 12:04:26'),
	(16, 21, '2019-10-30 12:04:26', '2019-10-30 12:04:26'),
	(16, 3, '2019-10-30 12:04:26', '2019-10-30 12:04:26'),
	(16, 7, '2019-10-30 12:04:26', '2019-10-30 12:04:26'),
	(16, 11, '2019-10-30 12:04:26', '2019-10-30 12:04:26'),
	(16, 15, '2019-10-30 12:04:26', '2019-10-30 12:04:26'),
	(16, 19, '2019-10-30 12:04:26', '2019-10-30 12:04:26'),
	(17, 1, '2019-10-31 12:08:53', '2019-10-31 12:08:53'),
	(17, 5, '2019-10-31 12:08:53', '2019-10-31 12:08:53'),
	(17, 9, '2019-10-31 12:08:53', '2019-10-31 12:08:53'),
	(17, 13, '2019-10-31 12:08:53', '2019-10-31 12:08:53'),
	(17, 19, '2019-10-31 12:08:53', '2019-10-31 12:08:53'),
	(17, 15, '2019-10-31 12:08:53', '2019-10-31 12:08:53'),
	(17, 11, '2019-10-31 12:08:53', '2019-10-31 12:08:53'),
	(17, 7, '2019-10-31 12:08:53', '2019-10-31 12:08:53'),
	(18, 1, '2019-11-01 17:43:16', '2019-11-01 17:43:16'),
	(18, 2, '2019-11-01 17:43:16', '2019-11-01 17:43:16'),
	(18, 3, '2019-11-01 17:43:16', '2019-11-01 17:43:16'),
	(18, 4, '2019-11-01 17:43:16', '2019-11-01 17:43:16'),
	(18, 5, '2019-11-01 17:43:16', '2019-11-01 17:43:16'),
	(18, 6, '2019-11-01 17:43:16', '2019-11-01 17:43:16'),
	(18, 7, '2019-11-01 17:43:16', '2019-11-01 17:43:16'),
	(18, 8, '2019-11-01 17:43:16', '2019-11-01 17:43:16'),
	(18, 9, '2019-11-01 17:43:16', '2019-11-01 17:43:16'),
	(18, 10, '2019-11-01 17:43:16', '2019-11-01 17:43:16'),
	(18, 11, '2019-11-01 17:43:16', '2019-11-01 17:43:16'),
	(18, 12, '2019-11-01 17:43:16', '2019-11-01 17:43:16'),
	(18, 13, '2019-11-01 17:43:16', '2019-11-01 17:43:16'),
	(18, 14, '2019-11-01 17:43:16', '2019-11-01 17:43:16'),
	(18, 15, '2019-11-01 17:43:16', '2019-11-01 17:43:16'),
	(18, 16, '2019-11-01 17:43:16', '2019-11-01 17:43:16'),
	(18, 17, '2019-11-01 17:43:17', '2019-11-01 17:43:17'),
	(18, 18, '2019-11-01 17:43:17', '2019-11-01 17:43:17'),
	(18, 19, '2019-11-01 17:43:17', '2019-11-01 17:43:17'),
	(18, 20, '2019-11-01 17:43:17', '2019-11-01 17:43:17'),
	(18, 21, '2019-11-01 17:43:17', '2019-11-01 17:43:17'),
	(18, 22, '2019-11-01 17:43:17', '2019-11-01 17:43:17'),
	(14, 1, '2019-11-01 17:48:18', '2019-11-01 17:48:18'),
	(14, 2, '2019-11-01 17:48:18', '2019-11-01 17:48:18'),
	(14, 3, '2019-11-01 17:48:18', '2019-11-01 17:48:18'),
	(14, 4, '2019-11-01 17:48:18', '2019-11-01 17:48:18'),
	(14, 5, '2019-11-01 17:48:18', '2019-11-01 17:48:18'),
	(14, 7, '2019-11-01 17:48:18', '2019-11-01 17:48:18'),
	(14, 9, '2019-11-01 17:48:18', '2019-11-01 17:48:18'),
	(14, 11, '2019-11-01 17:48:18', '2019-11-01 17:48:18'),
	(14, 12, '2019-11-01 17:48:18', '2019-11-01 17:48:18'),
	(14, 13, '2019-11-01 17:48:18', '2019-11-01 17:48:18'),
	(14, 16, '2019-11-01 17:48:18', '2019-11-01 17:48:18'),
	(14, 20, '2019-11-01 17:48:18', '2019-11-01 17:48:18'),
	(14, 21, '2019-11-01 17:48:18', '2019-11-01 17:48:18');
/*!40000 ALTER TABLE `modelo_campo` ENABLE KEYS */;

-- Copiando estrutura para tabela cadastro_unico.nivel_ensino
CREATE TABLE IF NOT EXISTS `nivel_ensino` (
  `idNivel` int(11) NOT NULL,
  `nomeNivel` varchar(45) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`idNivel`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Copiando dados para a tabela cadastro_unico.nivel_ensino: ~4 rows (aproximadamente)
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
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Copiando dados para a tabela cadastro_unico.observacoes: ~8 rows (aproximadamente)
/*!40000 ALTER TABLE `observacoes` DISABLE KEYS */;
INSERT INTO `observacoes` (`idObservacao`, `idProduto`, `idUsuario`, `observacao`, `created_at`, `updated_at`) VALUES
	(1, 1, 1, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Curabitur sagittis facilisis sem a malesuada. Sed venenatis erat at purus rutrum, vel congue sapien imperdiet. Aliquam consequat eros sed ex varius interdum. ', '2019-10-28 14:30:41', '2019-10-28 14:30:41'),
	(2, 1, 1, 'Nullam ut orci quis eros accumsan rutrum. Nunc interdum, neque non sollicitudin rhoncus, leo orci gravida orci, ac blandit arcu velit sed risus.', '2019-10-29 13:24:00', '2019-10-29 13:24:00'),
	(3, 1, 1, 'Observação teste no produto id 14', '2019-10-30 17:47:57', '2019-10-30 17:47:57'),
	(4, 1, 1, 'tbtbr', '2019-10-30 17:49:31', '2019-10-30 17:49:31'),
	(5, 1, 1, 'Teste observação', '2019-10-30 17:56:38', '2019-10-30 17:56:38'),
	(6, 1, 1, 'Testeee id 14', '2019-10-30 17:57:36', '2019-10-30 17:57:36'),
	(7, 14, 1, 'Testeee observação 14', '2019-10-30 17:58:32', '2019-10-30 17:58:32'),
	(8, 5, 1, 'Teste adicionar observação\nLorem ipsum dolor sit amet, consectetur adipiscing elit. Pellentesque hendrerit nisl id leo dignissim, a vulputate eros euismod. Duis ut arcu ut est vulputate luctus a sit amet mi.', '2019-11-05 17:34:41', '2019-11-05 17:34:41');
/*!40000 ALTER TABLE `observacoes` ENABLE KEYS */;

-- Copiando estrutura para tabela cadastro_unico.origem
CREATE TABLE IF NOT EXISTS `origem` (
  `idOrigem` int(11) NOT NULL AUTO_INCREMENT,
  `nomeOrigem` varchar(150) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`idOrigem`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Copiando dados para a tabela cadastro_unico.origem: ~2 rows (aproximadamente)
/*!40000 ALTER TABLE `origem` DISABLE KEYS */;
INSERT INTO `origem` (`idOrigem`, `nomeOrigem`) VALUES
	(1, 'Brasil'),
	(2, 'Japão');
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
  `idioma` varchar(150) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `peg_la` varchar(150) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `peg_lp` varchar(150) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `isbn_la` varchar(150) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `isbn_lp` varchar(150) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `nomeContrato` varchar(150) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `nomeCapa` varchar(150) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `pseudonimo` varchar(150) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `numContrato` int(11) DEFAULT '0',
  `dataAssinatura` date DEFAULT NULL,
  `validadeContrato` date DEFAULT NULL,
  `arquivado` tinyint(1) NOT NULL,
  `bolAnulado` tinyint(1) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`idProduto`)
) ENGINE=InnoDB AUTO_INCREMENT=40 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Copiando dados para a tabela cadastro_unico.produto: ~38 rows (aproximadamente)
/*!40000 ALTER TABLE `produto` DISABLE KEYS */;
INSERT INTO `produto` (`idProduto`, `idAreaConhecimento`, `idAnoEscolar`, `idOrigem`, `titulo`, `tituloObra`, `anoUso`, `anoLancamento`, `anoCicloVida`, `volume`, `numEdicao`, `idioma`, `peg_la`, `peg_lp`, `isbn_la`, `isbn_lp`, `nomeContrato`, `nomeCapa`, `pseudonimo`, `numContrato`, `dataAssinatura`, `validadeContrato`, `arquivado`, `bolAnulado`, `created_at`, `updated_at`) VALUES
	(1, 3, 8, 1, 'Dicionario Aurelio', 'Aurelio', 2019, 2019, 2022, 2, '3', 'pt-br', 'peg-123', 'peg-1234', 'isbn-123', 'isbn-234', 'Contrato Aurelio', 'Aurelio contrato', 'pseudonomio aurelio', 267, '2019-10-17', '2019-10-17', 0, 0, '2019-10-17 11:25:34', '2019-10-30 14:07:52'),
	(2, 1, 1, 1, 'Livro d Teste', 'Teste 02', 2019, 2019, 2022, 2, '3', NULL, 'fgfhfhg', '37h3', '83h3r8', '38r3', 'Nome Teste', 'NomeTeste', 'tester', 267, '2019-10-17', '2019-10-17', 0, 1, '2019-10-17 11:25:34', '2019-10-23 14:42:03'),
	(3, 1, 1, 1, 'Caderno de Teste 03', 'Teste 03', 2019, 2019, 2022, 2, '3', NULL, '7h3hi', '37h3', '83h3r8', '38r3', 'Nome Teste', 'NomeTeste', 'tester', 267, '2019-10-17', '2019-10-17', 1, 0, '2019-10-17 11:25:34', '2019-10-17 11:25:44'),
	(5, 1, 2, 1, 'Meu primeiro produto', 'dfsfsdfawf', NULL, NULL, NULL, NULL, NULL, NULL, 'rgrgrg', 'wgweg', 'wegwege', 'gweg', NULL, NULL, NULL, NULL, NULL, NULL, 0, 0, '2019-10-22 12:38:26', '2019-10-23 14:40:14'),
	(6, 1, 2, 1, 'Meu produto 2', '3343rgd', NULL, NULL, NULL, NULL, NULL, NULL, 'gfgt5g4', '3rf34', 'gfhgf', 'gre', NULL, NULL, NULL, NULL, NULL, NULL, 0, 0, '2019-10-22 12:47:14', '2019-10-23 14:47:34'),
	(7, 1, 2, 1, 'asdasada', 'dasdas', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 1, '2019-10-22 12:55:35', '2019-10-23 14:50:29'),
	(8, 1, 2, 1, 'gergegr', 'ergegeg', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 1, '2019-10-22 13:02:28', '2019-10-23 16:38:31'),
	(9, 1, 2, 1, 'Testando cadastros', 'vwevererverbbe', NULL, NULL, NULL, NULL, NULL, NULL, 'rebere', NULL, 'vcbcbgf', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 0, '2019-10-22 13:07:20', '2019-10-25 13:24:43'),
	(10, 1, 2, 1, 'rgergegre', 'fgdfgd', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, 0, '2019-10-22 13:07:45', '2019-10-22 13:07:45'),
	(11, 1, 2, 1, 'dfgddfg', 'fgdfg', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 1, '2019-10-22 13:08:08', '2019-10-23 16:38:29'),
	(12, 1, 2, 1, 'dfsfsfs', 'fgdgdg', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, 0, '2019-10-22 13:08:42', '2019-10-22 13:08:42'),
	(13, 1, 2, 1, 'fgngnfn', 'fgd', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 1, '2019-10-22 13:10:04', '2019-10-23 16:38:28'),
	(14, 2, 2, 1, 'fewfewefwf', 'fgdgfdgd', 2019, 2019, 2019, 1, '2', 'pt-br', 'f34343', NULL, '56u565', '56h56h', NULL, NULL, NULL, NULL, NULL, NULL, 0, 0, '2019-10-22 13:10:27', '2019-10-31 13:25:45'),
	(15, 1, 2, 1, 'fgngnfn', 'fgd', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 1, '2019-10-23 16:38:15', '2019-10-23 16:38:26'),
	(16, 1, 2, 1, 'Testando cadastros', 'vwevererverbbe', NULL, NULL, NULL, NULL, NULL, NULL, 'rebere', NULL, 'vcbcbgf', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 1, '2019-10-24 17:22:40', '2019-10-24 17:30:43'),
	(17, 1, 2, 1, 'Testando cadastros', 'vwevererverbbe', NULL, NULL, NULL, NULL, NULL, NULL, 'rebere', NULL, 'vcbcbgf', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 1, '2019-10-24 17:23:41', '2019-10-24 17:23:48'),
	(18, 1, 2, 1, 'Testando cadastros', 'vwevererverbbe', NULL, NULL, NULL, NULL, NULL, NULL, 'rebere', NULL, 'vcbcbgf', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 1, '2019-10-24 17:24:00', '2019-10-24 17:24:04'),
	(19, 1, 2, 1, 'Testando cadastros', 'vwevererverbbe', NULL, NULL, NULL, NULL, NULL, NULL, 'rebere', NULL, 'vcbcbgf', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 1, '2019-10-24 17:25:03', '2019-10-24 17:25:07'),
	(20, 1, 2, 1, 'Testando cadastros', 'vwevererverbbe', NULL, NULL, NULL, NULL, NULL, NULL, 'rebere', NULL, 'vcbcbgf', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 1, '2019-10-24 17:25:12', '2019-10-24 17:25:23'),
	(21, 1, 2, 1, 'Testando cadastros', 'vwevererverbbe', NULL, NULL, NULL, NULL, NULL, NULL, 'rebere', NULL, 'vcbcbgf', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 1, '2019-10-24 17:25:27', '2019-10-24 17:25:46'),
	(22, 1, 2, 1, 'Testando cadastros', 'vwevererverbbe', NULL, NULL, NULL, NULL, NULL, NULL, 'rebere', NULL, 'vcbcbgf', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 1, '2019-10-24 17:25:49', '2019-10-24 17:29:19'),
	(23, 1, 2, 1, 'Testando cadastros', 'vwevererverbbe', NULL, NULL, NULL, NULL, NULL, NULL, 'rebere', NULL, 'vcbcbgf', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 1, '2019-10-24 17:25:51', '2019-10-24 17:26:27'),
	(24, 1, 2, 1, 'Testando cadastros', 'vwevererverbbe', NULL, NULL, NULL, NULL, NULL, NULL, 'rebere', NULL, 'vcbcbgf', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 1, '2019-10-24 17:29:28', '2019-10-24 17:29:31'),
	(25, 1, 2, 1, 'Testando cadastros', 'vwevererverbbe', NULL, NULL, NULL, NULL, NULL, NULL, 'rebere', NULL, 'vcbcbgf', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 1, '2019-10-24 17:29:46', '2019-10-24 17:29:48'),
	(26, 2, 4, 1, 'frgeeeh', 'gregerger', 2017, 2019, 2019, 3, '53453', 'pt-br', 'frgrfg34t3', 'gf3f34', 'f34f34', '4f34', 'asdads', 'dsasdasd', NULL, 345345, '2019-10-30', '2020-01-01', 0, 1, '2019-10-30 17:20:49', '2019-10-31 13:08:52'),
	(27, 2, 2, 1, 'fewfewefwf', 'fgdgfdgd', 2019, 2019, 2019, 1, 'b45y45', 'pt-br', 'f34343', NULL, 'u56u6u5', '5u', 'gdrgd', NULL, NULL, NULL, NULL, NULL, 0, 0, '2019-10-31 13:15:54', '2019-10-31 13:26:17'),
	(28, 3, 8, 1, 'Dicionario Aurelio', 'Aurelio', 2019, 2019, 2022, 2, '3', 'pt-br', 'peg-123', 'peg-1234', 'isbn-123', 'isbn-234', 'Contrato Aurelio', 'Aurelio contrato', 'pseudonimo aurelio', 267, '2019-10-17', '2019-10-17', 0, 0, '2019-10-31 16:41:33', '2019-10-31 16:41:33'),
	(29, 3, 8, 1, 'Dicionario Aurelio', 'Aurelio', 2019, 2019, 2022, 2, '3', 'pt-br', 'peg-123', 'peg-1234', 'isbn-123', 'isbn-234', 'Contrato Aurelio', 'Aurelio contrato', 'pseudonimo aurelio', 267, '2019-10-17', '2019-10-17', 0, 1, '2019-10-31 16:48:16', '2019-11-01 16:47:56'),
	(30, 3, 8, 1, 'Dicionario Aurelio', 'Aurelio', 2019, 2019, 2022, 2, '3', 'pt-br', 'peg-123', 'peg-1234', 'isbn-123', 'isbn-234', 'Contrato Aurelio', 'Aurelio contrato', 'pseudonimo aurelio', 267, '2019-10-17', '2019-10-17', 0, 1, '2019-10-31 16:48:23', '2019-10-31 16:52:28'),
	(31, 3, 8, 1, 'Dicionario Aurelio', 'Aurelio', 2019, 2019, 2022, 2, '3', 'pt-br', 'peg-123', 'peg-1234', 'isbn-123', 'isbn-234', 'Contrato Aurelio', 'Aurelio contrato', 'pseudonimo aurelio', 267, '2019-10-17', '2019-10-17', 0, 1, '2019-10-31 16:51:43', '2019-10-31 16:52:26'),
	(32, 3, 8, 1, 'Dicionario Aurelio', 'Aurelio', 2019, 2019, 2022, 2, '3', 'pt-br', 'peg-123', 'peg-1234', 'isbn-123', 'isbn-234', 'Contrato Aurelio', 'Aurelio contrato', 'pseudonimo aurelio', 267, '2019-10-17', '2019-10-17', 0, 1, '2019-10-31 16:52:30', '2019-11-01 16:47:54'),
	(33, 3, 8, 1, 'Dicionario Aurelio', 'Aurelio', 2019, 2019, 2022, 2, '3', 'pt-br', 'peg-123', 'peg-1234', 'isbn-123', 'isbn-234', 'Contrato Aurelio', 'Aurelio contrato', 'pseudonimo aurelio', 267, '2019-10-17', '2019-10-17', 0, 1, '2019-11-01 17:54:40', '2019-11-04 12:33:09'),
	(34, 3, 8, 1, 'Dicionario Aurelio', 'Aurelio', 2019, 2019, 2022, 2, '3', 'pt-br', 'peg-123', 'peg-1234', 'isbn-123', 'isbn-234', 'Contrato Aurelio', 'Aurelio contrato', 'pseudonimo aurelio', 267, '2019-10-17', '2019-10-17', 0, 1, '2019-11-01 17:55:46', '2019-11-01 17:56:15'),
	(35, 3, 8, 1, 'Dicionario Aurelio', 'Aurelio', 2019, 2019, 2022, 2, '3', 'pt-br', 'peg-123', 'peg-1234', 'isbn-123', 'isbn-234', 'Contrato Aurelio', 'Aurelio contrato', 'pseudonimo aurelio', 267, '2019-10-17', '2019-10-17', 0, 1, '2019-11-01 17:55:54', '2019-11-01 17:56:13'),
	(36, 3, 8, 1, 'Dicionario Aurelio', 'Aurelio', 2019, 2019, 2022, 2, '3', 'pt-br', 'peg-123', 'peg-1234', 'isbn-123', 'isbn-234', 'Contrato Aurelio', 'Aurelio contrato', 'pseudonimo aurelio', 267, '2019-10-17', '2019-10-17', 0, 1, '2019-11-01 17:56:17', '2019-11-04 11:33:01'),
	(37, 3, 8, 1, 'Dicionario Aurelio', 'Aurelio', 2019, 2019, 2022, 2, '3', 'pt-br', 'peg-123', 'peg-1234', 'isbn-123', 'isbn-234', 'Contrato Aurelio', 'Aurelio contrato', 'pseudonimo aurelio', 267, '2019-10-17', '2019-10-17', 0, 1, '2019-11-01 17:56:22', '2019-11-04 11:31:52'),
	(38, 3, 8, 1, 'Dicionario Aurelio', 'Aurelio', 2019, 2019, 2022, 2, '3', 'pt-br', 'peg-123', 'peg-1234', 'isbn-123', 'isbn-234', 'Contrato Aurelio', 'Aurelio contrato', 'pseudonimo aurelio', 267, '2019-10-17', '2019-10-17', 0, 1, '2019-11-04 11:33:44', '2019-11-04 11:34:28'),
	(39, 3, 8, 1, 'Dicionario Aurelio', 'Aurelio', 2019, 2019, 2022, 2, '3', 'pt-br', 'peg-123', 'peg-1234', 'isbn-123', 'isbn-234', 'Contrato Aurelio', 'Aurelio contrato', 'pseudonimo aurelio', 267, '2019-10-17', '2019-10-17', 0, 1, '2019-11-04 11:36:18', '2019-11-04 11:36:21');
/*!40000 ALTER TABLE `produto` ENABLE KEYS */;

-- Copiando estrutura para tabela cadastro_unico.tipo_especificacao
CREATE TABLE IF NOT EXISTS `tipo_especificacao` (
  `idTipoEspecificacao` int(11) NOT NULL AUTO_INCREMENT,
  `nomeTipoEspecificacao` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`idTipoEspecificacao`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Copiando dados para a tabela cadastro_unico.tipo_especificacao: ~4 rows (aproximadamente)
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
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Copiando dados para a tabela cadastro_unico.tipo_log: ~5 rows (aproximadamente)
/*!40000 ALTER TABLE `tipo_log` DISABLE KEYS */;
INSERT INTO `tipo_log` (`idTipoLog`, `nomeLog`) VALUES
	(1, 'Login'),
	(2, 'Cadastro'),
	(3, 'Alteração'),
	(4, 'Exclusão'),
	(5, 'Outro');
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
