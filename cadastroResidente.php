<?php 
include_once "dbConnection.php"; // Conexão com o banco de dados
include_once "authCheck.php"; // Verifica se o usuário está logado
include_once "header.php"; // Cabeçalho da página

/** TABELA DE RESIDENTES -  CRIAR TABELA
 * | Coluna                | Tipo         | Restrições                      | Descrição                                                                  |
|-----------------------|--------------|---------------------------------|----------------------------------------------------------------------------|
| id                    | INT          | PRIMARY KEY, AUTO_INCREMENT     | Identificador único do residente                                           |
| nome                  | VARCHAR(255) | NOT NULL                        | Nome completo do residente                                                  |
| data_nascimento       | DATE         |                                 | Data de nascimento do residente                                             |
| cpf                   | VARCHAR(14)  | UNIQUE                          | Cadastro de Pessoa Física do residente (único)                               |
| rg                    | VARCHAR(20)  | UNIQUE                          | Registro Geral do residente (único)                                         |
| endereco              | VARCHAR(255) |                                 | Endereço completo do residente                                               |
| telefone              | VARCHAR(20)  |                                 | Número de telefone do residente                                             |
| email                 | VARCHAR(100) |                                 | Endereço de e-mail do residente                                             |
| data_cadastro         | TIMESTAMP    | DEFAULT CURRENT_TIMESTAMP       | Data e hora em que o residente foi cadastrado                               |
| data_atualizacao      | TIMESTAMP    | DEFAULT CURRENT_TIMESTAMP, ON UPDATE CURRENT_TIMESTAMP | Data e hora da última atualização das informações do residente           |
| observacoes           | TEXT         |                                 | Observações adicionais sobre o residente                                   |
| quarto                | VARCHAR(50)  |                                 | Número ou identificação do quarto do residente                              |
| medicamentos          | TEXT         |                                 | Lista de medicamentos do residente                                          |
| alergias              | TEXT         |                                 | Lista de alergias do residente                                              |
| restricoes_alimentares| TEXT         |                                 | Restrições alimentares do residente                                         |
| responsavel_nome      | VARCHAR(255) |                                 | Nome completo do responsável pelo residente                                |
| responsavel_telefone  | VARCHAR(20)  |                                 | Telefone do responsável                                                     |
| responsavel_email     | VARCHAR(100) |                                 | E-mail do responsável                                                     |
| parente_grau          | VARCHAR(50)  |                                 | Grau de parentesco do responsável com o residente                          |
 */
?>

<main>

</main>


<?php include_once "footer.php"; // Rodapé da página ?>