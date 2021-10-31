### .::  Realtime chatting system laravel vue and Pusher  ::.

#### Downloading composer package and dumping
#### Copy code from `.env.example` to `.env` file
~~~bash
composer install
~~~

#### Downloading npm packages
~~~bash
npm install
~~~

#### Create a database name and change credential in `.env` file
#### Configure Publish keys

~~~php
PUSHER_APP_ID=YourAppID
PUSHER_APP_KEY=YourAppKey
PUSHER_APP_SECRET=YourAppSecret
~~~

#### Configure project
~~~php
php artisan key:generate
php artisan cache:clear
php artisan config:cache
php artisan storage:link
~~~

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
npm run watch
~~~

### Enjoy the system. Thank you.
~~~
Name: Rashiqul Rony
Email: rashiqulrony@gmail.com
~~~

