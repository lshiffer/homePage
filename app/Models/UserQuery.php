<?php namespace App\Models;

	use DB;

class UserQuery {

	public static function getProfileData($userID)
	{
		$data = Profile::where('user_id', $userID)->with('user')->get();

		return $data;
	}
}