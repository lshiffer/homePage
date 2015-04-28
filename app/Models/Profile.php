<?php namespace App\Models; 

use Illuminate\Database\Eloquent\Model;

class Profile extends Model {

	protected $fillable = ['profileImagePath', 'description', 'user_id'];

	public function user()
	{
		return $this->belongsTo('App\User');
	}
}