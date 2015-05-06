<?php

use App\Models\UserQuery;

class UserQueryTest extends TestCase {

	public function testValidateReturnsFalseIfUserIDIsMissing()
	{
		$validation = UserQuery::validate([]);

		$this->assertEquals($validation->passes(), false);
	}

	public function testValidateReturnsTrueifUserIDIsPresent()
	{
		$validation = UserQuery::validate([
				'user_id' => 5
			]);

		$this->assertEquals($validation->passes(), true);
	}
}