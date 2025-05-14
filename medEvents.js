 // Preenche os campos do formulário ao clicar em uma linha da tabela
    document.querySelectorAll('.editable-row').forEach(row => {
        row.addEventListener('click', () => {
            document.getElementById('form-action').value = 'update'; // Define a ação como "update"
            document.getElementById('medicamento-id').value = row.getAttribute('data-id');
            document.getElementById('resident_id').value = row.getAttribute('data-resident_id');
            document.getElementById('nome_medicamento').value = row.getAttribute('data-nome_medicamento');
            document.getElementById('horario').value = row.getAttribute('data-horario');
            document.getElementById('dosagem').value = row.getAttribute('data-dosagem');
            document.getElementById('via_adm').value = row.getAttribute('data-via_adm');
            document.getElementById('observacoes').value = row.getAttribute('data-observacoes');
            document.getElementById('submit-button').textContent = 'Atualizar Medicamento'; // Altera o texto do botão
        });
    });

    // Reseta o formulário para "create" ao recarregar a página
    document.addEventListener('DOMContentLoaded', () => {
        document.getElementById('form-action').value = 'create';
        document.getElementById('submit-button').textContent = 'Cadastrar Medicamento';
    });

    // Limpa os campos do formulário ao pressionar "Criar Novo"
    document.getElementById('new-button').addEventListener('click', () => {
        document.getElementById('form-action').value = 'create'; // Define a ação como "create"
        document.getElementById('medicamento-id').value = '';
        document.getElementById('resident_id').value = '';
        document.getElementById('nome_medicamento').value = '';
        document.getElementById('horario').value = '';
        document.getElementById('dosagem').value = '';
        document.getElementById('via_adm').value = '';
        document.getElementById('observacoes').value = '';
        document.getElementById('submit-button').textContent = 'Cadastrar Medicamento'; // Altera o texto do botão
    });

    // Limpa os campos do formulário ao pressionar "Criar Novo"
    document.getElementById('new-button').addEventListener('click', () => {
        document.getElementById('medicamento-id').value = '';
        document.getElementById('resident_id').value = '';
        document.getElementById('nome_medicamento').value = '';
        document.getElementById('horario').value = '';
        document.getElementById('dosagem').value = '';
        document.getElementById('via_adm').value = '';
        document.getElementById('observacoes').value = '';
    });