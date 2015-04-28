<?php namespace App\Services\APIs;

use Illuminate\Support\Facades\Cache;

class Reddit {

	public static function getTopStories($subReddit)
	{
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