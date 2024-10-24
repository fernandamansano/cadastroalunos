<?php

session_start();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Coleta os dados enviados
    $nome = $_POST['nome'] ?? '';
    $ra = $_POST['ra'] ?? '';
    $sexo = $_POST['sexo'] ?? '';
    $idade = $_POST['idade'] ?? '';
    $endereco = $_POST['endereco'] ?? '';
    $telefone = $_POST['telefone'] ?? '';
    $email = $_POST['email'] ?? '';

    if (!isset($_SESSION['alunos'])) {
        $_SESSION['alunos'] = [];
    }

    // Insere os dados no array 
    $_SESSION['alunos'][] = [
        'nome' => $nome,
        'ra' => $ra,
        'sexo' => $sexo,
        'idade' => $idade,
        'endereco' => $endereco,
        'telefone' => $telefone,
        'email' => $email
    ];

    header('Location: lista.php');
    exit;
} else {
    echo "Método de requisição inválido.";
}
?>