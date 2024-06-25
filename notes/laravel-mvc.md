* Controller
    - Handles requests
* Model
    - Handles the interactions with the database and the data logic
* View
    - What should be shown to the user (HTML/CSS/Blade)


* Whenever there is a new entity or something to be saved, we should make a model, controller, migration, and setup the routes for it

* When you make a model, you can use the command `php artisan make:model <name> -m -c` to make the migration script and the controller at the same time
