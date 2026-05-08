# 🚗 Sistema de Cadastro de Carros

Sistema web simples desenvolvido em PHP com MySQL, rodando em ambiente Docker.

---

## 📌 Funcionalidades

- Cadastro de carros (CREATE)
- Listagem de carros (READ)
- Estrutura preparada para futuras melhorias (UPDATE/DELETE)

---

## 🐳 Tecnologias utilizadas

- PHP
- MySQL
- Docker
- Docker Compose
- Apache (via container)

---

## ⚙️ Como executar o projeto

1. Clone o repositório:
   ```bash
   git clone https://github.com/Arthursooares/sistema-carros-php.git

Acesse a pasta do projeto:

cd sistema-carros-php

Suba os containers:

docker-compose up -d

Acesse no navegador:

http://localhost
📁 Estrutura do projeto
/sistema-carros-php
 ├── /src
 ├── /db
 ├── Dockerfile
 ├── docker-compose.yml
 └── README.md
🚀 Melhorias futuras
Edição e exclusão de registros
Validação de formulários
Interface com Bootstrap
API REST em PHP
Autenticação de usuários
