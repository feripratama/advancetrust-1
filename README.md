# Advance Trust
This package inspired and extend the [![santigarcor/laratrust](https://github.com/santigarcor/laratrust)](https://github.com/santigarcor/laratrust).


[![Scrutinizer Code Quality](https://scrutinizer-ci.com/g/bantenprov/advancetrust/badges/quality-score.png?b=master)](https://scrutinizer-ci.com/g/bantenprov/advancetrust/?branch=master)
[![Build Status](https://scrutinizer-ci.com/g/bantenprov/advancetrust/badges/build.png?b=master)](https://scrutinizer-ci.com/g/bantenprov/advancetrust/build-status/master)
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
`composer require bantenprov/advancetrust:"1.2"`

## 1. In your config/app.php add for laravel <= 5.4 only: 

``` php
'providers' => array(

    App\Providers\EventServiceProvider::class,
    App\Providers\RouteServiceProvider::class,
    ...
    Bantenprov\Advancetrust\advancetrustServiceProvider::class,
    Bantenprov\LaravelApiManager\LaravelApiManagerServiceProvider::class,
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

## 2. php artisan
``` bash
$ php artisan vendor:publish --tag="laratrust"
$ php artisan vendor:publish
$ php artisan laratrust:setup
$ php artisan laratrust:seeder
$ php artisan laravel-api-manager:add-route
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


### [Server config](https://github.com/bantenprov/advancetrust/blob/master/README.md#server-config)

Tambahkan pada .env anda parameter berikut
1. Host yang digunakan sebagai role controller sebagai eksekutor penambahan role
```
BANTENPROV_ROLEHOST=rolehost.domain.tld
```
setting ini harus digunakan pada semua site yang menggunakan advantrust.

2. Host yang digunakan sebagai requestor penambahan role
```
BANTENPROV_DRIVERHOST=driverhost.domain.tld
```

### Contoh penggunaan
### Request menggunakan guzzle pada client

Request menggunakan package guzzle
caranya install terlebih dahulu package guzzle dengan cara :
`composer require guzzlehttp/guzzle`

pada client tambahkan `BANTENPROV_ROLEHOST=http://localhost:8000` pada file `.env` Host yang digunakan sebagai role controller sebagai eksekutor penambahan role

pada contoh di atas menggunakan `http://localhost:8000` sebagai host




``` php

// method get 

Route::get('/guzzle/permission/get',function(){
    $hostname = \Request::root();
    $client = new GuzzleHttp\Client(['base_uri' => env('BANTENPROV_ROLEHOST').'/api/v1/advancetrust/']);    
    $response = $client->request('GET', 'permission',[
                                        'headers' => [
                                            'secret_key' => 'QwQjR4V8VKXqvWR3l7v056VU9l2d2JKkcXvM9GQKYhn8J5gsGKNdEYj6cHaoP5HOne51TwSRk4CT0ksZjCUCEEKi6V1a34bQqXEI',
                                            'client' => $hostname
                                        ]
    ]);    
    
    return $response->getBody();

});

Route::get('/guzzle/role/get',function(){
    $hostname = \Request::root();
    $client = new GuzzleHttp\Client(['base_uri' => env('BANTENPROV_ROLEHOST').'/api/v1/advancetrust/']);    
    $response = $client->request('GET', 'role',[
                                        'headers' => [
                                            'secret_key' => 'QwQjR4V8VKXqvWR3l7v056VU9l2d2JKkcXvM9GQKYhn8J5gsGKNdEYj6cHaoP5HOne51TwSRk4CT0ksZjCUCEEKi6V1a34bQqXEI',
                                            'client' => $hostname
                                        ]
    ]);    

    return $response->getBody();
        
});


//method post

Route::get('/guzzle/permission/post',function(){
    
    $hostname = \Request::root();
    $client = new GuzzleHttp\Client(['base_uri' => env('BANTENPROV_ROLEHOST').'/api/v1/advancetrust/']);    
    $response = $client->request('POST', 'permission/store',[
                                        'headers' => [
                                            'secret_key' => 'QwQjR4V8VKXqvWR3l7v056VU9l2d2JKkcXvM9GQKYhn8J5gsGKNdEYj6cHaoP5HOne51TwSRk4CT0ksZjCUCEEKi6V1a34bQqXEI',
                                            'client' => $hostname
                                        ],
                                        'form_params' => [
                                            'name' => 'example name',
                                            'description' => 'example description',
                                            'display_name' => 'example display name'
                                        ]
    ]);    

    return $response->getBody();

});


Route::get('/guzzle/role/post',function(){
    
    $hostname = \Request::root();
    $client = new GuzzleHttp\Client(['base_uri' => env('BANTENPROV_ROLEHOST').'/api/v1/advancetrust/']);    
    $response = $client->request('POST', 'role/store',[
                                        'headers' => [
                                            'secret_key' => 'QwQjR4V8VKXqvWR3l7v056VU9l2d2JKkcXvM9GQKYhn8J5gsGKNdEYj6cHaoP5HOne51TwSRk4CT0ksZjCUCEEKi6V1a34bQqXEI',
                                            'client' => $hostname
                                        ],
                                        'form_params' => [
                                            'name' => 'example name',
                                            'description' => 'example description',
                                            'display_name' => 'example display name'
                                        ]
    ]);    

    return $response->getBody();

});

```
### secret key `secret_key`
ini dibuat menggunakan package `laravel-api-manager`, caranya akses pada browser : `http://localhost:8000/api_manager` dan tambahkan data baru. 
client : `localhost:9090`
description : `cient`

setelah berhasil di tambahkan

gunakan `api keys` untuk pada value `secret_key` pada header 
`'secret_key' => 'api_keys'`


Pada host tambahkan `BANTENPROV_DRIVERHOST=http://localhost:9090` pada file `.env` Host yang digunakan sebagai requestor penambahan role 

jadi pada contoh ini host yang diberi hak akses untuk melakukan penambahan data baru sesuai dengan `BANTENPROV_DRIVERHOST` yaitu `http://localhost:9090` dan selain dari `http://localhost:9090` hanya mempunyai hak akses untuk meminta data dari `http://localhost:8000` 

command run server pada client :
```bash
$ php artisan serve --port=9090
```
command run server pada host :
```bash
$ php artisan serve
```

> jika masih binggung untuk cara penggunaan `guzzle` silahkan baca-baca dokumentasinya [disini](http://docs.guzzlephp.org)

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

