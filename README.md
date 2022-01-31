# About Project Library System

## Admin Panel:
1. Only the user with admin role can login to admin panel and can perform the following actions:
a. Manage the racks (rack name)
b. Manage the books and add them in their specific racks. (book title, author, published
year)
c. Only 10 books can be added in a rack. An alert should prompt if admin is trying to
add more books.
## Client Panel:
1. Any registered user can login and perform following actions.
o Racks
▪ See the list of all racks and total books in them. Click on any rack to see the added
book details
2. Books
o Search the books with title, author name or published year.
o The result should show the book details along with the rack name

## requirement to run project after cloning
run following commands to add missing files.
- composer install
- composer require laravel/ui
- php artisan ui bootstrap --auth
- mv .env.example .env
- composer dump-autoload
- php artisan key:generate

<br>make sure you have Database created in xamp/server with name of 'library-system' and configured in .env file. and than continue commands.

<br>if you want empty database than run
- php artisan migrate

<br>if you want to populate database with fake data than run.
- php artisan migrate
- php artisan db:seed (will create 10 Racks & 20 Books through factory/seeder)


<br>at the end run following commands
- php artisan config:cache
- php artisan view:cache
- php artisan route:cache

<br>to run projects run following commands
- php artisan serve
<br>Adminpanel url is (baseurl/admin)
defaul user email: admin@gmail.com
defaul user pass: admin@123

## packages installed
- laravel basic auth
