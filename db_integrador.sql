-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 15/05/2025 às 22:23
-- Versão do servidor: 10.4.32-MariaDB
-- Versão do PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `db_integrador`
--

-- --------------------------------------------------------

--
-- Estrutura para tabela `tb_consultas`
--

CREATE TABLE `tb_consultas` (
  `id` int(11) NOT NULL,
  `resident_id` int(11) NOT NULL,
  `data_consulta` date NOT NULL,
  `horario` time DEFAULT NULL,
  `medico` varchar(255) NOT NULL,
  `especialidade` varchar(100) DEFAULT NULL,
  `observacoes` text DEFAULT NULL,
  `prescricao` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `tb_consultas`
--

INSERT INTO `tb_consultas` (`id`, `resident_id`, `data_consulta`, `horario`, `medico`, `especialidade`, `observacoes`, `prescricao`) VALUES
(1, 101, '2025-06-01', '09:00:00', 'Dr. João Silva', 'Cardiologia', 'Paciente com pressão alta.', 'Losartana 50mg 1x ao dia'),
(2, 102, '2025-06-03', '10:30:00', 'Dra. Ana Souza', 'Geriatria', 'Consulta de rotina.', 'Vitamina D 1000UI'),
(3, 103, '2025-05-26', '14:00:00', 'Dr. Pedro Lima', 'Ortopedia', 'Dor no joelho esquerdo.', 'Fisioterapia 2x por semana'),
(4, 104, '2025-06-13', '08:45:00', 'Dra. Beatriz Mendes', 'Clínico Geral', 'Paciente com tosse seca.', 'Xarope expectorante'),
(5, 105, '2025-06-05', '13:15:00', 'Dr. Marcelo Tavares', 'Neurologia', 'Esquecimento frequente.', 'Rivastigmina 1,5mg'),
(6, 106, '2025-06-02', '11:00:00', 'Dra. Helena Castro', 'Psiquiatria', 'Quadro leve de ansiedade.', 'Sertralina 50mg'),
(7, 107, '2025-06-10', '09:30:00', 'Dr. Carlos Henrique', 'Dermatologia', 'Lesões na pele.', 'Pomada dermatológica'),
(8, 108, '2025-05-31', '15:00:00', 'Dra. Patrícia Gomes', 'Geriatria', 'Acompanhamento mensal.', 'Sem prescrição no momento'),
(9, 109, '2025-05-16', '10:00:00', 'Dr. João Silva', 'Cardiologia', 'Arritmia leve.', 'Monitoramento com ECG'),
(10, 110, '2025-05-30', '14:30:00', 'Dra. Ana Souza', 'Geriatria', 'Paciente com fadiga.', 'Hemograma completo solicitado'),
(11, 111, '2025-05-30', '09:00:00', 'Dr. Pedro Lima', 'Ortopedia', 'Dor lombar crônica.', 'Uso de cinta lombar'),
(12, 112, '2025-06-11', '16:00:00', 'Dra. Beatriz Mendes', 'Clínico Geral', 'Resfriado comum.', 'Repouso e hidratação'),
(13, 113, '2025-06-12', '08:30:00', 'Dr. Marcelo Tavares', 'Neurologia', 'Tontura e vertigem.', 'Exame de imagem solicitado'),
(14, 114, '2025-06-14', '10:45:00', 'Dra. Helena Castro', 'Psiquiatria', 'Melhora do quadro depressivo.', 'Manter medicação'),
(15, 115, '2025-05-22', '13:00:00', 'Dr. Carlos Henrique', 'Dermatologia', 'Micose no pé.', 'Antifúngico tópico'),
(16, 116, '2025-05-19', '11:30:00', 'Dra. Patrícia Gomes', 'Geriatria', 'Check-up geral.', 'Controle de pressão arterial'),
(17, 117, '2025-06-10', '15:30:00', 'Dr. João Silva', 'Cardiologia', 'Hipertensão controlada.', 'Manter medicação'),
(18, 118, '2025-06-14', '10:15:00', 'Dra. Ana Souza', 'Geriatria', 'Perda de apetite.', 'Suplementação nutricional'),
(19, 119, '2025-05-26', '08:00:00', 'Dr. Pedro Lima', 'Ortopedia', 'Avaliação pós-fratura.', 'Sem restrições, liberar caminhada'),
(20, 120, '2025-06-10', '14:45:00', 'Dra. Beatriz Mendes', 'Clínico Geral', 'Revisão de exames.', 'Exames dentro da normalidade'),
(21, 121, '2025-05-20', '13:45:00', 'Dr. Marcelo Tavares', 'Neurologia', 'Crises de cefaleia.', 'Análise de padrão alimentar'),
(22, 122, '2025-05-22', '11:15:00', 'Dra. Helena Castro', 'Psiquiatria', 'Quadro estável.', 'Manter acompanhamento mensal'),
(23, 123, '2025-06-04', '09:45:00', 'Dr. Carlos Henrique', 'Dermatologia', 'Avaliação de mancha escura.', 'Biopsia agendada'),
(24, 124, '2025-06-03', '15:15:00', 'Dra. Patrícia Gomes', 'Geriatria', 'Monitoramento de diabetes.', 'Metformina 500mg'),
(25, 125, '2025-05-20', '10:30:00', 'Dr. João Silva', 'Cardiologia', 'Eletrocardiograma de rotina.', 'Sem alterações');

-- --------------------------------------------------------

--
-- Estrutura para tabela `tb_medicamentos`
--

CREATE TABLE `tb_medicamentos` (
  `id` int(11) NOT NULL,
  `resident_id` int(11) NOT NULL,
  `nome_medicamento` varchar(255) NOT NULL,
  `horario` time DEFAULT NULL,
  `dosagem` varchar(100) DEFAULT NULL,
  `via_adm` varchar(100) DEFAULT NULL,
  `observacoes` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `tb_medicamentos`
--

INSERT INTO `tb_medicamentos` (`id`, `resident_id`, `nome_medicamento`, `horario`, `dosagem`, `via_adm`, `observacoes`) VALUES
(1, 101, 'Losartana', '08:00:00', '50mg', 'Oral', 'Tomar em jejum'),
(2, 102, 'Sinvastatina', '21:00:00', '20mg', 'Oral', 'Evitar alimentos gordurosos'),
(3, 103, 'AAS', '07:30:00', '100mg', 'Oral', 'Após o café'),
(4, 104, 'Levotiroxina', '06:00:00', '75mcg', 'Oral', 'Tomar 30 minutos antes do café'),
(5, 105, 'Captopril', '12:00:00', '25mg', 'Oral', 'Manter pressão controlada'),
(6, 106, 'Sertralina', '09:00:00', '50mg', 'Oral', 'Evitar álcool'),
(7, 107, 'Omeprazol', '07:00:00', '20mg', 'Oral', 'Tomar em jejum'),
(8, 108, 'Metformina', '13:00:00', '850mg', 'Oral', 'Tomar com alimento'),
(9, 109, 'Omeprazol', '08:30:00', '20mg', 'Oral', 'Tomar antes do café'),
(10, 110, 'Rivastigmina', '10:00:00', '1,5mg', 'Oral', 'Avaliar efeitos colaterais'),
(11, 111, 'Atenolol', '08:00:00', '50mg', 'Oral', 'Monitorar pressão'),
(12, 112, 'Sinvastatina', '20:30:00', '10mg', 'Oral', 'Tomar à noite'),
(13, 113, 'Enalapril', '11:00:00', '10mg', 'Oral', 'Acompanhar frequência cardíaca'),
(14, 114, 'Omeprazol', '07:00:00', '20mg', 'Oral', 'Tomar antes do café'),
(15, 115, 'Metformina', '19:00:00', '500mg', 'Oral', 'Evitar jejum prolongado'),
(16, 116, 'Sertralina', '09:00:00', '25mg', 'Oral', 'Tomar sempre no mesmo horário'),
(17, 117, 'Rivastigmina', '08:00:00', '1,5mg', 'Oral', 'Observar sonolência'),
(18, 118, 'Captopril', '12:00:00', '25mg', 'Oral', 'Acompanhar pressão arterial'),
(19, 119, 'AAS', '07:00:00', '100mg', 'Oral', 'Evitar uso junto com antiinflamatórios'),
(20, 120, 'Levotiroxina', '06:30:00', '50mcg', 'Oral', 'Jejum absoluto de 30 minutos'),
(21, 121, 'Amiodarona', '10:00:00', '200mg', 'Oral', 'Monitorar ritmo cardíaco'),
(22, 122, 'Atenolol', '09:00:00', '25mg', 'Oral', 'Verificar pressão arterial antes'),
(23, 123, 'Clonazepam', '22:00:00', '0,5mg', 'Oral', 'Uso noturno para ansiedade'),
(24, 124, 'Metformina', '13:00:00', '850mg', 'Oral', 'Tomar após almoço'),
(25, 125, 'Omeprazol', '07:00:00', '20mg', 'Oral', 'Em jejum, antes do café');

-- --------------------------------------------------------

--
-- Estrutura para tabela `tb_residentes`
--

CREATE TABLE `tb_residentes` (
  `id` int(11) NOT NULL,
  `nome` varchar(255) NOT NULL,
  `data_nasc` date DEFAULT NULL,
  `cpf` varchar(14) NOT NULL,
  `rg` varchar(20) DEFAULT NULL,
  `telefone` varchar(20) DEFAULT NULL,
  `endereco` text DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `quarto` varchar(50) DEFAULT NULL,
  `medicamentos` text DEFAULT NULL,
  `alergias` text DEFAULT NULL,
  `restricoes_alimentares` text DEFAULT NULL,
  `responsavel_nome` varchar(255) DEFAULT NULL,
  `responsavel_telefone` varchar(20) DEFAULT NULL,
  `responsavel_email` varchar(100) DEFAULT NULL,
  `parente_grau` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `tb_residentes`
--

INSERT INTO `tb_residentes` (`id`, `nome`, `data_nasc`, `cpf`, `rg`, `telefone`, `endereco`, `email`, `quarto`, `medicamentos`, `alergias`, `restricoes_alimentares`, `responsavel_nome`, `responsavel_telefone`, `responsavel_email`, `parente_grau`) VALUES
(101, 'Antônio da Silva', '1940-05-12', '123.456.789-00', 'MG-12.345.678', '(31) 99888-1122', 'Rua das Flores, 100 - BH', 'antonio.silva@email.com', 'A101', 'Losartana', 'Nenhuma', 'Diabetes', 'Maria Silva', '(31) 99111-2233', 'maria.silva@email.com', 'Filha'),
(102, 'Joana Pereira', '1935-08-23', '987.654.321-00', 'SP-98.765.432', '(11) 98888-3344', 'Av. Paulista, 500 - SP', 'joana.pereira@email.com', 'A102', 'Sinvastatina', 'Dipirona', 'Intolerância à lactose', 'Carlos Pereira', '(11) 99222-4455', 'carlos.p@email.com', 'Filho'),
(103, 'Carlos Souza', '1942-10-15', '321.654.987-00', 'RJ-56.789.123', '(21) 97777-5566', 'Rua das Palmeiras, 200 - RJ', 'carlos.souza@email.com', 'A103', 'AAS, Omeprazol', 'Nenhuma', 'Nenhuma', 'Luciana Souza', '(21) 99666-7788', 'luciana@email.com', 'Filha'),
(104, 'Maria Aparecida', '1938-03-05', '147.258.369-00', 'MG-45.789.123', '(31) 98777-8899', 'Rua Afonso Pena, 123 - BH', 'm.aparecida@email.com', 'A104', 'Levotiroxina', 'Penicilina', 'Glúten', 'Paulo Aparecido', '(31) 99888-0000', 'paulo@email.com', 'Filho'),
(105, 'José Almeida', '1945-07-30', '963.852.741-00', 'BA-32.145.987', '(71) 99888-1122', 'Av. Sete, 77 - Salvador', 'jose.almeida@email.com', 'A105', 'Captopril', 'Nenhuma', 'Nenhuma', 'Fernanda Almeida', '(71) 98111-2233', 'fernanda@email.com', 'Neta'),
(106, 'Ana Lúcia Ramos', '1939-01-10', '852.741.963-00', 'PR-44.556.778', '(41) 99999-3344', 'Rua XV de Novembro, 88 - Curitiba', 'ana.lucia@email.com', 'A106', 'Sertralina', 'Iodo', 'Nenhuma', 'Marcelo Ramos', '(41) 98222-4455', 'marcelo@email.com', 'Filho'),
(107, 'Pedro Oliveira', '1941-11-11', '741.963.852-00', 'RS-33.221.110', '(51) 98765-4321', 'Rua Independência, 66 - Porto Alegre', 'pedro.oliveira@email.com', 'A107', 'Losartana, Sinvastatina', 'Nenhuma', 'Nenhuma', 'Sônia Oliveira', '(51) 99876-5432', 'sonia@email.com', 'Filha'),
(108, 'Helena Costa', '1937-04-22', '369.258.147-00', 'SC-99.887.665', '(48) 99887-7766', 'Rua do Sol, 10 - Florianópolis', 'helena.costa@email.com', 'A108', 'Metformina', 'Amendoim', 'Diabetes', 'Rodrigo Costa', '(48) 99777-8899', 'rodrigo@email.com', 'Filho'),
(109, 'Francisco Lima', '1943-12-19', '159.753.486-00', 'CE-55.443.221', '(85) 99766-5544', 'Av. Beira Mar, 999 - Fortaleza', 'francisco.lima@email.com', 'A109', 'Omeprazol', 'Nenhuma', 'Nenhuma', 'Camila Lima', '(85) 99666-4433', 'camila@email.com', 'Neta'),
(110, 'Beatriz Ferreira', '1940-06-01', '258.147.369-00', 'PE-77.665.443', '(81) 99876-3322', 'Rua da Aurora, 56 - Recife', 'beatriz.ferreira@email.com', 'A110', 'Rivastigmina', 'Nenhuma', 'Nenhuma', 'Roberto Ferreira', '(81) 99555-2211', 'roberto@email.com', 'Filho'),
(111, 'Osvaldo Santos', '1944-08-08', '111.222.333-44', 'SP-11.223.344', '(11) 91234-5678', 'Rua B, 123 - SP', 'osvaldo@email.com', 'B201', 'Atenolol', 'Nenhuma', 'Nenhuma', 'Marina Santos', '(11) 93456-7890', 'marina@email.com', 'Filha'),
(112, 'Laura Nogueira', '1936-09-29', '222.333.444-55', 'RJ-22.334.455', '(21) 92345-6789', 'Rua C, 456 - RJ', 'laura@email.com', 'B202', 'Sinvastatina', 'Frutos do mar', 'Nenhuma', 'Ricardo Nogueira', '(21) 95678-9012', 'ricardo@email.com', 'Filho'),
(113, 'Mário Goulart', '1941-03-12', '333.444.555-66', 'MG-33.445.566', '(31) 93456-7890', 'Rua D, 789 - BH', 'mario@email.com', 'B203', 'Enalapril', 'Nenhuma', 'Hipertensão', 'Letícia Goulart', '(31) 97890-1234', 'leticia@email.com', 'Neta'),
(114, 'Irene Cunha', '1933-07-03', '444.555.666-77', 'RS-44.556.677', '(51) 94567-8901', 'Rua E, 101 - POA', 'irene@email.com', 'B204', 'Omeprazol', 'Glúten', 'Glúten', 'Jorge Cunha', '(51) 91234-5678', 'jorge@email.com', 'Filho'),
(115, 'Vicente Rocha', '1942-02-17', '555.666.777-88', 'BA-55.667.788', '(71) 95678-9012', 'Rua F, 202 - SSA', 'vicente@email.com', 'B205', 'Metformina', 'Nenhuma', 'Diabetes', 'Daniela Rocha', '(71) 96789-0123', 'daniela@email.com', 'Filha'),
(116, 'Clara Mendes', '1934-11-25', '666.777.888-99', 'PR-66.778.899', '(41) 96789-0123', 'Rua G, 303 - CWB', 'clara@email.com', 'B206', 'Sertralina', 'Lactose', 'Lactose', 'Tiago Mendes', '(41) 97890-1234', 'tiago@email.com', 'Neto'),
(117, 'Alfredo Meireles', '1943-10-10', '777.888.999-00', 'SC-77.889.900', '(48) 97890-1234', 'Rua H, 404 - FLN', 'alfredo@email.com', 'B207', 'Rivastigmina', 'Nenhuma', 'Nenhuma', 'Lucas Meireles', '(48) 98901-2345', 'lucas@email.com', 'Filho'),
(118, 'Teresa Farias', '1939-06-21', '888.999.000-11', 'CE-88.990.011', '(85) 98901-2345', 'Rua I, 505 - FOR', 'teresa@email.com', 'B208', 'Captopril', 'Penicilina', 'Nenhuma', 'Patrícia Farias', '(85) 99012-3456', 'patricia@email.com', 'Filha'),
(119, 'Renato Braga', '1945-04-09', '999.000.111-22', 'PE-99.001.122', '(81) 99012-3456', 'Rua J, 606 - REC', 'renato@email.com', 'B209', 'AAS', 'Nenhuma', 'Nenhuma', 'Gabriel Braga', '(81) 90123-4567', 'gabriel@email.com', 'Filho'),
(120, 'Elza Mattos', '1937-01-30', '000.111.222-33', 'AM-00.112.233', '(92) 90123-4567', 'Rua K, 707 - Manaus', 'elza@email.com', 'B210', 'Levotiroxina', 'Nenhuma', 'Nenhuma', 'Renata Mattos', '(92) 91234-5678', 'renata@email.com', 'Filha'),
(121, 'Sebastião Cardoso', '1936-03-03', '123.321.456-00', 'MG-10.203.405', '(31) 93412-1245', 'Rua Nova, 11 - BH', 'sebastiao@email.com', 'C301', 'Amiodarona', 'Nenhuma', 'Nenhuma', 'Cláudia Cardoso', '(31) 93412-1246', 'claudia@email.com', 'Filha'),
(122, 'Luiza Rocha', '1941-09-15', '654.987.321-00', 'SP-30.405.607', '(11) 93412-1247', 'Rua das Acácias, 300 - SP', 'luiza@email.com', 'C302', 'Atenolol', 'Aspirina', 'Nenhuma', 'João Rocha', '(11) 93412-1248', 'joao@email.com', 'Filho'),
(123, 'Raimundo Ferreira', '1938-12-01', '456.789.123-00', 'RJ-50.607.809', '(21) 93412-1249', 'Rua dos Ipês, 700 - RJ', 'raimundo@email.com', 'C303', 'Clonazepam', 'Nenhuma', 'Nenhuma', 'Fernanda Ferreira', '(21) 93412-1250', 'fernanda@email.com', 'Filha'),
(124, 'Nair Barbosa', '1940-10-25', '321.456.789-00', 'BA-70.809.010', '(71) 93412-1251', 'Rua das Palmeiras, 900 - SSA', 'nair@email.com', 'C304', 'Metformina', 'Nenhuma', 'Diabetes', 'Eduardo Barbosa', '(71) 93412-1252', 'eduardo@email.com', 'Filho'),
(125, 'Doralice Antunes', '1935-02-02', '789.123.456-00', 'RS-90.010.211', '(51) 93412-1253', 'Rua Central, 1000 - POA', 'doralice@email.com', 'C305', 'Omeprazol', 'Nenhuma', 'Nenhuma', 'Patrícia Antunes', '(51) 93412-1254', 'patricia@email.com', 'Filha');

-- --------------------------------------------------------

--
-- Estrutura para tabela `tb_users`
--

CREATE TABLE `tb_users` (
  `id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `data_criacao` datetime DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `tb_users`
--

INSERT INTO `tb_users` (`id`, `username`, `password`, `data_criacao`) VALUES
(1, 'admin', '$2y$10$7R1il8UilsbAgbY1iKXKg.3NUeOQRvOwCQOeTeWR3OpXiSTl93FDy', '2025-05-15 15:43:25'),
(5, 'Enf_Silva', 'senha123', '2025-05-15 17:18:47'),
(6, 'Cuidador_Oliveira', 'senha456', '2025-05-15 17:18:47'),
(7, 'Adm_Santos', 'senha789', '2025-05-15 17:18:48'),
(8, 'Apoio_Ribeiro', 'senhaabc', '2025-05-15 17:18:48'),
(9, 'BemEstar_Equipe1', 'senhadef', '2025-05-15 17:18:48'),
(10, 'Senior_Cuidados', 'senhaghi', '2025-05-15 17:18:48'),
(11, 'LarDoceLar_Func', 'senhajkl', '2025-05-15 17:18:48'),
(12, 'Equipe_Atençao', 'senhamno', '2025-05-15 17:18:48'),
(13, 'Cuidado_Profissional', 'senhapqr', '2025-05-15 17:18:48'),
(14, 'Gestao_Senior', 'senhastu', '2025-05-15 17:18:48');

--
-- Índices para tabelas despejadas
--

--
-- Índices de tabela `tb_consultas`
--
ALTER TABLE `tb_consultas`
  ADD PRIMARY KEY (`id`),
  ADD KEY `resident_id` (`resident_id`);

--
-- Índices de tabela `tb_medicamentos`
--
ALTER TABLE `tb_medicamentos`
  ADD PRIMARY KEY (`id`),
  ADD KEY `resident_id` (`resident_id`);

--
-- Índices de tabela `tb_residentes`
--
ALTER TABLE `tb_residentes`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `cpf` (`cpf`),
  ADD UNIQUE KEY `rg` (`rg`);

--
-- Índices de tabela `tb_users`
--
ALTER TABLE `tb_users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`);

--
-- AUTO_INCREMENT para tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `tb_consultas`
--
ALTER TABLE `tb_consultas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT de tabela `tb_medicamentos`
--
ALTER TABLE `tb_medicamentos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT de tabela `tb_residentes`
--
ALTER TABLE `tb_residentes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=126;

--
-- AUTO_INCREMENT de tabela `tb_users`
--
ALTER TABLE `tb_users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- Restrições para tabelas despejadas
--

--
-- Restrições para tabelas `tb_consultas`
--
ALTER TABLE `tb_consultas`
  ADD CONSTRAINT `tb_consultas_ibfk_1` FOREIGN KEY (`resident_id`) REFERENCES `tb_residentes` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Restrições para tabelas `tb_medicamentos`
--
ALTER TABLE `tb_medicamentos`
  ADD CONSTRAINT `tb_medicamentos_ibfk_1` FOREIGN KEY (`resident_id`) REFERENCES `tb_residentes` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
