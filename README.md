# pwiii-thalison-ryan
Programação Web 3

### Documentação: Como criar uma aplicação Laravel, passo a passo
Documentação oficial do Laravel: [Laravel Documentation](https://laravel.com/docs)
### 1. O que é o Laravel

Laravel é um **framework PHP** usado para criar aplicações web.

Mas o que isso significa na prática?

Um framework é uma estrutura pronta que ajuda o desenvolvedor a construir sistemas mais rapidamente. Em vez de começar tudo do zero, o Laravel já oferece recursos organizados para tarefas comuns, como:

- criar páginas
- receber dados de formulários
- acessar banco de dados
- autenticar usuários
- organizar rotas
- enviar e-mails
- criar APIs

Ou seja, o Laravel ajuda a desenvolver sites e sistemas web de forma mais organizada, segura e produtiva.

Segundo a documentação oficial, Laravel foi criado para oferecer uma sintaxe elegante e uma ótima experiência para quem desenvolve.

Leia mais na documentação oficial: [O que é Laravel](https://laravel.com/docs)
### 2. Para que serve o Laravel

Laravel serve para desenvolver diferentes tipos de aplicações web, como por exemplo:

- sites institucionais
- sistemas administrativos
- lojas virtuais
- APIs para aplicativos mobile
- sistemas de login e cadastro
- painéis internos de empresas
- plataformas com banco de dados

O Laravel pode ser usado tanto para:

- **aplicações completas**, onde ele controla backend e frontend
- **apenas backend/API**, sendo consumido por outro frontend, como React, Next.js ou aplicativo mobile

Referência oficial: [Laravel Documentation](https://laravel.com/docs)
### 3. O que é necessário antes de criar uma aplicação Laravel

Antes de criar o projeto, é preciso preparar o ambiente de desenvolvimento.

A documentação oficial informa que você precisa de:

- **PHP**
- **Composer**
- **Laravel Installer**
- **Node.js + NPM** ou **Bun**
### 4. Como instalar o ambiente

A documentação oficial do Laravel apresenta uma forma prática de instalar PHP, Composer e Laravel Installer com comandos prontos.
#### No macOS

```bash
/bin/bash -c "$(curl -fsSL https://php.new/install/mac/8.4)"
```

#### No Linux

```bash
/bin/bash -c "$(curl -fsSL https://php.new/install/linux/8.4)"
```

#### No Windows PowerShell

```powershell
Set-ExecutionPolicy Bypass -Scope Process -Force; [System.Net.ServicePointManager]::SecurityProtocol = [System.Net.ServicePointManager]::SecurityProtocol -bor 3072; iex ((New-Object System.Net.WebClient).DownloadString('https://php.new/install/windows/8.4'))
```

Depois de executar o comando, reinicie o terminal.

Esses comandos foram apresentados pela documentação oficial do Laravel na seção de instalação: [Laravel Installation](https://laravel.com/docs)

#### Se você já tiver PHP e Composer instalados

Nesse caso, basta instalar o Laravel Installer com:

```bash
composer global require laravel/installer
```

---

### 5. Como criar uma aplicação Laravel

Depois de instalar o ambiente, o próximo passo é criar o projeto.

Use o comando:

```bash
laravel new example-app
```

Esse comando cria uma nova aplicação chamada `example-app`.

Durante a criação, o instalador pode pedir algumas escolhas, como:

- qual banco de dados usar
- qual framework de testes deseja
- se quer usar um starter kit

Isso depende da versão e do modo de instalação, mas o processo é guiado.

Referência oficial: [Criando uma aplicação Laravel](https://laravel.com/docs)

---

### 6. Entrando na pasta do projeto

Depois que o projeto for criado, entre na pasta dele com:

```bash
cd example-app
```

A partir desse momento, todos os comandos relacionados ao projeto devem ser executados dentro dessa pasta.

---

### 7. Instalando as dependências do frontend

Agora é necessário instalar os arquivos do frontend.

Use:

```bash
npm install && npm run build
```

Esse comando faz duas coisas:

- instala os pacotes necessários do frontend
- compila os assets iniciais do projeto

Isso é importante porque o Laravel usa ferramentas modernas para lidar com CSS e JavaScript.

Referência oficial: [Frontend no Laravel](https://laravel.com/docs)

---

### 8. Iniciando o projeto localmente

Com tudo instalado, você pode rodar o projeto com:

```bash
composer run dev
```

Depois disso, a aplicação poderá ser acessada no navegador em:

[http://localhost:8000](http://localhost:8000)

Esse é o endereço local onde o Laravel roda durante o desenvolvimento.

Referência oficial: [Laravel Installation](https://laravel.com/docs)

---

### 9. O que existe dentro de um projeto Laravel

Quando você cria uma aplicação Laravel, várias pastas e arquivos são gerados automaticamente.

As principais são:

#### `app/`
Contém boa parte da lógica principal da aplicação.

#### `routes/`
Contém as rotas da aplicação, ou seja, os caminhos que definem o que acontece quando alguém acessa uma URL.

#### `resources/`
Contém arquivos de interface, como views, CSS e JavaScript.

#### `config/`
Contém arquivos de configuração do Laravel.

#### `database/`
Contém migrações, seeders e outros arquivos relacionados ao banco de dados.

#### `.env`
Arquivo muito importante que guarda configurações do ambiente, como banco de dados e credenciais.

Referência oficial: [Estrutura de diretórios do Laravel](https://laravel.com/docs)

---

### 10. O que é o arquivo `.env`

O arquivo `.env` guarda informações específicas do ambiente onde a aplicação está rodando.

Por exemplo:

- nome da aplicação
- conexão com banco de dados
- senha do banco
- URL do sistema
- chaves de serviços externos

Esse arquivo é importante porque separa as configurações do código da aplicação.

A documentação oficial alerta que o `.env` **não deve ser enviado para o Git**, pois pode conter informações sensíveis.

Referência oficial: [Configuração no Laravel](https://laravel.com/docs)

---

### 11. Configurando o banco de dados

Quando um novo projeto Laravel é criado, ele normalmente vem configurado para usar **SQLite** por padrão.

Mas você também pode usar bancos como:

- MySQL
- PostgreSQL

Se quiser usar MySQL, por exemplo, altere o arquivo `.env`:

```env
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=laravel
DB_USERNAME=root
DB_PASSWORD=
```

Depois disso, execute:

```bash
php artisan migrate
```

Esse comando cria as tabelas iniciais do sistema no banco de dados.

Referência oficial: [Banco de dados e migrações](https://laravel.com/docs)

---

### 12. O que são migrações

Migrações são arquivos usados para criar e modificar a estrutura do banco de dados.

Com elas, você pode:

- criar tabelas
- adicionar colunas
- remover campos
- controlar alterações no banco ao longo do tempo

No Laravel, isso é muito útil porque permite que o banco acompanhe o código do projeto de forma organizada.

Para executar as migrações:

```bash
php artisan migrate
```

Referência oficial: [Laravel Migrations](https://laravel.com/docs)

---

### 13. O que é o Artisan

Artisan é a ferramenta de linha de comando do Laravel.

Com ele, você pode executar vários comandos úteis, como:

- criar controllers
- criar models
- rodar migrações
- limpar cache
- iniciar processos de desenvolvimento

Exemplo de comando Artisan:

```bash
php artisan migrate
```

Documentação oficial: [Artisan Console](https://laravel.com/docs)

---

### 14. Como o Laravel funciona de forma simples

Para quem está começando, vale entender o fluxo básico:

1. o usuário acessa uma URL no navegador
2. o Laravel verifica as **rotas**
3. a rota chama uma lógica da aplicação
4. essa lógica pode acessar o banco de dados
5. o Laravel retorna uma resposta
6. essa resposta pode ser uma página HTML ou um JSON de API

Esse fluxo é uma base para entender como sistemas Laravel são organizados.

Referência oficial: [Request Lifecycle](https://laravel.com/docs)

---

### 15. Como o Laravel pode ser usado

Segundo a documentação oficial, o Laravel pode ser usado de duas formas principais:

#### Como aplicação web completa
Nesse caso, o Laravel controla o backend e também a renderização das páginas.

Ferramentas comuns nesse modelo:

- Blade
- Livewire
- Inertia
- Vite

#### Como backend de API
Nesse modelo, o Laravel fornece dados para outro frontend, como:

- React
- Next.js
- aplicativos mobile

Referência oficial: [Laravel Documentation](https://laravel.com/docs)

---

### 16. Exemplo prático resumido

Aqui está o fluxo básico completo para criar uma aplicação Laravel.

#### Passo 1: instalar o Laravel Installer

```bash
composer global require laravel/installer
```

#### Passo 2: criar a aplicação

```bash
laravel new example-app
```

#### Passo 3: entrar na pasta

```bash
cd example-app
```

#### Passo 4: instalar dependências do frontend

```bash
npm install && npm run build
```

#### Passo 5: iniciar o projeto

```bash
composer run dev
```

#### Passo 6: abrir no navegador

[http://localhost:8000](http://localhost:8000)

#### Passo 7: configurar o banco no `.env`

```env
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=laravel
DB_USERNAME=root
DB_PASSWORD=
```

#### Passo 8: executar as migrações

```bash
php artisan migrate
```

---

### 17. Boas práticas para quem está começando

Se você está aprendendo Laravel agora, siga estas boas práticas:

- leia sempre a documentação oficial: [Laravel Documentation](https://laravel.com/docs)
- não altere muitas coisas sem entender o que fazem
- mantenha o arquivo `.env` protegido
- use migrações para controlar o banco
- aprenda primeiro rotas, controllers, views e banco de dados
- pratique criando pequenos projetos, como cadastro de usuários ou lista de tarefas

---


### 18. Conclusão

Laravel é um framework PHP criado para facilitar o desenvolvimento de aplicações web. Ele serve para construir sistemas, sites e APIs de forma organizada, moderna e segura.

Para criar uma aplicação Laravel, o processo básico é:

1. instalar PHP, Composer e Laravel Installer  
2. criar o projeto com `laravel new`  
3. instalar os pacotes do frontend  
4. iniciar o ambiente local  
5. configurar o banco de dados  
6. rodar as migrações  

Com isso, você já terá uma aplicação Laravel funcionando no seu computador.

A principal recomendação para quem está começando é: use sempre como base a documentação oficial do Laravel:

[Laravel Documentation](https://laravel.com/docs)

