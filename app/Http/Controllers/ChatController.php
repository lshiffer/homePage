<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use LRedis;
use App\User;
use View;

class ChatController extends Controller {

	public function __construct()
	{
		$this->middleware('auth');
	}

	public function newMessage(Request $request)
	{
		//dd(User::find($request->input('user_id'))->get()->name);
		$redis = LRedis::connection();
		// $view = view('chatLine', [
		// 		'message' => $request->input('message')
		// 	]);

		//return User::where('ID', $request->input('user_id'))->get()[0]->name;

		// var_dump($view->render());
		$publish = json_encode(array('name' => User::where('ID', $request->input('user_id'))->get()[0]->name,
					'message' => $request->input('message')
			));
			var_dump($publish);
		// Publush the event on channel 'channelChat'
		$redis->publish('channelChat', $publish); 

		return "success";
	}

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		//
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		//
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		//
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		//
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		//
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		//
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		//
	}

}
