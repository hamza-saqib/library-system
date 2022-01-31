# About Project Library System

## Admin Panel:
1. Only the user with admin role can login to admin panel and can perform the following actions:
a. Manage the racks (rack name)
b. Manage the books and add them in their specific racks. (book title, author, published
year)
c. Only 10 books can be added in a rack. An alert should prompt if admin is trying to
add more books.
- url: http://127.0.0.1:8000/admin
- email: admin@gmail.com
-pass: admin@123
## Client Panel:
1. Any registered user can login and perform following actions.
o Racks
▪ See the list of all racks and total books in them. Click on any rack to see the added
book details
2. Books
o Search the books with title, author name or published year.
o The result should show the book details along with the rack name

# requirement to run project after cloning
run following commands to add missing files.
- composer install
- composer require laravel/ui
- php artisan ui bootstrap --auth
- mv .env.example .env
- php artisan key:generate

<br>make sure you have Database created in xamp/server with name of 'library-system' and configured in .env file. and than continue commands.

<br>if you want empty database than run
- php artisan migrate

<br>if you want to populate database with fake data than run.
- php artisan migrate
- php artisan db:seed (will create 10 Racks & 20 Books through factory/seeder)


<br>at the end to run safely run following commands 
- composer dump-autoload
- php artisan config:cache
- php artisan view:cache
- php artisan route:cache

<br>to run projects run following commands
- php artisan serve
<br>Adminpanel url: http://127.0.0.1:8000/admin
defaul user email: admin@gmail.com
defaul user pass: admin@123

## packages installed
- laravel basic auth
## About Versions
- "php": "^7.3|^8.0",
- "fruitcake/laravel-cors": "^2.0",
- "guzzlehttp/guzzle": "^7.0.1",
- "laravel/framework": "^8.75",
- "laravel/sanctum": "^2.11",
- "laravel/tinker": "^2.5",
- "laravel/ui": "^3.4"
