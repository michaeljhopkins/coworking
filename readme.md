## Dick Laravel CMS

### Installation
(for alpha version)


1. Like any Laravel 5 installation, run:

    chmod -R o+w storage
    chmod -R o+w vendor

2. Run the migration to get the users table:

    php artisan migrate

3. Create a user for yourself at:
http://localhost/dick/public/auth/register


------------

### How to create a new CRUD Panel for an entity

1. Generate a new resource controller in the command line:
php artisan make:controller ArticleController

2. Modify the new controller to extend CrudController and delete or comment any methods you don't need.

3. Create a model for your entity.
php artisan make:model Models/Article

4. Create a route for it in routes.php:
Route::resource('article', 'ArticleController');

See detailed installation&use of the CRUD panel here: https://bitbucket.org/tabacitu/dick/wiki/CRUD