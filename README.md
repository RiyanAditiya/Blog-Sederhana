Langkah Instalasi aplikasi Blog Sederhana

1. Clone Repository 
    git clone <https://github.com/username/nama-repo.git>
    cd <nama-repo>

2. Install Dependency Composer
    composer install

3. Install Dependency Frontend
    npm install
    npm run build

4. Salin File .env
    cp .env.example .env

5. Generate Application Key
    php artisan key:generate

6. Atur Database
    Buka file .env, lalu sesuaikan dengan pengaturan database lokal kamu, misalnya:

    DB_CONNECTION=mysql
    DB_HOST=127.0.0.1
    DB_PORT=3306
    DB_DATABASE=laravel_app
    DB_USERNAME=root
    DB_PASSWORD=

    Kemudian jalankan migrasi:

    php artisan migrate --seed

    Tambahkan --seed jika kamu ingin juga menjalankan seeder (data awal).

7. Jalankan Server 
    php artisan serve

    Aplikasi akan berjalan di:
    👉 http://127.0.0.1:8000




