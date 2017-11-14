<p align="center"><img height="250" src="https://i.imgur.com/D7Fy4MB.png"></p>

<h1 align="center">Localizer</h1>

<p align="center">
    <a href="https://styleci.io/repos/74991261"><img src="https://styleci.io/repos/74991261/shield?style=flat&branch=master" alt="StyleCI"></a>
    <a href="https://github.com/24aitor/Localizer/releases"><img src="https://poser.pugx.org/aitor24/localizer/v/stable.svg" alt="Version"></a>
    <a href="https://scrutinizer-ci.com/g/24aitor/Localizer/?branch=master"><img src="https://scrutinizer-ci.com/g/24aitor/Localizer/badges/quality-score.png?b=master" alt="Scrutinizer"></a>
    <a href="https://github.com/24aitor/Localizer"><img src="https://poser.pugx.org/aitor24/localizer/d/total.svg" alt="Downloads"></a>
    <a href="https://raw.githubusercontent.com/24aitor/localizer/master/LICENSE"><img src="https://poser.pugx.org/aitor24/localizer/license.svg" alt="License"></a>
</p>


## What is Localizer?

Localizer is a laravel package to change easily locale on laravel projects.

It's so simple to use, once it's installed, your App locale will change only by passing routes into localizer middleare.

**Top features:**

- Change automatically app locale depending on user browser configuration
- Get language like 'Spanish' or 'English' from codes such as 'es' or 'en'.
- Store on users database table the user locale preference
- Restrict users to set languages you don't have translations

## Getting Started

### 1. Install it with composer

Running the command below:

```
composer require aitor24/localizer
```

### 2. Register service provider

Register the localizer service provider on ``config/app.php``.

```php
Aitor24\Localizer\LocalizerServiceProvider::class,
```

Remind to add alias to use Localizer functions comfortably.

```php
'Localizer'   => Aitor24\Localizer\Facades\LocalizerFacade::class,
```

### 3. Publish config

It will publish config file.

Running the command below:

```
php artisan vendor:publish --tag=localizer_config
```


#### 3.1 Publish languages

Also you can publish your languages to modify or add.

```
php artisan vendor:publish --tag=localizer_languages
```

### 4. Migrate

Publish migrations:
```
php artisan vendor:publish --tag=localizer_migrations
```

Running the command below:

```
php artisan migrate
```


### 5. Configure defalt values

Default values can be modified also on `config/localizer.php`.

#### Keys

- routes: Makes routes available.
- carbon: Sets carbon translator language.
- homeRoute: Make home route available.
- set_auto_lang: Sets language automatically depending on user's browser config
- default_lang: Default language if set_auto_lang is false or user is attempting to set an unallowed language
- prefix: Prefix of routes URI to set locale,
- allowed_langs: All allowed languages,
- middleware: default middleware to set locale,

## Using Localizer

### Middleware

All routes in which you want to set language should be under the localizer's
middleware to set at each request de App locale.

```php
Route::group(['middleware' => 'localizer'], function () {

    // Here your routes

});
```

### Changing languages

- Via URL with return home: /lang/set/{locale}/home
- Via URL with return back: /lang/set/{locale}

**Tip:** */lang prefix will be changed on config*

## Example languages view

Following there are a little code snippet of a view to select and
set languages:

```php
@foreach (Localizer::allowedLanguages() as $code => $value)
    <a href="{{ Localizer::setRouteHome($code) }}">{{ $value }}</a>
@endforeach
```

## API

### Localizer::allowedLanguages()

Returns an array with [$code => $language] for all allowed
languages of config.

### Localizer::addNames($codes)

Get an array like [$code => $language] from an array of only $codes.


### Localizer::addCodes($lang)

Get an array like [$language => $code] from an array of only $langs.

### Localizer::setRoute($code)

*Used for modals or dropdowns*

Returns the url to set up language and return back.

Also if you prefer to use directly route() function you can use it
as following code:

```php
{{ route('localizer::setLocale', ['locale' => $code]) }}
```

### Localizer::setRouteHome($code)

*Used for language selection views*

Returns the url to set language and return '/' *url('/')*

Also if you prefer to use directly route() function you can use it
as following code:

```php
{{ route('localizer::setLocaleHome', ['locale' => $code]) }}
```

### Localizer::getLanguage($code = App::getLocale())

Returns the language name of $code if specified or the current
language setted if not.

**Tip:** *Use App::getLocale() to get the current locale*
