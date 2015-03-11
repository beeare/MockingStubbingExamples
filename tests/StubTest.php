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
			->will($this->returnValue('foo'));
		
		$this->assertEquals('foo', $stub1->doSomething());
	}

    public function testStubSincePhpUnit40()
    {
        $stub2 = $this->getMockBuilder('beeare\MockingStubbing\SomeClass')
            ->getMock();

        $stub2->method('doSomething')
            ->willReturn('foo');

        $this->assertEquals('foo', $stub2->doSomething());
    }
}
