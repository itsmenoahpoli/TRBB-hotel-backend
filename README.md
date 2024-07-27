## Hotel Booking & Management System

---

Installation Guide

```bash
git clone  https://github.com/itsmenoahpoli/TRBB-hotel-backend.git 

cd TRBB-hotel-backend

composer install

cp .env.example .env # Open .env then set the mysql database credentials

php artisan key:generate

php artisan migrate --seed

php artisan serve

npm run dev
```

---

<small>Modules:</small>

---
