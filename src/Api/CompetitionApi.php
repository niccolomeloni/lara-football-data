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

class CompetitionApi extends AbstractApi
{
	/**
	 * List all teams for a certain competition.
	 */
	public function teams()
	{
		return (new RunnableApi($this->guzzleClient, "$this->url/teams"))->get();
	}

	/**
	 * Show League Table / current standing.
	 * 
	 * @param string $matchday For the leagueTable subresource, the matchday defaults to the current matchday. For former seasons the last matchday is taken. For the fixture resource, it's unset.
	 */
	public function leagueTable($matchday = "")
	{		
		return (new RunnableApi($this->guzzleClient, "$this->url/leagueTable?matchday={$matchday}", false))->get();
	}

	/**
	 * List all fixtures for a certain competition.
	 * 
	 * @param string $timeFrame The value of the timeFrame argument must start with either p(ast) or n(ext), representing a timeframe either in the past or future. It is followed by a number in the range 1..99. It defaults to n7 in the fixture resource and is unset for fixture as a subresource. For instance: p6 would return all fixtures in the last 6 days, whereas n23 would result in returning all fixtures in the next 23 days.
	 * @param string $matchday For the leagueTable subresource, the matchday defaults to the current matchday. For former seasons the last matchday is taken. For the fixture resource, it's unset.
	 */
	public function fixtures($timeFrame= "", $matchday = "")
	{		
		return (new RunnableApi($this->guzzleClient, "$this->url/leagueTable?timeFrame={$timeFrame}&matchday={$matchday}"))->get();
	}
}