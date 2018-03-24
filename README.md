# Lara Football Data

![CircleCI](https://img.shields.io/circleci/project/github/niccolomeloni/lara-football-data.svg) ![Packagist](https://img.shields.io/packagist/v/niccolomeloni/lara-football-data.svg) ![license](https://img.shields.io/github/license/niccolomeloni/lara-football-data.svg)

> A [Football Data](https://www.football-data.org/) API bridge for Laravel

## Install via Composer

Install the `niccolomeloni/lara-football-data` package via Composer by typing following command:

```sh
$ composer require niccolomeloni/lara-football-data
```

## Service Provider and Facades ( Laravel 5.5 or above )

If you are using Laravel >= 5.5 that's all: this package supports Laravel new [Package Discovery](https://laravel.com/docs/5.5/packages#package-discovery).


## Service Provider and Facades ( Laravel 5.4 or below )

You need to add the service provider to your `config/app.php` providers array:

```php
'providers' => [
    /* ... */
    Niccolomeloni\LaraFootballData\ApiFootballDataServiceProvider::class,
]
```

Next, you may want to add the facade to your `config/app.php` aliases array:

```php
'aliases' => [
    /* ... */
    'LaraFootballData' => Niccolomeloni\LaraFootballData\Facades\ApiFootballData::class,
]
```

## Publish the configuration

Run the following command to publish the package config file:

```sh
$ php artisan vendor:publish --provider="Niccolomeloni\LaraFootballData\ApiFootballDataServiceProvider"
```

You should now have a `config/football-data.php` file that allows you to configure the basics of this package.

## Examples

Here you can see an example of how to use this package with `LaraFootballData` facade:

```php
LaraFootballData::competitions($season = "");
LaraFootballData::competition($competitionId)->teams();
LaraFootballData::competition($competitionId)->leagueTable($matchday = "");
LaraFootballData::competition($competitionId)->fixtures($timeFrame= "", $matchday = "");
LaraFootballData::fixtures($timeFrame= "", $matchday = "");
LaraFootballData::fixture($fixtureId, $head2head = "");
LaraFootballData::team($teamId)->fixtures($season = "", $timeFrame = "", $venue = "");
LaraFootballData::team($teamId)->players();
LaraFootballData::get('http://api.football-data.org/v1/...');
```

If you prefer to use dependency injection over facades like me, then you can inject the `ApiFootballDataManager`:

```php
namespace App\Http\Controllers;

use Niccolomeloni\LaraFootballData\ApiFootballDataManager;

class FooController extends Controller
{
    protected $apiFootballDataManager;

    public function __construct(ApiFootballDataManager $apiFootballDataManager)
    {
        $this->apiFootballDataManager = $apiFootballDataManager;
    }

    public function competitions($season = "")
    {
        $this->apiFootballDataManager->competitions($season);
    }
}
```

## Documentation

Check on [football-data.org API documentation](http://www.football-data.org/docs/v1/index.html).

## License

Released under the MIT License, see [LICENSE](LICENSE)