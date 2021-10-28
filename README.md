###### .::  Realtime chatting system laravel vue and Pusher  ::.

#### Downloading composer package and dumping
~~~bash
composer install
~~~

#### Downloading npm packages
~~~bash
npm install
~~~

### Copy code from `.env.example` to `.env` file

#### Configure Publish keys
~~~php
PUSHER_APP_ID=YourAppID
PUSHER_APP_KEY=YourAppKey
PUSHER_APP_SECRET=YourAppSecret
~~~

#### Configure project
~~~php
php artisan cache:clear
php artisan config:cache
php artisan key:generate
~~~

### Create a database name and change credential in `.env` file

### migrate and seed database
~~~bash
php artisan migrate --seed
~~~


### Composer load now
~~~
composer dump-autoload
~~~


### Serving laravel project
~~~
php artisan serve
~~~

### Enjoy the system. Thank you.
~~~
Name: Rashiqul Rony
Email: rashiqulrony@gmail.com
~~~

