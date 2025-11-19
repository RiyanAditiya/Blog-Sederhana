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

    DB_CONNECTION=mysql <br>
    DB_HOST=127.0.0.1 <br>
    DB_PORT=3306 <br>
    DB_DATABASE=laravel_app <br>
    DB_USERNAME=root <br>
    DB_PASSWORD= <br>

    Kemudian jalankan migrasi:

    php artisan migrate --seed

    Tambahkan --seed jika kamu ingin juga menjalankan seeder (data awal).

7. Jalankan Server 
    
    php artisan serve

    Aplikasi akan berjalan di:
    👉 http://127.0.0.1:8000




