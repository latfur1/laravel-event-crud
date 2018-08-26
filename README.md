# LARAVEL EVENT CRUD

[![Issues](https://img.shields.io/github/issues/latfur1/laravel-event-crud.svg?style=flat-square)](https://github.com/latfur1/laravel-event-crud/issues)
[![Stars](https://img.shields.io/github/stars/latfur1/laravel-event-crud.svg?style=flat-square)](https://github.com/latfur1/laravel-event-crud/stargazers)

## Laravel Event CRUD with Full calendar


![Event-Example Screenshot](https://i.imgur.com/QelTYBq.png "Event-Example Project")

![Event-Example Screenshot](https://i.imgur.com/oU65046s.png "Event-Example Project")


### Features

* Responsive Design.
* Create ,Edit and Delete Event.
* Event view in calendar and list.
* Front end validation
* Back end validation



### Installation

Talk is a Laravel package so you can install it via Composer. Run this command in your terminal from your project directory:

```
composer require latfur/laravel-event-crud
```

Wait for a while, Composer will automatically install Talk in your project.

### Configuration

When the download is complete, you have to call this package service in `config/app.php` config file. To do that, add this line in `app.php` in `providers` section:

```php
Latfur\Event\EventServiceProvider::class,
```



Now run this command in your terminal to publish this package resources:

```
php artisan vendor:publish --provider="Latfur\Event\EventServiceProvider"
```

After running this command, all necessary file will be included in your project. This package has two default migrations. So you have to run migrate command like this. (But make sure your database configuration is configured correctly.)

```shell
php artisan migrate
```






