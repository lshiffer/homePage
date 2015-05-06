<?php namespace App\Models; 

use Illuminate\Database\Eloquent\Model;
use Auth;
use Validator;

class Profile extends Model {

	protected $fillable = ['profileImagePath', 'description', 'user_id'];

	public function user()
	{
		return $this->belongsTo('App\User');
	}

	public static function makeNew()
	{
		$profile = new Profile();
	    $profile->description = "I'm new here...";
	    $profile->profileImagePath = "images/profileImages/default.jpg";
	    $profile->user_id=Auth::User()->id;
	    $profile->save();
	    return $profile;
	}

	public static function validate($input)
	{
		return Validator::make($input, [
				'profileImagePath' => 'required',
				'description' => 'required',
				'user_id' => 'required'
			]);
	}
}