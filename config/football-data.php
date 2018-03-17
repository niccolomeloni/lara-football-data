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

return [

    /*
    |--------------------------------------------------------------------------
    | URL football-data.org API
    |--------------------------------------------------------------------------
    |
    | The base URL of football-data.org API
    |
    */

    'base_uri' => 'http://api.football-data.org/v1/',

    'headers' => [

        /*
        |--------------------------------------------------------------------------
        | X-Response-Control
        |--------------------------------------------------------------------------
        |
        | Your authentication token.
        | Possible values: string matching to /[a-z1-9]+/
        |
        */

        'X-Auth-Token' => env('LFD_X_Auth_Token'),

        /*
        |--------------------------------------------------------------------------
        | X-Response-Control
        |--------------------------------------------------------------------------
        |
        | Control the appearance of the response. 'minified' will lack some (meta) 
        | information and thus be much smaller. However, 'compressed' is currently 
        | only supported by the fixture resource.
        | Possible values: full (default)|minified|compressed
        |
        */

        'X-Response-Control' => env('LFD_X_RESPONSE_CONTROL', 'full'),
    ],

];
