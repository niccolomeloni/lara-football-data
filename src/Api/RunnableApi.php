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

namespace Niccolomeloni\LaraFootballData\Api;

use GuzzleHttp\Client;

class RunnableApi extends AbstractApi
{
    public function __construct(Client $guzzleClient, string $url = "")
	{	
		$this->guzzleClient = $guzzleClient;
		$this->url = $url;
	}

    public function get()
	{	
		$response = $this->guzzleClient->get($this->url);
		$result = json_decode($response->getBody()->getcontents(), true);
		return $result;
	}
}