Requirements
PHP 7.4.3
Nodejs 12.16.0 (or > 6.*)
NPM 6.13.4
Apache2/Nginx
MySQL
Getting Started
First clone the application:

git clone https://github.com/CliffMathebula/scout_dev_test.git
Install PHP dependencies:

composer install
Install JavaScript dependencies (Optional):

Run only if you would like to make changes to the front-end

npm install
Rename .env.example to .env then set the app key by running the following command:

php artisan key:generate --ansi
Create a new Database and configure it in the .env then run the migrate command:

php artisan migrate

php artisan serve
Don't forget to configure the default email account in the .env file.

License
This scout_dev_test application is a open-source software licensed under the MIT license.
