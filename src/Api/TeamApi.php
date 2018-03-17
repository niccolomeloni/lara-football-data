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

class TeamApi extends RunnableApi
{
	/**
	 * Show all fixtures for a certain team.
	 * @param string $season Defaults to the current year, given as 4 digit like '2015'.
	 * @param string $timeFrame The value of the timeFrame argument must start with either p(ast) or n(ext), representing a timeframe either in the past or future. It is followed by a number in the range 1..99. It defaults to n7 in the fixture resource and is unset for fixture as a subresource. For instance: p6 would return all fixtures in the last 6 days, whereas n23 would result in returning all fixtures in the next 23 days.
	 * @param string $venue Defines the venue of a fixture. Default is unset and means to return all fixtures.
	 */
	public function fixtures($season = "", $timeFrame = "", $venue = "")
	{		
		return (new RunnableApi($this->guzzleClient, "$this->url/fixtures?season={$season}&timeFrame={$timeFrame}&venue={$venue}"))->get();
	}

	/**
	 * Show all players for a certain team.
	 */
	public function players()
	{		
		return (new RunnableApi($this->guzzleClient, "$this->url/players"))->get();
	}
}