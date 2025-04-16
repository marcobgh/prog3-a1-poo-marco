<?php
require_once 'classes/Sessao.php';

Sessao::iniciar();
$erros = Sessao::get('erros_cadastro') ?? [];
Sessao::set('erros_cadastro', []);
$sucesso = Sessao::get('sucesso') ?? '';
Sessao::set('sucesso', '');
?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Cadastro</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background: linear-gradient(135deg, #4f46e5 0%, #10b981 100%);
            min-height: 100vh;
        }
        .auth-card {
            background: rgba(255, 255, 255, 0.95);
            border-radius: 20px;
            box-shadow: 0 8px 32px rgba(0, 0, 0, 0.1);
        }
        .form-control:focus {
            border-color: #4f46e5;
            box-shadow: 0 0 0 0.25rem rgba(79, 70, 229, 0.25);
        }
    </style>
</head>
<body class="d-flex align-items-center">
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-5">
            <div class="auth-card p-4">
                <h2 class="text-center mb-4 text-primary">Criar Conta</h2>
                
                <?php if ($sucesso): ?>
                    <div class="alert alert-success"><?= $sucesso ?></div>
                <?php endif; ?>

                <?php foreach ($erros as $erro): ?>
                    <div class="alert alert-danger"><?= $erro ?></div>
                <?php endforeach; ?>

                <form method="POST" action="processa_cadastro.php">
                    <div class="mb-3">
                        <label class="form-label">Nome Completo</label>
                        <input type="text" name="nome" class="form-control form-control-lg" required>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">E-mail</label>
                        <input type="email" name="email" class="form-control form-control-lg" required>
                    </div>

                    <div class="mb-4">
                        <label class="form-label">Senha</label>
                        <input type="password" name="senha" class="form-control form-control-lg" required>
                    </div>

                    <button type="submit" class="btn btn-primary btn-lg w-100 py-2">Cadastrar</button>
                </form>

                <div class="text-center mt-4">
                    Já tem conta? <a href="login.php" class="text-decoration-none">Fazer login</a>
                </div>
            </div>
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>