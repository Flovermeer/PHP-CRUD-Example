# PHP-CRUD-Example

**_ !!! WIP !!! _**

API CRUD example made with vanilla PHP for practice. This API will expose a cooking recipes database.

<b> Models : </b>

- Recipe: id, author_id, name, meal_type, cooking_time, baking_time, difficulty, price_category.
- Ingredient: id, name.
- User: id, firstname, lastname, username, email, password.
- Step: id, number, name, description, recipe_id.
- Document: id, file, recipe_id.
- RecipesIngredients: id, recipe_id, ingredient_id.

### Tools

- PHP 8
- PHP extensions: pdo, mysql
- MySQL Workbench

### Setup database

1. Create a new database in MySQL.
2. In `src\database` rename `database.config.example.php` to `database.config.php`.  
   Put your database credentials where needed :
   - dns : e.g. `host=localhost` ; `dbname=example`
   - user: your database connection username
   - password: your database connection password
3. Now it's time to make the required migrations !  
   In your terminal, navigate to `src/database` folder and type : `php migrations.php`
4. Now that the tables have been created, it's time for some seeding :seedling:.
