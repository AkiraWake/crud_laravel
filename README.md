# 📌 CRUD de Usuário com Perfil - Laravel

Projeto desenvolvido como atividade prática utilizando o framework **Laravel**, implementando um sistema CRUD de Usuários com Perfil utilizando relacionamento **1:1** através do ORM Eloquent.

---

## 💻 Tecnologias Utilizadas

- PHP 8+
- Laravel 12
- SQLite
- Eloquent ORM
- Composer
- Git

---

## 📚 Descrição do Sistema

O sistema permite o gerenciamento de usuários e seus respectivos perfis.

### 👤 Usuário
- id
- nome
- email (único)
- senha
- profile_id

### 🪪 Perfil
- id
- perfil_nome

### 🔗 Regras Implementadas

- Relacionamento **1:1** entre Usuário e Perfil
- CRUD completo de Usuário
- Criação automática do perfil ao criar usuário
- Validação de e-mail único
- Uso de transações no banco de dados
- Utilização do ORM Eloquent

---

# ⚙️ Instalação e Execução do Projeto

## 1️⃣ Clonar o Repositório

```bash
git clone https://github.com/AkiraWake/CRUD_LARAVEL.git
cd CRUD_LARAVEL
```

---

## 2️⃣ Instalar Dependências

```bash
composer install
```

---

## 3️⃣ Configurar Ambiente (.env)

### Windows
```bash
copy .env.example .env
```

### Linux / Mac
```bash
cp .env.example .env
```

---

## 4️⃣ Gerar Chave da Aplicação

```bash
php artisan key:generate
```

---

## 5️⃣ Configuração do Banco de Dados

O projeto utiliza **SQLite**, não sendo necessário instalar MySQL.

Criar o arquivo do banco manualmente:

Local do arquivo:
```
database/database.sqlite
```

Crie um arquivo vazio chamado:
```
database.sqlite
```

---

## 6️⃣ Executar as Migrations

```bash
php artisan migrate
```

Isso criará as tabelas:
- users
- profiles
- cache
- jobs

---

## 7️⃣ Iniciar o Servidor Laravel

```bash
php artisan serve
```

A aplicação ficará disponível em:
```
http://127.0.0.1:8000
```

---

# 🚀 Testando a API

As requisições podem ser feitas utilizando **Postman** ou similar.

---
## 📌 Criar Usuário

**POST**
```
http://127.0.0.1:8000/api/users
```

Body JSON:

```json
{
  "nome": "Gabriel",
  "email": "gabriel@email.com",
  "senha": "123456",
  "perfil_nome": "Administrador"
}
```
---

## 📌 Listar Usuários

**GET**
```
http://127.0.0.1:8000/api/users
```

---

## 📌 Buscar Usuário por ID

**GET**
```
http://127.0.0.1:8000/api/users/{id}
```

---

## 📌 Atualizar Usuário

**PUT**
```
http://127.0.0.1:8000/api/users/{id}
```
---

## 📌 Remover Usuário

**DELETE**
```
http://127.0.0.1:8000/api/users/{id}
```
---

# 🧠 Estrutura do Projeto

```
app/
routes/
database/
config/
resources/
public/
```
O sistema segue o padrão MVC do Laravel.
---
# ✅ Status do Projeto

✔ CRUD funcionando  
✔ Relacionamento 1:1 implementado  
✔ Banco configurado via migrations  
✔ API testada via Postman  
---
# 👨‍💻 Autor

Gabriel Martins  
Projeto acadêmico — Desenvolvimento Backend com Laravel
