<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

use App\Models\UserQuery;
use App\Models\Profile;

class ProfileController extends Controller {

	public function __construct()
	{
		$this->middleware('auth');
	}

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function userProfile($id)
	{
		$data = UserQuery::getProfileData($id);

		return view('profile', [
			'profileData' => $data
		]);
	}

	public function updatePhoto(Request $request)
	{
		$target_dir = public_path('/images/profileImages/');

		$file = array('image' => \Input::file('fileToUpload'));
		$rules = array('image' => 'image');
		// $validator = \Validator::make($file, $rules);

		// if ($validator->fails())
	 //        return Redirect::to('/')->withErrors();


		// if (\Input::file('fileToUpload')->isValid()) {
			$extension = \Input::file('fileToUpload')->getClientOriginalExtension();
			$fileName = \Auth::User()->id . '.' . $extension;
			\Input::file('fileToUpload')->move($target_dir, $fileName);

			$profile = Profile::where('user_id', \Auth::User()->id)->get();

		    if(sizeof($profile)<1){
		        $profile = new Profile;
		        $profile->description = "I'm new here...";
		        $profile->user_id=\Auth::User()->id;
		    }

		    $profile->profileImagePath = 'images/profileImages/' . \Auth::User()->id . '.' . $extension;
		    $profile->save();
	    //}	  
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
