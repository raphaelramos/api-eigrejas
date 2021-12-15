# e-igrejas #

### Instalação ###
 - Execute `composer install` (Windows add `--ignore-platform-reqs`)
 - Execute `php artisan migrate`
 - Acesse `http://localhost:8000/e-install`
 - Admin home em `http://home.localhost:8000/admin`
 - Dev: `php artisan serve`
 
Necessário mínimo PHP8.0. A versão do banco de dados mínima MySQL 5.7.

### Direitos ###
 - O código fonte deste software é de direito exclusivo Raphael Ramos;

### Comandos ###
Criar model e migration: `php artisan make:model Count -m`
Executar migrations tenants: `php artisan tenants:migrate`
 