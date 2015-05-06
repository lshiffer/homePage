<?php namespace App\Models; 

use Illuminate\Database\Eloquent\Model;

use Validator;

class Profile extends Model {

	protected $fillable = ['profileImagePath', 'description', 'user_id'];

	public function user()
	{
		return $this->belongsTo('App\User');
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