Laravel-Facebook (Laravel4 Package)
===================================

**Laravel4** Support for [Facebook PHP SDK](https://github.com/facebook/facebook-php-sdk) and additional helper methods.

## Quick start


### Required setup / Installation


You can either add the package directly by firing this command
	
	$ composer require irazasyed/laravel-facebook:dev-master
	
Or add in the `require` key of `composer.json` file manually by add the following

    "irazasyed/laravel-facebook": "dev-master"

And Run the Composer update comand

    $ composer update

In your `app/config/app.php` add `'Irazasyed\LaravelFacebook\LaravelFacebookServiceProvider'` to the end of the `$providers` array

```
'providers' => array(

    'Illuminate\Foundation\Providers\ArtisanServiceProvider',
    'Illuminate\Auth\AuthServiceProvider',
    ...
    'Irazasyed\LaravelFacebook\LaravelFacebookServiceProvider',

),
```

At the end of `app/config/app.php` add `'FB' => 'Irazasyed\LaravelFacebook\FacebookFacade'` to the `$aliases` array

```
'aliases' => array(

    'App'        => 'Illuminate\Support\Facades\App',
    'Artisan'    => 'Illuminate\Support\Facades\Artisan',
    ...
    'FB'    => 'Irazasyed\LaravelFacebook\FacebookFacade',

),
```
**NOTE:** Don't use `Facebook` as your facade alias as it conflicts with the SDK itself. Because the SDK doesn't have namespace (And they ain't adding it either).
    
### Configuration


Copy the config file into your project by running

```
php artisan config:publish irazasyed/laravel-facebook
```
It'll publish under `app/config/packages`

Edit the config file to include your App ID and secret key into `init` option. See config file for more configuration options.


**And you are ready to go.**

## Usage


This Package extends the Facebook PHP SDK, So all the methods listed here http://developers.facebook.com/docs/reference/php/ are available, as well as the following methods/helpers.

**Adding Soon!**

## License


This package is distributed under the terms of the MIT license.


## Additional information


Any issues, please [report here](https://github.com/irazasyed/laravel-facebook/issues)


[![Bitdeli Badge](https://d2weczhvl823v0.cloudfront.net/irazasyed/laravel-facebook/trend.png)](https://bitdeli.com/free "Bitdeli Badge")

