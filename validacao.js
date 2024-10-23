document.getElementById('cadastroForm').addEventListener('submit', function(event) {
    event.preventDefault(); 

    var nome = document.getElementById("nome").value;
    var ra = document.getElementById("ra").value;
    var idade = document.getElementById("idade").value;
    var endereco = document.getElementById("endereco").value;
    var telefone = document.getElementById("telefone").value;
    var email = document.getElementById("email").value;
    var sexo = document.querySelector('input[name="sexo"]:checked');

    // Verificando se os campos obrigatórios foram preenchidos
    if (!nome || !ra || !idade || !endereco || !telefone || !email || !sexo) {
        Swal.fire({
            icon: 'error',
            title: 'Erro',
            text: 'Todos os campos são obrigatórios. Por favor, preencha todas as informações.',
            confirmButtonText: 'OK'
        });
        return;
    }

    // Dados que serão enviados via AJAX
    var formData = new FormData();
    formData.append('nome', nome);
    formData.append('ra', ra);
    formData.append('sexo', sexo.value);
    formData.append('idade', idade);
    formData.append('endereco', endereco);
    formData.append('telefone', telefone);
    formData.append('email', email);

    // Enviando os dados via AJAX para o servidor (arquivo PHP)
    fetch('cadastrar.php', {
        method: 'POST',
        body: formData
    })
    .then(response => response.json())
    .then(data => {
        if (data.success) {
            Swal.fire({
                icon: 'success',
                title: 'Sucesso',
                text: 'Cadastro realizado com sucesso!',
                confirmButtonText: 'OK'
            });

            // Limpar o formulário após cadastro
            document.getElementById('cadastroForm').reset();
        } else {
            Swal.fire({
                icon: 'error',
                title: 'Erro',
                text: data.message,
                confirmButtonText: 'OK'
            });
        }
    })
    .catch(error => {
        Swal.fire({
            icon: 'error',
            title: 'Erro',
            text: 'Ocorreu um erro ao tentar cadastrar. Tente novamente.',
            confirmButtonText: 'OK'
        });
    });
});