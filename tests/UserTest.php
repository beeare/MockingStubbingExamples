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

    public function testCallback()
    {
        $userProphecy = $this->prophesize('beeare\MockingStubbing\User');
        $userProphecy->setName(\Prophecy\Argument::type('string'))->will(function ($args) {
            $this->getName()->willReturn($args[0]);
        });

        $userProphecy->setName(\Prophecy\Argument::any())->will(function () {
        });

        $user = $userProphecy->reveal();

        $user->setName('asdasd');
        $this->assertEquals('asdasd', $user->getName());

        $user->setName(array());
        $this->assertEquals('asdasd', $user->getName());
    }
}
