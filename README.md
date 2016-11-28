# Localizer

## Getting Started

### Step 1. Install it with composer

Running the command below:

```
composer require aitor24/localizer
```

### Step 2. Register service provider & aliases

Include the line below to config/app.php inside array `'providers' => [` :

```
Aitor24\Localizer\LocalizerServiceProvider::class,
```


Include the line below to config/app.php inside array `'aliases' => [` :

*This is required for use Laralang*

```
'Laralang'   => Aitor24\Laralang\Facades\Laralang::class,
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
