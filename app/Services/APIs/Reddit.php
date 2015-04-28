<?php namespace App\Services\APIs;

use Illuminate\Support\Facades\Cache;

class Reddit {

	public static function getTopStories()
	{
		$url = "http://www.reddit.com/r/programming/top.json";
		$rtObject = json_decode(file_get_contents($url));
		return $rtObject;
	}
}