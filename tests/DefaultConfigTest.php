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

/*
 * This is the default config test case class.
 *
 * @author Niccolò Meloni <niccolomeloni@gmail.com>
 *
 */
class DefaultConfigTest extends AbstractTestCase
{
    /** @test */
    public function it_populate_expected_base_uri_default()
    {
        $this->assertEquals('http://api.football-data.org/v1/', $this->app['config']['football-data.base_uri']);
    }

    /** @test */
    public function it_populate_expected_x_auth_token_default()
    {
        $this->assertEquals('api-test-token', $this->app['config']["football-data.headers.X-Auth-Token"]);
    }

    /** @test */
    public function it_populate_expected_x_response_control_default()
    {
        $this->assertEquals('full', $this->app['config']["football-data.headers.X-Response-Control"]);
    }
}