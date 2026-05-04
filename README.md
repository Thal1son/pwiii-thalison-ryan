#  Documentação – Criação e Configuração de uma Aplicação Laravel no Windows

##  Introdução

Laravel é um framework PHP muito utilizado para desenvolver aplicações web. Ele facilita bastante o desenvolvimento porque já traz várias ferramentas prontas, como sistema de rotas, organização de pastas e comandos que ajudam a criar arquivos automaticamente.

Nesta documentação vou mostrar **como criar uma aplicação Laravel e como configurar ela no Windows**, utilizando o **PowerShell**.

---

#  Parte 1 – Como criar uma aplicação Laravel

## Instalando o Composer

Antes de criar um projeto Laravel é necessário ter o **Composer**, que é o gerenciador de dependências do PHP.

Para instalar:

1. Acesse o site oficial
   https://getcomposer.org

2. Baixe o instalador.

3. Instale normalmente no computador.

Depois da instalação, podemos verificar se ele está funcionando abrindo o **PowerShell** e digitando:

```powershell
composer -v
```

Se aparecer a versão do Composer, significa que ele foi instalado corretamente.

---

## Criando a pasta do projeto

Agora precisamos criar uma pasta onde o projeto ficará.

No PowerShell vá até o local onde deseja criar o projeto.

Exemplo:

```powershell
cd C:\xampp\htdocs
```

Agora vamos criar uma pasta chamada **teste**:

```powershell
mkdir teste
```

Depois entramos nela:

```powershell
cd teste
```

---

## Criando o projeto Laravel

Agora vamos usar o Composer para criar o projeto Laravel.

```powershell
composer create-project laravel/laravel teste
```

Esse comando vai:

* baixar o Laravel
* instalar todas as dependências
* criar automaticamente todas as pastas do projeto

Depois que terminar, a pasta **teste** já terá toda a estrutura do Laravel.

---

## Estrutura de pastas criada

Depois de abrir o projeto no VS Code, o Laravel cria automaticamente algumas pastas importantes.

| Pasta     | Função                                    |
| --------- | ----------------------------------------- |
| app       | Onde fica a lógica principal da aplicação |
| bootstrap | Responsável por iniciar o framework       |
| config    | Arquivos de configuração                  |
| database  | Arquivos relacionados ao banco de dados   |
| public    | Pasta pública acessada pelo navegador     |
| resources | Views, CSS e JavaScript                   |
| routes    | Arquivos de rotas da aplicação            |
| storage   | Logs e arquivos temporários               |
| tests     | Arquivos de teste da aplicação            |

---

# Parte 2 – Como configurar o Laravel no Windows

## Verificando o PHP

O Laravel precisa do PHP para funcionar.

Para verificar se ele está instalado, execute no PowerShell:

```powershell
php -v
```

Se aparecer a versão do PHP, significa que está configurado corretamente.

---

## Instalando as dependências do projeto

Entre na pasta do projeto:

```powershell
cd teste
```

Depois execute:

```powershell
composer install
```

Esse comando instala todas as bibliotecas necessárias para o funcionamento do Laravel.

---

## Configurando o arquivo `.env`

O Laravel utiliza um arquivo chamado `.env` para guardar as configurações do sistema.

Primeiro copie o arquivo de exemplo:

```powershell
copy .env.example .env
```

Depois gere a chave da aplicação:

```powershell
php artisan key:generate
```

Essa chave é usada para segurança da aplicação.

---

## Rodando o projeto

Para iniciar o projeto Laravel:

```powershell
php artisan serve
```

Depois disso aparecerá algo parecido com:

```
Server running on http://127.0.0.1:8000
```

Agora basta abrir o navegador e acessar:

```
http://127.0.0.1:8000
```

Se tudo estiver correto, a página inicial do Laravel aparecerá.

---

#  Utilizando o Artisan

O **Artisan** é uma ferramenta de linha de comando que já vem com o Laravel.
Ele ajuda a automatizar várias tarefas no desenvolvimento.

Todos os comandos começam com:

```powershell
php artisan
```

---

## Criando um Controller

```powershell
php artisan make:controller UsuarioController
```

Esse comando cria um controller dentro da pasta **app/Http/Controllers**.

---

## Criando um Model

```powershell
php artisan make:model Usuario
```

O model representa uma tabela no banco de dados.

---

## Criando uma Migration

```powershell
php artisan make:migration create_usuarios_table
```

As migrations servem para criar ou modificar tabelas no banco de dados.

---

## Executando as migrations

```powershell
php artisan migrate
```

Esse comando cria as tabelas no banco de dados.

---

# Conclusão

O Laravel facilita bastante o desenvolvimento de aplicações web em PHP.
Com poucos comandos já é possível criar um projeto completo, configurar o ambiente e começar o desenvolvimento.

Além disso, a organização de pastas e as ferramentas como o **Artisan** ajudam a manter o projeto mais organizado e fácil de manter.
