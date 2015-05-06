<?php namespace App\Models;

use DB;

use Validator;

class UserQuery {

	public static function getProfileData($userID)
	{
		$data = Profile::where('user_id', $userID)->with('user')->get();

		return $data;
	}

	public static function validate($input)
	{
		return Validator::make($input, [
				'user_id' => 'required'
			]);
	}
}