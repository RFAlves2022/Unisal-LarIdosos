-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 14/05/2025 às 22:20
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
(1, 11, '2025-05-01', '09:00:00', 'Dra. Helena Prado', 'Geriatria', 'Check-up anual. Sem alterações significativas.', 'Continuar com medicação atual.'),
(2, 2, '2025-05-14', '10:30:00', 'Dr. Marcelo Tavares', 'Cardiologia', 'Paciente relata cansaço leve.', 'Ecodoppler agendado.'),
(3, 3, '2025-05-14', '11:15:00', 'Dra. Aline Costa', 'Neurologia', 'Revisão pós-AVC. Quadro estável.', 'Ajuste de dosagem de sinvastatina.'),
(4, 4, '2025-05-14', '08:45:00', 'Dr. Gustavo Lima', 'Ortopedia', 'Dor no joelho direito ao caminhar.', 'Prescrita fisioterapia 2x semana.'),
(5, 5, '2025-05-14', '14:00:00', 'Dra. Paula Mendes', 'Clínico Geral', 'Paciente com quadro gripal.', 'Hidratação, repouso e dipirona.'),
(6, 6, '2025-05-14', '15:30:00', 'Dr. Fernando Rocha', 'Dermatologia', 'Lesões na pele, provavelmente alérgicas.', 'Prescrito antialérgico tópico.'),
(7, 7, '2025-05-14', '13:00:00', 'Dra. Juliana Maia', 'Geriatria', 'Monitoramento de pressão arterial.', 'Reforçar controle com dieta.'),
(8, 8, '2025-05-14', '10:00:00', 'Dr. Henrique Silva', 'Psiquiatria', 'Paciente ansioso e insônia leve.', 'Prescrito calmante leve à noite.'),
(9, 9, '2025-05-14', '16:15:00', 'Dra. Camila Torres', 'Nutrição', 'Perda de apetite observada.', 'Introduzir suplemento alimentar.'),
(10, 10, '2025-05-14', '09:45:00', 'Dr. Ricardo Fonseca', 'Oftalmologia', 'Revisão de grau dos óculos.', 'Recomendada nova receita de lentes.'),
(12, 2, '2025-06-12', '10:00:00', 'Dra. Luana Campos', 'Endocrinologia', 'Avaliação de controle glicêmico.', 'Ajustar dose de insulina NPH.'),
(13, 3, '2025-06-13', '11:00:00', 'Dr. Eduardo Lima', 'Neurologia', 'Revisão pós-queda recente.', 'Solicitado exame de imagem.'),
(14, 4, '2025-06-14', '14:30:00', 'Dra. Marina Soares', 'Geriatria', 'Acompanhamento de pressão arterial.', 'Continuar medicação atual.'),
(15, 5, '2025-06-15', '15:00:00', 'Dr. Henrique Souza', 'Ortopedia', 'Dores articulares no ombro esquerdo.', 'Indicado alongamento e compressa.'),
(16, 7, '2025-06-16', '08:00:00', 'Dra. Fernanda Teles', 'Psicologia', 'Queixas de insônia e ansiedade leve.', 'Recomendada sessão semanal.'),
(17, 2, '2025-06-17', '09:00:00', 'Dr. Bruno Andrade', 'Dermatologia', 'Lesões de pele avermelhadas.', 'Prescrito pomada antifúngica.'),
(18, 3, '2025-06-18', '10:30:00', 'Dra. Carla Monteiro', 'Cardiologia', 'Palpitações frequentes relatadas.', 'Solicitado eletrocardiograma.'),
(19, 4, '2025-06-19', '11:15:00', 'Dr. André Rocha', 'Urologia', 'Dificuldade urinária noturna.', 'Receitado tansulosina.'),
(20, 5, '2025-06-20', '13:45:00', 'Dra. Patrícia Nunes', 'Nutrição', 'Redução de apetite e perda de peso.', 'Incluir suplemento alimentar diário.'),
(21, 7, '2025-06-11', '09:30:00', 'Dr. Rafael Moreira', 'Clínico Geral', 'Paciente com dor abdominal leve.', 'Prescrito buscopan e repouso.');

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
(1, 2, 'Losartana', '08:00:00', '50mg', 'Oral', 'Tomar pela manhã.'),
(2, 3, 'Metformina', '12:00:00', '850mg', 'Oral', 'Antes das refeições.'),
(3, 8, 'Atenolol', '08:00:00', '25mg', 'Oral', 'Tomar em jejum.'),
(4, 9, 'Omeprazol', '07:30:00', '20mg', 'Oral', 'Tomar 30 minutos antes do café.'),
(5, 2, 'Sinvastatina', '22:00:00', '20mg', 'Oral', 'Evitar bebidas alcoólicas.'),
(6, 2, 'Paracetamol', '12:00:00', '500mg', 'Oral', 'Em caso de dor ou febre.'),
(7, 3, 'Insulina NPH', '06:30:00', '10UI', 'Subcutânea', 'Aplicar 30 min antes das refeições.'),
(9, 4, 'Clopidogrel', '08:15:00', '75mg', 'Oral', 'Uso contínuo.'),
(11, 5, 'Levotiroxina', '07:00:00', '100mcg', 'Oral', 'Tomar 30 minutos antes do café.'),
(12, 5, 'Diazepam', '21:00:00', '10mg', 'Oral', 'Ajudar no sono.');

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
(2, 'João da Silva', '1945-06-12', '12345678900', '1122233', '(11) 91234-5678', 'Rua A, 123', 'joao@email.com', '101', 'Aspirina', 'Nenhuma', 'Sem restrições', 'Maria da Silva', '(11) 91111-2222', 'maria@email.com', 'Filha'),
(3, 'Ana Oliveira', '1938-03-22', '23456789011', '2233444', '(11) 92345-6789', 'Rua B, 456', 'ana@email.com', '102', 'Insulina', 'Látex', 'Sem açúcar', 'Carlos Oliveira', '(11) 93333-4444', 'carlos@email.com', 'Filho'),
(4, 'Carlos Souza', '1949-11-08', '34567890122', '3344555', '(11) 93456-7890', 'Rua C, 789', 'carlos@email.com', '103', 'Losartana', 'Nenhuma', 'Pouco sal', 'Fernanda Souza', '(11) 94444-5555', 'fernanda@email.com', 'Filha'),
(5, 'Maria Santos', '1955-01-15', '45678901233', '4455666', '(11) 94567-8901', 'Rua D, 101', 'maria@email.com', '104', 'Atorvastatina', 'Glúten', 'Sem glúten', 'João Santos', '(11) 95555-6666', 'joao@email.com', 'Filho'),
(6, 'José Ferreira', '1942-05-03', '56789012344', '5566777', '(11) 95678-9012', 'Rua E, 202', 'jose@email.com', '105', 'Omeprazol', 'Poeira', 'Sem frituras', 'Lucia Ferreira', '(11) 96666-7777', 'lucia@email.com', 'Esposa'),
(7, 'Helena Costa', '1937-09-27', '67890123455', '6677888', '(11) 96789-0123', 'Rua F, 303', 'helena@email.com', '106', 'Metformina', 'Nenhuma', 'Sem lactose', 'Marcos Costa', '(11) 97777-8888', 'marcos@email.com', 'Filho'),
(8, 'Paulo Lima', '1948-12-19', '78901234566', '7788999', '(11) 97890-1234', 'Rua G, 404', 'paulo@email.com', '107', 'Losartana', 'Pólen', 'Sem temperos fortes', 'Ana Lima', '(11) 98888-9999', 'ana@email.com', 'Filha'),
(9, 'Sônia Martins', '1951-08-05', '89012345677', '8899000', '(11) 98901-2345', 'Rua H, 505', 'sonia@email.com', '108', 'Atenolol', 'Amendoim', 'Sem nozes', 'Rafael Martins', '(11) 90000-1111', 'rafael@email.com', 'Filho'),
(10, 'Antônio Rocha', '1940-04-11', '90123456788', '9900111', '(11) 90012-3456', 'Rua I, 606', 'antonio@email.com', '109', 'Sinvastatina', 'Nenhuma', 'Pouco açúcar', 'Juliana Rocha', '(11) 91111-2222', 'juliana@email.com', 'Neta'),
(11, 'Luiza Almeida', '1936-10-29', '01234567899', '1011222', '(11) 91123-4567', 'Rua J, 707', 'luiza@email.com', '110', 'Clopidogrel', 'Nenhuma', 'Sem carne vermelha', 'Bruno Almeida', '(11) 92222-3333', 'bruno@email.com', 'Filho');

-- --------------------------------------------------------

--
-- Estrutura para tabela `tb_users`
--

CREATE TABLE `tb_users` (
  `id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `tb_users`
--

INSERT INTO `tb_users` (`id`, `username`, `password`) VALUES
(1, 'admin', '$2y$10$HZuafYRRJOaJ1appebzzU.Fu4gXAa/UJTdbD1pJWqwuETrgz6QCZG');

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT de tabela `tb_medicamentos`
--
ALTER TABLE `tb_medicamentos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT de tabela `tb_residentes`
--
ALTER TABLE `tb_residentes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT de tabela `tb_users`
--
ALTER TABLE `tb_users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

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
