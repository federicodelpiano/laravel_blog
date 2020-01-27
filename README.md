<h1 align="center">Laravel Blog</h1>

<h2 align="center">A Blog App by Federico Del Piano</h2>


### Instalation

#### 1. Clone the project, install composer and npm:
```
git clone https://github.com/federicodelpiano/yesbooks.git
cd yesbooks
composer install
npm install
```

#### 2. Basic config
```
cp .env.example .env
php artisan key:generate
php artisan storage:link
```

#### 3. Database creation
Create a local MySQL datase called "laravel_blog" (utf8_general_ci)

#### 4. Run migrations and seeders
```
php artisan migrate --seed
```


### Run the app
Run the app in localhost and navigate to http://127.0.0.1:8000:
```
php artisan serve
```
