<?php
require_once 'classes/Sessao.php';
require_once 'classes/Autenticador.php';
require_once 'classes/Usuario.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL);
    $senha = $_POST['senha'] ?? '';
    $lembrar = isset($_POST['lembrar_email']);

    $erros = [];
    if (empty($email) || !filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $erros[] = 'E-mail inválido.';
    }
    if (empty($senha)) {
        $erros[] = 'Senha é obrigatória.';
    }

    if (!empty($erros)) {
        Sessao::set('erros_login', $erros);
        header('Location: login.php');
        exit;
    }

    $usuario = Autenticador::login($email, $senha);

    if ($usuario) {
        Sessao::set('usuario', [
            'nome' => $usuario->getNome(),
            'email' => $usuario->getEmail()
        ]);

        if ($lembrar) {
            setcookie('email', $usuario->getEmail(), time() + 30*24*60*60, '/');
        } else {
            setcookie('email', '', time() - 3600, '/');
        }

        header('Location: dashboard.php');
    } else {
        Sessao::set('erros_login', ['E-mail ou senha incorretos.']);
        header('Location: login.php');
    }
    exit;
}

header('Location: login.php');