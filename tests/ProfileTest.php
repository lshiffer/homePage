<?php

use App\Models\Profile;

class ProfileTest extends TestCase {

	public function testValidateReturnsFalseIfProfileDataMissing()
	{
		$validation = Profile::validate([]);

		$this->assertEquals($validation->passes(), false);
	}

	public function testValidateReturnsTrueIfProfileDataProvided()
	{
		$validation = Profile::validate([
				'user_id' => 5,
				'profileImagePath' => 'images/4.png',
				'description' => 'hey all'
			]);

		$this->assertEquals($validation->passes(), true);
	}
}