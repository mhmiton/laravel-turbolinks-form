# Laravel Turbolinks Form

Laravel form submission with [Turbolinks](https://github.com/turbolinks/turbolinks).

### Installation

> **Requires:**
- **[PHP 7.0+](https://php.net/releases/)**
- **[Laravel 5.5+](https://github.com/laravel/laravel)**

Install through Composer:

```
composer require mhmiton/laravel-turbolinks-form
```

You can publish the config file by running:

```
php artisan vendor:publish --provider="Mhmiton\\LaravelTurbolinksForm\\LaravelTurbolinksFormServiceProvider" --tag="config"
```

You can publish the views by running:

```
php artisan vendor:publish --provider="Mhmiton\\LaravelTurbolinksForm\\LaravelTurbolinksFormServiceProvider" --tag="views"
```

### Register Middleware

The `\Mhmiton\LaravelTurbolinksForm\Middleware\Turbolinks::class` middleware must be registered in the kernel.

**Example**

```
// app/Http/Kernel.php

...

protected $middlewareGroups = [
    'web' => [
        ...
        \Mhmiton\LaravelTurbolinksForm\Middleware\Turbolinks::class,
    ],

    ...
];
```

### Validation

For the form validation, you need to use the `\Mhmiton\LaravelTurbolinksForm\Traits\TurbolinksValidatable` trait in the exception handler.

**Example**

```
// app/Exceptions/Handler.php

...
use Mhmiton\LaravelTurbolinksForm\Traits\TurbolinksValidatable;

class Handler extends ExceptionHandler
{
    use TurbolinksValidatable;
    
    ...
}
```

### Scripts

Include these package scripts in your layout file.

**Example**

```
@include('turbolinks-form::scripts')

// Laravel 7 or greater

<x:turbolinks-form::scripts />
```

**Note:** You can modify these scripts by publishing the views file.

### Config

The config file is located at `config/turbolinks-form.php` after publishing the config file.

**Enable or Disable**

```
/*
|--------------------------------------------------------------------------
| TurbolinksForm settings
|--------------------------------------------------------------------------
| TurbolinksForm is enabled by default.
| You can override the value by setting enable to true or false.
|
*/

'enabled' => env('TURBOLINKS_FORM', true)

// or using .env file
TURBOLINKS_FORM=true
```

**Selector**

```
/*
|--------------------------------------------------------------------------
| TurbolinksForm selector
|--------------------------------------------------------------------------
| TurbolinksForm used form selector by default.
| You can use any DOM selector for the form.
|
*/

'selector' => 'form'
```

### License

Copyright (c) 2021 Mehediul Hassan Miton <mhmiton.dev@gmail.com>

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.