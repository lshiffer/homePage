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
		// Save the message
		$message = Message::saveMessage($request->input('message'), $request->input('user_id'));

		// Prepare for Publish
		$user = User::where('id', $request->input('user_id'));
		$time = date('H:i:s', strtotime($message->created_at));
		$publish = json_encode(array(
					'name' => $user->get()[0]->name,
					'id' => $user->get()[0]->id,
					'time' => $time,
					'message' => $request->input('message')
				));

		// Publish!
		 LRedis::connection()->publish('channelChat', $publish); 
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
