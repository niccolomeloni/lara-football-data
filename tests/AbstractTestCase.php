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

namespace Niccolomeloni\LaraFootballData\Tests;

use Orchestra\Testbench\TestCase;
use Niccolomeloni\LaraFootballData\ApiFootballDataServiceProvider;
use Niccolomeloni\LaraFootballData\ApiFootballData;

/*
 * This is the abstract test case class.
 *
 * @author Niccolò Meloni <niccolomeloni@gmail.com>
 *
 */
class AbstractTestCase extends TestCase
{
    protected function getPackageProviders($app)
    {
        return [
            ApiFootballDataServiceProvider::class,
        ];
    }

    protected function getPackageAliases($app)
    {
        return [
            'LaraFootballData' => ApiFootballdata::class
        ];
    }
}