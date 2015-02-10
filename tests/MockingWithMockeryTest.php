<?php
use beeare\MockingStubbing\MockingWithMockery;
 
class MockingWithMockeryTest extends PHPUnit_Framework_TestCase
{ 
	public function testHasCheese()
	{
		$mockingWithMockery = new MockingWithMockery;
		$this->assertTrue($mockingWithMockery->hasCheese());
	}
}
