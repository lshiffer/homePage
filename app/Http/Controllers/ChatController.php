<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use LRedis;
use App\User;
use View;
use App\Models\Message;

class ChatController extends Controller {

	public function __construct()
	{
		$this->middleware('auth');
	}

	public function newMessage(Request $request)
	{
		$redis = LRedis::connection();

		$user = User::where('ID', $request->input('user_id'));

		$message = new Message;
		$message->message = $request->input('message');
		$message->user_id = $request->input('user_id');
		$message->save();

		$publish = json_encode(array('name' => $user->get()[0]->name,
					'id' => $user->get()[0]->id,
					'message' => $request->input('message')
			));

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
