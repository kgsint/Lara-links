# Laralinks 
create your link profile
###
![link-profile](/public/_demo/demo-1.png)

Customize with dashboard
###
![dashboard](/public/_demo/demo-2.png)


## Installation and Setup
clone this repo `https://github.com/Kaung-Sintc/Lara-links.git` or download zip file
##
In your project directory, 
install required dependencies
```
composer install
npm install
```
copy `.env.example` file to `.env`:
```
cp .env.example .env
```
generate `APP_KEY`:
```
php artisan key:generate
```
migrate:
```
php artisan migrate
```
To compile and hot reload, run:
```
npm run dev
```
Start your development server
```
php artisan serve
```

[Learn more about Laravel](https://laravel.com)
