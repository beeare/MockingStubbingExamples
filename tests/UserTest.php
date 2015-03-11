<?php
namespace beeare\MockingStubbing;

class UserTest extends \PHPUnit_Framework_TestCase
{
    public function testPasswordHashing()
    {
        $hasher = $this->prophesize('beeare\MockingStubbing\Hasher');
        $hasher->generateHash('qwerty')->willReturn('hashed_pass')->shouldBeCalled();

        $user = new User($hasher->reveal());
        $user->setPassword('qwerty');

        $this->assertEquals('hashed_pass', $user->getPassword());
    }
}
