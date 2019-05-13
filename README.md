# Laravel Options

Persistent key value options for Laravel.

## Installation

Install the package via composer:
```
composer require hisman/option
```

### Provider

If you're using Laravel < 5.5, you'll need to add the service provider to `config/app.php` file:

```php
'providers' => [
    ...

    Hisman\Option\OptionServiceProvider::class,

    ...
]
```

### Alias

Add the alias to `config/app.php` file:

```php
'aliases' => [
    ...

    'Option' => Hisman\Option\Facade\Option::class,

    ...
]
```

### Migration

You must run the migration `php artisan migrate` before using this package. It creates `options` table in your database that will be used for storing the options.

## Usage

Using Facade

```php
// Set option
Option::set('name', 'value');
Option::set('name', [1, 2, 3]);

// Get option
$option = Option::get('name');

// Get option with default value
$option = Option::get('name', 'default value');
```

Using helper function

```php
// Set option
option()->set('name', 'value');
option()->set('name', [1, 2, 3]);

// Get option
$option = option('name');
$option = option()->get('name');

// Get option with default value
$option = option('name', 'default value');
$option = option()->get('name', 'default value');
```
