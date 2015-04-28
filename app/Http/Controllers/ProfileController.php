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
		$target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);

		$target_dir . basename($_FILES["fileToUpload"]["name"]);
		$uploadOk = 1;
		$imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);
		$target_file = $target_dir . \Auth::User()->id . '.' . $imageFileType;

		var_dump(getimagesize($_FILES["fileToUpload"]["tmp_name"]));

		// Check if image file is a actual image or fake image
		if(isset($request["submit"])) {
		    $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
		    if($check !== false) {
		        $uploadOk = 1;
		    } else {
		        $uploadOk = 0;
		    }

		    $uploadOk=3;

		    if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
		        $profile = Profile::where('user_id', \Auth::User()->id)->first();
		        if(sizeof($profile)<1){
		        	$profile = new Profile;
		        	$profile->user_id=\Auth::User()->id;
		        }

		        $profile->profileImagePath = 'images/profileImages/' . \Auth::User()->id . '.' . $imageFileType;
		        $profile->save();
	    	}	    

	    return $uploadOK;
		}
		return 5;
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
