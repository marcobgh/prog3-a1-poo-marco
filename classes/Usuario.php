<?php

class Usuario {
    private $nome;
    private $email;
    private $senha;

    public function __construct(string $nome, string $email, string $senha, bool $isHashed = false) {
        $this->nome = trim($nome);
        $this->email = trim($email);
        $this->senha = $isHashed ? $senha : password_hash(trim($senha), PASSWORD_DEFAULT);
    }

    public function autenticar(string $senha): bool {
        return password_verify(trim($senha), $this->senha);
    }

    public function getNome(): string {
        return $this->nome;
    }

    public function getEmail(): string {
        return $this->email;
    }

    public function getSenha(): string {
        return $this->senha;
    }
}