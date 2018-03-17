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

use GuzzleHttp\Client;

/*
 * This is the football-data.org API manager.
 *
 * @author Niccolò Meloni <niccolomeloni@gmail.com>
 *
 */
class ApiFootballDataManager
{
	protected $guzzleClient;
	
	public function __construct(Client $guzzleClient)
	{	
		$this->guzzleClient = $guzzleClient;
	}

	/**
	 * List all available competitions.
	 * 
	 * @param string $season Defaults to the current year, given as 4 digit like '2015'.
	 */
	public function competitions($season = "")
	{
		return (new Api\RunnableApi($this->guzzleClient, "competitions?season={$season}"))->get();
	}
	
	/**
	 * Return a Competition Api
	 * 
	 * @param int $id The id of a resource.
	 */
	public function competition(int $id)
	{	
		return new Api\CompetitionApi($this->guzzleClient, "competitions/{$id}");
	}

	/**
	 * List fixtures across a set of competitions.
	 * 
	 * @param string $timeFrame The value of the timeFrame argument must start with either p(ast) or n(ext), representing a timeframe either in the past or future. It is followed by a number in the range 1..99. It defaults to n7 in the fixture resource and is unset for fixture as a subresource. For instance: p6 would return all fixtures in the last 6 days, whereas n23 would result in returning all fixtures in the next 23 days.
	 * @param string $matchday For the leagueTable subresource, the matchday defaults to the current matchday. For former seasons the last matchday is taken. For the fixture resource, it's unset. 
	 */
	public function fixtures($timeFrame= "", $matchday = "")
	{
		return (new Api\RunnableApi($this->guzzleClient, "fixtures?timeFrame={$timeFrame}&matchday={$matchday}"))->get();
	}

	/**
	 * Show one fixture.
	 * 
	 * @param int $id 
	 * @param string $head2head Define the the number of former games to be analyzed in the head2head node. Defaults to 10.
	 */
	public function fixture(int $id, $head2head = "")
	{	
		return (new Api\RunnableApi($this->guzzleClient, "fixtures/{$id}?head2head={$head2head}", false))->get();
	}

	/**
	 * Return a Team Api
	 * 
	 * @param int $id The id of a resource.
	 */
	public function team(int $id)
	{
		return new Api\TeamApi($this->guzzleClient, "teams/{$id}");
	}

	public function get(string $url)
	{
		return (new Api\RunnableApi($this->guzzleClient, $url))->get();
	}
}