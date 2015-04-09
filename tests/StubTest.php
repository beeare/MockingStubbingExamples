<?php
namespace beeare\MockingStubbing;

class StubTest extends \PHPUnit_Framework_TestCase
{
    public function testStubPriorPhpUnit40()
    {
        $stub1 = $this->getMockBuilder('beeare\MockingStubbing\SomeClass')
            ->getMock();

        $stub1->expects($this->any())
            ->method('doSomething')
            ->with('bar')
            ->will($this->returnValue('foo'));

        $this->assertEquals('foo', $stub1->doSomething('bar'));
    }

    public function testStubSincePhpUnit40()
    {
        $stub2 = $this->getMockBuilder('beeare\MockingStubbing\SomeClass')
            ->getMock();

        $stub2->method('doSomething')
            ->with('bar')
            ->willReturn('foo');

        $this->assertEquals('foo', $stub2->doSomething('bar'));
    }

    public function testMockWithNonExistentClass()
    {
        $mock = $this->getMockBuilder('Controllers\\UserController')
            ->setMethods(array('get'))
            ->getMock();

        $mock->expects($this->once())
            ->method('get')
            ->with($this->equalTo('1'))
            ->will($this->returnValue('user 1'));

        $this->assertEquals('user 1', $mock->get('1'));
    }

    public function testStubWithProphecy()
    {
        $hasherProphecy = $this->prophesize('beeare\MockingStubbing\SomeClass');
        $hasherProphecy->doSomething('bar')->willReturn('foo')->shouldBeCalled();
        $hasherProphecy->doSomething('foo')->willReturn('bar')->shouldBeCalled();

        $hasher = $hasherProphecy->reveal();

        $this->assertEquals('foo', $hasher->doSomething('bar'));
        $this->assertEquals('bar', $hasher->doSomething('foo'));
    }

    public function testMockReflection2()
    {
        $mock = $this->prophesize('beeare\MockingStubbing\UserController');
        $mock->get(1)->willReturn('user 1');

        $reflectionClass = new \ReflectionClass($mock->reveal());

        // Failed asserting that 0 matches expected 1.
        $this->assertEquals(1, $reflectionClass->getMethod('get')->getNumberOfParameters());
    }
}
