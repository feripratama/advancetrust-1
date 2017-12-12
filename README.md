# Advance Trust
This package inspired and extend the [![santigarcor/laratrust](https://github.com/santigarcor/laratrust)](https://github.com/santigarcor/laratrust).

[![Latest Stable Version](https://poser.pugx.org/bantenprov/advancetrust/v/stable)](https://packagist.org/packages/bantenprov/advancetrust)
[![Software License][ico-license]](LICENSE.md)
[![Total Downloads](https://poser.pugx.org/bantenprov/advancetrust/downloads)](https://packagist.org/packages/bantenprov/advancetrust)

## DEMO
Demo for this package is available here [Role](http://role-01.dev.bantenprov.go.id/)

## Version
|Version|Description|
|-------|-----------|
|1.0.1|Laravel|
|1.0.2|Laravel with VueJs|
|1.0.3|Available API Rest|

## Install

- **Advancetrust for laravel :**
`composer require bantenprov/advancetrust "1.0.1"`


- **Advancetrust for laravel with vue js :**
`composer require bantenprov/advancetrust "1.0.2"`


- **Advancetrust available API request :**
`composer require bantenprov/advancetrust "1.0.3"`

## 1. In your config/app.php add for laravel <= 5.4 only: 

``` php
'providers' => array(

    App\Providers\EventServiceProvider::class,
    App\Providers\RouteServiceProvider::class,
    ...
    Bantenprov\Advancetrust\advancetrustServiceProvider::class,
    Laratrust\LaratrustServiceProvider::class,
    Collective\Html\HtmlServiceProvider::class,
    'That0n3guy\Transliteration\TransliterationServiceProvider',

),
```
``` php
'aliases' => [

    'Validator' => Illuminate\Support\Facades\Validator::class,
    'View' => Illuminate\Support\Facades\View::class,
    ...
    'Laratrust'   => Laratrust\LaratrustFacade::class,
    'Form' => Collective\Html\FormFacade::class,
    'Html' => Collective\Html\HtmlFacade::class,
```
### Before run artisan command : `$ php artisan migrate`
Edit `database/migrations/2014_10_12_000000_create_users_table.php`
``` php
Schema::create('users', function (Blueprint $table) {
    $table->increments('id');
    $table->string('name');
    $table->string('email')->unique();
    // add api_token field
    $table->string('api_token',191);
    $table->string('password');
    $table->rememberToken();
    $table->timestamps();
});
```
Edit `database/seeds/LaratrustSeeder.php`
``` php
$user = \App\User::create([
    'name' => ucwords(str_replace('_', ' ', $key)),
    'email' => $key.'@app.com',
    'password' => bcrypt('password'),
    // add api_token
    'api_token' => str_random(60)
]);
```

``` php
// Create default user for each permission set
$user = \App\User::create([
    'name' => ucwords(str_replace('_', ' ', $key)),
    'email' => $key.'@app.com',
    'password' => bcrypt('password'),
    'remember_token' => str_random(10),
    // add api_token
    'api_token' => str_random(60)
]);
```

## 2. php artisan
``` bash
$ php artisan vendor:publish --tag="laratrust"
$ php artisan laratrust:setup
$ php artisan laratrust:seeder
$ php artisan migrate
$ composer dump-autoload
$ php artisan db:seed --class=LaratrustSeeder
$ php artisan serve
```
## Please run this available command after finished installation
``` bash
$ php artisan advancetrust:add-route
$ php artisan advancetrust:create-controller
$ php artisan advancetrust:create-view
$ php artisan advancetrust:version
```
## Add authentication to use the package
``` bash
$ php artisan make:auth
```

## Edit `resources/views/home.blade.php`

```html
@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Dashboard</div>

                <div class="panel-body">
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif
                    {{-- 
                    add menu content here
                    --}}
                    @yield('advancetrust_content')
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
```


The MIT License (MIT). Please see [License File](LICENSE.md) for more information.

[ico-version]: https://img.shields.io/packagist/v/:vendor/:package_name.svg?style=flat-square
[ico-license]: https://img.shields.io/badge/license-MIT-brightgreen.svg?style=flat-square
[ico-travis]: https://img.shields.io/travis/:vendor/:package_name/master.svg?style=flat-square
[ico-scrutinizer]: https://img.shields.io/scrutinizer/coverage/g/:vendor/:package_name.svg?style=flat-square
[ico-code-quality]: https://img.shields.io/scrutinizer/g/:vendor/:package_name.svg?style=flat-square
[ico-downloads]: https://img.shields.io/packagist/dt/:vendor/:package_name.svg?style=flat-square

[link-packagist]: https://packagist.org/packages/:vendor/:package_name
[link-travis]: https://travis-ci.org/:vendor/:package_name
[link-scrutinizer]: https://scrutinizer-ci.com/g/:vendor/:package_name/code-structure
[link-code-quality]: https://scrutinizer-ci.com/g/:vendor/:package_name
[link-downloads]: https://packagist.org/packages/:vendor/:package_name
[link-author]: https://github.com/:author_username
[link-contributors]: ../../contributors


