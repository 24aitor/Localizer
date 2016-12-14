# Localizer

[![StyleCI](https://styleci.io/repos/74991261/shield?branch=master)](https://styleci.io/repos/74991261)
[![GitHub license](https://img.shields.io/github/license/24aitor/localizer.svg?style=flat-square)](https://raw.githubusercontent.com/24aitor/localizer/master/LICENSE)

## Getting Started

### Step 1. Install it with composer

Running the command below:

```
composer require aitor24/localizer
```

### Step 2. Register service provider

Include the line below to config/app.php inside array `'providers' => [` :

```
Aitor24\Localizer\LocalizerServiceProvider::class,
```

Remind to add alias for use Laralang and Localizer functions

```
'Laralang'   => Aitor24\Laralang\Facades\Laralang::class,
'Localizer'   => Aitor24\Localizer\Facades\LocalizerFacade::class,
```

### Step 3. Publish vendor

It will publish assets and config file.

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

Routes you want to auto set language should be under the below Route group

```
Route::group(['middleware' => 'localizer.middleware'], function () {

    // Here your routes

});
```

### Changing languages

- Acces to localhost/project_path/public/localizer and change your language with an interface

- Via URL: localhost/project_path/public/localizer/set/{locale}

### Functions

#### Localizer::allowedLanguages()

Returns an array with [$code => $language] for all allowed languages of config.


User for arrays with only codes and return an array as [$code => $language]


Returns an string url to an asset


Returns an html code to insert a flag into website. Must be called with {!! !!} statements


Returns an string url to set up language


Returns an html code to insert the current language flag into website. Must be called with {!! !!} statements


Returns the current language code.


Returns the current language name.


