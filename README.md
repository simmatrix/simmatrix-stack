# Simmatrix Laravel 5.5 Stack

To ease the development of new Laravel project with pre-configured packages that are regarded as necessity.

### Configured Packages
1. Laravel Passport: For API Authentication
2. Laravel Socialite: Supports authentication with Facebook, Twitter, LinkedIn, Google, GitHub and Bitbucket
3. Laravel Scout: For fast full-text search
4. Laravel Horizon: For managing queued jobs
5. Laravel Dusk: For browser automation testing
6. Laravel Push Notification: To send push notifications to Android and iOS devices
7. Laravel DOM PDF: For generation of PDF documents
8. Laravel Echo: Websocket, broadcasting, Pusher
9. Laravel API Documentation Generator

### Steps

1. Clone this repository `git clone https://github.com/simmatrix/simmatrix-stack.git`
2. Create a new database
3. Create a new `.env` file by running `cp .env.example .env` and fill up the configuration details
4. Download dependencies by running `composer install && npm install`
5. Create a new appilcation key by running `php artisan key:generate`
6. Configure folder permissions
    - `chmod -R 777 storage/`
    - `chmod -R 777 bootstrap/`
7. Point your webserver's document root to the `public/` directory
8. Create a symbolic link for your storage directory by running `php artisan storage:link`
9. Import all table structures into your database by running `php artisan migrate --seed`
10. Create a new ecryption key for Passport by running `php artisan passport:install`
11. Switch to your own repository
    - Setup your own repository either in Github, Bitbucket etc.
    - In your development machine, navigate to your current project directory, and remove the `.git` folder
    - Then initialize a new repository by running `git init`
    - Add your new remote repository URL `git remote add origin <your-own-repository-url>`
    - Add all of the files to which you would want to commit `git add *` (Double check by running `git status`, add any other hidden files (.dot files) that you would like to include into your repository)
    - Commit to your repository by running `git commit -m "Initial commit"`
    - Finally push to your repository by running `git push -u origin master`
12. Start developing!

### While Development
1. If you happened to re-migrate everything, you would need to re-create grant clients for your Passport by running `php artisan passport:client --personal` and `php artisan passport:client --password`, then update the client secret in your `.env` file
2. To generate documentation: `php artisan api:generate --routePrefix=api/v1/*`

### Steps for Live Deployment

1. Optimize Composer's autoloader `composer install --optimize-autoloader`
2. Combine all config files into one cached file `php artisan config:cache`
3. Combine all routes into one cached file `php artisan route:cache`
4. [First time only] Generate an encryption key for Passport `php artisan passport:keys`
5. [If you're using Algolia Search] To batch import your existing records to your search index, run `php artisan scout:import "App\Models\YourModel"`
6. You only need one supervisord worker to start your Horizon `php artisan horizon`. Sample supervisor configuration is available in [Laravel Horizon's documentation](https://laravel.com/docs/5.5/horizon) itself.
7. Install your dependencies with `--no-dev` and `--optimize-autoloader` flags as in `composer install --no-dev --optimize-autoloader`