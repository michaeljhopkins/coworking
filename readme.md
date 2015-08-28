## Dick - The Admin Panel Builder for Laravel

[![Project Status](https://img.shields.io/badge/project-maintained-green.svg)](https://stillmaintained.com/tabacitu/dick)
[![GitHub license](https://img.shields.io/badge/license-GPLv3-blue.svg)](https://raw.githubusercontent.com/tabacitu/dick/master/LICENSE)
[![GitHub issues](https://img.shields.io/github/issues/tabacitu/dick.svg)](https://github.com/tabacitu/dick/issues)

Dick helps you kickstart your Laravel project, providing baseline code and interface for what any/many projects will need:
- CRUD interface (client-friendly GUI for managing entities using Eloquent, inspired by Grocery Crud for CodeIgniter);
- Authentication, user, role and permission management (using Laravel Auth & Entrust);
- Superadmin tools:
    + file & database backup;
    + log file viewer;
    + file manager;

![Example generated CRUD interface](https://dl.dropboxusercontent.com/u/2431352/Screen%20Shot%202015-05-21%20at%2011.42.40.png)

Version: 0.5 (alpha)

Website: http://usedick.com

Documentation: http://usedick.com/docs



It's heavily opinionated and uses:
- Laravel 5
- Bootstrap 3
- jQuery
- AdminLTE theme


Future versions will provide each component as separate packages.

STABLE, BUT UNDER HEAVY DEVELOPMENT

------------

### Installation
(for alpha version)

0. Composer install

    composer install

1. Like any Laravel 5 installation, run:

    chmod -R o+w storage
    chmod -R o+w vendor

2. Run the migrations and seeds:

    php artisan vendor:publish --provider="Dick\Settings\SettingsServiceProvider"
    php artisan migrate
    php artisan db:seed


------------

### How to create a new CRUD Panel for an entity

1. Generate a new resource controller in the command line:
php artisan make:controller ArticleController

2. Modify the new controller to extend CrudController and delete or comment any methods you don't need.

3. Create a model for your entity.
php artisan make:model Models/Article

4. Create a route for it in routes.php:
Route::resource('article', 'ArticleController');

See detailed installation&use of the CRUD panel here: http://usedick.com/docs
