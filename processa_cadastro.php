<?php
require_once 'classes/Usuario.php';
require_once 'classes/Autenticador.php';
require_once 'classes/Sessao.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nome = filter_input(INPUT_POST, 'nome', FILTER_SANITIZE_STRING);
    $email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL);
    $senha = $_POST['senha'] ?? '';

    $erros = [];
    if (empty($nome)) {
        $erros[] = 'Nome é obrigatório.';
    }
    if (empty($email) || !filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $erros[] = 'E-mail inválido.';
    }
    if (empty($senha)) {
        $erros[] = 'Senha é obrigatória.';
    }

    if (!empty($erros)) {
        Sessao::set('erros_cadastro', $erros);
        header('Location: cadastro.php');
        exit;
    }

    $usuario = new Usuario($nome, $email, $senha);

    if (Autenticador::registrar($usuario)) {
        Sessao::set('sucesso', 'Cadastro realizado! Faça login.');
        header('Location: login.php');
    } else {
        Sessao::set('erros_cadastro', ['E-mail já cadastrado.']);
        header('Location: cadastro.php');
    }
    exit;
}

header('Location: cadastro.php');