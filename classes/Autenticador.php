<?php

class Autenticador {
    private static $arquivo = 'usuarios.json';

    public static function registrar(Usuario $usuario): bool {
        $usuarios = self::carregarUsuarios();

        foreach ($usuarios as $u) {
            if ($u->getEmail() === $usuario->getEmail()) {
                return false;
            }
        }

        $usuarios[] = $usuario;
        self::salvarUsuarios($usuarios);
        return true;
    }

    public static function login(string $email, string $senha): ?Usuario {
        $usuarios = self::carregarUsuarios();

        foreach ($usuarios as $usuario) {
            if ($usuario->getEmail() === $email && $usuario->autenticar($senha)) {
                return $usuario;
            }
        }

        return null;
    }

    private static function carregarUsuarios(): array {
        if (!file_exists(self::$arquivo)) {
            return [];
        }

        $conteudo = file_get_contents(self::$arquivo);
        $dados = json_decode($conteudo, true);

        $usuarios = [];
        foreach ($dados as $d) {
            $usuarios[] = new Usuario($d['nome'], $d['email'], $d['senha'], true);
        }

        return $usuarios;
    }

    private static function salvarUsuarios(array $usuarios): void {
        $dados = [];
        foreach ($usuarios as $usuario) {
            $dados[] = [
                'nome' => $usuario->getNome(),
                'email' => $usuario->getEmail(),
                'senha' => $usuario->getSenha(),
            ];
        }

        file_put_contents(self::$arquivo, json_encode($dados));
    }
}