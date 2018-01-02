# Simmatrix Laravel 5.5 Stack

To ease the development of new Laravel project with pre-configured packages that are regarded as necessity.

### Steps

1. Clone this repository
2. Create a new database
3. Run `composer install` and `npm install`
4. Create a new `.env` file by running `copy .env.example .env` 
5. Fill up the configuration details in your `.env` file
6. Create a new appilcation key by running `php artisan key:generate`
7. Configure folder permissions
    - `chmod -R 777 storage/`
    - `chmod -R 777 bootstrap/`
8. Point your webserver's document root to the `public/` directory
9. Create a symbolic link for your storage directory by running `php artisan storage:link`
10. Import all table structures into your database by running `php artisan migrate --seed` 
11. Create a new ecryption key for Passport by running `php artisan passport:install`
12. Start developing!

### While Development
1. If you happened to re-migrate everything, you would need to re-create grant clients for your Passport by running `php artisan passport:client --personal` and `php artisan passport:client --password`, then update the client secret in your `.env` file

### Steps for Live Deployment

1. Optimize Composer's autoloader `composer install --optimize-autoloader`
2. Combine all config files into one cached file `php artisan config:cache`
3. Combine all routes into one cached file `php artisan route:cache`
4. [First time only] Generate an encryption key for Passport `php artisan passport:keys`
5. [If you're using Algolia Search] To batch import your existing records to your search index, run `php artisan scout:import "App\Models\YourModel"`
6. You only need one supervisord worker to start your Horizon `php artisan horizon`. Sample supervisor configuration is available in [Laravel Horizon's documentation](https://laravel.com/docs/5.5/horizon) itself.
7. Install your dependencies with `--no-dev` and `--optimize-autoloader` flags as in `composer install --no-dev --optimize-autoloader`