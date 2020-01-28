<h1 align="center">Laravel Blog</h1>

<h2 align="center">A Blog App by Federico Del Piano with Laravel 6</h2>

### Instalation

#### - Clone the project:
```
git clone https://github.com/federicodelpiano/laravel_blog.git
```

#### - Move to the project folder:
```
cd laravel_blog
```

#### - Install composer and npm:
```
composer install
npm install
```

#### - Basic configuration:
```
cp .env.example .env
php artisan key:generate
php artisan storage:link
```

#### - Database creation and test data:
For this, you can either create a local MySQL datase called "laravel_blog" (utf8_general_ci) and run migrations and seeders:
```
php artisan migrate --seed
```

Or run the DB creation script provided (laravel_blog.sql). This will create all the tables the app needs and also insert some users and entries for testing purposes.


### Run the app
Run the app in localhost and navigate to http://127.0.0.1:8000:
```
php artisan serve
```

### Run Unit Tests
```
vendor/bin/phpunit
```