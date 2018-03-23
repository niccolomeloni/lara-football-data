<?php

/*
 * This file is part of lara-football-data.
 *
 * (c) Niccolò Meloni <niccolomeloni@gmail.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

declare(strict_types=1);

namespace Niccolomeloni\LaraFootballData;

use Illuminate\Support\ServiceProvider;
use GuzzleHttp\Client;

/*
 * This is the football-data.org API service provider.
 *
 * @author Niccolò Meloni <niccolomeloni@gmail.com>
 *
 */
class ApiFootballDataServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        $source = $this->configPath();
        $this->publishes([ $source => config_path('football-data.php') ]);
        $this->mergeConfigFrom($this->configPath(), 'football-data');
    }

    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->singleton('api-football-data', function($app) {
            $options = $app['config']->get('football-data');
            return new ApiFootballDataManager(new Client($options));
        });
    }

    protected function configPath()
    {
        return __DIR__ . '/../config/football-data.php';
    }

    /**
     * Get the services provided by the provider.
     *
     * @return string[]
     */
    public function provides(): array
    {
        return [
            'api-football-data',
        ];
    }
}
