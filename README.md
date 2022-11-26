git clone --branch master https://github.com/nikhilvravindran/Qubicle-referal-system.git

create database "qubicle" in phpmyadmin

run below commands = > 
================================

composer update

php artisan migrate 

php artisan db:seed --class=CreateAdminSeeder

php artisan db:seed --class=levelSeeder

run this code on WAMP server.
