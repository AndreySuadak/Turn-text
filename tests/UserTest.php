<?php

    use App\Models\User;

    class UserTest extends PHPUnit\Framework\TestCase {
        public function testIsWeCanSetUserName() {
            $user = new User();
            $user->setUserName('George');
            $this->assertEquals($user->getUserName(), 'George');
        }
    }
