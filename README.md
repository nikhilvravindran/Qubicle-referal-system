git clone --branch master https://github.com/nikhilvravindran/Qubicle-referal-system.git

create database "qubicle" in phpmyadmin

run below commands = > 
================================

composer update

rename  file ".env.example" to .env

change value of DB_DATABASE to DB_DATABASE=qubicle  

php artisan migrate 

php artisan db:seed --class=CreateAdminSeeder

php artisan db:seed --class=levelSeeder

run this code on WAMP server  ==> http://127.0.0.1:8000/login
