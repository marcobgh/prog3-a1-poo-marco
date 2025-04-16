# Sistema de Autenticação em PHP POO

## Descrição do Projeto

Sistema de autenticação de usuários desenvolvido em PHP puro utilizando Programação Orientada a Objetos (POO). 

## Tecnologias Utilizadas

- PHP 7.4+
- HTML5
- CSS3
- XAMPP

## Funcionalidades

1. **Cadastro de Usuários**
   - Validação de campos obrigatórios
   - Verificação de senha e confirmação de senha
   - Sanitização dos dados de entrada

2. **Login**
   - Autenticação segura com password_hash e password_verify
   - Opção de lembrar e-mail utilizando cookies
   - Proteção contra sessões não autenticadas

3. **Dashboard**
   - Exibição de informações do usuário
   - Mostra e-mail salvo em cookie (se existir)
   - Botão de logout seguro

4. **Logout**
   - Destruição segura da sessão
   - Redirecionamento para tela de login

## Como Executar Localmente

1. **Pré-requisitos**
   - Servidor web (Apache, Nginx, etc.)
   - PHP 7.4 ou superior

2. **Instalação**
   - Clone o repositório:
     ```
     git clone https://github.com/seu-usuario/prog3-a1-poo-seunome.git
     ```
   - Coloque os arquivos na pasta pública do seu servidor web

3. **Acesso**
   - Acesse o sistema através do navegador:
     ```
     http://localhost/caminho/para/o/projeto/login.php
     ```

## Estrutura de Arquivos
/projeto 
├── classes/  
│   ├── Usuario.php 
│   ├── Sessao.php 
│   └── Autenticador.php 
├── assets/  
│   ├── css 
│   │   └── style.css 
├── index.php  
├── login.php  
├── cadastro.php  
├── dashboard.php  
├── logout.php  
└── README.md 

## Boas Práticas Implementadas

- Programação Orientada a Objetos
- Separação de responsabilidades
- Sanitização de dados de entrada
- Autenticação segura com password_hash
- Proteção de rotas com verificação de sessão
- Mensagens de erro contextualizadas
- Interface amigável e responsiva
