# Simmatrix Laravel 5.5 Stack

To ease the development of new Laravel project with pre-configured packages that are regarded as necessity.

### Steps

1. Clone this repository
2. Create a new database
3. Create a new `.env` file by running `copy .env.example .env` 
4. Fill up the configuration details in your `.env` file
5. Create a new appilcation key by running `php artisan key:generate`
6. Configure folder permissions
    - `chmod -R 777 storage/`
    - `chmod -R 777 bootstrap/`
7. Point your webserver's document root to the `public/` directory
8. Create a symbolic link for your storage directory by running `php artisan storage:link`
9. Import all table structures into your database by running `php artisan migrate` 
10. Start developing!


### Steps for Live Deployment

1. Optimize Composer's autoloader `composer install --optimize-autoloader`
2. Combine all config files into one cached file `php artisan config:cache`
3. Combine all routes into one cached file `php artisan route:cache`