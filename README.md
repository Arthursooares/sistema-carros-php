🚗 Sistema de Cadastro de Carros
Sistema web desenvolvido em PHP com MySQL, totalmente containerizado com Docker Compose.

📌 Funcionalidades
Cadastro de carros

Listagem de carros

Banco de dados automatizado com MySQL

Ambiente totalmente containerizado

🐳 Tecnologias utilizadas
PHP 8.2

MySQL 8

Apache

Docker

Docker Compose

🚀 Como executar o projeto
1. Clone o repositório
bash
git clone https://github.com/arthursooares/sistema-carros-php.git
2. Acesse a pasta do projeto
bash
cd sistema-carros-php
3. Suba os containers
bash
docker compose up --build
4. Acesse no navegador
👉 http://localhost:8080

🗄️ Banco de dados
O banco é criado automaticamente através do arquivo:

Código
mysql/init.sql
Não é necessário instalar MySQL manualmente.

📁 Estrutura do projeto
Código
sistema-carros-php
│
├── mysql/
│   └── init.sql
│
├── Dockerfile
├── docker-compose.yml
├── index.php
└── README.md
🐳 Docker Hub
Imagem disponível em:

bash
docker pull arthursoaress/sistema-carros-php:latest
🚀 Melhorias futuras
Editar carros

Excluir carros

Utilização de .env

Persistência com volumes

Integração com phpMyAdmin

API REST

Deploy em nuvem

👨‍💻 Autor
Arthur Soares
