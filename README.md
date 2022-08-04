# Laravel Course v8.x

This project is used as a laravel course material.

## Requirement
- PHP >= 7.3
- MySql 
- Node >= v18.3.0

## Dependencies
- laravel 8.x _(composer)_
- bootstraps ui _(composer)_
- jquery _(npm)_
- fontawesome _(npm)_

## Model & Migration 
1. Table
   - abouts
   - categories
   - posts
   - post_tags
   - tags
   
## Steps
### Download & Install dependencies
```bash
git clone https://github.com/murosadatul/laravel8-portal-berita.git
cd laravel8-portal-berita
cp .env.example .env
composer install
```

### Configuration
Setup your `.env` file.

```env
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=your_db
DB_USERNAME=your_username
DB_PASSWORD=your_password
```

### Before Starting
1. Create database
    ```bash
    #create database 
    #mysql shell
    create database laravel_course_db;
    exit;

    #bash shell
    php artisan migrate
    ```

2. Migrate DB
   ```bash
   #migrate existing migration
   php artisan migrate
   #running seeder / dummy data
   php artisan db:seed
   ```

3. Compile Asset

   ```bash
   npm install 
   npm run dev # 2x
   ```

   IGNORE THIS
   ```bash
   #install bootstrap 
   #php artisan require ui
   #php artisan ui bootstraps

   #additional library
   #npm install --save jquery
   #npm install --save @fortawesome/fontawesome-free
   ```
### Run Application
   ```
   php artisan serv
   ```

## Notes 
- [DB Convention](https://github.com/wzije/dev-notes/blob/main/database_convensions.md)
- [Laravel Convention](https://github.com/wzije/dev-notes/blob/main/laravel_conventions.md)

## Credit
Thanks to [laravel](https://laravel.com/) and [bootstraps](https://getbootstrap.com/).

