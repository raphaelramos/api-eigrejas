# e-igrejas #
API da aplicação em Laravel.
Aplicação multi tenancy

## Requisitos ##
 - PHP 8.0
 - Composer

### Instalação ###
 - Execute `composer install` (Windows add `--ignore-platform-reqs`)
 - Execute `php artisan migrate`
 - Dev Run: `php artisan serve`
 - Acesse `http://localhost:8000/e-install`
 - Admin em `http://home.localhost:8000/admin`
 
Necessário mínimo PHP8.0. A versão do banco de dados mínima MySQL 5.7.

### Direitos ###
 - Desenvolvido por Raphael Ramos;

### Comandos Extras ###
Criar model e migration: `php artisan make:model Count -m`
Executar migrations tenants: `php artisan tenants:migrate`
 