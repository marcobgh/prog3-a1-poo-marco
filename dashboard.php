<?php
require_once 'classes/Sessao.php';

Sessao::iniciar();

if (!Sessao::get('usuario')) {
    header('Location: login.php');
    exit;
}

$usuario = Sessao::get('usuario');
$emailCookie = $_COOKIE['email'] ?? '';
?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Dashboard</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        .nav-gradient {
            background: linear-gradient(90deg, #4f46e5 0%, #10b981 100%);
        }
        .dashboard-card {
            border-radius: 15px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        }
    </style>
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-dark nav-gradient">
        <div class="container">
            <a class="navbar-brand fw-bold" href="#">Sistema</a>
            <div class="d-flex align-items-center">
                <span class="text-white me-3"><?= htmlspecialchars($usuario['nome']) ?></span>
                <a href="logout.php" class="btn btn-light">Sair</a>
            </div>
        </div>
    </nav>

    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="dashboard-card p-4 bg-white">
                    <h3 class="mb-4">👋 Olá, <?= htmlspecialchars($usuario['nome']) ?>!</h3>
                    
                    <?php if ($emailCookie): ?>
                        <div class="alert alert-info">
                            <strong>E-mail lembrado:</strong> <?= htmlspecialchars($emailCookie) ?>
                        </div>
                    <?php endif; ?>

                    <div class="mt-4">
                        <div class="card border-0 shadow-sm">
                            <div class="card-body">
                                <h5 class="card-title">📌 Suas Informações</h5>
                                <ul class="list-group list-group-flush">
                                    <li class="list-group-item">
                                        <strong>Nome:</strong> <?= htmlspecialchars($usuario['nome']) ?>
                                    </li>
                                    <li class="list-group-item">
                                        <strong>E-mail:</strong> <?= htmlspecialchars($usuario['email']) ?>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>