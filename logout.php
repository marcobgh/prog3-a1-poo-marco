<?php
require_once 'classes/Sessao.php';

Sessao::iniciar();
Sessao::destruir();

setcookie('email', '', time() - 3600, '/');

header('Location: login.php');
exit;