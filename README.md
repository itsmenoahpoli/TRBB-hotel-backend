<h1>Hotel Management API server * Database</h1>
<p>Built with Laravel 11 (PHP), MySQL</p>
<hr />

<h5>Installation and setup guide</h5>

```bash

git clone https://github.com/itsmenoahpoli/TRBB-hotel-backend.git

cd TRBB-hotel-backend

composer install
# After running this command, open .env and set the database credentials
cp .env.example .env

php artisan key:generate

php artisan migrate --seed

php artisan storage:link

php artisan serve
```

<hr />
Made by Patrick Policarpio with :orange_heart:
