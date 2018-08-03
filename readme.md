
## Requisitos do Laravel

 - PHP >= 7.1.3
 - OpenSSL PHP Extension
 - PDO PHP Extension
 - Mbstring PHP Extension
 - Tokenizer PHP Extension
 - XML PHP Extension
 - Ctype PHP Extension
 - JSON PHP Extension

## Instalação

 1. Acessar a pasta do projeto e rodar o comando

```composer install```

 2. Criar um arquivo de dados para o SQLite

 3. Alterar o caminho do arquivo de dados do SQLite no arquivo **.env.example**. Usar o path completo. Ex.:

```DB_DATABASE=/home/user/projects/tryout/database/database.sqlite```

 4. Renomear o arquivo **.env.example** para **.env**

 5. Executar o comando para criar a tabela no SQLite:

```php artisan migrate```

 6. Executar o comando de atalho para o servidor nativo do PHP

```php artisan serve```

A aplicação ficará disponível em:

```http://localhost:8000```