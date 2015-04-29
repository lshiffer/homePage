<?php namespace App\Http\Controllers;

use App\Models\Message;

class HomeController extends Controller {

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
		$date = date("Y-m-d H:i:s", strtotime(date('now')) - 3600);
		return view('home', [
				'messages' => Message::where('created_at', '>', $date)->with('user')->get()
			]);
	}

}
