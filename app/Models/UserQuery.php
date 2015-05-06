<?php namespace App\Models;

use DB;
use Auth;
use Validator;

class UserQuery {

	public static function getProfileData($userID)
	{
		$profile = Profile::where('user_id', $userID)->with('user')->get();

		if (sizeof($profile)<1) 
			$profile = Profile::makeNew();

		return $profile;
	}

	public static function validate($input)
	{
		return Validator::make($input, [
				'user_id' => 'required'
			]);
	}
}