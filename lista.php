<?php
session_start(); 

$alunos = isset($_SESSION['alunos']) ? $_SESSION['alunos'] : [];

// Ordena os alunos pelo RA
usort($alunos, function($a, $b) {
    return $a['ra'] <=> $b['ra'];
});
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista de Alunos</title>
    <link rel="stylesheet" href="menu.css">
</head>
<body>
    <header>
        <h1>Lista de Alunos</h1>
    </header>
    <nav>
        <h2>Menu</h2>
        <ul>
            <li><a href="index.html">Cadastro de Alunos</a></li>
            <li><a href="lista.php">Lista de Alunos</a></li>
        </ul>
    </nav>
    <section>
        <form id="excluirForm" action="excluirAlunos.php" method="POST">
            <fieldset>
                <legend>Alunos Cadastrados</legend>
                <?php if (count($alunos) > 0): ?>
                    <table border="1">
                        <thead>
                            <tr>
                                <th>Nome</th>
                                <th>RA</th>
                                <th>Sexo</th>
                                <th>Idade</th>
                                <th>Endereço</th>
                                <th>Telefone</th>
                                <th>E-mail</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($alunos as $aluno): ?>
                            <tr>
                                <td><?php echo htmlspecialchars($aluno['nome']); ?></td>
                                <td><?php echo htmlspecialchars($aluno['ra']); ?></td>
                                <td><?php echo htmlspecialchars($aluno['sexo']); ?></td>
                                <td><?php echo htmlspecialchars($aluno['idade']); ?></td>
                                <td><?php echo htmlspecialchars($aluno['endereco']); ?></td>
                                <td><?php echo htmlspecialchars($aluno['telefone']); ?></td>
                                <td><?php echo htmlspecialchars($aluno['email']); ?></td>
                            </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>

        <!-- Botão para excluir alunos -->
            <br>
            <input type="button" value="Excluir Todos os Alunos" onclick="confirmarExclusao()">
        </form>

                <?php else: ?>
                    <p>Nenhum aluno cadastrado até o momento.</p>
                <?php endif; ?>
            </fieldset>
    </section>

    <script>
        function confirmarExclusao() {
            const confirmation = confirm("Certeza que deseja excluir todos os alunos?");
            if (confirmation) {
                console.log("confirmarExclusao chamada");
                const form = document.getElementById("excluirForm");
                if (form) {
                    form.submit(); 
                } else {
                    console.error("Formulário não encontrado.");
                }
            }
        }
    </script>
</body>
</html>
