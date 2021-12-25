## PHP Artisan Commands for migrations in different paths
### Make migration
php artisan make:migration create_users_table --create=users --path=app/Domain/User/Database/Migrations

### Run migration
php artisan migrate --path=app/Domain/User/Database/Migrations

### Rolback migration
php artisan migrate:rollback --path=app/Domain/User/Database/Migrations

### OBS:
- Actions can be called services too.
