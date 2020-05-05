## instruction for run project

1. run command `composer install`
2. Set permission for `storage` and `bootstrap/cache` directories (should be writable by web server)
3. copy `.env.example` file to `.env` file (create .env file if file not exist)
4. run command (in terminal or console) : `php artisan key:generate` (for generate application key)
5. setup database credentials in `.env` file
6. run command (terminal or console) : `php artisan serve` for start project (link http://127.0.0.1:8000 where project served) or can be access by `<HOST>::<PORT>/<PATHTOPROJECT>/public` if project is whithin apache server root directory or within htdocs of xampp
7. run command (terminal or console) : `php artisan storage:link` (to create symbolic link of storage to public)
8. run command (terminal or console) : `php artisan migrate` (to create table in database)
9. for reset passoword mail please set mail configuration setting in `.env` file.

**Note:** Command should be run from the root directory of project.