Laravel-Facebook Package
===================================
[![Join PHP Chat][ico-phpchat]][link-phpchat]
[![Chat on Telegram][ico-telegram]][link-telegram]
[![Laravel Package][ico-package]][link-repo]
[![Latest Version on Packagist][ico-version]][link-packagist]
[![Software License][ico-license]](LICENSE.md)
[![Build Status][ico-travis]][link-travis]
[![Total Downloads][ico-downloads]][link-downloads]

**Laravel 4** Support for [Facebook PHP SDK](https://github.com/facebook/facebook-php-sdk) and additional helper methods.

## Quick start


### Required setup / Installation


You can either add the package directly by firing this command
	
	$ composer require irazasyed/laravel-facebook:^1.0
	
Or add in the `require` key of `composer.json` file manually by add the following

    "irazasyed/laravel-facebook": "^1.0"

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

## Credits

- [Syed][link-author]
- [All Contributors][link-contributors]

## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.


[ico-phpchat]: https://img.shields.io/badge/Slack-PHP%20Chat-5c6aaa.svg?style=flat-square&logo=slack&labelColor=4A154B
[ico-telegram]: https://img.shields.io/badge/@PHPChatCo-2CA5E0.svg?style=flat-square&logo=telegram&label=Telegram
[ico-package]: https://img.shields.io/badge/Laravel-4-FF2D20.svg?style=flat-square&logo=laravel&labelColor=black&logoColor=white
[ico-version]: https://img.shields.io/packagist/v/irazasyed/laravel-facebook.svg?style=flat-square
[ico-license]: https://img.shields.io/badge/license-MIT-brightgreen.svg?style=flat-square
[ico-travis]: https://img.shields.io/travis/irazasyed/laravel-facebook/master.svg?style=flat-square
[ico-downloads]: https://img.shields.io/packagist/dt/irazasyed/laravel-facebook.svg?style=flat-square


[link-phpchat]: https://phpchat.co/?ref=laravel-facebook
[link-telegram]: https://t.me/PHPChatCo
[link-repo]: https://github.com/irazasyed/laravel-facebook
[link-packagist]: https://packagist.org/packages/irazasyed/laravel-facebook
[link-travis]: https://travis-ci.org/irazasyed/laravel-facebook
[link-downloads]: https://packagist.org/packages/irazasyed/laravel-facebook
[link-author]: https://github.com/irazasyed
[link-contributors]: ../../contributors
