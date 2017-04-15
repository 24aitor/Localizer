<h1 align="center">Localizer</h1>

<p align="center">
    <a href="https://styleci.io/repos/74991261"><img src="https://styleci.io/repos/74991261/shield?style=flat&branch=master" alt="StyleCI"></a>
    <a href="https://github.com/Laralum/24aitor/releases"><img src="https://poser.pugx.org/aitor24/localizer/v/stable.svg" alt="Version"></a>
    <a href="https://raw.githubusercontent.com/24aitor/localizer/master/LICENSE"><img src="https://poser.pugx.org/aitor24/localizer/license.svg" alt="License"></a>
</p>



## Getting Started

### Step 1. Install it with composer

Running the command below:

```
composer require aitor24/localizer
```

### Step 2. Register service provider

Include the line below to config/app.php inside array `'providers' => [` :

```php
Aitor24\Localizer\LocalizerServiceProvider::class,
```

Remind to add alias for use Laralang and Localizer functions

```php
'Laralang'   => Aitor24\Laralang\Facades\Laralang::class,
'Localizer'   => Aitor24\Localizer\Facades\LocalizerFacade::class,
```

### Step 3. Publish vendor

It will publish config file.

Running the command below:

```
php artisan vendor:publish
```

### Step 4. Migrate


Running the command below:

```
php artisan migrate
```


### Step 5. Configure defalt values

Default values can be modified also on `config/localizer.php`.

## Using Localizer

### Middleware

All routes in which you want to set language should be under the localizer's middleware to set at each request de App locale.

```php
Route::group(['middleware' => 'localizer'], function () {

    // Here your routes

});
```

### Changing languages

- Via URL with return home: localhost/project_path/public/localizer/set/{locale}/home
- Via URL with return back: localhost/project_path/public/localizer/set/{locale}

### Functions

#### Localizer::allowedLanguages()

Returns an array with [$code => $language] for all allowed languages of config.

#### Localizer::addNames()

User for arrays with only codes and return an array as [$code => $language]

#### Localizer::setRoute()

Returns an string url to set up language

#### Localizer getCurrentCode()

Returns the current language code.

#### Localizer::getCurrentLanguage()

Returns the current language name.
