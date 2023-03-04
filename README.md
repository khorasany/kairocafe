# Restaurant Management System ![Badge](https://img.shields.io/static/v1?label=Laravel&message=Framework&color=red&style=&logo=Laravel)
> Project for restaurant management, developed for the purpose of studies using Laravel as a back-end and AdminLTE as a template, has several functionalities and can easily help a restaurant to control its stock/products

NOTE: The system is in PT-BR

### Functionalities  

- [X] Login System
- [X] User creation with permissions system
- [X] Categories and subcategories creation
- [X] Products creation
- [X] Inventory control, with entry and exit registration

### Requirements

- Composer
- PHP 8.2
- MySQL

### Installation

1. After installing the requirements, you must configure the .env file, according to your database
2. Installation
```composer
composer update
```
3. Run the migrations
```laravel
php artisan migrate
```
4. Run the server
```laravel
php artisan serve
```
