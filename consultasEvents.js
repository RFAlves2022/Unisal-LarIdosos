// Verifica se os elementos existem antes de adicionar eventos
document.querySelectorAll('.editable-row').forEach(row => {
    if (row) {
        row.addEventListener('click', () => {
            const formAction = document.getElementById('form-action');
            const consultaId = document.getElementById('consulta-id');
            if (formAction && consultaId) {
                formAction.value = 'update';
                consultaId.value = row.getAttribute('data-id');
                document.getElementById('resident_id').value = row.getAttribute('data-resident_id');
                document.getElementById('data_consulta').value = row.getAttribute('data-data_consulta');
                document.getElementById('horario').value = row.getAttribute('data-horario');
                document.getElementById('medico').value = row.getAttribute('data-medico');
                document.getElementById('especialidade').value = row.getAttribute('data-especialidade');
                document.getElementById('observacoes').value = row.getAttribute('data-observacoes');
                document.getElementById('prescricao').value = row.getAttribute('data-prescricao');
                document.getElementById('submit-button').textContent = 'Atualizar Consulta';
            }
        });
    }
});

// Reseta o formulário para "create" ao recarregar a página
document.addEventListener('DOMContentLoaded', () => {
    document.getElementById('form-action').value = 'create';
    document.getElementById('submit-button').textContent = 'Cadastrar Consulta';
});

// Verifica se o botão "Criar Novo" existe antes de adicionar o evento
const newButton = document.getElementById('new-button');
if (newButton) {
    newButton.addEventListener('click', () => {
        const formAction = document.getElementById('form-action');
        const consultaId = document.getElementById('consulta-id');
        if (formAction && consultaId) {
            formAction.value = 'create';
            consultaId.value = '';
            document.getElementById('resident_id').value = '';
            document.getElementById('data_consulta').value = '';
            document.getElementById('horario').value = '';
            document.getElementById('medico').value = '';
            document.getElementById('especialidade').value = '';
            document.getElementById('observacoes').value = '';
            document.getElementById('prescricao').value = '';
            document.getElementById('submit-button').textContent = 'Cadastrar Consulta';
        }
    });
}

// Validação do formulário antes do envio
document.querySelector('form').addEventListener('submit', (event) => {
    const requiredFields = ['resident_id', 'data_consulta', 'medico'];
    let isValid = true;

    requiredFields.forEach(fieldId => {
        const field = document.getElementById(fieldId);
        if (!field.value.trim()) {
            isValid = false;
            field.classList.add('is-invalid'); // Adiciona uma classe para destacar o erro
        } else {
            field.classList.remove('is-invalid'); // Remove a classe caso o campo esteja preenchido
        }
    });

    if (!isValid) {
        event.preventDefault(); // Impede o envio do formulário
        alert('Por favor, preencha todos os campos obrigatórios.');
    }
});