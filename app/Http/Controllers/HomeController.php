<?php namespace App\Http\Controllers;

use App\Models\Message;
use App\Models\UserQuery;

class HomeController extends Controller {

	private $categories = array("funny", "programming", "WTF", "worldnews", "news", "AwfulCommercials","productivity");

	/*
	|--------------------------------------------------------------------------
	| Home Controller
	|--------------------------------------------------------------------------
	|
	| This controller renders your application's "dashboard" for users that
	| are authenticated. Of course, you are free to change or remove the
	| controller as you wish. It is just here to get your app started!
	|
	*/

	/**
	 * Create a new controller instance.
	 *
	 * @return void
	 */
	public function __construct()
	{
		$this->middleware('auth');
	}

	/**
	 * Show the application dashboard to the user.
	 *
	 * @return Response
	 */
	public function index()
	{
		$date = date("Y-m-d H:i:s", strtotime(date("Y-m-d H:i:s")) - 3600*(6));
		return view('home', [
				'messages' => Message::where('messages.created_at', '>', $date)->with('user')->orderBy('created_at', 'DESC')->get(),
				'categories' => $this->categories,
				'profile' => view('profile', [
						'profileData' => UserQuery::getProfileData(\Auth::User()->id)
						])
				]);
	}

}
