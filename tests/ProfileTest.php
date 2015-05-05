<?php

use App\Models\Profile;

class ProfileTest extends TestCase {

	public function testValidateReturnsFalseIfUserIDIsMissing()
	{
		$validation = Profile::validate([]);

		$this->assertEquals($validation->passes(), false);
	}

	public function testValidateReturnsTrueifUserIDIsPresent()
	{
		$validation = Profile::validate([
				'user_id' => 5
			]);

		$this->assertEquals($validation->passes(), true);
	}
}