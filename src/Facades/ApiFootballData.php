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

namespace Niccolomeloni\LaraFootballData\Facades;

use Illuminate\Support\Facades\Facade;

/*
 * This is the football-data.org API facade class.
 *
 * @author Niccolò Meloni <niccolomeloni@gmail.com>
 *
 */
class ApiFootballData extends Facade
{
    /**
     * Get the registered name of the component.
     *
     * @return string
     */
    protected static function getFacadeAccessor(): string
    {
        return 'api-football-data';
    }
}