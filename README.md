## Installation
The application is using docker for serving an instance of MySQL database.
```yaml
$ docker-compose up -d
```

Then use the following commands to install the application dependencies.
```yaml
$ composer install
$ npm install
```
Then the migrations need to be executed
```yaml
$ php artisan migrate
```
After that use
```yaml
$ php artisan serve
```
to start the application locally.

