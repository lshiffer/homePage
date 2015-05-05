<?php namespace App\Services\APIs;

use Illuminate\Cache\Repository as CacheRepository;
use Illuminate\Support\Facades\Cache;

class Reddit {

	protected $cache;
	protected $client;

	// public function __construct($cache)
	// {
	// 	$this->cache = $cache;
	// 	//$this->client = $client; 
	// }

	public static function getTopStories($subReddit)
	{
		// if ($this->cache->has("sR-$subReddit"))
		// 	return json_decode($this->cache->get($subReddit));

		// $url = "http://www.reddit.com/r/".$subReddit."/top.json";

		// $json = json_decode(file_get_contents($url));
		// $this->cache->put("Sr-$subReddit", $json, 60);
		// return $json;

		if (Cache::has("sR-$subReddit"))
			$rtObject = Cache::get("sR-$subReddit");
		else {
			$url = "http://www.reddit.com/r/".$subReddit."/top.json";
			$rtObject = json_decode(file_get_contents($url));
			Cache::put("sR-$subReddit", $rtObject, 60);
		}

		return $rtObject;
	}

	public static function findStory($subReddit, $id)
	{
		$rtObject = Cache::get("sR-$subReddit");	
	}
}