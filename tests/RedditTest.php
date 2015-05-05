<?php

class RedditTest extends TestCase {

	/*
		TEST ON HOLD

		Requires changing Services/APIs/Reddit into non-static class.
		Changes were made for Reddit to become a non-static class.
		Constructor included to pass in Cache.

		Could NOT send in actual cache from RedditController.
		On hold for now. 
	*/

	// Verify pull from cache
	public function testSearchPullsFromCache()
	{
		// $json = '{"total": 0, "stories": []}';

		// $client = Mockery::mock('App\Services\Client');

		// $cache = Mockery::mock('Illuminate\Cache\Repository');
		// $cache->shouldReceive('has')->with('webdev')->andReturn(true);

		// $cache->shouldReceive('get')->with('webdev')->andReturn($json);

		// $reddit = new Reddit();
	}


	public function tearDown()
	{
		Mockery::close();
	}
}