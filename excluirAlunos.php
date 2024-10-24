<?php
session_start();

// Limpe o array de alunos 
$_SESSION['alunos'] = []; 

header("Location: lista.php");
exit();
?>
