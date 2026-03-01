# laravel-docker-template
# 環境構築
Dockerビルド
```
git clone git@github.com:denagri/test-fruit.git
docker-compose up -d --build
```
laravel環境構築(上から順に構築していく)
```
docker-compose exec php bash
composer install
cp .env.example .env
```
.envの環境変数を変更
```
DB_CONNECTION=mysql
DB_HOST=mysql
DB_PORT=3306
DB_DATABASE=laravel_db
DB_USERNAME=laravel_user
DB_PASSWORD=laravel_pass
```
```
php artisan key:generate
php artisan migrate
php artisan db:seed
```
# 使用技術(実行環境)
* php 8.1.34
* laravel 8.83.8
* mysql 11.8.3

# ER図
![alt text](<スクリーンショット 2026-02-24 054835.png>)

# URL
