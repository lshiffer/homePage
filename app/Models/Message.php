<?php namespace App\Models; 

use Illuminate\Database\Eloquent\Model;

class Message extends Model {

	protected $fillable = ['user_id', 'message'];

	public static function getInitMessages()
	{
		$date = date("Y-m-d H:i:s", strtotime(date("Y-m-d H:i:s")) - 3600*(6));

		return Message::where('messages.created_at', '>', $date)
					->with('user')
					->orderBy('created_at', 'DESC')
					->get();
	}

	public static function saveMessage($chat, $id)
	{
		$message = new Message;
		$message->message = $chat;
		$message->user_id = $id;
		$message->save();
		return $message;
	}

	public function user()
	{
		return $this->belongsTo('App\User', 'user_id', 'id');
	}
}